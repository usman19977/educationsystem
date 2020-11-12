<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SchoolRequest;
use App\Http\Requests\SchoolUpdateRequest;
use App\Models\SchoolManager;
use App\Models\User;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Facades\Hash;

/**
 * Class SchoolCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class SchoolCrudController extends CrudController
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
        CRUD::setModel(\App\Models\School::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/school');
        CRUD::setEntityNameStrings('school', 'schools');
        $this->setPermissions();
    }
    public function setPermissions()
    {
        // Get authenticated user
        $user = auth()->user();

        // Deny all accesses
        $this->crud->denyAccess(['list', 'create', 'update', 'delete']);

        // Allow list access
        if ($user->can('list_school')) {
            $this->crud->allowAccess('list');
        }

        // Allow create access
        if ($user->can('create_school')) {
            $this->crud->allowAccess('create');
        }

        // Allow update access
        if ($user->can('update_school')) {
            $this->crud->allowAccess('update');
        }

        // Allow delete access
        if ($user->can('delete_school')) {
            $this->crud->allowAccess('delete');
        }
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {


        CRUD::column('name');
        CRUD::column('school_code');
        CRUD::column('phone');
        CRUD::column('address');
        $this->crud->addColumns([
            [
                'name'      => 'students', // name of relationship method in the model
                'type'      => 'relationship_count',
                'label'     => 'Students',
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
    public function store()
    {
        $this->crud->setRequest($this->crud->validateRequest());

        $manager_name = $this->crud->getRequest()->input('manager_name');
        $manager_email = $this->crud->getRequest()->input('manager_email');
        $manager_password = $this->crud->getRequest()->input('manager_password');
        $manager_address = $this->crud->getRequest()->input('manager_address');
        $manager_cnic = $this->crud->getRequest()->input('manager_cnic');
        $manager_phone = $this->crud->getRequest()->input('manager_phone');
        $request = $this->crud->getRequest();

        $request->request->remove('manager_name');
        $request->request->remove('manager_email');
        $request->request->remove('manager_password');
        $request->request->remove('manager_address');
        $request->request->remove('manager_cnic');
        $request->request->remove('manager_phone');



        // //get last inserted row id
        // $entryID = $this->data['entry']->id;

        $user = new User();
        $user->name = $manager_name;
        $user->email = $manager_email;
        $user->password = Hash::make($manager_password);
        $user->save();
        $user->assignRole('SchoolManager');
        $this->crud->getRequest()->request->add(['user_id' => $user->id]);

        // $response = $this->traitStore();

        $this->crud->hasAccessOrFail('create');
        // insert item in the db
        $item = $this->crud->create([
            'name' =>  $this->crud->getRequest()->input('name'),
            'address' =>  $this->crud->getRequest()->input('address'),
            'school_code' =>  $this->crud->getRequest()->input('school_code'),
            'phone' =>  $this->crud->getRequest()->input('phone'),
            'user_id' =>  $this->crud->getRequest()->input('user_id'),
        ]);

        $this->data['entry'] = $this->crud->entry = $item;
        // show a success message
        \Prologue\Alerts\Facades\Alert::success(trans('backpack::crud.insert_success'))->flash();
        // save the redirect choice for next time
        $this->crud->setSaveAction();
        $response = $this->crud->performSaveAction($item->getKey());

        $school_id_inserted = $this->data['entry']->id;

        $schoolmanager = new SchoolManager();
        $schoolmanager->name = $manager_name;
        $schoolmanager->phone = $manager_phone;
        $schoolmanager->address = $manager_address;
        $schoolmanager->cnic = $manager_cnic;
        $schoolmanager->school_id = $school_id_inserted;
        $schoolmanager->user_id = $user->id;
        $schoolmanager->save();



        // show a success message
        //Alert::success('New price created in DEFAULT_BASE_PRICEBOOK'))->flash();

        return $response;
    }
    protected function setupCreateOperation()
    {
        CRUD::setValidation(SchoolRequest::class);
        CRUD::addField([
            'name' => 'name',
            'wrapper' => ['class' => 'form-group col-md-6'],
        ]);
        CRUD::addField([
            'name' => 'school_code',
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
        CRUD::setValidation(SchoolUpdateRequest::class);
        CRUD::addField([
            'name' => 'name',
            'wrapper' => ['class' => 'form-group col-md-6'],
        ]);
        CRUD::addField([
            'name' => 'school_code',
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
    }


    public static function getFieldsArrayForManagerTab()
    {
        // -----------------
        // Manager tab
        // -----------------

        return [
            [

                'name'          => 'manager_name',
                'attribute'     => 'name',
                'tab'           => 'Manager Information',


                'wrapperAttributes' => ['class' => 'form-group col-md-6'],
            ],
            [

                'name'          => 'manager_phone',
                'tab'           => 'Manager Information',


                'wrapperAttributes' => ['class' => 'form-group col-md-6'],
            ],
            [

                'name'          => 'manager_cnic',
                'tab'           => 'Manager Information',

                'wrapperAttributes' => ['class' => 'form-group col-md-6'],
            ],

            [

                'name'          => 'manager_address',
                'tab'           => 'Manager Information',

                'wrapperAttributes' => ['class' => 'form-group col-md-6'],
            ],
            [

                'name'          => 'manager_email',
                'tab'           => 'Manager Information',

                'wrapperAttributes' => ['class' => 'form-group col-md-6'],
            ],
            [

                'type' => 'password',
                'name' => 'manager_password',
                'tab'           => 'Manager Information',

                'wrapperAttributes' => ['class' => 'form-group col-md-6'],
            ],



        ];
    }
}
