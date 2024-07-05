<?php

namespace App\Http\Controllers;

use App\Imports\ProductsImport;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Exports\ProductsExport;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $filter['search'] = request()->keyword;

        $products = Product::query()
            ->filter($filter)
            ->latest()
            ->paginate(10);

        return view('products.index', compact('products'));
    }

    public function create()
    {
        $brands = Brand::all();

        return view('products.create', compact('brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required|unique:products,code',
            'brand_id' => 'required|exists:brands,id',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'description' => 'nullable',

        ]);

        $data = $request->except('image');

        try {
            \DB::beginTransaction();

            if (!empty($request->input('image'))) {
                $newFilename = Str::after($request->input('image'), 'tmp/');
                Storage::disk('public')->move($request->input('image'), "avatars/$newFilename");
                $data['image'] = "avatars/$newFilename";
            }

            Product::create($data);
            \DB::commit();

            return redirect(route('products.index'))->withSuccess('Product created successfully');
        } catch (\Exception $e) {
            \DB::rollBack();
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }

    }

    public function edit(Product $product)
    {
        $brands = Brand::all();

        return view('products.edit', compact('brands', 'product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required|unique:products,code,' . $product->id,
            'brand_id' => 'required|exists:brands,id',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'description' => 'nullable',

        ]);

        $data = $request->except('image');
        try {
            \DB::beginTransaction();
            if (!empty($request->input('image'))) {

                if (Str::afterLast($request->input('image'), '/') !== Str::afterLast($product->image, '/')) {
                    $newFilename = Str::after($request->input('image'), 'tmp/');
                    if (Storage::exists('public/' . $product->image) && $product->image !== "avatars/default.png") {
                        Storage::delete('public/' . $product->image);
                    }
                    Storage::disk('public')->move($request->input('image'), "avatars/$newFilename");
                    $data['image'] = "avatars/$newFilename";
                }

            }

            $product->update($data);
            \DB::commit();
            return back()->withSuccess('Product updated successfully');
        } catch (\Exception $e) {
            \DB::rollBack();
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }

    }

    public function destroy(Product $product)
    {
        if (Storage::exists('public/' . $product->image) && $product->image !== "avatars/default.png") {
            Storage::delete('public/' . $product->image);
        }

        $product->delete();
        return redirect(route('products.index'))->withSuccess('Data deleted successfully');
    }
}
