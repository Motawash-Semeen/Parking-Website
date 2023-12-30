@extends('admin.admin_master')
@section('admin_content')
    <style>
        input[type=file]::file-selector-button {
            margin-right: 20px;
            border: none;
            background: #084cdf;
            padding: 5px 10px;
            border-radius: 10px;
            color: #fff;
            cursor: pointer;
            transition: background .2s ease-in-out;
        }

        input[type=file]::file-selector-button:hover {
            background: #0d45a5;
        }
    </style>
    <div class="content-body">

        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Profile</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="container-fluid">
            <form action="{{ url('/user/updateProfile') }}" class="form-profile" enctype="multipart/form-data"
                method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-4 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="media align-items-center mb-3">
                                    
                                    @if (Auth::user()->photo != null)
                                        <img class="mr-3" src="{{ asset('frontend/assets/img/user/' . Auth::user()->photo) }}" width="80" height="80" alt="">
                                    @else
                                    <img class="mr-3" src="{{ asset('backend') }}/images/user/1.png" width="80" height="80" alt="">
                                    @endif
                                    <div class="media-body">
                                        <h3 class="mb-0">{{ Auth::user()->name }}</h3>
                                    </div>
                                </div>
                                <div class="basic-form">
                                    <div class="form-group">
                                        <input type="file" class="form-control-file" onchange="uploadFile()"
                                            id="fileInput" name="image">
                                        @error('image')
                                            <div id="val-username-error" class="invalid-feedback animated fadeInDown"
                                                style="display: block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <ul class="card-profile__info">
                                    <li class="mb-1"><strong class="text-dark mr-4">Mobile</strong>
                                        <span>{{ Auth::user()->number }}</span>
                                    </li>
                                    <li><strong class="text-dark mr-4">Email</strong> <span>{{ Auth::user()->email }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-xl-9">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="name">Name <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Enter a name.." value="{{ Auth::user()->name }}">
                                        @error('name')
                                            <div id="val-username-error" class="invalid-feedback animated fadeInDown"
                                                style="display: block">{{ $message }}</div>
                                        @enderror

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="email">Email <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="email" name="email"
                                            placeholder="Enter your email.." value="{{ Auth::user()->email }}" readonly>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="number">Mobile <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="number" name="number"
                                            placeholder="Enter your number.." value="{{ Auth::user()->number }}">
                                        @error('number')
                                            <div id="val-username-error" class="invalid-feedback animated fadeInDown"
                                                style="display: block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="nid">NID <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="nid" name="nid"
                                            placeholder="Enter a nid.." readonly value="{{ Auth::user()->nid }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="address">Address
                                    </label>
                                    <div class="col-lg-6">
                                        <textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter your address..">{{ Auth::user()->address }}</textarea>
                                    </div>
                                </div>
                                <button class="btn btn-primary px-3">Update Profile</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-lg-8 offset-lg-4 col-xl-9 offset-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Change Password</h5>
                            <form action="{{ url('changePassword') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="password">Current Password <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="password" class="form-control" id="password" name="password"
                                            value="{{ old('password') }}">
                                        @error('password')
                                            <div id="val-username-error" class="invalid-feedback animated fadeInDown"
                                                style="display: block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="newPassword">New Password <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="password" class="form-control" id="newPassword" name="newPassword"
                                            value="{{ old('newPassword') }}">
                                        @error('newPassword')
                                            <div id="val-username-error" class="invalid-feedback animated fadeInDown"
                                                style="display: block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="confirmPassword">Confirm Password <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="password" class="form-control" id="confirmPassword"
                                            name="confirmPassword" value="{{ old('confirmPassword') }}">
                                        @error('confirmPassword')
                                            <div id="val-username-error" class="invalid-feedback animated fadeInDown"
                                                style="display: block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <button class="btn btn-primary px-3">Change Password</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #/ container -->
    </div>
@endsection
