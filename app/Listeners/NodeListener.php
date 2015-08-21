<?php

namespace App\Listeners;

use App\Events\NodeUpdated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NodeListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function onUpdated($event){
        $node = $event->node;
        \Queue::push(new App\Job\NodeUpdateJob($node));
    }

    public function subscribe($event){
        $event->listen('App\Events\NodeUpdated', 'App\Listeners\NodeListener@onUpdated');
    }

    /**
     * Handle the event.
     *
     * @param  NodeUpdated  $event
     * @return void
     */
    public function handle(NodeUpdated $event)
    {
        //
    }
}
