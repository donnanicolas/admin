<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Helpers\DNSSECHelper;

class PagesController extends Controller
{
    /**
     * Set up the need for auth, but only in home
     */
    public function __construct() {
        $this->middleware('auth', ['only' => 'home']);
    }

    public function index()
    {
        return view('welcome');
    }

    public function home()
    {
        return view('home');
    }
}
