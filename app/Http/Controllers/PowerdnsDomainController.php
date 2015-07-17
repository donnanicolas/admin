<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\PowerdnsDomain;
use App\Http\Requests\PowerdnsDomainRequest;

class PowerdnsDomainController extends Controller
{
    /**
     * Set up the need for auth, but only in home
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $domains = PowerdnsDomain::all();
        return view('powerdns.domain.index')->with(compact('domains'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('powerdns.domain.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(PowerdnsDomainRequest $request)
    {
        PowerdnsDomain::create($request->all());
        return redirect()->action('PowerdnsDomainController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(PowerdnsDomain $domain)
    {
        return view('powerdns.domain.show')->with(compact('domain'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(PowerdnsDomain $domain)
    {
        return view('powerdns.domain.edit')->with(compact('domain'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(PowerdnsDomain $domain, PowerdnsDomainRequest $request)
    {
        $domain->update($request->all());
        return redirect()->action('PowerdnsDomainController@show', [$domain->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(PowerdnsDomain $domain)
    {
        $domain->delete();
        return redirect()->action('PowerdnsDomainController@index');
    }
}
