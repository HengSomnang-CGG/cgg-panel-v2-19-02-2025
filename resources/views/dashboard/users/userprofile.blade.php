{{-- resources/views/profile/userprofile.blade.php --}}
@extends('layouts.dashboard.app')
@section('content')
    <div class="container-fluid">
        <div>
            <div class="">
                <div class="page-header min-height-300 border-radius-xl mt-4"
                    style="background-image: url('{{ asset('assets/img/curved-images/curved.jpg') }}'); background-position-y: 50%;">
                    <span class="mask bg-gradient-info opacity-6"></span>
                </div>
                <div class="card card-body blur shadow-blur mx-4 mt-n6">
                    <div class="row gx-4">
                        <div class="col-auto">
                            <div class="avatar avatar-xl position-relative">
                                {{-- If user has an image, show it, otherwise a default --}}
                                <img id="profileImage" src="{{ $user && $user->image ? asset($user->image) : asset('assets/img/bruce-mars.jpg') }}"
                                alt="Profile Image" class="w-100 border-radius-lg shadow-sm">
                            </div>
                        </div>
                        <div class="col-auto my-auto">
                            <div class="h-100">
                                <h5 class="mb-1">
                                    {{ $user ? $user->name : 'New User' }}
                                </h5>
                                <p class="mb-0 font-weight-bold text-sm">
                                    {{ $user ? $user->role ?? 'Role not specified' : 'Role not specified' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Decide if we are storing or updating --}}
            @php
                $actionUrl = $user ? route('user-management.update', $user->id) : route('user-management.store');
                $method = $user ? 'PUT' : 'POST';
            @endphp

            <div class="">
                <div class="card">
                    <div class="card-header pb-0 px-3">
                        <h6 class="mb-0">{{ $user ? 'Edit User' : 'Create New User' }}</h6>
                    </div>
                    <div class="card-body pt-4 p-3">
                        {{-- Use the $actionUrl and $method determined above --}}
                        <form action="{{ $actionUrl }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if ($user)
                                @method('PUT')
                            @endif

                            <div class="row">
                                <!-- Name -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="user-name" class="form-control-label"> Name</label>
                                        <div>
                                            <input class="form-control" type="text" placeholder="Name" id="user-name"
                                                name="name" value="{{ old('name', $user->name ?? '') }}" required>
                                        </div>
                                    </div>
                                </div>
                                <!-- Email -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="user-email" class="form-control-label">Email</label>
                                        <div>
                                            <input class="form-control" type="email" placeholder="@example.com"
                                                id="user-email" name="email"
                                                value="{{ old('email', $user->email ?? '') }}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Phone -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="user.phone" class="form-control-label">Phone</label>
                                        <div>
                                            <input class="form-control" type="tel" placeholder="Your Phone Number"
                                                id="number" name="phone"
                                                value="{{ old('phone', $user->phone ?? '') }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="role" class="form-control-label">Role</label>
                                        {{-- <input type="text" class="form-control" name="role" id="role"
                                            value="{{ old('role', $user->role ?? '') }}"> --}}
                                            <select name="role" id="role" class="form-control" required>
                                                <option value="admin" {{ $user && $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                                <option value="staff" {{ $user && $user->role == 'staff' ? 'selected' : '' }}>Staff</option>
                                            </select>
                                    </div>
                                </div>

                            </div>

                            <!-- Role -->
                            <div class="row">

                                <!-- Image -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="image" class="form-control-label"> Profile Image</label>
                                        <input type="file" class="form-control" name="image" id="image" onchange="previewImage(event)">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <div>
                                            <input type="password" class="form-control" name="password" id="password"
                                                placeholder="Leave empty to keep the same password"
                                                value="{{ old('password') }}">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('user-management.index') }}"
                                    class="btn bg-gradient-primary btn-md mt-4 mb-4">
                                    Cancel
                                </a>
                                <button type="submit" class="btn bg-gradient-info btn-md mt-4 mb-4">
                                    {{ $user ? 'Update User' : 'Save User' }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function(){
                const output = document.getElementById('profileImage');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endsection
