<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\FieldRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class FieldCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class FieldCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Field::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/field');
        CRUD::setEntityNameStrings('field', 'fields');
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
        //        CRUD::column('status');
        //        CRUD::column('created_at');
        //        CRUD::column('updated_at');
        $this->crud->addColumns([
            [
                'label' => 'Cariers',
                'name' => 'carier.name', // relation.column_name
            ],
        ]);
        $this->crud->addColumns([
            [
                'name'      => 'criterias', // name of relationship method in the model
                'type'      => 'relationship_count',
                'label'     => 'Criteria',
            ],
        ]);
        $this->crud->addColumns([
            [
                'name'      => 'subjects', // name of relationship method in the model
                'type'      => 'relationship_count',
                'label'     => 'Subjects',
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
        CRUD::setValidation(FieldRequest::class);

        CRUD::field('name');
        //        CRUD::field('status');
        $this->crud->addField([
            'label' => 'Cariers',
            'type' => 'relationship',
            'name' => 'carier_id', // the db column for the foreign key
            'entity' => 'carier', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model' => 'App\Models\Carier' // foreign key model
        ]);
        // CRUD::field('carier_id');

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
