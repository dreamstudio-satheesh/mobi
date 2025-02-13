<div class="row">
    <div class="col-sm-6">
        <div class="mb-3">
            <label>First Name<span> *</span></label>
            <input class="form-control" type="text" name="first_name" value="{{ isset($user->first_name) ? $user->first_name : old('first_name') }}" placeholder="Enter First Name">
            @error('first_name')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-sm-6">
        <div class="mb-3">
            <label>Last Name<span> *</span></label>
            <input class="form-control" type="text" name="last_name" value="{{ isset($user->last_name) ? $user->last_name : old('last_name') }}" placeholder="Enter Last Name">
            @error('last_name')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="mb-3">
            <label>Email <span> *</span></label>
            <input class="form-control" type="email" id="email" value="{{ isset($user->email) ? $user->email : old('email') }}" name="email" placeholder="Enter Email">
            @error('email')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-sm-6">
        <div class="mb-3">
            <label>Confirmation Email <span> *</span></label>
            <input class="form-control" type="email" value="{{ isset($user->email) ? $user->email : old('confirm_email') }}" name="confirm_email" placeholder="Enter Confirm Email">
            @error('confirm_email')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>

@if (!isset($user->id))
<div class="row">
    <div class="col-sm-6">
        <div class="mb-3">
            <label>Password<span> *</span></label>
            <input class="form-control" type="password" name="password" id="password" placeholder="Enter Password" autofocus="off">
            @error('password')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-sm-6">
        <div class="mb-3">
            <label>Confirm Password<span> *</span></label>
            <input class="form-control" type="password" name="confirm_password" id="confirm_password" placeholder="Enter Confirm Password" autofocus="off">
            @error('confirm_password')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>
@endif


<div class="row">
    <div class="col-sm-6">
        <div>
            <label>Phone <span> *</span></label>
            <div class="row phone-select">
                <div class="col-2 pe-0">
                    <select class="select-2 form-control select-country-code" id="country_code"
                    name="country_code" data-placeholder="">
                        @php
                            $default = old('country_code', $user->country_code ?? 1);
                        @endphp
                        @foreach (\App\Helpers\Helpers::getCountryCode() as $key => $option)
                            <option class="option" value="{{ $option->calling_code }}"
                                data-image="{{ asset('assets/images/flags/' . $option->flag) }}"
                                @if ($option->calling_code == $default) selected @endif
                                data-default="{{ $default }}">
                                {{ $option->calling_code }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-10 ps-0">
                    <input class="form-control" type="number" name="phone"
                        value="{{ isset($user->phone) ? $user->phone : old('phone') }}" placeholder="Enter Phone">
                    @error('phone')
                        <span class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="mb-3">
            <label>Birth Date</label>
            <input class="datepicker-here form-control" type="text" name="dob" value="{{ isset($user->dob) ? $user->dob : old('dob') }}" data-language="en" placeholder="Enter Birth Date">
            @error('dob')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>


<div class="row">
    <div class="col-sm-6">
        <div class="mb-3">
            <label>Gender</label>
            <select class="form-select" name="gender">
                <option value="" selected hidden disabled>Select Gender</option>
                <option value="male" @if (isset($user->gender)) @if ('male' == $user->gender) selected @endif
                    @endif @if(old('gender')=='male') selected @endif>{{ __('Male') }}</option>
                <option value="female" @if (isset($user->gender)) @if ('female' == $user->gender) selected @endif
                    @endif @if(old('gender')=='female') selected @endif>{{ __('Female') }}</option>
            </select>
            @error('gender')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-sm-6">
        <div class="mb-3">
            @php
            $image = $user->getFirstMedia('image');
            @endphp
            <label>Avatar</label>
            <input class="form-control mb-3" type="file" name="image">

            @isset($user)
            <div>
                @if ($image)
                <img src="{{ $image->getUrl() }}" alt="Image" class="img-thumbnail img-fix" height="20%" width="20%">
                <div>
                    <a href="{{ route('admin.user.removeImage',$user?->id) }}" class="dz-remove text-danger" data-bs-target="#tooltipmodal" data-bs-toggle="modal">Remove</a>
                </div>
                @endif
            </div>

            <!-- Remove File Confirmation-->
            <div class="modal fade" id="tooltipmodal" tabindex="-1" role="dialog" aria-labelledby="tooltipmodal" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title">Confirm delete</h3>
                            <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h3 class="mb-3"> Are you sure want to delete ?</h3>
                            <p>This Item Will Be Deleted Permanently. You Can not Undo This Action.</p>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button>
                            @if ($user->id)
                            <a href="{{ route('admin.user.removeImage',$user->id) }}" class="btn btn-danger">Delete</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endisset
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="mb-3">
            <label>Role <span> *</span></label>
            <select class="form-select" name="role_id">
                <option value="" selected disabled hidden>Select Role</option>
                @foreach ($roles as $key => $role)
                <option value="{{ $role->id }}" @if (isset($user->roles)) @selected(old('role_id',
                    $user->roles->pluck('id')->first()) == $role->id) @endif>{{ $role->name }} </option>
                @endforeach
            </select>
            @error('role_id')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-sm-6">
        <div class="mb-3">
            <label>Status</label>
            <select class="form-select" name="status">
                <option value="1" {{ !($user->status ?? 1) == 0 ? 'selected' : '' }} @if(old('status')=='1' ) selected @endif>
                    {{ __('Active') }}
                </option>
                <option value="0" {{ ($user->status ?? 1) == 0 ? 'selected' : '' }} @if(old('status')=='0' ) selected @endif>
                    {{ __('Deactive') }}
                </option>
            </select>
            @error('status')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="mb-3">
            <label>Country</label>
            <select class="form-control" id="country" name="country_id" placeholder="Select Country">
                <option value="" selected disabled hidden>Select Country</option>
                @foreach ($countries as $key => $value)
                <option value="{{ $key }}" @if(old('country_id')==$key) selected @endif {{ $user->country_id == $key ? 'selected' : '' }}>{{ $value }}</option>
                @endforeach
            </select>
            @error('country_id')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-sm-6">
        <div class="mb-3">
            <label>State</label>
            <select class="form-control" id="state" name="state_id">
                @php
                $states = App\Models\State::where('country_id', $user->country_id)->get();
                @endphp
                <option value="" selected disabled hidden>Select State</option>
                @foreach ($states as $state)
                <option value="{{ $state->id }}" @if(old('state_id')==$state->id ) selected @endif
                    {{ $user->state_id == $state->id ? 'selected' : '' }}>
                    {{ $state->name }}</option>
                @endforeach
            </select>
            @error('state_id')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="mb-3">
            <label>City</label>
            <input class="form-control" type="text" name="location" value="{{ isset($user->location) ? $user->location : old('location') }}" placeholder="Enter City">
            @error('location')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-sm-6">
        <div class="mb-3">
            <label>Postal Code</label>
            <input class="form-control" type="number" name="postal_code" value="{{ isset($user->postal_code) ? $user->postal_code : old('postal_code') }}" placeholder="Enter Postal Code">
            @error('postal_code')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="mb-3">
            <label>About Me</label>
            <textarea class="form-control" rows="2" name="about_me" placeholder="About Me">{{ isset($user->about_me) ? $user->about_me : old('about_me') }}</textarea>
            @error('about_me')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="mb-3">
            <label>Bio</label>
            <textarea class="form-control" rows="4" name="bio" placeholder="Bio">{{ isset($user->bio) ? $user->bio : old('bio') }}</textarea>
            @error('bio')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="text-end">
            <button type="submit" class="btn btn-primary">{{ __('save') }}</button>
        </div>
    </div>
</div>
