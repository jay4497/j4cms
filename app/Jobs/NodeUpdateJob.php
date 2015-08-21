<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;

class NodeUpdateJob extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($node)
    {
        $this->node = $node;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->chainUpdate($this->node);
    }

    private function chainUpdate($node){
        if(count($node->children) > 0){
            $ids = [];
            foreach($node->children as $n){
                array_push($ids, $n->id);
            }
            $dpt = getDepth($node->id);
            $data = [
                'parent_id' => $node->id,
                'depth' => $dpt['depth'],
                'thread' => $dpt['thread']
            ];
            \App\Node::whereIn('id', $ids)->update($data);
            foreach ($node->children as $n) {
                if(count($n->children) > 0){
                    $this->chainUpdate($n);
                }
            }

        }
    }
}
