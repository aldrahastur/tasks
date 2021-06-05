<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
<div class="c-sidebar-brand d-md-down-none">
    <svg class="c-sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
        <use xlink:href="assets/brand/coreui-pro.svg#full"></use>
    </svg>
    <svg class="c-sidebar-brand-minimized" width="46" height="46" alt="CoreUI Logo">
        <use xlink:href="assets/brand/coreui-pro.svg#signet"></use>
    </svg>
</div>
<ul class="c-sidebar-nav ps ps--active-y">
    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="/">
            <div class="c-sidebar-nav-icon">
                <i class="fas fa-home"></i>
            </div> Dashboard<span class="badge badge-info">NEW</span></a>
    </li>
    @if(\Illuminate\Support\Facades\Auth::user()->is_admin)
    <li class="c-sidebar-nav-title">Components</li>
    <li class="c-sidebar-nav-dropdown">
        <a class="c-sidebar-nav-dropdown-toggle" href="#">
            <div class="c-sidebar-nav-icon">
                <i class="fas fa-puzzle-piece"></i>
            </div> Admin
        </a>
        <ul class="c-sidebar-nav-dropdown-items">
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.pages.index') }}"> Breadcrumb</a></li>
        </ul>
    </li>
    @endif
    <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
    </div>
    <div class="ps__rail-y" style="top: 0px; height: 860px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 575px;"></div>
    </div>
</ul>
<button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-unfoldable"></button>
</div>


