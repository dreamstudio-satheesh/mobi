@extends('layouts.partials.simple.master')



@section('breadcrumb')
<div class="col-auto header-right-wrapper page-title">
    <div>
        <h2>Default</h2>
        <nav>
            <ol class="breadcrumb justify-content-sm-start align-items-center mb-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}">Home</a>
                </li>
                <li class="breadcrumb-item f-w-500">Dashboard</li>
                <li class="breadcrumb-item f-w-500 active">Default</li>
            </ol>
        </nav>
    </div>
</div>
@endsection

@section('content')
<div class="container-fluid default-dashboard">

</div>
@endsection

