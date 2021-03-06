<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
         \App\Events\ArticleCreated::class => [
            \App\Listeners\ArticlesEventListener::class,
         ],
             \Illuminate\Auth\Events\Login::class => [
            \App\Listeners\UsersEventListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        /*
        \Event::listen('article.created', function ($article) {
            var_dump('이벤트를 받았습니다. 받은 데이터는 다음과 같습니다.');
            var_dump($article->toArray());
        });
        */
        \Event::listen(
            'article.created',
            //\App\Events\ArticleCreated::class,
            \App\Listeners\ArticlesEventListener::class
        );
        //
    }
}
