@extends(backpack_view('blank'))
@php
	// ---------------------
	// JUMBOTRON widget demo
	// ---------------------
	// Widget::add([
 //        'type'        => 'jumbotron',
 //        'name' 		  => 'jumbotron',
 //        'wrapperClass'=> 'shadow-xs',
 //        'heading'     => trans('backpack::base.welcome'),
 //        'content'     => trans('backpack::base.use_sidebar'),
 //        'button_link' => backpack_url('logout'),
 //        'button_text' => trans('backpack::base.logout'),
 //    ])->to('before_content')->makeFirst();
	// -------------------------
	// FLUENT SYNTAX for widgets
	// -------------------------
	// Using the progress_white widget
	//
	// Obviously, you should NOT do any big queries directly in the view.
	// In fact, it can be argued that you shouldn't add Widgets from blade files when you
	// need them to show information from the DB.
	//
	// But you do whatever you think it's best. Who am I, your mom?

    $studentCount = App\Models\User::firstorfail()->role('Student')->count();
    $managerCount = App\Models\User::firstorfail()->role('SchoolManager')->count();
    $schoolcount = App\Models\School::count();
    $totalcariers = App\Models\Carier::count();
    $totalfields = App\Models\Field::count();
    $totalcriterias = App\Models\Criteria::count();
    $totalsubjects = App\Models\Subject::count();

	$userCount = App\Models\User::count();


 	// notice we use Widget::add() to add widgets to a certain group
	Widget::add()->to('before_content')->type('div')->class('row')->content([
		// notice we use Widget::make() to add widgets as content (not in a group)
		    Widget::make()
			->type('progress')
			->class('card border-0 text-white bg-pink')
			->progressClass('progress-bar')
			->value($totalcariers)
			->description('Total cariers.')
			->progress(100*(int)$totalcariers/1000)
            ->hint(1000-$totalcariers.' more until next milestone.'),
            Widget::make()
			->type('progress')
			->class('card border-0 text-white bg-green')
			->progressClass('progress-bar')
			->value($totalfields)
			->description('Total Fields.')
			->progress(100*(int)$totalfields/1000)
            ->hint(1000-$totalfields.' more until next milestone.'),
            Widget::make()
			->type('progress')
			->class('card border-0 text-white bg-indigo')
			->progressClass('progress-bar')
			->value($totalcriterias)
			->description('Total criterias')
			->progress(100*(int)$totalcriterias/1000)
            ->hint(1000-$totalcriterias.' more until next milestone.'),

            Widget::make()
			->type('progress')
			->class('card border-0 text-white bg-warning')
			->progressClass('progress-bar')
			->value($totalsubjects)
			->description('Total subjects')
			->progress(100*(int)$totalsubjects/1000)
			->hint(1000-$totalsubjects.' more until next milestone.'),

	]);
	Widget::add()->to('before_content')->type('div')->class('row')->content([
		// notice we use Widget::make() to add widgets as content (not in a group)
		    Widget::make()
			->type('progress')
			->class('card border-0 text-white bg-primary')
			->progressClass('progress-bar')
			->value($userCount)
			->description('Registered users.')
			->progress(100*(int)$userCount/1000)
            ->hint(1000-$userCount.' more until next milestone.'),
            Widget::make()
			->type('progress')
			->class('card border-0 text-white bg-blue')
			->progressClass('progress-bar')
			->value($studentCount)
			->description('Registered students.')
			->progress(100*(int)$studentCount/1000)
            ->hint(1000-$studentCount.' more until next milestone.'),
            Widget::make()
			->type('progress')
			->class('card border-0 text-white bg-dark')
			->progressClass('progress-bar')
			->value($managerCount)
			->description('Registered school managers.')
			->progress(100*(int)$managerCount/1000)
            ->hint(1000-$managerCount.' more until next milestone.'),

            Widget::make()
			->type('progress')
			->class('card border-0 text-white bg-cyan')
			->progressClass('progress-bar')
			->value($schoolcount)
			->description('Registered schools ')
			->progress(100*(int)$schoolcount/1000)
			->hint(1000-$schoolcount.' more until next milestone.'),

    ]);

    $widgets['before_content'][] = [
	  'type' => 'div',
	  'class' => 'row',
	  'content' => [ // widgets
		  	[
		        'type' => 'chart',
		        'wrapperClass' => 'col-md-4',
		        // 'class' => 'col-md-6',
		        'controller' => \App\Http\Controllers\Admin\Charts\RequestsChartController::class,
				'content' => [
				    'header' => 'New Requests Past 7 Days', // optional
				     'body' => 'This chart should make it obvious how many new requests  in the past 7 days.<br><br>', // optional

		    	]
	    	],
	    	[
		        'type' => 'chart',
		        'wrapperClass' => 'col-md-4',
		        // 'class' => 'col-md-6',
		        'controller' => \App\Http\Controllers\Admin\Charts\ComparisionEntiriesChartController::class,
				'content' => [
				    'header' => 'Comparision', // optional
				     'body' => 'This chart should make it obvious how things comparitively work last 30 days<br><br>', // optional
		    	]
            ],
            [
		        'type' => 'chart',
		        'wrapperClass' => 'col-md-4',
		         //'class' => 'col-md-6',
		        'controller' => \App\Http\Controllers\Admin\Charts\PieChartShiftUserChartController::class,
				'content' => [
				    'header' => 'Shift / Student Comparision', // optional
				     'body' => 'This chart should make it obvious how students are in which shifts.<br><br>', // optional
		    	]
	    	],
    	]
    ];

    $widgets['after_content'][] = [
	  'type' => 'div',
	  'class' => 'row',
	  'content' => [ // widgets

	    	[
		        'type' => 'chart',
		        'wrapperClass' => 'col-md-12',
		        // 'class' => 'col-md-6',
		        'controller' => \App\Http\Controllers\Admin\Charts\LinechartCriteriaVsUserChartController::class,
				'content' => [
				    'header' => 'Criteria Vs Student', // optional
				     'body' => 'This chart should make it obvious how many students are in each criteria.<br><br>', // optional
		    	]
	    	],


    	]
    ];


@endphp

@section('content')

@endsection
