<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}">Stisla</a>
        </div>

        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin.dashboard') }}">St</a>
        </div>

        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>

            <li class="dropdown {{ adminSetSidebarActive(['admin.dashboard']) }}">
                <a href="{{ route('admin.dashboard') }}" class="nav-link "><i
                        class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>

            <li class="menu-header">Starter</li>

            <li
                class="{{ adminSetSidebarActive(['admin.categories.index', 'admin.categories.create', 'admin.categories.edit']) }}">
                <a class="nav-link " href="{{ route('admin.categories.index') }}"><i
                        class="fa-solid fa-layer-group"></i></i>
                    <span>Quản Lý Danh Mục</span>
                </a>
            </li>

            <li><a class="nav-link" href="{{ route('admin.categories.index') }}"><i class="fa-solid fa-user-group"></i>
                    <span>Quản Lý Người Dùng</span></a></li>


            {{-- <li><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank
                        Page</span></a></li> --}}
        </ul>
    </aside>
</div>
