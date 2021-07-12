<div class="sidebar">
    <nav class="sidebar-nav">

        <ul class="nav">
            @can('user_management_access')
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-users nav-icon">

                        </i>
                        {{ trans('cruds.userManagement.title') }}
                    </a>
                    <ul class="nav-dropdown-items">
                        @can('permission_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-unlock-alt nav-icon">

                                    </i>
                                    {{ trans('cruds.permission.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-briefcase nav-icon">

                                    </i>
                                    {{ trans('cruds.role.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-user nav-icon">

                                    </i>
                                    {{ trans('cruds.user.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
             <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-cog nav-icon">

                        </i>
                        System Management
                    </a>
                    <ul class="nav-dropdown-items">

                        <li class="nav-item">
                            <a class="nav-link{{ request()->is('admin/routes*') ? ' active' : '' }}" href="{{ route('admin.routes.index') }}">
                                <i class="fa-fw fas fa-route nav-icon">

                                </i>

                                {{ trans('cruds.routes.title') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link{{ request()->is('admin/maintainers*') ? ' active' : '' }}" href="{{ route('admin.maintainers.index') }}">
                                <i class="fa-fw fas fa-cog nav-icon">

                                </i>

                                {{ trans('cruds.maintainers.title') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link{{ request()->is('admin/areas*') ? ' active' : '' }}" href="{{ route('admin.areas.index') }}">
                                <i class="fa-fw fas fa-map nav-icon">

                                </i>

                                {{ trans('cruds.areas.title') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link{{ request()->is('admin/badges/*') ? ' active' : '' }}" href="{{ route('admin.badges.index') }}">
                                <i class="fa-fw fas fa-id-badge nav-icon">

                                </i>

                                {{ trans('cruds.badges.title') }}
                            </a>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link{{ request()->is('admin/insurances/*') ? ' active' : '' }}" href="{{ route('admin.insurances.index') }}">
                                <i class="fa-fw fas fa-automobile nav-icon">

                                </i>

                                {{ trans('cruds.insurances.title') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link{{ request()->is('admin/holidays/*') ? ' active' : '' }}" href="{{ route('admin.holidays.index') }}">
                                <i class="fa-fw fas fa-list nav-icon">

                                </i>

                                {{ trans('cruds.holidays.title') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link{{ request()->is('admin/suppliers/*') ? ' active' : '' }}" href="{{ route('admin.suppliers.index') }}">
                                <i class="fa-fw fas fa-industry nav-icon">

                                </i>

                                {{ trans('cruds.suppliers.title') }}
                            </a>
                        </li>

                    </ul>
            </li>
             @can('expense_category_access')
                <li class="nav-item">
                    <a href="{{ route("admin.categories.index") }}" class="nav-link {{ request()->is('admin/categories') || request()->is('admin/categories/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-car nav-icon">

                        </i>
                        {{ trans('cruds.vehicle.title') }}
                    </a>
                </li>
            @endcan
             <li class="nav-item">
                <a class="nav-link{{ request()->is('admin/drivers*') ? ' active' : '' }}" href="{{ route('admin.drivers.index') }}">
                    <i class="fa-fw fas fa-user nav-icon">

                    </i>

                    {{ trans('cruds.drivers.title') }}
                </a>
            </li> 

             <li class="nav-item">
                <a class="nav-link{{ request()->is('admin/peoples*') ? ' active' : '' }}" href="{{ route('admin.peoples.index') }}">
                    <i class="fa-fw fas fa-people-carry nav-icon">

                    </i>

                    {{ trans('cruds.peoples.title') }}
                </a>
            </li> 
             <li class="nav-item">
                <a class="nav-link{{ request()->is('admin/contracts*') ? ' active' : '' }}" href="{{ route('admin.contracts.index') }}">
                    <i class="fa-fw fas fa-handshake nav-icon">

                    </i>

                    {{ trans('cruds.contracts.title') }}
                </a>
            </li> 
            <li class="nav-item">
                <a class="nav-link{{ request()->is('admin/entries*') ? ' active' : '' }}" href="{{ route('admin.entries.index') }}">
                    <i class="fa-fw fas fa-history nav-icon">

                    </i>

                    {{ trans('cruds.entries.title') }}
                </a>
            </li> 
            <li class="nav-item">
                <a class="nav-link{{ request()->is('admin/expenses*') ? ' active' : '' }}" href="{{ route('admin.expenses.index') }}">
                    <i class="fa-fw fas fa-money nav-icon">

                    </i>

                    {{ trans('cruds.expenses.title') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link{{ request()->is('admin/maintenances*') ? ' active' : '' }}" href="{{ route('admin.maintenances.index') }}">
                    <i class="fa-fw fas fa-car nav-icon">

                    </i>

                    {{ trans('cruds.maintenances.title') }}
                </a>
            </li> 
            <li class="nav-item">
                <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
        </ul>

    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>