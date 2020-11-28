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

@can('manage_frontend')
    <li class="nav-item nav-dropdown open">
        <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-sun"></i> Frontend Content</a>
        <ul class="nav-dropdown-items">
            @can('list_download')
                <li class='nav-item'><a class='nav-link' href='{{ backpack_url('download') }}'><i
                            class='nav-icon la la-download'></i> Downloads</a></li>
            @endcan
            @can('list_press_release')
                <li class='nav-item'><a class='nav-link' href='{{ backpack_url('pressrelease') }}'><i
                            class='nav-icon la la-tv'></i> Press Releases</a></li>
            @endcan
            @can('list_press_release')
                <li class='nav-item'><a class='nav-link' href='{{ backpack_url('tender') }}'><i
                            class='nav-icon la la-briefcase'></i> Tenders</a></li>
            @endcan
            @can('list_page')
                <li class='nav-item'><a class='nav-link' href='{{ backpack_url('page') }}'><i class='nav-icon la la-copy'></i>
                        Pages</a></li>
            @endcan
            @can('list_slider')
                <li class='nav-item'><a class='nav-link' href='{{ backpack_url('slider') }}'><i
                            class='nav-icon la la-photo-video'></i> Sliders</a></li>
            @endcan
            @can('list_contact')
                <li class='nav-item'><a class='nav-link' href='{{ backpack_url('contact') }}'><i class='nav-icon la la-tty'></i>
                        Contact Us</a></li>
            @endcan
            @can('list_director')
                <li class='nav-item'><a class='nav-link' href='{{ backpack_url('director') }}'><i
                            class='nav-icon la la-chess-knight'></i> Directors</a></li>
            @endcan
            @can('list_teacher')
                <li class='nav-item'><a class='nav-link' href='{{ backpack_url('teacher') }}'><i
                            class='nav-icon la  la-school'></i> Teachers</a></li>
            @endcan
            @can('list_testimonal')
                <li class='nav-item'><a class='nav-link' href='{{ backpack_url('testimonal') }}'><i
                            class='nav-icon la la-comments'></i> Testimonals</a></li>
            @endcan
            @can('list_subscribe')
                <li class='nav-item'><a class='nav-link' href='{{ backpack_url('subscriber') }}'><i
                            class='nav-icon la la-history'></i> Subscribers</a></li>
            @endcan
        </ul>
    </li>
@endcan
@can('manage_auth')
    <li class="nav-item nav-dropdown open">
        <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-users"></i> Authentication</a>
        <ul class="nav-dropdown-items">
            <li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-user"></i>
                    <span>Users</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ backpack_url('role') }}"><i
                        class="nav-icon la la-id-badge"></i> <span>Roles</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ backpack_url('permission') }}"><i
                        class="nav-icon la la-key"></i> <span>Permissions</span></a></li>
        </ul>
    </li>
@endcan
