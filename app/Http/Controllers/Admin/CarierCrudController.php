<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CarierRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CarierCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CarierCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Carier::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/carier');
        CRUD::setEntityNameStrings('carier', 'cariers');
        $this->setPermissions();
    }
    public function setPermissions()
    {
        // Get authenticated user
        $user = auth()->user();

        // Deny all accesses
        $this->crud->denyAccess(['list', 'create', 'update', 'delete']);

        // Allow list access
        if ($user->can('list_carier')) {
            $this->crud->allowAccess('list');
        }

        // Allow create access
        if ($user->can('create_carier')) {
            $this->crud->allowAccess('create');
        }

        // Allow update access
        if ($user->can('update_carier')) {
            $this->crud->allowAccess('update');
        }

        // Allow delete access
        if ($user->can('delete_carier')) {
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
        $this->crud->addColumns([
            [
                'name'      => 'fields', // name of relationship method in the model
                'type'      => 'relationship_count',
                'label'     => 'Fields',
            ],
        ]);
        $this->crud->addColumns([
            [
                'name'      => 'criterias', // name of relationship method in the model
                'type'      => 'relationship_count',
                'label'     => 'Criteria',
            ],
        ]);
        // CRUD::column('status');

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
        CRUD::setValidation(CarierRequest::class);

        CRUD::field('name');
        //        CRUD::field('status');

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
