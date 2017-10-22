@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create a new thread</div>

                <div class="panel-body">
                    <form action="/threads" method="POST" role="form">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="Title"/>
                        </div>
                    
                        <div class="form-group">
                            <label for="body">Body:</label>
                            <textarea name="body" id="body" class="form-control" rows="8" placeholder="Have something to say?"></textarea>
                        </div>
                    
                        <button type="submit" class="btn btn-primary">Publish</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
