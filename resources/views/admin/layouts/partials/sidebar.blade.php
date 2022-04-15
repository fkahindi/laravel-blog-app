<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="sidebar">
    <ul class="app-menu">
        <li>
            <a class="app-menu__item{{
                Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}"
                href="{{ route('admin.dashboard') }}">
                <i class="app-menu__icon fa fa-dashbord"></i>
                <span class="app-menu__label">Dashboard</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item{{
                Route::currentRouteName() == 'admin.posts.index' ? 'active' : '' }}"
                href="{{ route('admin.posts.index') }}">
                <i class="app-menu__icon fa fa-dashbord"></i>
                <span class="app-menu__label">Posts</span>
            </a>
            <a class="app-menu__item{{
                Route::currentRouteName() == 'admin.topics.index' ? 'active' : '' }}"
                href="{{ route('admin.topics.index') }}">
                <i class="app-menu__icon fa fa-dashbord"></i>
                <span class="app-menu__label">Posts</span>
            </a>
        </li>
    </ul>
</aside>
