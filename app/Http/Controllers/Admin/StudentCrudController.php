<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StudentUpdateRequest;
use App\Http\Requests\StudentRequest;

use App\Models\Student;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

/**
 * Class StudentCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class StudentCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation {
        store as traitStore;
    }
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Student::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/student');
        CRUD::setEntityNameStrings('student', 'students');
        $this->setPermissions();
    }
    public function setPermissions()
    {
        // Get authenticated user
        $user = auth()->user();

        // Deny all accesses
        $this->crud->denyAccess(['list', 'create', 'update', 'delete']);

        // Allow list access
        if ($user->can('list_student')) {
            $this->crud->allowAccess('list');
        }

        // Allow create access
        if ($user->can('create_student')) {
            $this->crud->allowAccess('create');
        }

        // Allow update access
        if ($user->can('update_student')) {
            $this->crud->allowAccess('update');
        }

        // Allow delete access
        if ($user->can('delete_student')) {
            $this->crud->allowAccess('delete');
        }
    }
    public function store()
    {


        $this->crud->setRequest($this->crud->validateRequest());

        $candidate_name = $this->crud->getRequest()->input('candidate_name');
        $candidate_email = $this->crud->getRequest()->input('email');
        $candidate_password = $this->crud->getRequest()->input('password');

        $request = $this->crud->getRequest();


        $request->request->remove('email');
        $request->request->remove('password');





        $response = $this->traitStore();


        $user = new User();
        $user->name = $candidate_name;
        $user->email = $candidate_email;
        $user->password = Hash::make($candidate_password);
        $user->save();
        $user->assignRole('Student');

        $student_id_inserted = $this->data['entry']->id;


        $student =  Student::find($student_id_inserted);

        $student->user_id =  $user->id;
        $student->save();



        // show a success message
        //Alert::success('New price created in DEFAULT_BASE_PRICEBOOK'))->flash();

        return $response;
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {

        if (auth()->user()->can('manage_all_student') == false) {

            $this->crud->addClause('whereHas', 'school', function ($query) {
                $query->whereHas('manager_user', function ($query) {
                    $query->where('id', '=', auth()->user()->id);
                });
            });
        }

        CRUD::column('candidate_name');
        CRUD::column('father_name');
        CRUD::column('cnic');

        $this->crud->addColumns([
            [
                'label' => 'School Name',
                'name' => 'school.name', // relation.column_name
            ],
            [
                'label' => 'School Contact',
                'name' => 'school.phone', // relation.column_name
            ],
            [
                'label' => 'School Code',
                'name' => 'school.school_code', // relation.column_name
            ],
            [
                'name' => 'image', // The db column name
                'label' => "Student image", // Table column heading
                'type' => 'image',
                'height' => '150px',
                'width' => '150px',
            ]
        ]);


        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(StudentRequest::class);
        CRUD::addField([
            'name' => 'candidate_name',
            'wrapper' => ['class' => 'form-group col-md-6'],
        ]);
        CRUD::addField([
            'name' => 'father_name',
            'wrapper' => ['class' => 'form-group col-md-6'],
        ]);
        CRUD::addField([
            'name' => 'phone',
            'wrapper' => ['class' => 'form-group col-md-6'],
        ]);
        CRUD::addField([
            'name' => 'address',
            'wrapper' => ['class' => 'form-group col-md-6'],
        ]);
        CRUD::addField([
            'name' => 'cnic',
            'wrapper' => ['class' => 'form-group col-md-6'],
        ]);
        CRUD::addField([
            'label' => 'School Roll Number',
            'name' => 'school_rollnumber',
            'wrapper' => ['class' => 'form-group col-md-6'],
        ]);
        CRUD::addField([
            'name' => 'religion',
            'wrapper' => ['class' => 'form-group col-md-6'],
        ]);
        $this->crud->addField([   // select_from_array
            'name' => 'gender',
            'wrapper' => ['class' => 'form-group col-md-6'],
            'label' => "Gender",
            'type' => 'select_from_array',
            'options' => ['male' => 'Male', 'female' => 'Female'],
            'allows_null' => false,
            'default' => 'male',
            // 'allows_multiple' => true, // OPTIONAL; needs you to cast this to array in your model;
        ]);
        $this->crud->addField(
            [   // date_picker
                'name'  => 'date_of_birth',
                'type'  => 'date_picker',
                'label' => 'Date',
                'wrapper' => ['class' => 'form-group col-md-6'],
                // optional:
                'date_picker_options' => [
                    'todayBtn' => 'linked',
                    'format'   => 'dd-mm-yyyy',
                    'language' => 'en'
                ],
            ],
        );
        if (auth()->user()->can('manage_all_student')) {
            $this->crud->addField([
                'label' => 'School',
                'wrapper' => ['class' => 'form-group col-md-6'],
                'type' => 'relationship',
                'name' => 'school_id', // the db column for the foreign key
                'entity' => 'school', // the method that defines the relationship in your Model
                'attribute' => 'name', // foreign key attribute that is shown to user
                'model' => 'App\Models\School',

            ]);
        } else {
            $this->crud->addField([
                'label' => 'School',
                'wrapper' => ['class' => 'form-group col-md-6'],
                'type' => 'hidden',
                'name' => 'school_id', // the db column for the foreign key
                'value' => auth()->user()->school->id,

            ]);
        }

        $this->crud->addField([
            'label' => "Student Image",
            'name' => "image",
            'type' => 'image',
            'crop' => true, // set to true to allow cropping, false to disable
            'aspect_ratio' => 0, // ommit or set to 0 to allow any aspect ratio
            // 'disk'      => 's3_bucket', // in case you need to show images from a different disk
            // 'prefix'    => 'uploads/images/profile_pictures/' // in case your db value is only the file name (no path), you can use this to prepend your path to the image src (in HTML), before it's shown to the user;
        ]);
        $this->crud->addFields(static::getFieldsArrayForLoginTab());


        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        CRUD::setValidation(StudentUpdateRequest::class);
        CRUD::addField([
            'name' => 'candidate_name',
            'wrapper' => ['class' => 'form-group col-md-6'],
        ]);
        CRUD::addField([
            'name' => 'father_name',
            'wrapper' => ['class' => 'form-group col-md-6'],
        ]);
        CRUD::addField([
            'name' => 'phone',
            'wrapper' => ['class' => 'form-group col-md-6'],
        ]);
        CRUD::addField([
            'name' => 'address',
            'wrapper' => ['class' => 'form-group col-md-6'],
        ]);
        CRUD::addField([
            'name' => 'cnic',
            'wrapper' => ['class' => 'form-group col-md-6'],
        ]);
        CRUD::addField([
            'label' => 'School Roll Number',
            'name' => 'school_rollnumber',
            'wrapper' => ['class' => 'form-group col-md-6'],
        ]);
        CRUD::addField([
            'name' => 'religion',
            'wrapper' => ['class' => 'form-group col-md-6'],
        ]);
        $this->crud->addField([   // select_from_array
            'name' => 'gender',
            'wrapper' => ['class' => 'form-group col-md-6'],
            'label' => "Gender",
            'type' => 'select_from_array',
            'options' => ['male' => 'Male', 'female' => 'Female'],
            'allows_null' => false,
            'default' => 'male',
            // 'allows_multiple' => true, // OPTIONAL; needs you to cast this to array in your model;
        ]);
        $this->crud->addField(
            [   // date_picker
                'name'  => 'date_of_birth',

                'type'  => 'date_picker',
                'label' => 'Date',
                'wrapper' => ['class' => 'form-group col-md-6'],
                // optional:
                'date_picker_options' => [
                    'todayBtn' => 'linked',
                    'format'   => 'dd-mm-yyyy',
                    'language' => 'en'
                ],
            ],
        );
        $this->crud->addField([
            'label' => "Student Image",
            'name' => "image",
            'type' => 'image',
            'crop' => true, // set to true to allow cropping, false to disable
            'aspect_ratio' => 0, // ommit or set to 0 to allow any aspect ratio
            // 'disk'      => 's3_bucket', // in case you need to show images from a different disk
            // 'prefix'    => 'uploads/images/profile_pictures/' // in case your db value is only the file name (no path), you can use this to prepend your path to the image src (in HTML), before it's shown to the user;
        ]);
        if (auth()->user()->can('manage_all_student')) {
            $this->crud->addField([
                'label' => 'School',
                'wrapper' => ['class' => 'form-group col-md-6'],
                'type' => 'relationship',
                'name' => 'school_id', // the db column for the foreign key
                'entity' => 'school', // the method that defines the relationship in your Model
                'attribute' => 'name', // foreign key attribute that is shown to user
                'model' => 'App\Models\School',

            ]);
        } else {
            $this->crud->addField([
                'label' => 'School',
                'wrapper' => ['class' => 'form-group col-md-6'],
                'type' => 'hidden',
                'name' => 'school_id', // the db column for the foreign key
                'value' => auth()->user()->school->id,

            ]);
        }
    }


    protected function setupShowOperation()
    {
        $this->setupListOperation();
        $this->crud->set('show.setFromDb', false);
    }

    public static function getFieldsArrayForLoginTab()
    {
        // -----------------
        // Manager tab
        // -----------------

        return [

            [

                'name'          => 'email',
                'tab'           => 'Login Information',

                'wrapperAttributes' => ['class' => 'form-group col-md-6'],
            ],
            [

                'type' => 'password',
                'name' => 'password',
                'tab'           => 'Login Information',

                'wrapperAttributes' => ['class' => 'form-group col-md-6'],
            ],



        ];
    }
}
