<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cat;

class HomeController extends Controller
{
    public function index(Request $request) {

        if ($request->has('search') && $request->search != 'all') {
            $cats = Cat::with(['images' => function($query) {
                $query->orderBy('position', 'asc');
            }])->where('breed', 'like', '%' . $request->search . '%');   
        } else {
            $cats = Cat::with(['images' => function($query) {
                $query->orderBy('position', 'asc');
            }]);
        }
        return view('home.index', [
            'cats' => $cats
            ->limit(30)
            ->get()
        ]);
    }

    public function showCat(Cat $cat) {
        return view('home.cat', [
            'cat' => Cat::with(['images' => function($query) {
                $query->orderBy('position', 'asc');
            }])->find($cat->id)
        ]);
    }
}
