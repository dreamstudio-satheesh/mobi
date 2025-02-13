@extends('layouts.partials.simple.master')

@section('breadcrumb')
<div class="col-auto header-right-wrapper page-title">
  <div>
    <h2>Edit Profile</h2>
    <nav>
      <ol class="breadcrumb justify-content-sm-start align-items-center mb-0">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
        <li class="breadcrumb-item f-w-500">Users</li>
        <li class="breadcrumb-item f-w-500 active">Edit Profile</li>
      </ol>
    </nav>
  </div>
</div>
@endsection

@section('content')
<div class="container-fluid">
  <div class="edit-profile">
    <div class="row">
      <div class="col-xl-4">
        <div class="card title-line">
          <div class="card-header">
            <h2 class="card-title mb-0">My Profile</h2>
            <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i
                  class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#"
                data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
          </div>
          <div class="card-body">
            <form>
              <div class="row g-3">
                <div class="col-12">
                  <div class="profile-title"> <img class="img-70 rounded-circle" alt=""
                      src="{{ asset('assets/images/user/7.jpg') }}">
                    <div class="flex-grow-1">
                      <h3 class="mb-1 f-w-600">MARK JECNO</h3>
                      <p>DESIGNER</p>
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <h4 class="form-label">Bio</h4>
                  <textarea class="form-control"
                    rows="5">UI/UX Designer | Passionate about Creating Seamless User Experiences.</textarea>
                </div>
                <div class="col-12">
                  <label class="form-label">Email Address</label>
                  <input class="form-control" type="email" placeholder="your-email@domain.com">
                </div>
                <div class="col-12">
                  <label class="form-label">Password</label>
                  <input class="form-control" type="password" value="password">
                </div>
                <div class="col-12">
                  <label class="form-label">Website</label>
                  <input class="form-control" type="url"
                    placeholder="https://themeforest.net/user/pixelstrap/portfolio">
                </div>
                <div class="form-footer">
                  <button class="btn btn-primary btn-block">Save</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-xl-8">
        <form class="card">
          <div class="card-header">
            <h2 class="card-title mb-0">Edit Profile</h2>
            <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i
                  class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#"
                data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
          </div>
          <div class="card-body">
            <div class="row g-3">
              <div class="col-md-5">
                <label class="form-label">Company</label>
                <input class="form-control" type="text" placeholder="Company name">
              </div>
              <div class="col-sm-6 col-md-3">
                <label class="form-label">Username</label>
                <input class="form-control" type="text" placeholder="Username">
              </div>
              <div class="col-sm-6 col-md-4">
                <label class="form-label">Email Address</label>
                <input class="form-control" type="email" placeholder="willam@gmail.com">
              </div>
              <div class="col-sm-6 col-md-6">
                <label class="form-label">First Name</label>
                <input class="form-control" type="text" placeholder="First name">
              </div>
              <div class="col-sm-6 col-md-6">
                <label class="form-label">Last Name</label>
                <input class="form-control" type="text" placeholder="Last name">
              </div>
              <div class="col-md-12">
                <label class="form-label">Address</label>
                <input class="form-control" type="text" placeholder="Home address">
              </div>
              <div class="col-sm-6 col-md-4">
                <label class="form-label">City</label>
                <input class="form-control" type="text" placeholder="City">
              </div>
              <div class="col-sm-6 col-md-3">
                <label class="form-label">Postal Code</label>
                <input class="form-control" type="number" placeholder="ZIP Code">
              </div>
              <div class="col-md-5">
                <label class="form-label">Country</label>
                <select class="form-control btn-square">
                  <option value="0">--Select--</option>
                  <option value="1">Germany</option>
                  <option value="2">Canada</option>
                  <option value="3">Usa</option>
                  <option value="4">Aus</option>
                </select>
              </div>
              <div class="col-md-12">
                <div>
                  <label class="form-label">About Me</label>
                  <textarea class="form-control" rows="4" placeholder="Enter About your description"></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer text-end">
            <button class="btn btn-primary" type="submit">Update Profile</button>
          </div>
        </form>
      </div>
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h2 class="card-title mb-0">Add projects and Upload</h2>
            <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i
                  class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#"
                data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
          </div>
          <div class="table-responsive add-project custom-scrollbar">
            <table class="table card-table table-vcenter text-nowrap">
              <thead>
                <tr>
                  <th>Project Name</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Price</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><a class="text-inherit" href="#">Aeroquest</a></td>
                  <td>28 May 2024</td>
                  <td><span class="status-icon badge badge-light-success"> Completed</span></td>
                  <td>$56,908</td>
                  <td class="text-end"><a class="icon" href="#!"></a><a class="btn btn-primary btn-sm" href="#!"><i
                        class="fa fa-pencil"></i> Edit</a><a class="icon" href="#!"></a><a class="btn btn-sm"
                      href="#!"><i class="fa fa-link"></i> Update</a><a class="icon" href="#!"></a><a
                      class="btn btn-danger btn-sm" href="#!"><i class="fa fa-trash"></i> Delete</a></td>
                </tr>
                <tr>
                  <td><a class="text-inherit" href="#">Aquasynth</a></td>
                  <td>12 June 2024</td>
                  <td><span class="status-icon badge badge-light-danger"> On going</span></td>
                  <td>$45,087</td>
                  <td class="text-end"><a class="icon" href="#!"></a><a class="btn btn-primary btn-sm" href="#!"><i
                        class="fa fa-pencil"></i> Edit</a><a class="icon" href="#!"></a><a class="btn btn-sm"
                      href="#!"><i class="fa fa-link"></i> Update</a><a class="icon" href="#!"></a><a
                      class="btn btn-danger btn-sm" href="#!"><i class="fa fa-trash"></i> Delete</a></td>
                </tr>
                <tr>
                  <td><a class="text-inherit" href="#">Robogenix</a></td>
                  <td>12 July 2024</td>
                  <td><span class="status-icon badge badge-light-warning"> Pending</span></td>
                  <td>$60,123</td>
                  <td class="text-end"><a class="icon" href="#!"></a><a class="btn btn-primary btn-sm" href="#!"><i
                        class="fa fa-pencil"></i> Edit</a><a class="icon" href="#!"></a><a class="btn btn-sm"
                      href="#!"><i class="fa fa-link"></i> Update</a><a class="icon" href="#!"></a><a
                      class="btn btn-danger btn-sm" href="#!"><i class="fa fa-trash"></i> Delete</a></td>
                </tr>
                <tr>
                  <td><a class="text-inherit" href="#">Energyharbor</a></td>
                  <td>14 June 2024</td>
                  <td><span class="status-icon badge badge-light-warning"> Pending</span></td>
                  <td>$70,435</td>
                  <td class="text-end"><a class="icon" href="#!"></a><a class="btn btn-primary btn-sm" href="#!"><i
                        class="fa fa-pencil"></i> Edit</a><a class="icon" href="#!"></a><a class="btn btn-sm"
                      href="#!"><i class="fa fa-link"></i> Update</a><a class="icon" href="#!"></a><a
                      class="btn btn-danger btn-sm" href="#!"><i class="fa fa-trash"></i> Delete</a></td>
                </tr>
                <tr>
                  <td><a class="text-inherit" href="#">Nanosphere</a></td>
                  <td>25 June 2024</td>
                  <td><span class="status-icon badge badge-light-success"> Completed</span></td>
                  <td>$15,987</td>
                  <td class="text-end"><a class="icon" href="#!"></a><a class="btn btn-primary btn-sm" href="#!"><i
                        class="fa fa-pencil"></i> Edit</a><a class="icon" href="#!"></a><a class="btn btn-sm"
                      href="#!"><i class="fa fa-link"></i> Update</a><a class="icon" href="#!"></a><a
                      class="btn btn-danger btn-sm" href="#!"><i class="fa fa-trash"></i> Delete</a></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('assets/js/header-slick.js') }}"></script>
@endsection