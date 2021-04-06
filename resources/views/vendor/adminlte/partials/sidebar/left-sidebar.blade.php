<aside class="main-sidebar {{ config('adminlte.classes_sidebar', 'sidebar-dark-primary elevation-4') }}">

    {{-- Sidebar brand logo --}}
    @if(config('adminlte.logo_img_xl'))
        @include('adminlte::partials.common.brand-logo-xl')
    @else
        @include('adminlte::partials.common.brand-logo-xs')
    @endif

    {{-- Sidebar menu --}}
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column {{ config('adminlte.classes_sidebar_nav', '') }}"
                data-widget="treeview" role="menu"
                @if(config('adminlte.sidebar_nav_animation_speed') != 300)
                    data-animation-speed="{{ config('adminlte.sidebar_nav_animation_speed') }}"
                @endif
                @if(!config('adminlte.sidebar_nav_accordion'))
                    data-accordion="false"
                @endif>
                {{-- Configured sidebar links --}}
                <ul>
                    @if(auth()->user()->isAdmin())
                        <li class="nav-item">
                            <a
                                class="nav-link {{ Route::currentRouteNamed(['users.index','users.create']) ? 'active' : '' }}"
                                href="{{ route('users.index')}}">
                                <i class="nav-icon fas fa-users"></i>&nbsp;<p class="text">Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link "
                                href="{{ route('postiers.index') }}">
                                <i class="nav-icon fas fa-people-carry"></i>&nbsp;<p class="text">Postiers</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link"
                                href="{{ route('categories.index') }}">
                                <i class="nav-icon fas fa-edit"></i>&nbsp;<p class="text">Categories</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link"
                                href="{{ auth()->user()->isAdmin() ? route('books.index') : route('orders.create') }}">
                                <i class="nav-icon fas fa-book"></i>&nbsp;<p class="text">Books</p>
                            </a>
                        </li>
                    @endif

                    <li class="nav-item">
                        <a
                            class="nav-link"
                            href="{{ route('orders.index') }}">
                            <i class="nav-icon fas fa-edit"></i>&nbsp;<p class="text">Orders</p>
                        </a>
                    </li>
                        <br>
                        <li class="nav-item">
                            <a
                                class="nav-link"
                                href="{{ route('home') }}">
                                <i class="nav-icon fas fa-poll-h"></i>&nbsp;<p class="text">Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link"
                                href="{{ route('profile') }}">
                                <i class="nav-icon fas fa-user"></i>&nbsp;<p class="text">MyProfile</p>
                            </a>
                        </li>
                        </li>

                </ul>

{{--                @each('adminlte::partials.sidebar.menu-item', $adminlte->menu('sidebar'), 'item')--}}
            </ul>
        </nav>
    </div>

</aside>
