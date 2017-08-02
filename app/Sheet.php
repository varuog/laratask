<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sheet extends Model {

    protected $fillable = [
        'title'
        , 'description'
    ];

    /**
     * Get the comments for the blog post.
     */
    public function tasks() {
        return $this->hasMany('App\Task');
    }

    public function user() {
        return $this->belongsTo('App\user');
    }

}
