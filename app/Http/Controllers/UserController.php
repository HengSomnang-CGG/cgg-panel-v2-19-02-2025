<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        return view("dashboard.users.usermanagement");
    }

    public function getData(Request $request)
    {
        if ($request->ajax()) {
            $data = User::query();
            return DataTables::of($data)
                ->addColumn(
                    'action',
                    function ($row) {
                        return '
                    <a href="user-management/' . $row->id . '" class="mx-3 edit-btn" data-bs-toggle="tooltip" data-bs-original-title="Edit Search" data-id="' . $row->id . '">
                        <i class="fas fa-user-edit text-secondary"></i>
                    </a>
                    <a href="#" class="delete-btn" data-bs-toggle="tooltip" data-bs-original-title="Delete" data-id="' . $row->id . '">
                        <i class="fas fa-trash text-danger"></i>
                    </a>';
                    }

                )
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    public function show($id)
    {
        $user = User::query()->findOrFail($id);
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }
        return response()->json($user);
    }

    public function store(Request $request)
    {
        // 1. Validate input data
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users,email',
            'role'     => 'required',
            'phone'    => 'required',
            'password' => 'required|min:6',
            // For modern image upload, always validate your images:
            'image'    => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        // 2. Prepare data
        $data             = $request->all();
        $data['password'] = Hash::make($request->password);
        $data['api_token'] = Str::random(60);

        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $uniqueName =  $file->getClientOriginalName();
            $filePath= $file->storeAs('images', $uniqueName, 'public');
            $requestData['image'] =  $filePath;
            $data['image'] = $requestData['image'];
        }

        // 4. Create the user record
        User::create($data);

        // 5. Redirect with a success alert
        return redirect()->route('user-management.index')
            ->with('alert.config', json_encode([
                'title' => 'Success!',
                'text'  => 'User created and ready for sign in!',
                'icon'  => 'success',
            ]));
    }


    public function update(Request $request, $id)
    {
        // 1. Find user
        $user = User::findOrFail($id);

        // 2. Validate input data
        $request->validate([
            'name'  => 'required',
            'email' => 'required|email|unique:users,email,' . $id, // exclude current user's email
            'role'  => 'required',
            'phone' => 'required',
            // Only validate image if present
            'image'    => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        // 3. Prepare data for update
        $data = $request->only(['name', 'email', 'role', 'phone']);

        // If password is provided, hash it
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }
        // If image is provided, store it
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $uniqueName =  $file->getClientOriginalName();
            $filePath= $file->storeAs('images', $uniqueName, 'public');
            $data['image'] = $filePath;
        }

        // 5. Update user record
        $user->update($data);

        // 6. Redirect with success
        return redirect()->route('user-management.index')
            ->with('alert.config', json_encode([
                'title' => 'Success!',
                'text'  => 'User updated successfully!',
                'icon'  => 'success',
            ]));
    }

    public function create()
    {
        $user = null;
        return view('dashboard.users.userprofile', compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('dashboard.users.userprofile', compact('user'));
    }

    public function delete($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }
        $user->delete();
        return response()->json(['success' => 'User deleted successfully'], 200);
    }
}
