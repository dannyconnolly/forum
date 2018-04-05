{{-- Editing the question --}}
<div class="panel panel-default" v-if="editing">
    <div class="panel-heading">

        <div class="level">
            
            <input type="text" value="{{ $thread->title }}" class="form-control" />
                                
        </div><!-- /.level -->
    </div><!-- /.panel-heading -->

    <div class="panel-body">
        <div class="form-group">
            <textarea class="form-control" rows="10">{{ $thread->body }}</textarea>
        </div>
    </div><!-- /.panel-body -->
    
    <div class="panel-footer">
        <div class="level">
            <button class="btn btn-xs level-item" @click="editing = true" v-show="! editing">Edit</button>
            <button class="btn btn-xs btn-primary level-item" @click="" v-show="editing">Update</button>
            <button class="btn btn-xs level-item" @click="editing = false">Cancel</button>
            
            @can ('update', $thread)
            <form action="{{ $thread->path() }}" method="POST" class="ml-a">
                {{ csrf_field() }}

                {{ method_field('DELETE') }}

                <button type="submit" class="btn btn-link">Delete Thread</button>
            </form>
            @endcan
        </div><!-- /.level -->
    </div><!-- /.panel-footer -->
</div><!-- /.panel panel-default -->

{{-- Viewing the question --}}
<div class="panel panel-default" v-else>
    <div class="panel-heading">

        <div class="level">

            <img src="{{ $thread->creator->avatar_path }}" width="25" height="25" alt="{{ $thread->creator->name }}" class="mr-1" />

            <span class="flex">
                <a href="{{ route('profile', $thread->creator) }}">{{ $thread->creator->name }}</a> posted: 
                {{ $thread->title }}
            </span>
        </div><!-- /.level -->
    </div><!-- /.panel-heading -->

    <div class="panel-body">
        {{ $thread->body }}
    </div><!-- /.panel-body -->
    
    <div class="panel-footer">
        <button class="btn btn-xs" @click="editing = true">Edit</button>
    </div><!-- /.panel-footer -->
</div><!-- /.panel panel-default -->