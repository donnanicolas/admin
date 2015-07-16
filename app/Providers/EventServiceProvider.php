<?php

namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Carbon\Carbon;

use App\PostfixMailbox;
use App\PostfixAlias;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\SomeEvent' => [
            'App\Listeners\EventListener',
        ],
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);
            PostfixMailbox::created(function (PostfixMailbox $mailbox) {

                $username = $mailbox->local_part . '@' . $mailbox->domain;
                PostfixAlias::create([
                    'address' => $username,
                    'goto' => $username,
                    'domain' => $mailbox->domain,
                    'created' => Carbon::now(),
                    'modified' => Carbon::now(),
                    'active' => 1
                ]);
            });

            PostfixMailbox::deleted(function (PostfixMailbox $mailbox) {
                PostfixAlias::where('goto', $mailbox->username)->delete();
            });
        //
    }
}
