@extends('layouts.admin.app')
@section('title', 'Profile')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>All Messages</h4>
    </div>
    <div class="card-body">
        <ul class="list-unstyled list-unstyled-border">
            @foreach ($messages as $message)
            <li class="media">
                <a href="{{route('Messages.show',$message->id)}}">
                    @if(Empty($message ->image))
                    <img class="mr-3 rounded-circle" width="50" src="{{asset('assets/img/avatar/user.png')}}" alt="avatar">
                    @else
                    <img alt="image" class="mr-3 rounded-circle" src="{{asset('storage/'. $message->image)}}">
                    @endif
                    <div class="media-body">
                        <div class="float-right text-primary">{{ $message->created_at->diffForHumans() }}</div>
                        <div class="media-title">{{ $message->name }}</div>
                </a>
                <span class="text-small text-dark">{{ $message->messages }}.</span>
                <form id="delete-form-{{$message->id}}" action="{{route('Messages.destroy',$message->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn float-right" onclick='confirmation(event,`{{ $message->id }}`)' data-toggle="modal">
                        <div class=" float-right text-danger" style="font-size: 17px;"><i class="fa fa-trash"></i></div>
                    </button>
                </form>
    </div>
    </li><br>
    @endforeach
    </ul>
    <!-- <div class="text-center pt-1 pb-1">
            <a href="#" class="btn btn-primary btn-lg btn-round">View All</a>
        </div> -->
</div>
</div>
@endsection