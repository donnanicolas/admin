<?php

namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Carbon\Carbon;

use App\PowerdnsDomain;
use App\PowerdnsRecord;
use App\PowerdnsZone;

use App\PostfixDomain;
use App\PostfixMailbox;
use App\PostfixAlias;

use App\Helpers\DNSSECHelper;

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

        PostfixDomain::deleted(function (PostfixDomain $domain) {
            PostfixMailbox::where('domain', $domain->domain)->delete();
            PostfixAlias::where('domain', $domain->domain)->delete();
        });

        PowerdnsDomain::created(function (PowerdnsDomain $domain) {

            PowerdnsZone::create([
                'owner' => 1,
                'domain_id' => $domain->id,
                'zone_templ_id' => 0
            ]);

            $content = "ns1.{$domain->name} ";
            $content .= "hostmaster.{$domain->name} ";
            $content .= Carbon::now()->format('Ymd') . '00 ';
            $content .= '28800 7200 604800 86400';

            PowerdnsRecord::create([
                'domain_id' => $domain->id,
                'name' => $domain->name,
                'type' => 'SOA',
                'content' => $content,
                'ttl' => 86400,
                'prio' => 0,
                'change_date' => Carbon::now()->timestamp,
                'disabled' => 0,
                'ordername' => null
            ]);

            DNSSECHelper::rectifyZone($record->domain->name);

        });

        PowerdnsDomain::deleted(function (PowerdnsDomain $domain) {
            PowerdnsZone::where('domain_id', $domain->id)->delete();
            PowerdnsRecord::where('domain_id', $domain->id)->delete();

            DNSSECHelper::rectifyZone($record->domain->name);
        });

        $updateSoa = function (PowerdnsRecord $record) {

            if ( $record->type == 'SOA' ) {
                return;
            }

            $soa = $record->domain->records()->where('type', 'SOA')->first();
            $content = explode(' ', $soa->content);
            $serial = $content[2];

            $date = substr($serial, 0, 8);
            $serial = substr($serial, 8);

            $newSerial = Carbon::now()->format('Ymd') . '00 ';
            if ( Carbon::now()->format('Ymd') == $date ) {
                $serial = sprintf("%02d", ((int)($serial)) + 1);
                $newSerial = Carbon::now()->format('Ymd') . $serial;
            }

            $content[2] = $newSerial;
            $soa->content = implode(' ', $content);
            $soa->save();

            DNSSECHelper::rectifyZone($record->domain->name);
        };

        PowerdnsRecord::created($updateSoa);
        PowerdnsRecord::updated($updateSoa);
        PowerdnsRecord::deleted($updateSoa);
    }


}
