@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                 <div class="page-header">
                    <h1>
                        {{ $profileUser->name }}
                        <small>since {{ $profileUser->created_at->diffForHumans() }}</small>
                    </h1>
                </div><!-- /.page-header -->

                @foreach($threads as $thread)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="level">
                                <span class="flex">
                                    <a href="#">{{ $thread->creator->name }}</a> posted: 
                                    {{ $thread->title }}
                                </span>

                                <span>{{ $thread->created_at->diffForHumans() }}</span>
                            </div><!-- /.level -->
                        </div><!-- /.panel-heading -->

                        <div class="panel-body">
                            {{ $thread->body }}
                        </div><!-- /.panel-body -->
                    </div><!-- /.panel -->
                @endforeach

                {{ $threads->links() }}
            </div><!-- /.col-sm-8 --> 
        </div><!-- /.row -->
    </div><!-- /.container -->
@endsection