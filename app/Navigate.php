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

    public function scopeHiddenNav($query){
        return $query->where('status', 0)
                    ->where('depth', 0)
                    ->orderBy('order', 'asc');
    }

    public function scopeTop($query){
        return $query->where('depth', 0)
                    ->orderBy('order', 'asc');
    }

    public function chain(){
        $navChain = [];
        $thread = trim($this->thread, '/');
        $arr = explode('/', $thread);
        $arr = array_filter($arr);
        foreach ($arr as $n) {
            array_push($navChain, $this->find($n));
        }
        array_push($navChain, $this);
        return $navChain;
    }

}
