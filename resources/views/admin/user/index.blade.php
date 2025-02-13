@extends('layouts.partials.simple.master')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
@endsection

@section('breadcrumb')
<div class="col-auto header-right-wrapper page-title">
    <div>
        <h2>Users Management</h2>
        <nav>
            <ol class="breadcrumb justify-content-sm-start align-items-center mb-0">
                <li class="breadcrumb-item f-w-500">{{ config('app.name') }}</li>
                <li class="breadcrumb-item f-w-500 active">Users Management</li>
            </ol>
        </nav>
    </div>
</div>
@endsection

@section('content')
<div class="container-fluid user-management-page">
    <div class="row">
        <div class="col-xxl-2 col-lg-4 box-col-4">
            <div class="card user-management">
                <div class="card-body bg-primary">
                    <div class="blog-card p-0">
                        <div class="blog-card-content">
                            <div class="blog-tags">
                                <div class="tags-icon">
                                    <svg class="stroke-icon">
                                        <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-task') }}"></use>
                                    </svg>
                                </div>
                                <div class="tag-details">
                                    <h2 class="total-num counter">{{ sprintf("%02d",Spatie\Permission\Models\Role::where('system_reserve', false)->count()) }}</h2>
                                    <p>Total Roles</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-6 col-lg-8 box-col-8">
            <div class="card">
                <div class="card-header">
                    <h2>Total Users by Role</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="total-num counter">
                                @php
                                    $roles = Spatie\Permission\Models\Role::where('system_reserve', false)->with('users')->latest()->take(7)->get();
                                @endphp
                                <div class="d-flex by-role custom-scrollbar">
                                    @foreach ($roles as $role)
                                        <div>
                                            <div class="total-user bg-light-primary">
                                                <h5> {{ $role->name }} </h5>
                                                <span class="total-num counter">{{ sprintf("%02d",$role->users->count()) }}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-4 box-col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="bg-light-primary b-r-15">
                                <div class="upcoming-box">
                                    <div class="upcoming-icon bg-primary">
                                        <svg class="stroke-icon">
                                            <use href="{{ asset('assets/svg/icon-sprite.svg#user-plus') }}"></use>
                                        </svg>
                                    </div>
                                    <p>User</p>
                                    <a href="{{ route('admin.user.create') }}" class="btn btn-primary">{{ __('Add User') }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 tag-card">
                            <div class="bg-light-secondary b-r-15">
                                <div class="upcoming-box">
                                    <div class="upcoming-icon bg-secondary">
                                        <svg class="stroke-icon">
                                            <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-form') }}"></use>
                                        </svg>
                                    </div>
                                    <p>Role</p>
                                    <a href="{{ route('admin.role.create') }}" class="btn btn-primary">{{ __('Add Role') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
