<?php

namespace App\Listeners;

use Laracombee;
use App\Events\BookIsCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AddBookToRecombee
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

    /**
     * Handle the event.
     *
     * @param  BookIsCreated  $event
     * @return void
     */
    public function handle(BookIsCreated $event)
    {
        $request = Laracombee::addItem($event->book);
        Laracombee::send($request)->wait();
    }
}
