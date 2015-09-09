<?php

namespace App;

use App\Events\NodeUpdated;
use Illuminate\Database\Eloquent\Model;

class Node extends Model
{
    protected $table = 'node';

    protected $fillable = ['name', 'description', 'keywords', 'image', 'content', 'path', 'show_type', 'content_type', 'url', 'parent_id', 'order', 'depth', 'thread'];

    public static function boot(){
        parent::boot();

        static::updated(function($node){
            \Event::fire(new NodeUpdated($node));
        });
    }

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

    /**
     * get the array of current node's parents and children
     * @return array
     */
    public function chain()
    {
        $nodeChain = [];
        $thread = trim($this->thread, '/');
        $arr = explode('/', $thread);
        $arr = array_filter($arr);
        foreach ($arr as $n) {
            array_push($nodeChain, $this->find($n));
        }
        array_push($nodeChain, $this);
        return $nodeChain;
    }

    public function scopeTop($query){
        return $query->where('depth', 0)
                    ->orderBy('order', 'asc');
    }
}
