<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\PowerdnsDomain;
use App\PowerdnsRecord;
use App\Http\Requests\PowerdnsRecordRequest;

class PowerdnsRecordController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(PowerdnsDomain $domain)
    {
        return view('powerdns.record.create')->with(compact('domain'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(PowerdnsDomain $domain, PowerdnsRecordRequest $request)
    {
        //If the record doesn't end in the domain don't continue
        if ( !$this->validateRecord($request->input('name'), $domain->name) ) {
            return redirect()
                ->action('PowerdnsRecordController@create', $domain->id)
                ->withError('Records must end with the domain');
        }

        $record = new PowerdnsRecord($request->all());
        $record->domain_id = $domain->id;
        $record->change_date = Carbon::now()->timestamp;
        //$record->name .= ".{$domain->name}";
        $record->save();

        return redirect()->action('PowerdnsDomainController@show', $domain->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(PowerdnsDomain $domain, PowerdnsRecord $record)
    {
        return view('powerdns.record.edit')->with(compact('domain', 'record'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(PowerdnsDomain $domain, PowerdnsRecord $record, PowerdnsRecordRequest $request)
    {
        if ( !$this->validateRecord($request->input('name'), $domain->name) ) {
            return redirect()
                ->action('PowerdnsRecordController@edit', [$domain->id, $record->id])
                ->withErrors('Records must end with the domain');
        }

        $record->fill($request->all());
        $record->domain_id = $domain->id;
        $record->change_date = Carbon::now()->timestamp;
        //$record->name = "{$domain->name}";
        $record->save();

        return redirect()->action('PowerdnsDomainController@show', $domain->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(PowerdnsDomain $domain, PowerdnsRecord $record)
    {
        if ( $record->type == 'SOA' ) {
            return redirect()->action('PowerdnsDomainController@show', $domain->id)->withErrors(['record' => 'Can\'t delete SOA record' ]);
        }
        $record->delete();
        return redirect()->action('PowerdnsDomainController@show', $domain->id);
    }

    /**
     * Validates that the record ends with the domainName
     *
     * @param string $recordName
     * @param string $domainName
     * @return bool
     */
    private function validateRecord($recordName, $domainName)
    {
        $expectedPosition = strlen($recordName) - strlen($domainName);
        return strrpos($recordName, $domainName, 0) === $expectedPosition;
    }
}
