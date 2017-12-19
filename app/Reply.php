<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use Favoritable, RecordsActivity;

    /**
     * Don't auto-apply mass assignment protection
     * 
     * @var array
     */
    protected $guarded = [];

    /**
     * The relations to eager load on every query
     * 
     * @var array
     */
    protected $with = ['owner', 'favorites'];
    
    protected $appends = ['favoritesCount', 'isFavorited'];

    /**
     * A reply has an owner
     * 
     * @return \Immuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * A reply has a thread
     * 
     * @return \Immuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function thread()
    {
        return $this->belongsTo(Thread::class);
    }

    public function path()
    {
        return $this->thread->path() . "#reply-{$this->id}";
    }
}
