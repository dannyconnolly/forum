@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @foreach ($threads as $thread)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="level">
                        <h4 class="flex">
                            <a href="{{ $thread->path() }}">
                                {{ $thread->title }}
                            </a>
                        </h4>

                        <a href="{{ $thread->path() }}">{{ $thread->replies_count }} {{ str_plural('reply', $thread->replies_count) }}</a>
                    </div><!-- /.level -->
                </div><!-- /.panel-heading -->

                <div class="panel-body">                        
                    <div class="body">{{ $thread->body }}</div>
                </div><!-- /.panel-body -->
            </div><!-- /.panel -->
            @endforeach
        </div><!-- /.col-md-8 -->
    </div><!-- /.row -->
</div><!-- /.container -->
@endsection
