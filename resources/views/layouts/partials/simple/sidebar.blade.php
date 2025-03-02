<div class="sidebar-wrapper" data-sidebar-layout="stroke-svg">
    <div>
        <!-- Logo Section -->
        <div class="logo-wrapper">
            <a href="{{ url('admin/dashboard') }}">
                <img class="img-fluid" src="{{ asset('assets/images/logo/logo_dark.png') }}" alt="">
            </a>
            <div class="back-btn">
                <i class="fa fa-angle-left"></i>
            </div>
            <div class="toggle-sidebar">
                <i class="status_toggle middle sidebar-toggle" data-feather="grid"></i>
            </div>
        </div>
        <div class="logo-icon-wrapper">
            <a href="{{ url('admin/dashboard') }}">
                <img class="img-fluid" src="{{ asset('assets/images/logo/logo-icon.png') }}" alt="">
            </a>
        </div>

        <!-- Profile Section -->
        <div class="profile-section sidebar-search">
            <div class="profile-wrapper">
                <div class="active-profile">
                    <img class="img-fluid" src="{{ asset('assets/images/user.png') }}" alt="user">
                </div>
                <div>
                    {{-- Removed User Name --}}
                    <span>{{ ucfirst(auth()->user()?->role->name) }}</span>
                </div>
            </div>
            <div>
                <svg>
                    <use href="{{ asset('assets/svg/icon-sprite.svg#profile-setting') }}"></use>
                </svg>
            </div>
        </div>

        <!-- Navigation Menu -->
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <!-- Mobile Back Button -->
                    <li class="back-btn">
                        <a href="{{ url('admin/dashboard') }}">
                            <img class="img-fluid" src="{{ asset('assets/images/logo/logo-icon.png') }}" alt="">
                        </a>
                        <div class="mobile-back text-end">
                            <span>Back</span>
                            <i class="fa fa-angle-right ps-2" aria-hidden="true"></i>
                        </div>
                    </li>

                    <li class="pin-title sidebar-main-title">
                        <div>
                            <h6>- Pinned</h6>
                        </div>
                    </li>

                    <!-- Dashboard Menu -->
                    <li class="sidebar-menu">
                        <a class="sidebar-link sidebar-title link-nav" href="{{ url('admin/dashboard') }}">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                            </svg>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <!-- Inventory Management -->
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-box') }}"></use>
                            </svg>
                            <span>Inventory</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ url('/admin/inventory') }}">Overview</a></li>
                            <li><a href="{{ url('/admin/category') }}">Category</a></li>
                            <li><a href="{{ url('/admin/products') }}">Products</a></li>
                            <li><a href="#">Barcode Scanning</a></li>
                        </ul>
                    </li>

                    <!-- Repair Service Management -->
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                            <svg class="stroke-icon">
                                <!-- Assuming a wrench icon exists for repair -->
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-wrench') }}"></use>
                            </svg>
                            <span>Repairs</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ url('/admin/repairs') }}">Repair Orders</a></li>
                            <li><a href="{{ url('/admin/repairs/create') }}">Create Repair Order</a></li>
                            <li><a href="{{ url('/admin/repairs/progress') }}">Repair Progress</a></li>
                            <li><a href="{{ url('/admin/repairs/payment') }}">Payment & Warranty</a></li>
                        </ul>
                    </li>

                    <!-- Sales & Order Management -->
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-shopping-cart') }}"></use>
                            </svg>
                            <span>Sales & Orders</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ url('/admin/sales/orders') }}">Orders List</a></li>
                            <li><a href="{{ url('/admin/sales/detail') }}">Order Details</a></li>
                            <li><a href="{{ url('/admin/sales/create') }}">Create Sales Order</a></li>
                        </ul>
                    </li>

                    <!-- Customer Management -->
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-user') }}"></use>
                            </svg>
                            <span>Peoples</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ url('admin/customers') }}">Customer List</a></li>
                            <li><a href="{{ url('admin/customers/crm') }}">CRM</a></li>
                            <li><a href="{{ url('admin/suppliers') }}">Suppliers</a></li>
                        </ul>
                    </li>

                    <!-- Reports & Analytics -->
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-charts') }}"></use>
                            </svg>
                            <span>Reports</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ url('/admin/reports/inventory') }}">Inventory Reports</a></li>
                            <li><a href="{{ url('/admin/reports/repairs') }}">Repair Reports</a></li>
                            <li><a href="{{ url('/admin/reports/sales') }}">Sales Reports</a></li>
                            <li><a href="{{ url('/admin/reports/analytics') }}">Analytics Dashboard</a></li>
                        </ul>
                    </li>

                    <!-- Settings -->
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-settings') }}"></use>
                            </svg>
                            <span>Settings</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ url('settings/system') }}">System Settings</a></li>
                            <li><a href="{{ url('settings/integrations') }}">Integration Configurations</a></li>
                        </ul>
                    </li>

                      <!-- User Management -->
                      <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-user') }}"></use>
                            </svg>
                            <span>Staff Management</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ url('admin/user') }}">Users List</a></li>
                            <li><a href="{{ url('admin/role') }}">Roles</a></li>
                        </ul>
                    </li>


                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
