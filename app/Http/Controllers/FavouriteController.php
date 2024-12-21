<?php

namespace App\Http\Controllers;

use App\Models\Favourite;
use Illuminate\Http\Request;

class FavouriteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $favourites = auth()->user()->favourites;
        return view('profile.my-cats.favourites.index', compact('favourites'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $exists = auth()->user()->cats()->where('id', $request->cat_id)->exists();
        if ($exists) {
            return redirect()->route('home')->with('error', 'You cant save to favourites your own cat :).');
        }
        auth()->user()->favourites()->attach($request->cat_id);

        return redirect()->route('home')->with('success', 'Cat added to favourites.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Favourite $favourite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Favourite $favourite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Favourite $favourite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        auth()->user()->favourites()->detach($request->cat_id);

        return redirect()->back()->with('success', 'Cat has been removed from favourites.');

    }
}
