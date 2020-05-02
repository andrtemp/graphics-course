@switch(user_role())
    @case('root')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('lessons.index') }}">{{ __('Lessons') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('home-tasks.index') }}">{{ __('Home tasks') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('users.index') }}">{{ __('Users') }}</a>
    </li>
    @break

    @case('teacher')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('teacher.tasks') }}">{{ __('Home tasks') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('attendance') }}">{{ __('Attendance') }}</a>
    </li>
    @break

    @case('student')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('student.lessons') }}">{{ __('Lessons') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('student.tasks') }}">{{ __('Tasks') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('student.question') }}">{{ __('Question') }}</a>
    </li>
    @break

    @default
@endswitch