@extends('layouts.app')

@section('content')
    <thread-view :initial-replies-count="{{ $thread->replies_count }}" inline-template>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">

                            <div class="level">
                                <span class="flex">
                                    <a href="{{ route('profile', $thread->creator) }}">{{ $thread->creator->name }}</a> posted: 
                                    {{ $thread->title }}
                                </span>

                                @can ('update', $thread)
                                    <form action="{{ $thread->path() }}" method="POST">
                                        {{ csrf_field() }}

                                        {{ method_field('DELETE') }}

                                        <button type="submit" class="btn btn-link">Delete Thread</button>
                                    </form>
                                @endcan
                            </div><!-- /.level -->
                        </div><!-- /.panel-heading -->

                        <div class="panel-body">
                            {{ $thread->body }}
                        </div><!-- /.panel-body -->
                    </div><!-- /.panel panel-default -->

                    <replies :data="{{ $thread->replies }}" @removed="repliesCount--"></replies>
                    
                    {{--  {{ $replies->links() }}  --}}

                    @if (auth()->check())
                        <form action="{{ $thread->path() . '/replies' }}" method="POST" role="form">
                            {{ csrf_field() }}        
                            <div class="form-group">
                                <textarea name="body" id="body" class="form-control" rows="5" placeholder="Have something to say?"></textarea>
                            </div>
                        
                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                    @else
                        <p class="text-center">Please <a href="{{ route('login') }}">sign in</a> to participate in this discussion.</p>
                    @endif
                </div><!-- /.col-md-8 -->

                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            This thread was published {{ $thread->created_at->diffForHumans() }} by 
                            <a href="#">{{ $thread->creator->name }}</a>, and currently has 
                            <span v-text="repliesCount"></span> {{ str_plural('comment', $thread->replies_count) }}.
                        </div><!-- /.panel-body -->
                    </div><!-- /.panel panel-default -->
                </div><!-- /.col-md-4 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </thread-view>
@endsection
