<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\PostfixDomain;
use App\Http\Requests\PostfixDomainRequest;

class PostfixDomainController extends Controller
{

    /**
     * Set up the need for auth, but only in home
     */
    public function __construct() {
        $this->middleware('auth', ['only' => 'home']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $domains = PostfixDomain::all();
        return view('postfix.domain.index')->with(compact('domains'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('postfix.domain.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(PostfixDomainRequest $request)
    {
        $domain = PostfixDomain::create($request->all());
        return redirect()->action('PostfixDomainController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(PostfixDomain $domain)
    {
        return view('postfix.domain.show')->with(compact('domain'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(PostfixDomain $domain)
    {
        return view('postfix.domain.edit')->with(compact('domain'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(PostfixDomain $domain, PostfixDomainRequest $request)
    {
        $domain->update($request->all());
        return redirect()->action('PostfixDomainController@show', [$domain->domain]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
