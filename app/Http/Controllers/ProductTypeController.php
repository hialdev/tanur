<?php

namespace App\Http\Controllers;

use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    public function index(Request $request){
        $filter = (object) [
            'q' => $request->get('search') ?? '',
            'field' => $request->get('field') ?? 'created_at',
            'order' => $request->get('order') ? ($request->get('order') == 'newest' ? 'desc' : 'asc') : 'desc',
        ];

        $product_types = ProductType::where('name', 'LIKE', '%'.$filter->q.'%')->orderBy($filter->field, $filter->order)->get();
        return view('product_types.index', compact('product_types', 'filter'));
    }

    public function add(){
        return view('product_types.add');
    }

    public function store(Request $request){
        $request->validate([
            'image' => 'nullable|image|mimes:webp,png,jpg,jpeg,jfif,svg|max:2048',
            'name' => 'required|string|min:3|unique:osano.product_types,name',
            'code' => 'required|string|min:3|unique:osano.product_types,code',
            'type' => 'required|string|in:satuan,meteran',
        ]);
        try {
            $product_type = new ProductType();
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('product_types', 'public');
                $product_type->image = $imagePath;
            }
            $product_type->name = $request->get('name');
            $product_type->code = $request->get('code');
            $product_type->type = $request->get('type');
            $product_type->save();

            return redirect()->route('product_type.index')->with('success', 'Product Tipe '.$product_type->name.' berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan Product, Error: '.$e->getMessage());
        }
    }

    public function edit($id){
        $product_type = ProductType::find($id);
        return view('product_types.edit', compact('product_type'));
    }

    public function update($id, Request $request){
        $request->validate([
            'image' => 'nullable|image|mimes:webp,png,jpg,jpeg,jfif,svg|max:2048',
            'name' => 'required|string|min:3|unique:osano.product_types,name,'.$id,
            'code' => 'required|string|min:3|unique:osano.product_types,code,'.$id,
            'type' => 'required|string|in:satuan,meteran',
        ]);

        try {
            $product_type = ProductType::find($id);
            if($product_type->code != $request->get('code') && $product_type->products->count() > 0){
                return redirect()->back()->withInput()->with('error', 'Gagal memperbarui Product, Error: Tipe Produk memiliki Produk, tidak dapat mengubah kode');
            }
            if ($request->hasFile('image')) {
                if ($product_type->image && file_exists(storage_path('app/public/' . $product_type->image))) {
                    unlink(storage_path('app/public/' . $product_type->image));
                }
                $imagePath = $request->file('image')->store('product_types', 'public');
                $product_type->image = $imagePath;
            }
            $product_type->name = $request->get('name');
            $product_type->code = $request->get('code');
            $product_type->type = $request->get('type');
            $product_type->save();

            return redirect()->route('product_type.index')->with('success', 'Product Tipe '.$product_type->name.' berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui Product, Error: '.$e->getMessage());
        }
    }

    public function destroy($id){
        try {
            $product_type = ProductType::find($id);
            $product_type->delete();

            return redirect()->route('product_type.index')->with('success', 'Product Tipe '.$product_type->name.' berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal menghapus Product, Error: '.$e->getMessage());
        }
    }
}
