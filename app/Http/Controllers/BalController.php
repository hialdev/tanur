<?php

namespace App\Http\Controllers;

use App\Models\Bal;
use App\Models\ProductType;
use App\Models\PurchaseOrder;
use Illuminate\Http\Request;

class BalController extends Controller
{
    public function index(Request $request){
        $filter = (object) [
            'q' => $request->get('search') ?? '',
            'field' => $request->get('field') ?? 'created_at',
            'order' => $request->get('order') ? ($request->get('order') == 'newest' ? 'desc' : 'asc') : 'desc',
        ];

        $bals = Bal::where('name', 'LIKE', '%'.$filter->q.'%')->orWhere('code', 'LIKE', '%'.$filter->q.'%')->orderBy($filter->field, $filter->order)->get();
        return view('bals.index', compact('bals', 'filter'));
    }

    public function add(){
        $product_types = ProductType::orderBy('name', 'ASC')->get();
        $purchase_orders = PurchaseOrder::orderBy('code', 'ASC')->get();
        return view('bals.add', compact('product_types', 'purchase_orders'));
    }

    public function store(Request $request){
        $request->validate([
            'image' => 'nullable|image|mimes:webp,png,jpg,jpeg,jfif,svg|max:2048',
            'name' => 'required|string|min:3|unique:osano.bals,name',
            'product_type_id' => 'required|string|exists:osano.product_types,id',
            'purchase_order_id' => 'nullable|string|exists:osano.purchase_orders,id',
            'description' => 'nullable|string',
        ]);
        try {
            $bal = new Bal();
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('bals', 'public');
                $bal->image = $imagePath;
            }
            $bal->name = $request->get('name');
            $bal->product_type_id = $request->get('product_type_id');
            $bal->purchase_order_id = $request->get('purchase_order_id');
            $bal->description = $request->get('description');
            $bal->save();

            return redirect()->route('bal.index')->with('success', 'Bal '.$bal->name.' berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan Bal, Error: '.$e->getMessage());
        }
    }

    public function edit($id){
        $bal = Bal::find($id);
        $product_types = ProductType::orderBy('name', 'ASC')->get();
        $purchase_orders = PurchaseOrder::orderBy('code', 'ASC')->get();
        return view('bals.edit', compact('product_types', 'purchase_orders', 'bal'));
    }

    public function update($id, Request $request){
        $request->validate([
            'image' => 'nullable|image|mimes:webp,png,jpg,jpeg,jfif,svg|max:2048',
            'name' => 'required|string|min:3|unique:osano.bals,name,'.$id,
            'product_type_id' => 'required|string|exists:osano.product_types,id',
            'purchase_order_id' => 'nullable|string|exists:osano.purchase_orders,id',
            'description' => 'nullable|string',
        ]);

        try {
            $bal = Bal::find($id);
            if ($request->hasFile('image')) {
                if ($bal->image && file_exists(storage_path('app/public/' . $bal->image))) {
                    unlink(storage_path('app/public/' . $bal->image));
                }
                $imagePath = $request->file('image')->store('bals', 'public');
                $bal->image = $imagePath;
            }
            $bal->name = $request->get('name');
            $bal->product_type_id = $request->get('product_type_id');
            $bal->purchase_order_id = $request->get('purchase_order_id');
            $bal->description = $request->get('description');
            $bal->save();

            return redirect()->route('bal.index')->with('success', 'Bal '.$bal->name.' berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui Bal, Error: '.$e->getMessage());
        }
    }

    public function destroy($id){
        try {
            $bal = Bal::find($id);
            $bal->delete();

            return redirect()->route('bal.index')->with('success', 'Bal '.$bal->name.' berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal menghapus Bal, Error: '.$e->getMessage());
        }
    }
}
