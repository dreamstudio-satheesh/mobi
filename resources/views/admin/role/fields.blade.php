<div class="row mb-3">
    <div class="col-md-12">
        <label class="form-label">Name <span> *</span></label>
        <input class="form-control" type="text" placeholder="Enter Role" name="name"
            value="{{ isset($role->name) ? $role->name : old('name') }}">
        @error('name')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-12">
        <label>Permissions <span> *</span></label>
        @foreach ($modules as $key => $module)
            <div class="mb-2 card-wrapper border rounded-3 checkbox-checked">
                <h6 class="sub-title">{{ $module->name }}:</h6>
                <div class="form-check-size rtl-input">
                    @php
                        $permissions = @$role?->getAllPermissions()->pluck('name')->toArray() ?? [];
                        $isAllSelected = count(array_diff(array_values($module->actions), $permissions)) === 0;
                    @endphp
                    <label class="d-block" for="all-{{ $module->name }}">
                        <input type="checkbox"
                            class="checkbox_animated select-all-permission select-all-for-{{ $module->name }}"
                            id="all-{{ $module->name }}" value="{{ $module->name }}" {{ $isAllSelected ? 'checked' : ''
                            }}>{{ __('All') }}
                    </label>
                    @foreach ($module->actions as $action => $permission)
                        <label class="d-block" for="{{ $permission }}" data-action="{{ $action }}"
                            data-module="{{ $module->name }}">
                            <input type="checkbox" name="permissions[]"
                                class="checkbox_animated module_{{ $module->name }} module_{{ $module->name }}_{{ $action }}"
                                value="{{ $permission }}" id="{{ $permission }}" {{ in_array($permission, $permissions)
                                ? 'checked' : '' }}>{{ $action }}
                        </label>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
    @error('permissions')
        <span class="text-danger">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="card-footer text-end">
    <button class="btn btn-primary" type="submit">Save</button>
</div>