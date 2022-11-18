<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use function PHPUnit\Framework\returnValue;

class HomeController extends Controller
{
    public function index()
    {
        return view('website.home.index');
    }
}
