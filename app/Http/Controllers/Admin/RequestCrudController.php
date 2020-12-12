<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RequestRequest;
use App\Models\Admitcard;
use App\Models\Request;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Redirect;

use Prologue\Alerts\Facades\Alert;

/**
 * Class RequestCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class RequestCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Request::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/request');
        CRUD::setEntityNameStrings('request', 'requests');
        $this->setPermissions();
    }
    public function setPermissions()
    {
        // Get authenticated user
        $user = auth()->user();

        // Deny all accesses
        $this->crud->denyAccess(['list', 'create', 'update', 'delete']);

        // Allow list access
        if ($user->can('list_carier_request')) {
            $this->crud->allowAccess('list');
        }

        // Allow create access
        if ($user->can('create_carier_request')) {
            $this->crud->allowAccess('create');
        }

        // Allow update access
        if ($user->can('update_carier_request')) {
            $this->crud->allowAccess('update');
        }

        // Allow delete access
        if ($user->can('delete_carier_request')) {
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

        // if (backpack_user()->roles[0]->name != 'super-admin') {
        //     if (backpack_user()->roles[0]->name == 'manager') {

        //         $this->crud->addClause('whereHas', 'school', function ($query) {
        //             $query->where('user_id', backpack_user()->id);
        //         });
        //     } elseif (backpack_user()->roles[0]->name == 'student') {

        //         $this->crud->addClause('whereHas', 'student', function ($query) {
        //             $query->where('user_id', backpack_user()->id);
        //         });
        //     }
        // }


        if (auth()->user()->can('manage_all_carier_request') == false) {

            $this->crud->addClause('whereHas', 'school', function ($query) {
                $query->whereHas('manager_user', function ($query) {
                    $query->where('id', '=', auth()->user()->id);
                });
            });
        }
        $this->crud->addColumns([
            [
                'label' => 'Criteria',
                'name' => 'criteria.name', // relation.column_name
            ],
            [
                // any type of relationship
                'name'         => 'subjects', // name of relationship method in the model
                'type'         => 'relationship',
                'label'        => 'Subjects', // Table column heading
                // OPTIONAL
                'entity'    => 'subjects', // the method that defines the relationship in your Model
                'attribute' => 'name', // foreign key attribute that is shown to user
                'model'     => App\Models\Subject::class, // foreign key model
            ],
            [
                // any type of relationship
                'name'         => 'student', // name of relationship method in the model
                'type'         => 'relationship',
                'label'        => 'Student', // Table column heading
                // OPTIONAL
                'entity'    => 'students', // the method that defines the relationship in your Model
                'attribute' => 'candidate_name', // foreign key attribute that is shown to user
                'model'     => App\Models\Student::class, // foreign key model
            ],
            [
                'label' => 'Shift',
                'name' => 'shift.name', // relation.column_name
            ],
            [
                'label' => 'School',
                'name' => 'school.school_code'
            ],
            [
                'label' => 'Status',
                'name' => 'status', // relation.column_name
            ],
        ]);
        if (auth()->user()->can('generate_admit_card_carier_request')) {
            $this->crud->addColumn([
                'name' => 'customLabel', //db field
                'label' => "Admit card",
                'type' => 'customLabel' //name of custom created custom field
            ]);
        } else {
            $this->crud->addColumn([
                'name' => 'customLabel', //db field
                'label' => "Approve Request",
                'type' => 'managerLabel' //name of custom created custom field
            ]);
        }
    }
    protected function setupShowOperation()
    {

        $this->crud->addColumns([
            [
                'label' => 'Criteria',
                'name' => 'criteria.name', // relation.column_name
            ],
            [
                // any type of relationship
                'name'         => 'subjects', // name of relationship method in the model
                'type'         => 'relationship',
                'label'        => 'Subjects', // Table column heading
                // OPTIONAL
                'entity'    => 'subjects', // the method that defines the relationship in your Model
                'attribute' => 'name', // foreign key attribute that is shown to user
                'model'     => App\Models\Subject::class, // foreign key model
            ],
            [
                // any type of relationship
                'name'         => 'student', // name of relationship method in the model
                'type'         => 'relationship',
                'label'        => 'Student', // Table column heading
                // OPTIONAL
                'entity'    => 'students', // the method that defines the relationship in your Model
                'attribute' => 'candidate_name', // foreign key attribute that is shown to user
                'model'     => App\Models\Student::class, // foreign key model
            ],

            [
                'label' => 'Shift',
                'name' => 'shift.name',
                // relation.column_name
            ],
            [
                'label' => 'School',
                'name' => 'school.school_code'
            ],

            [
                'label' => 'Status',
                'name' => 'status', // relation.column_name
            ],
            [
                'name' => 'customLabel', //db field
                'label' => "Admit card",
                'type' => 'customLabel' //name of custom created custom field
            ],

        ]);
        $this->crud->set('show.setFromDb', false);
        // [

        //     'name' => 'school_id',
        //     'type' => 'hidden'
        // ],
        // [
        //     'label' => 'School',
        //     'name' => 'criteria_id',
        //     'type' => 'hidden'
        // ],
        // [

        //     'name' => 'student_id',
        //     'type' => 'hidden'
        // ],
        // [

        //     'name' => 'admitcard_status',
        //     'type' => 'hidden'
        // ],
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
        CRUD::setValidation(RequestRequest::class);
        $this->crud->addField([
            'label' => 'School',
            'wrapper' => ['class' => 'form-group col-md-12'],
            'type' => 'relationship',
            'name' => 'school_id', // the db column for the foreign key
            'entity' => 'school', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model' => 'App\Models\School',

        ]);
        $this->crud->addField([ // select2_from_ajax: 1-n relationship
            'label'                => "Students", // Table column heading
            'type'                 => 'select2_from_ajax',
            'name'                 => 'student_id', // the column that contains the ID of that connected entity;
            'entity'               => 'student', // the method that defines the relationship in your Model
            'attribute'            => 'candidate_name', // foreign key attribute that is shown to user
            'placeholder'          => 'Select student', // placeholder for the select
            'data_source'          => url('api/student'),
            'include_all_form_fields' => true,
            'minimum_input_length' => 0, // minimum characters to type before querying results
            'dependencies'         => ['school_id'],
            'model' => "App\Models\Student", // foreign key model
            // when a dependency changes, this select2 is reset to null
            // ‘method'                    => ‘GET’, // optional - HTTP method to use for the AJAX call (GET, POST)
        ]);

        $this->crud->addField([
            'label' => 'Shift',
            'wrapper' => ['class' => 'form-group col-md-12'],
            'type' => 'relationship',
            'name' => 'shift_id', // the db column for the foreign key
            'entity' => 'shift', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model' => 'App\Models\Shift',

        ]);




        $this->crud->addField(
            [
                'label' => 'Criteria',
                'type' => 'select2',
                'name' => 'criteria_id',
                'entity' => 'criteria',
                'attribute' => 'name',
                'model' => 'App\Models\Criteria'
            ]
        );

        $this->crud->addField([ // select2_from_ajax: 1-n relationship
            'label'                => "Subjects", // Table column heading
            'type'                 => 'select2_from_ajax_multiple',
            'name'                 => 'subjects', // the column that contains the ID of that connected entity;
            'entity'               => 'subjects', // the method that defines the relationship in your Model
            'attribute'            => 'name', // foreign key attribute that is shown to user
            'placeholder'          => 'Select subjects', // placeholder for the select
            'data_source'          => url('api/subject'),
            'include_all_form_fields' => true,
            'minimum_input_length' => 0, // minimum characters to type before querying results
            'dependencies'         => ['criteria_id'],
            'model' => "App\Models\Subject", // foreign key model
            'pivot' => true, // when a dependency changes, this select2 is reset to null
            // ‘method'                    => ‘GET’, // optional - HTTP method to use for the AJAX call (GET, POST)
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
    public function downloadAdmitCard($id)
    {
        //return view('admitcard');
        // This  $data array will be passed to our PDF blade
        // $data = [
        //     'title' => 'First PDF for Medium',
        //     'heading' => 'Hello from 99Points.info',
        //     'content' => 'Lorem Ipsum is simply
        //     dummy text of the printing and typesetting
        //      industry. Lorem Ipsum has been the industry'

        // ];
        $admitCard = Admitcard::findorfail($id);
        $a = ['data' => $admitCard];
        // $pdf = PDF::loadView('admitcard', $a);
        // return $pdf->download('medium.pdf');
        return view('admitcard', $a);
    }
    public function generateAdmitCard($id)
    {
        // dd($id);
        $request = Request::findorfail($id);
        $request->admitcard_status = 1;
        $request->status = 'Admit Card Generated';

        $request->save();

        $new_admitcard = new Admitcard;
        $lastEnrollmentID = $new_admitcard->orderBy('id', 'desc')->pluck('id')->first();
        $new_admitcard->roll_number = 'EDU-' . str_pad($lastEnrollmentID + 1, 5, 0, STR_PAD_LEFT);
        $new_admitcard->status = 'Admit Card Generated';
        $new_admitcard->student_id = $request->student->id;
        $new_admitcard->user_id = $request->student->user_id;
        $new_admitcard->request_id = $request->id;
        $new_admitcard->candidate_name = $request->student->candidate_name;
        $new_admitcard->father_name = $request->student->father_name;
        $new_admitcard->phone = $request->student->phone;
        $new_admitcard->address = $request->student->address;
        $new_admitcard->cnic = $request->student->cnic;
        $new_admitcard->school_rollnumber = $request->student->school_rollnumber;
        $new_admitcard->religion = $request->student->religion;
        $new_admitcard->gender = $request->student->gender;
        $new_admitcard->date_of_birth = $request->student->date_of_birth;
        $new_admitcard->save();
        //  $this->viewAdmitCard();

        \Prologue\Alerts\Facades\Alert::add('success', 'Admit card generated successfully')->flash();
        return Redirect::back();
        // $new_admitcard->$new_admitcard->$new_admitcard->dd($request);

        //return view('admitcard');
        // // This  $data array will be passed to our PDF blade
        // $data = [
        //     'title' => 'First PDF for Medium',
        //     'heading' => 'Hello from 99Points.info',
        //     'content' => 'Lorem Ipsum is simply
        //     dummy text of the printing and typesetting
        //      industry. Lorem Ipsum has been the industry'

        // ];

        // $pdf = PDF::loadView('admitcard', $data);
        // return $pdf->download('.pdf');
    }
    public function approveAdmitCard($id)
    {
        $request = Request::findorfail($id);
        $request->admitcard_status = 2;
        $request->status = 'Approved By School';

        $request->save();
        \Prologue\Alerts\Facades\Alert::add('success', 'Request Approved successfully')->flash();
        return Redirect::back();
    }
    public function rejectAdmitCard($id)
    {
        $request = Request::findorfail($id);
        $request->admitcard_status = 0;
        $request->status = 'Rejected By School';

        $request->save();
        \Prologue\Alerts\Facades\Alert::add('warning', 'Request Rejected successfully')->flash();
        return Redirect::back();
    }
}
