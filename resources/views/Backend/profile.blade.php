@extends('layouts.admin.app')
@section('title', 'Profile')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Profile</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Admin</a></div>
            <div class="breadcrumb-item">Profile</div>
        </div>
    </div>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    <div class="section-body">
        <h2 class="section-title">Hi, {{ auth()->user()->prenom }} {{ auth()->user()->nom }}!</h2>
        <p class="section-lead">Change information about yourself on this page.</p>
        <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card profile-widget">
                    <div class="profile-widget-header">
                        @if (!Empty(auth()->user()->image))
                        <img alt="image" src="{{asset('storage/'.auth()->user()->image)}}" style="height: 100px !important; width: 100px !important;" class="rounded-circle profile-widget-picture">
                        @else
                        <figure class="avatar mr-2 avatar-xl profile-widget-picture" data-initial="{{ substr(auth()->user()->prenom, 0, 1) }}{{ substr(auth()->user()->nom, 0, 1) }}"></figure>
                        @endif
                        <form action="{{route('profile.update',auth()->user()->id)}}" method="POST" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="card-header">
                                <h4>Edit Profile</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="form-group col-6">
                                        <label for="prenom">First Name</label>
                                        <input id="prenom" type="text" value="{{auth()->user()->prenom}}" class="form-control" name="prenom">
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="nom">last Name</label>
                                        <input id="nom" type="text" value="{{auth()->user()->nom}}" class="form-control" name="nom">
                                    </div>

                                </div>
                                <div class="form-group ">
                                    <label for="email">Email</label>
                                    <input id="email" type="text" class="form-control" value="{{auth()->user()->email}}" name="email"><br>

                                    <label>Image </label>
                                    <div class="custom-file">
                                        <input type="file" name="image" value="{{auth()->user()->image}}" class="custom-file-input " id="customFile">
                                        <label class="custom-file-label" for="customFile">choisir une image</label>
                                        @error('image')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-divider">Your Home</div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="ville">City</label>
                                        <input type="text" name="ville" value="{{auth()->user()->ville}}" class="form-control">

                                    </div>
                                    <div class="form-group col-6">
                                        <label for="tel">Phone</label>
                                        <input type="text" name="tel" value="{{auth()->user()->tel}}" class="form-control">
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="adresse">Adresse</label>
                                        <input type="text" name="adresse" value="{{auth()->user()->adresse}}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-left">
                                <button class="btn btn-warning">Save Changes</button>
                            </div>
                        </form>

                    </div>
                </div>

                <div class="row mt-sm-4">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card profile-widget">
                            <div class="profile-widget-header">
                                <!-- Password Change Form -->
                                <form action="{{ route('profile.changePassword', auth()->user()->id) }}" method="POST">
                                    @method('put') <!-- This line specifies that the form should make a PUT request -->
                                    @csrf
                                    <div class="card-header">
                                        <h4>Edit Password</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="current_password">Current Password</label>
                                            <input id="current_password" type="password" class="form-control" name="current_password">
                                        </div>
                                        <div class="input-group">
                                            <input id="new_password" type="password" class="form-control" name="new_password">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-eye" id="togglePassword"></i>
                                                </span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="password_confirmation">Password Confirmation</label>
                                            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation">
                                        </div>
                                    </div>
                                    <div class="card-footer text-left">
                                        <button class="btn btn-warning">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-sm-4">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card profile-widget">
                            <div class="profile-widget-header">
                                <!-- Account Deletion Form -->
                                <form action="{{ route('profile.destroy', auth()->user()->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <div class="card-header">
                                        <h4>Delete Account</h4>
                                    </div>
                                    <div class="card-body">
                                        <p>Are you sure you want to delete your account? This action cannot be undone.</p>
                                    </div>
                                    <div class="card-footer text-left">
                                        <button type="submit" class="btn btn-danger " onclick='confirmation(event,`{{auth()->user()->id}}`)' data-toggle="modal">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</section>
@endsection