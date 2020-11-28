<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TestimonalRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class TestimonalCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class TestimonalCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Testimonal::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/testimonal');
        CRUD::setEntityNameStrings('testimonal', 'testimonals');
        $this->setPermissions();
    }
    public function setPermissions()
    {
        // Get authenticated user
        $user = auth()->user();

        // Deny all accesses
        $this->crud->denyAccess(['list', 'create', 'update', 'delete']);

        // Allow list access
        if ($user->can('list_testimonal')) {
            $this->crud->allowAccess('list');
        }

        // Allow create access
        if ($user->can('create_testimonal')) {
            $this->crud->allowAccess('create');
        }

        // Allow update access
        if ($user->can('update_testimonal')) {
            $this->crud->allowAccess('update');
        }

        // Allow delete access
        if ($user->can('delete_testimonal')) {
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
        //  CRUD::setFromDb(); // columns
        $this->crud->addColumns([
            [
                'label' => 'Title',
                'name' => 'name', // relation.column_name
            ],
            [
                'name' => 'image', // The db column name
                'label' => "Testimonal image", // Table column heading
                'type' => 'image',
                'height' => '150px',
                'width' => '150px',
            ],
            [
                'label' => 'Relation',
                'name' => 'relation',
            ], [
                'label' => 'Message',
                'name' => 'message',
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
        CRUD::setValidation(TestimonalRequest::class);

        //  CRUD::setFromDb(); // fields

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
        CRUD::addField([
            'label' => "Name",
            'name' => 'name',
            'wrapper' => ['class' => 'form-group col-md-12'],
        ]);
        $this->crud->addField([
            'label' => "Tender Image",
            'name' => "image",
            'type' => 'image',
            'crop' => true, // set to true to allow cropping, false to disable
            'aspect_ratio' => 0, // ommit or set to 0 to allow any aspect ratio
            // 'disk'      => 's3_bucket', // in case you need to show images from a different disk
            // 'prefix'    => 'uploads/images/profile_pictures/' // in case your db value is only the file name (no path), you can use this to prepend your path to the image src (in HTML), before it's shown to the user;
        ]);
        CRUD::addField([
            'label' => "Relation",
            'name' => 'relation',
            'wrapper' => ['class' => 'form-group col-md-12'],
        ]);
        CRUD::addField([
            'label' => "Message",
            'name' => 'message',
            'wrapper' => ['class' => 'form-group col-md-12'],
        ]);
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
        $this->crud->set('show.setFromDb', false);
    }
}
