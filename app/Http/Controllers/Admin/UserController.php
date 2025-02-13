<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\User;
use App\Models\State;
use App\Models\Country;
use Illuminate\Http\Request;
use App\DataTables\UserDataTable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Contracts\Support\Renderable;
use App\Http\Requests\Admin\CreateUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(UserDataTable $dataTable)
    {
        return $dataTable->render('admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(User $user)
    {
        $countries = Country::all()->pluck('name', 'id');
        return view('admin.user.create', ['user' => $user, 'roles' => Role::all()], compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     * @param CreateUserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateUserRequest $request)
    {
        DB::beginTransaction();

        try {
            $user = User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'country_code' => $request->country_code,
                'phone' => (string) $request->phone,
                'status' => $request->status,
                'dob' => $request->dob,
                'gender' => $request->gender,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'postal_code' => $request->postal_code,
                'country_id' => $request->country_id,
                'state_id' => $request->state_id,
                'location' => $request->location,
                'skills' => $request->skills,
                'about_me' => $request->about_me,
                'bio' => $request->bio,
            ]);

            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $user->addMediaFromRequest('image')->toMediaCollection('image');
            }

            if ($request->role_id) {
                $role = Role::findOrFail($request->role_id);
                $user->assignRole($role);
            }

            DB::commit();

            return redirect()->route('admin.user.index')->with('success', __('User Created Successfully'));

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
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(User $user)
    {
        $countries = Country::all()->pluck('name', 'id');
        return view('admin.user.edit', ['user' => $user, 'roles' => Role::all()], compact('countries'));
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateUserRequest $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        DB::beginTransaction();

        try {
            $user->update([
                'country_code' => $request->country_code,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => (string) $request->phone,
                'status' => $request->status,
                'dob' => $request->dob,
                'gender' => $request->gender,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'postal_code' => $request->postal_code,
                'country_id' => $request->country_id,
                'state_id' => $request->state_id,
                'location' => $request->location,
                'skills' => $request->skills,
                'about_me' => $request->about_me,
                'bio' => $request->bio,
            ]);

            if ($user->system_reserve) {
                return redirect()->back()->with('error', __('This user cannot be updated, It is system reserved.'));
            }

            if (isset($request->role_id)) {
                $role = Role::find($request->role_id);
                $user->syncRoles($role);
            }

            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $user->clearMediaCollection('image');
                $user->addMediaFromRequest('image')->toMediaCollection('image');
            }

            DB::commit();
            return redirect()->route('admin.user.index')->with('success', __('User Updated Successfully'));

        } catch (Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    /**
     * Update Status the specified resource from storage.
     *
     * @param  int  $id
     * @param int $status
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);
            $user->update(['status' => $request->status]);

            return json_encode(["resp" => $user]);

        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
            return redirect()->back()->with('success', __('User Deleted Successfully'));

        } catch (Exception $e) {
            throw $e;
        }
    }

    public function editProfile()
    {
        $countries = Country::all()->pluck('name', 'id');
        return view('admin.user_profile.edit_profile', ['user' => Auth::user(), 'role' => Auth::user()->role->name], compact('countries'));
    }

    public function getStates(Request $request)
    {
        $data['states'] = State::where("country_id", $request->country_id)->get(["name", "id"]);
        return response()->json($data);
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        DB::beginTransaction();

        try {
            $user = Auth::user();
            $user->email = $request->input('email');
            $user->first_name = $request->input('first_name');
            $user->last_name = $request->input('last_name');
            $user->postal_code = $request->input('postal_code');
            $user->country_code = $request->input('country_code');
            $user->phone = $request->input('phone');
            $user->address = $request->input('address');
            $user->country_id = $request->input('country_id');
            $user->state_id = $request->input('state_id');
            $user->location = $request->input('location');
            $user->about_me = $request->input('about_me');
            $user->bio = $request->input('bio');

            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $user->clearMediaCollection('image');
                $user->addMediaFromRequest('image')->toMediaCollection('image');
            }
            $user->save();

            DB::commit();
            return redirect()->route('admin.user.edit-profile')->with('success', __('Profile updated successfully'));

        } catch (Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function removeImage($id)
    {
        $user = User::find($id);
        $user->clearMediaCollection('image');
        return redirect()->back()->with('success', 'Image removed successfully');
    }
}