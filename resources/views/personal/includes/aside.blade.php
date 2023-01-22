<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('personal.index') }}" class="brand-link">
        <span class="brand-text font-weight-light">На главную</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('posts.index') }}" class="nav-link">
                        <p>К постам</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('personal.liked.index') }}" class="nav-link">
                        <p>Понравившееся</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('personal.comments.index') }}" class="nav-link">
                        <p>Комментарии</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
