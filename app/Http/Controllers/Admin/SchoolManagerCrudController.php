<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SchoolManagerRequest;
use App\Http\Requests\SchoolManagerRequestUpdate;

use App\Models\SchoolManager;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

/**
 * Class SchoolManagerCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class SchoolManagerCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation {
        store as traitStore;
    }
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\InlineCreateOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\SchoolManager::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/schoolmanager');
        CRUD::setEntityNameStrings('School Managers', 'School Managers');
        $this->setPermissions();
    }
    public function setPermissions()
    {
        // Get authenticated user
        $user = auth()->user();

        // Deny all accesses
        $this->crud->denyAccess(['list', 'create', 'update', 'delete']);

        // Allow list access
        if ($user->can('list_schoolmanager')) {
            $this->crud->allowAccess('list');
        }

        // Allow create access
        if ($user->can('create_schoolmanager')) {
            $this->crud->allowAccess('create');
        }

        // Allow update access
        if ($user->can('update_schoolmanager')) {
            $this->crud->allowAccess('update');
        }

        // Allow delete access
        if ($user->can('delete_schoolmanager')) {
            $this->crud->allowAccess('delete');
        }
    }

    public function store()
    {

        $this->crud->setRequest($this->crud->validateRequest());

        $manager_name = $this->crud->getRequest()->input('name');
        $manager_email = $this->crud->getRequest()->input('email');
        $manager_password = $this->crud->getRequest()->input('password');

        $request = $this->crud->getRequest();


        $request->request->remove('email');
        $request->request->remove('password');
        $response = $this->traitStore();
        $user = new User();
        $user->name = $manager_name;
        $user->email = $manager_email;
        $user->password = Hash::make($manager_password);
        $user->save();
        $user->assignRole('manager');
        $student =  SchoolManager::find($this->data['entry']->id);

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


        // function($values) { // if the filter is active
        //     foreach (json_decode($values) as $key => $value) {
        //         $this->crud->query = $this->crud->query->whereHas('tags', function ($query) use ($value) {
        //             $query->where('tag_id', $value);
        //         });
        //     }
        // }
        CRUD::column('name');
        CRUD::column('user.email');


        $this->crud->addColumns([
            [
                'label' => 'School',
                'name' => 'school.name', // relation.column_name
            ],
        ]);
        $this->crud->addColumns([
            [
                'label' => 'School Code',
                'name' => 'school.school_code', // relation.column_name
            ],
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
        CRUD::setValidation(SchoolManagerRequest::class);


        $this->crud->addField([
            'label' => 'School',
            'type' => 'select2',
            'name' => 'school_id', // the db column for the foreign key
            'entity' => 'school', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model' => 'App\Models\School',
            'include_form_fields' => true,
            'ajax' => true,
            'inline_create' =>  [
                'entity'      => 'school',
                'modal_class' => 'modal-dialog modal-xl',
            ], // foreign key model
        ]);
        $this->crud->addFields(static::getFieldsArrayForManagerTab());


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
        CRUD::setValidation(SchoolManagerRequestUpdate::class);
        $this->crud->addField([
            'label' => 'School',
            'type' => 'select2',
            'name' => 'school_id', // the db column for the foreign key
            'entity' => 'school', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model' => 'App\Models\School',
            'include_form_fields' => true,
            'ajax' => true,
            'inline_create' =>  [
                'entity'      => 'school',
                'modal_class' => 'modal-dialog modal-xl',
            ], // foreign key model
        ]);
    }


    public static function getFieldsArrayForManagerTab()
    {
        // -----------------
        // Manager tab
        // -----------------

        return [
            [

                'name'          => 'name',
                'attribute'     => 'name',
                'tab'           => 'Manager Information',


                'wrapperAttributes' => ['class' => 'form-group col-md-6'],
            ],
            [

                'name'          => 'phone',
                'tab'           => 'Manager Information',


                'wrapperAttributes' => ['class' => 'form-group col-md-6'],
            ],
            [

                'name'          => 'cnic',
                'tab'           => 'Manager Information',

                'wrapperAttributes' => ['class' => 'form-group col-md-6'],
            ],

            [

                'name'          => 'address',
                'tab'           => 'Manager Information',

                'wrapperAttributes' => ['class' => 'form-group col-md-6'],
            ],
            [

                'name'          => 'email',
                'tab'           => 'Manager Information',

                'wrapperAttributes' => ['class' => 'form-group col-md-6'],
            ],
            [

                'type' => 'password',
                'name' => 'password',
                'tab'           => 'Manager Information',

                'wrapperAttributes' => ['class' => 'form-group col-md-6'],
            ],



        ];
    }

    public static function getFieldsArrayForManagerTabUpdate()
    {
        // -----------------
        // Manager tab
        // -----------------

        return [
            [

                'name'          => 'name',
                'attribute'     => 'name',
                'tab'           => 'Manager Information',


                'wrapperAttributes' => ['class' => 'form-group col-md-6'],
            ],
            [

                'name'          => 'phone',
                'tab'           => 'Manager Information',


                'wrapperAttributes' => ['class' => 'form-group col-md-6'],
            ],
            [

                'name'          => 'cnic',
                'tab'           => 'Manager Information',

                'wrapperAttributes' => ['class' => 'form-group col-md-6'],
            ],

            [

                'name'          => 'address',
                'tab'           => 'Manager Information',

                'wrapperAttributes' => ['class' => 'form-group col-md-6'],
            ],




        ];
    }
}
