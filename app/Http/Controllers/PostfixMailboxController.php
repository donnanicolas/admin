<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\PostfixDomain;
use App\PostfixMailbox;
use App\Http\Requests\PostfixMailboxRequest;

use Carbon\Carbon;

class PostfixMailboxController extends Controller
{
    /**
     * Set up the need for auth, but only in home
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(PostfixDomain $domain)
    {
        return view('postfix.mailbox.create')->with(compact('domain'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(PostfixDomain $domain, PostfixMailboxRequest $request)
    {
        $errors = [];
        $exploded = explode('@', $request->input('username'), 2);

        if ( $exploded[1] != $domain->domain ) {
            $errors['username'] = 'Bad Domain';
        }

        $count = PostfixMailbox::where('domain', $domain->domain)->count();

        if ( $count >= $domain->mailboxes ) {
            $errors['username'] = 'Mailboxes limit reached';
        }

        if ( !empty($errors) ) {
            return redirect()->action('PostfixMailboxController@create', [$domain->domain])
                ->withErrors($errors)
                ->withInput();
        }

        $mailbox = new PostfixMailbox($request->all());
        $mailbox->username = $request->input('username');
        $mailbox->domain = $domain->domain;
        $mailbox->local_part = $exploded[0];
        $mailbox->maildir = $request->input('username') . '/';
        $mailbox->created = Carbon::now();
        $mailbox->modified = Carbon::now();
        $mailbox->active = true;

        $mailbox->save();

        return redirect()->action('PostfixDomainController@show', [$domain->domain]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(PostfixDomain $domain, PostfixMailbox $mailbox)
    {
        return view('postfix.mailbox.show')->with(compact('domain', 'mailbox'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(PostfixDomain $domain, PostfixMailbox $mailbox)
    {
        return view('postfix.mailbox.edit')->with(compact('domain', 'mailbox'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(PostfixDomain $domain, PostfixMailbox $mailbox, Request $request)
    {
        $mailbox->fill($request->all());
        $mailbox->modified = Carbon::now();

        $mailbox->save();

        return redirect()->action('PostfixDomainController@show', [$domain->domain]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(PostfixDomain $domain, PostfixMailbox $mailbox)
    {
        $mailbox->delete();
        return redirect()->action('PostfixDomainController@show', [$domain->domain]);
    }
}
