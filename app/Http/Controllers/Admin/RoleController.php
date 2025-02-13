<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Module;
use Illuminate\Http\Request;
use App\DataTables\RoleDataTable;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;
use App\Http\Requests\Admin\CreateRoleRequest;
use App\Http\Requests\Admin\UpdateRoleRequest;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(RoleDataTable $dataTable)
    {
        return $dataTable->render('admin.role.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin.role.create', ['modules' => $this->getModules()]);
    }

    /**
     * Get all modules.
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getModules()
    {
        return Module::all();
    }

    /**
     * Store a newly created resource in storage.
     * @param CreateRoleRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateRoleRequest $request)
    {
        DB::beginTransaction();

        try {
            $role = Role::create(['guard_name' => 'web', 'name' => $request->name]);
            $role->givePermissionTo($request->permissions);

            DB::commit();

            return redirect()->route('admin.role.index')->with('success', 'Role Created Successfully');

        } catch (Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param Role $role
     * @return Renderable
     */
    public function edit(Role $role)
    {
        return view('admin.role.edit', ['role' => $role, 'modules' => $this->getModules()]);
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateRoleRequest $request
     * @param Role $role
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        DB::beginTransaction();

        try {
            if ($role->system_reserve) {
                return redirect()->route('admin.role.index')->with('error', 'This role cannot be updated, It is system reserved.');
            }

            $role->syncPermissions($request->permissions);
            $role->update($request->all());

            DB::commit();
            return redirect()->route('admin.role.index')->with('success', 'Role Updated Successfully');

        } catch (Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param Request $request
     * @param Role $role
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, Role $role)
    {
        DB::beginTransaction();

        try {
            if ($role->system_reserve) {
                return redirect()->route('admin.role.index')->with('error', 'This role cannot be deleted, It is system reserved.');
            }

            $role->delete();

            DB::commit();
            return redirect()->route('admin.role.index')->with('success', 'Role Deleted Successfully');

        } catch (Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
}