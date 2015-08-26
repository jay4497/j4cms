<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $table = 'link';

    protected $fillable = ['title', 'image', 'description', 'url', 'order'];

    public function scopeSort($query){
        return $query->orderBy('order', 'asc');
    }
}
