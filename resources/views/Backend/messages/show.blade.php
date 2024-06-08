@extends('layouts.admin.app')
@section('title', 'Profile')
@section('content')
<section class="section">
    <div class="section-body">
        <div class="card profile-widget ">
            <div class="profile-widget-header ">
                @if(Empty($message ->image))
                <img class="rounded-circle profile-widget-picture" width="50" src="{{asset('assets/img/avatar/user.png')}}" alt="avatar">
                @else
                <img alt="image" class="rounded-circle profile-widget-picture" src="{{asset('storage/'. $message->image)}}">
                @endif
                <div class="profile-widget-items">
                    <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Email</div>
                        <div class="profile-widget-item-value">{{$message->email}}</div>
                    </div>
                    <div class="profile-widget-item">
                    <div class="profile-widget-item-label">Phone</div>
                        <div class="profile-widget-item-label">{{$message->phone}}</div>
                    </div>
                    <div class="profile-widget-item">
                    <div class="profile-widget-item-label">Date</div>
                        <div class="profile-widget-item-label">{{$message->created_at->diffForHumans()}}</div>
                    </div>
                 
                </div>
            </div>
            <div class="profile-widget-description mb-8">
                <div class="profile-widget-name">{{$message->name}}
                     <!-- <div class="text-muted d-inline font-weight-normal">
                        <div class="slash"></div> Web Developer
                    </div> -->
                </div>
                {{$message->messages}}         
               </div><br><br><br>
            <!-- <div class="card-footer text-center">
                <div class="font-weight-bold mb-2">Follow Michelle On</div>
                <a href="#" class="btn btn-social-icon btn-facebook mr-1"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="btn btn-social-icon btn-twitter mr-1"><i class="fab fa-twitter"></i></a>
                <a href="#" class="btn btn-social-icon btn-github mr-1"><i class="fab fa-github"></i></a>
                <a href="#" class="btn btn-social-icon btn-instagram"><i class="fab fa-instagram"></i></a>
            </div> -->
        </div>
    </div>
</section>
@endsection