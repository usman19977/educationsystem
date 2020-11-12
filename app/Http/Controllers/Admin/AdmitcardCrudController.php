<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdmitcardRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class AdmitcardCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class AdmitcardCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
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
        CRUD::setModel(\App\Models\Admitcard::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/admitcard');
        CRUD::setEntityNameStrings('admitcard', 'admitcards');
        $this->setPermissions();
    }
    public function setPermissions()
    {
        // Get authenticated user
        $user = auth()->user();

        // Deny all accesses
        $this->crud->denyAccess(['list', 'create', 'update', 'delete']);

        // Allow list access
        if ($user->can('list_admit_card')) {
            $this->crud->allowAccess('list');
        }

        // Allow create access
        // if ($user->can('create_admit_card')) {
        //     $this->crud->allowAccess('create');
        // }

        // Allow update access
        // if ($user->can('update_admit_card')) {
        //     $this->crud->allowAccess('update');
        // }

        // Allow delete access
        if ($user->can('delete_admit_card')) {
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

        if (auth()->user()->can('manage_all_admit_card') == false) {

            $this->crud->addClause('whereHas', 'student', function ($query) {
                $query->whereHas('school', function ($query) {
                    $query->whereHas('manager_user', function ($query) {
                        $query->where('id', '=', auth()->user()->id);
                    });
                });
            });
        }


        CRUD::column('candidate_name');
        $this->crud->addColumn([
            'name' => 'roll_number',
            'label' => 'Enrollment No'
        ]);

        CRUD::column('father_name');
        CRUD::column('cnic');
        CRUD::column('address');



        $this->crud->addColumns([
            [
                'label' => 'School Name',
                'name' => 'student.school.name', // relation.column_name
            ],
        ]);
        $this->crud->addColumns([
            [
                'label' => 'School Contact',
                'name' => 'student.school.phone', // relation.column_name
            ],
        ]);
        $this->crud->addColumns([
            [
                'label' => 'School Code',
                'name' => 'student.school.school_code', // relation.column_name
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
        CRUD::setValidation(AdmitcardRequest::class);



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
        $this->setupCreateOperation();
    }
    protected function setupShowOperation()
    {
        $this->setupListOperation();
        $this->crud->addColumns([
            [
                'label' => 'Date of birth',
                'name' => 'date_of_birth', // relation.column_name
            ],
        ]);
        $this->crud->set('show.setFromDb', false);
    }
}
