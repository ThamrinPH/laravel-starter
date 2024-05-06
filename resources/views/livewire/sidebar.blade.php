<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="index3.html" class="brand-link">
        <img src="{{ asset('storage/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('storage/user1-128x128.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @foreach($menus as $menuKey => $menuRow)
                    @if( $menuRow->childs->count() > 0 )
                    <li @class([
                        'nav-item', 
                        'menu-is-opening menu-open active' => request()->is($menuRow->pathBase.'/*'),
                        ])>
                        <a href="#" @class(['nav-link', 'active' => request()->is($menuRow->pathBase.'/*') || request()->routeIs($menuRow->routeBase) ])>
                            <i class="{{ $menuRow->icon ?? '' }}"></i>
                            <p>
                                {{ ucwords($menuRow->name) }} 
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @foreach($menuRow->childs as $childRow)
                            <li class="nav-item">
                                <a href="{{ empty($childRow->route) ? '#' : route($childRow->route)}}" @class([ 'nav-link' , 'active'=> request()->is($childRow->pathBase.'/*') || request()->routeIs($childRow->routeBase)
                                    ])>
                                    <i class="{{ $childRow->icon ?? '' }}"></i>
                                    <p>
                                        {{ ucwords($childRow->name) }}
                                    </p>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    @elseif( empty($menuRow->menu_id) )
                        @can($menuRow->permission)
                        <li class="nav-item">
                            <a href="{{ empty($menuRow->route) ? '#' : route($menuRow->route)}}" @class([ 'nav-link' , 'active'=> request()->is($menuRow->pathBase.'/*') || request()->routeIs($menuRow->routeBase)
                                ])>
                                <i class="{{ $menuRow->icon ?? '' }}"></i>
                                <p>
                                    {{ ucwords($menuRow->name) }}
                                </p>
                            </a>
                        </li>
                        @endcan
                    @endif
                @endforeach
            </ul>
        </nav>

    </div>

</aside>