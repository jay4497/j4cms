<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Node extends Model
{
    protected $table = 'node';

    protected $fillable = ['name', 'description', 'keywords', 'image', 'content', 'path', 'show_type', 'content_type', 'url', 'parent_id', 'order', 'depth', 'thread'];

    public function parent(){
        return $this->belongsTo('\App\Node', 'parent_id');
    }

    public function children(){
        return $this->hasMany('\App\Node', 'parent_id', 'id');
    }

    public function navigate(){
        return $this->hasOne('\App\Navigate', 'bind_node_id', 'id');
    }

    public function article(){
        return $this->hasMany('\App\Article');
    }

    public function scopeTop($query){
        return $query->where('depth', 0)
                    ->orderBy('order', 'asc');
    }
}
