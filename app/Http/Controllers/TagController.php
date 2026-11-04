<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::with('products')
        ->orderBy('name')
        ->paginate(15);
        return view('tags.index', compact('tags'));

    }

    public function create()
    {
        $products = \App\Models\Product::orderBy('name')->get();

        return view('tags.create', compact('products'));
    }

   public function store(TagRequest $request)
   {
        $tag = Tag::create($request->validated());

        if ($request->product_id) {
            $tag->products()->attach($request->product_id);
        }

        return redirect()->route('tags.index')->with('success', 'Tag created.');
   }

    public function show(Tag $tag)
    {
        return view('tags.show', compact('tag'));
    }



    public function edit(Tag $tag)
    {
        return view('tags.edit', compact('tag'));
    }

    public function update(TagRequest $request, Tag $tag)
    {
        $tag->update($request->validated());
        return redirect()->route('tags.index')->with('success', 'Tag updated.');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tags.index')->with('success', 'Tag deleted.');
    }
}
