
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ route('dashboard') }}">
                    <i class="bi-speedometer"></i>
                    Dashboard
                </a>
            </li>

            @can('is_admin')
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('user.index') }}">
                        <i class="bi-people"></i>
                        Usuários
                    </a>
                </li>
            @endcan

            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ route('task.index') }}">
                    <i class="bi-list-task"></i>
                    Tarefas
                </a>
            </li>
        </ul>
    </div>
</nav>