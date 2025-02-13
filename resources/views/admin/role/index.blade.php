@extends('layouts.partials.simple.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
@endsection

@section('breadcrumb')
    <div class="col-auto header-right-wrapper page-title">
        <div>
            <h2>Roles Management</h2>
            <nav>
                <ol class="breadcrumb justify-content-sm-start align-items-center mb-0">
                    <li class="breadcrumb-item f-w-500">Laravel Example</li>
                    <li class="breadcrumb-item f-w-500 active">Roles Management</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xxl-6 box-col-6">
                <div class="card role-management">
                    <div class="card-body bg-primary">
                        <div class="blog-card">
                            <div class="blog-card-content">
                                <div class="role-details">
                                    <div class="role-profile">
                                        <img src="{{ asset('assets/images/avtar/3.jpg') }}" alt="Ticket-star">
                                    </div>
                                    <div class="role-profile-details">
                                        <h2>Welcome back {{ \Illuminate\Support\Str::title(auth()->user()->first_name ?? '') }} {{ \Illuminate\Support\Str::title(auth()->user()->last_name ?? '') }}!</h2>
                                    </div>
                                </div>
                                <div class="divider-h-line bg-light"></div>
                                <div class="blog-tags">
                                    <div class="tags-icon">
                                        <svg class="stroke-icon">
                                            <use href="{{ asset('assets/svg/icon-sprite.svg#multi-user') }}"></use>
                                        </svg>
                                    </div>
                                    <div class="tag-details">
                                        <h2 class="total-num counter">{{ sprintf("%02d",\App\Models\User::where('system_reserve', false)->count()) }}</h2>
                                        <p>Total Users</p>
                                    </div>
                                </div>
                            </div>
                            <div class="blog-card-image">
                                <img src="{{ asset('assets/images/user-management.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-6 box-col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="bg-light-primary b-r-15">
                                    <div class="upcoming-box">
                                        <div class="upcoming-icon bg-primary">
                                            <svg class="stroke-icon">
                                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-form') }}"></use>
                                            </svg>
                                        </div>
                                        <p>Role</p>
                                        <a href="{{ route('admin.role.create') }}" class="btn btn-primary">{{ __('Add Role') }}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 tag-card">
                                <div class="bg-light-secondary b-r-15">
                                    <div class="upcoming-box">
                                        <div class="upcoming-icon bg-secondary">
                                            <svg class="stroke-icon">
                                                <use href="{{ asset('assets/svg/icon-sprite.svg#user-plus') }}"></use>
                                            </svg>
                                        </div>
                                        <p>User</p>
                                        <a href="{{ route('admin.user.create') }}" class="btn btn-secondary">{{ __('Add User') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Zero Configuration  Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive custom-scrollbar">
                            {!! $dataTable->table() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/header-slick.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
    {!! $dataTable->scripts() !!}
@endsection