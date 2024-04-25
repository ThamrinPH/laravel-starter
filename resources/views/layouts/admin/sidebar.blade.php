
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
                        @hasrole('super-admin')
                        <li class="nav-item">
                            <a href="{{ route('branch.index') }}" class="nav-link">
                                <i class="fa-solid fa-building-flag"></i>
                                <p>
                                    Branch
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('branch.index') }}" class="nav-link">
                                <i class="fa-solid fa-building-flag"></i>
                                <p>
                                    Menu
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('branch.index') }}" class="nav-link">
                                <i class="fa-solid fa-building-flag"></i>
                                <p>
                                    Role
                                </p>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="{{ route('branch.index') }}" class="nav-link">
                                <i class="fa-solid fa-building-flag"></i>
                                <p>
                                    Permission
                                </p>
                            </a>
                        </li>
                        @endhasrole
                    </ul>
                </nav>

            </div>

        </aside>
