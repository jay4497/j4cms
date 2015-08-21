<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Navigate extends Model
{
    protected $table = 'navigate';

    protected $fillable = ['title', 'url', 'bind_node_id', 'parent_id', 'depth', 'thread', 'order', 'status'];

    public function node(){
        return $this->belongsTo('\App\Node', 'bind_node_id');
    }

    public function parent(){
        return $this->belongsTo('\App\Navigate', 'parent_id', 'id');
    }

    public function children(){
        return $this->hasMany('\App\Navigate', 'parent_id', 'id');
    }

    public function scopeShowNav($query){
        return $query->where('status', 1)
                    ->where('depth', 0)
                    ->orderBy('order', 'asc');
    }
}
