@extends('layouts.app')

@section('content')

            <div class="panel panel-default">
                <div class="panel-heading text-center">Update a reply</div>
                
                @if($errors->count() > 0)
                    <ul class="list-group-item text-danger">
                        @foreach($errors->all() as $error)
                            <li class="list-group-item">
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                @endif

                <div class="panel-body">
                    <form action="{{ route('reply.update', ['id'=>$reply->id]) }}" method="post">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="content">Answer a question</label>
                            <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{ $reply->content }}</textarea>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-success pull-right" type="submit">Save Reply Changes</button>
                        </div>

                    </form>
                </div>
            </div>

@endsection
