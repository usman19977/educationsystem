<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->


<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}">
    <i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a>
</li>



@can('list_carier')
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('carier') }}'>
    <i class='nav-icon la la-book-open'></i> Cariers</a>
</li>
@endcan

@can('list_field')
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('field') }}'>
    <i class='nav-icon la la-road'></i> Fields</a>
</li>
@endcan

@can('list_criteria')
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('criteria') }}'>
    <i class='nav-icon la la-question-circle'></i> Criterias</a>
</li>
@endcan

@can('list_subject')
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('subject') }}'>
    <i class='nav-icon la la-book'></i> Subjects</a>
</li>
@endcan

@can('list_shift')
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('shift') }}'>
    <i class='nav-icon la la-clock'></i> Shifts</a>
</li>
@endcan

@can('list_school')
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('school') }}'>
    <i class='nav-icon la la-school'></i> Schools</a>
</li>
@endcan

@can('list_schoolmanager')
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('schoolmanager') }}'>
    <i class='nav-icon la la-tasks'></i> School Managers</a>
</li>
@endcan

@can('list_student')
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('student') }}'>
    <i class='nav-icon la la-user-graduate'></i> Students</a>
</li>
@endcan

@can('list_carier_request')
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('request') }}'>
    <i class='nav-icon la la-signal'></i>Carier Requests</a>
</li>
@endcan

@can('list_admit_card')
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('admitcard') }}'>
    <i class='nav-icon la la-address-card'></i> Admit Cards</a>
</li>
@endcan

@can('manage_auth')
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}">
    <i class="nav-icon la la-user"></i> <span>Users</span></a>
</li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('role') }}">
    <i class="nav-icon la la-id-badge"></i> <span>Roles</span></a>
</li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('permission') }}">
    <i class="nav-icon la la-key"></i> <span>Permissions</span></a>
</li>
@endcan

