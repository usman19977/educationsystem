<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ShiftRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ShiftCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ShiftCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Shift::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/shift');
        CRUD::setEntityNameStrings('shift', 'shifts');
        $this->setPermissions();
    }
    public function setPermissions()
    {
        // Get authenticated user
        $user = auth()->user();

        // Deny all accesses
        $this->crud->denyAccess(['list', 'create', 'update', 'delete']);

        // Allow list access
        if ($user->can('list_field')) {
            $this->crud->allowAccess('list');
        }

        // Allow create access
        if ($user->can('create_field')) {
            $this->crud->allowAccess('create');
        }

        // Allow update access
        if ($user->can('update_field')) {
            $this->crud->allowAccess('update');
        }

        // Allow delete access
        if ($user->can('delete_field')) {
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
        $this->crud->addColumn([
            // Time
            'name'  => 'from',
            'label' => 'Start time',
            'type'  => 'time'

        ]);

        $this->crud->addColumn([
            // Time
            'name'  => 'to',
            'label' => 'End time',
            'type'  => 'time'

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
        CRUD::setValidation(ShiftRequest::class);
        CRUD::field('name');
        $this->crud->addField([
            // Time
            'name'  => 'from',
            'label' => 'Start time',
            'type'  => 'time'

        ]);

        $this->crud->addField([
            // Time
            'name'  => 'to',
            'label' => 'End time',
            'type'  => 'time'

        ]);


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
}
