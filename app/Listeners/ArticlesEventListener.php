<?php

namespace App\Listeners;

use App\Events\articleCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ArticlesEventListener
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
     * @param  article.created  $event
     * @return void
     */

    /* public function handle(article.created $event)
    {
    } */

    public function handle(\App\Events\ArticleCreated $event)
    {
        dump('이벤트를 받았습니다. 받은 데이터(상태)는 다음과 같습니다.');
        dump($event->article->toArray());
    }
}
