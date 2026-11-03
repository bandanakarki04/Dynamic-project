<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Solution;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
	{
		$products = Product::with('tags')
			->orderBy('name')
			->paginate(10);

		$tags = Tag::orderBy('name')->get();

		return view('products.index', compact('products', 'tags'));
	}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
	{
		$solutions = Solution::orderBy('name')->get();
		$tags = Tag::orderBy('name')->get();

		return view('products.create', compact('solutions', 'tags'));
	}

    /**
     * Store a newly created resource in storage.
     */
	 public function store(StoreProductRequest $request)
	{
		$validated = $request->validated();

		DB::transaction(function () use ($validated) {
			$product = Product::create([
				'name' => $validated['name'],
				'description' => $validated['description'] ?? null,
				'type' => $validated['type'],
			]);

			$product->solutions()->sync($validated['solutions'] ?? []);
			$product->tags()->sync($validated['tags'] ?? []);
		});

		return redirect()
			->route('products.index')
			->with('status', 'Product created.');
	}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
	{
		$product = Product::with(['solutions', 'tags'])->findOrFail($id);

		return view('products.show', compact('product'));
	}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
	{
		$product = Product::with(['solutions', 'tags'])->findOrFail($id);

		$solutions = Solution::orderBy('name')->get();
		$tags = Tag::orderBy('name')->get();

		return view('products.edit', compact('product', 'solutions', 'tags'));
	}

    /**
     * Update the specified resource in storage.
     */
	 public function update(UpdateProductRequest $request, string $id)
	{
		$product = Product::findOrFail($id);

		$validated = $request->validated();

		DB::transaction(function () use ($product, $validated) {
			$product->update([
				'name' => $validated['name'],
				'description' => $validated['description'] ?? null,
				'type' => $validated['type'],
			]);

			$product->solutions()->sync($validated['solutions'] ?? []);
			$product->tags()->sync($validated['tags'] ?? []);
		});

		return redirect()
			->route('products.index')
			->with('status', 'Product updated.');
	}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
	{
		$product = Product::findOrFail($id);

		$product->delete();

		return redirect()
			->route('products.index')
			->with('status', 'Product deleted.');
	}
}
