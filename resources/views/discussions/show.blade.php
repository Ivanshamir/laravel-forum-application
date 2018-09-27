@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
        <img src="{{ $d->user->avatar }}" alt="" width="40px" height="40px">&nbsp;&nbsp;&nbsp;
        <span> {{ $d->user->name }}, <b>({{ $d->user->points }})</b> </span>

        <span>
            @if($d->hasBestAnswer())
                <button class="btn btn-xs btn-success pull-right">Closed</button>
            @else
            <button class="btn btn-xs btn-danger pull-right">Open</button>
            @endif
        </span>

        @if(Auth::id() == $d->user->id)
            @if(!$d->hasBestAnswer())
                <a href="{{ route('discussion.edit', ['slug' => $d->slug]) }}" class="btn btn-info btn-xs pull-right" style="margin-right: 8px">Edit</a>
            @endif

        @endif

        @if($d->is_watch_by_auth_user())
            <a href="{{ route('discussion.unwatch', ['id' => $d->id]) }}" class="btn btn-danger btn-xs pull-right" style="margin-right: 8px">Unwatch</a>
        @else
            <a href="{{ route('discussion.watch', ['id' => $d->id]) }}" class="btn btn-success btn-xs pull-right" style="margin-right: 8px">Watch</a>
        @endif
    </div>
    <div class="panel-body">
        <h4 class="text-center"> <b>{{ $d->title }}</b></h4> <hr>
        <p class="text-center">
            {!! Markdown::convertToHtml($d->content) !!}
        </p>
    </div>

    @if($best_answer)
        <div class="text-center" style="padding:40px">
            <h3 class="text-center">Best Answer</h3>
            <div class="panel panel-success">
                <div class="panel-heading">
                    <img src="{{ $best_answer->user->avatar }}" alt="" width="40px" height="40px">&nbsp;&nbsp;&nbsp;
                    <span> {{ $best_answer->user->name }}</span> <b>({{ $best_answer->user->points }})</b>
                </div>
                <div class="panel-body">
                    {!! Markdown::convertToHtml($best_answer->content) !!}
                </div>
            </div>
        </div>
    @endif


    <div class="panel-footer">
        <span>
            {{ $d->replies->count() }} Replies
        </span>
        <a href="{{route('channel', ['slug'=>$d->channel->slug])}}" class="btn btn-default btn-xs pull-right">{{ $d->channel->title }}</a>
    </div>
</div>


@foreach($d->replies as $r)

<div class="panel panel-default">
    <div class="panel-heading">
        <img src="{{ $r->user->avatar }}" alt="" width="40px" height="40px">&nbsp;&nbsp;&nbsp;
        <span> {{ $r->user->name }}, <b>({{ $r->user->points }})</b> 
        </span>
        @if(!$best_answer)
            @if(Auth::id() == $d->user->id)
                <a href="{{ route('discussion.reply.best', ['id'=>$r->id]) }}" class="btn btn-primary btn-xs pull-right">Mark as best answer</a>
            @endif
        @endif

        @if(Auth::id() == $r->user->id)
            @if(!$best_answer)
                <a href="{{ route('reply.edit', ['id'=>$r->id]) }}" class="btn btn-info btn-xs pull-right" style="margin-right:8px">Edit</a>  
            @endif
        @endif
    </div>
    <div class="panel-body">
        <p class="text-center">
            {!! Markdown::convertToHtml($r->content) !!}
        </p>
    </div>
    <div class="panel-footer">
        @if($r->is_liked_by_auth_user())
            <a href="{{ route('reply.unlike', ['id'=>$r->id]) }}" class="btn btn-danger btn-xs">Unlike <span class="badge">{{ $r->likes->count() }}</span></a>
        @else
            <a href="{{ route('reply.like', ['id'=>$r->id]) }}" class="btn btn-success btn-xs">Like <span class="badge">{{ $r->likes->count() }}</span></a>
        @endif
    </div>
    
</div>

@endforeach

<div class="panel panel-default">
    @if(Auth::check())
        <div class="panel-body">
            <form action="{{ route('discussion.reply', ['id'=>$d->id]) }}" method="post">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="reply">Leave a reply...</label>
                    <textarea name="reply" id="" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <button class="btn pull-right">Leave a reply</button>
                </div>
            </form>
        </div>
    @else

        <h3 class="text-center">Signin for leave a reply</h3>

    @endif
</div>

@endsection
