<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cat;

class CatImageController extends Controller
{
    public function edit(Cat $cat) {

        return view('profile.my-cats.image-edit', compact('cat'));;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cat $cat)
    {
        if ($request->has('selected_images')) {
            foreach($request->selected_images as $imageId) {
                $cat->images()
                    ->where('id', $imageId)
                    ->delete();
            }
        }

        if ($files = $request->file('images')) {
            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                $filename = $file->getClientOriginalName() . '_' . time() . '.' . $extension;

                $path = $file->storeAs('cats/images', $filename, 'public');

                $cat->images()->create([
                    'image' => $path
                ]);

            }
        }

        return redirect()->back()->with('success', 'Cat details updated successfully..');

    }


}
