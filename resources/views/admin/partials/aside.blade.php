<aside>
    <ul class="list-unstyled">
        <li>
            <a href="{{ route('admin.home') }}" class="{{ Route::currentRouteName() === 'admin.home' ? 'active' : '' }}">
                <i class="fa-solid fa-chart-line me-2"></i>
                Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('admin.projects.index') }}" class="{{ str_contains( Route::currentRouteName(), 'admin.projects') ? 'active' : '' }}">
                <i class="fa-solid fa-diagram-project me-2"></i>
                Projects
            </a>
        </li>
        <li>
            <a href="{{ route('admin.projects.create') }}" class="{{ Route::currentRouteName() === 'admin.projects.create' ? 'active' : '' }}">
                <i class="fa-solid fa-square-plus fa-lg me-2"></i>
                Add a New Project
            </a>
        </li>
        <hr class="text-secondary">
        <li class="ms-2">
            <a href="{{ route('admin.types.index') }}" class="{{ str_contains( Route::currentRouteName(), 'admin.types') ? 'active' : '' }}">
                <i class="fa-solid fa-font-awesome fa-lg me-2"></i>Project Types
            </a>
        </li>
        <hr class="text-secondary">
        <li class="ms-2">
            <a href="{{ route('admin.technologies.index') }}" class="{{ str_contains( Route::currentRouteName(), 'admin.technologies') ? 'active' : '' }}">
                <i class="fa-solid fa-microchip fa-lg me-2"></i>Project Technologies
            </a>
        </li>
    </ul>
</aside>
