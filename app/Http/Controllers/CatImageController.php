<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cat;
use App\Models\CatImage;
use Illuminate\Validation\Rule;

class CatImageController extends Controller
{
    public function edit(Cat $cat) {


        return view('profile.my-cats.image-edit', [
            'cat' => $cat,
            'images' => $cat->images()->orderBy('position', 'asc')->get()
        ]);;
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

        $imageCount = CatImage::query()
        ->where('cat_id', $cat->id)
        ->count();
        if ($request->position) {
        foreach ($request->position as $id => $position) {

            if ($imageCount < $position) {
                return back()->with('error', 'The position ' . $position . ' exceeds the number of images available.');

            }

            $image = CatImage::find($id);
            if ($image) {
                $image->update(['position' => $position]);
            }
        }

        }
        return redirect()->back()->with('success', 'Cat details updated successfully..');

    }


}
