@if(\Illuminate\Support\Facades\Auth::user()->is_admin)
    <li class="c-sidebar-nav-title">Components</li>
    <li class="c-sidebar-nav-dropdown">
        <a class="c-sidebar-nav-dropdown-toggle" href="#">
            <div class="c-sidebar-nav-icon">
                <i class="fas fa-puzzle-piece"></i>
            </div>
            {{ __('Admin')}}
        </a>
        <ul class="c-sidebar-nav-dropdown-items">
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.pages.index') }}"> {{ __('Pages') }}</a></li>
        </ul>
    </li>
@endif
