<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cat;

class HomeController extends Controller
{
    public function index() {

        return view('home.index', ['cats' => Cat::latest()->limit(30)->get()]);
    }

    public function showCat(Cat $cat) {
        return view('home.cat', compact('cat'));
    }
}
