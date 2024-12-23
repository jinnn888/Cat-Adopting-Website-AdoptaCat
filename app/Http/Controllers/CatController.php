<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use App\Models\CatImage;
use Illuminate\Http\Request;
use App\Http\Requests\Cat\StoreRequest;
use App\Http\Requests\Cat\UpdateRequest;

class CatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {       
        $cats = auth()->user()->cats()->paginate(10);
        
        return view('profile.my-cats.index', compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('profile.my-cats.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {

        $cat = auth()->user()->cats()->create([
            "name" => $request->name,
            "breed" => $request->breed,
            "age" => $request->age,
            "gender" => $request->gender,
            "description" => $request->description,
            "temperament" => $request->temperament,
            "adoption_fee" => $request->adoption_fee,
        ]);

        if ($files = $request->file('images')) {
            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                $filename = $file->getClientOriginalName() . time() . '_.' . $extension;
                $path = $file->storeAs('cats/images', $filename, 'public');

                CatImage::create([
                    'image' => $path,
                    'cat_id' => $cat->id,
                    'position' => $cat->images()->max('position') + 1
                ]);                
            }
        }

        return redirect()->route('cats.index')->with('success', 'New cat to be adopted saved!');

    }
    
    /**
     * Display the specified resource.
     */
    public function show(Cat $cat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cat $cat)
    {
        return view('profile.my-cats.edit', compact('cat'));;
    }

    

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Cat $cat)
    {
        $cat->update($request->validated());

        return redirect()->route('cats.index')->with('success', 'Cat details updated.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cat $cat)
    {
        //
    }
}
