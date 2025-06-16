<?php

namespace App\Http\Controllers;

use App\Models\RequestOrderProduct;
use App\Models\RequestProcess;
use App\Models\RequestProcessProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RequestProcessProductController extends Controller
{
    public function store($id, Request $request){
        $request->merge([
            'request_process_id' => $id,
        ]);
        $request->validate([
            'product_id.*' => 'required|string|exists:osano.products,id',
            'process_qty.*' => 'required|numeric|min:1',
            'from_id.*' => [
                'required',
                'uuid',
                function ($attribute, $value, $fail) {
                    if (
                        !DB::connection('osano')->table('stores')->where('id', $value)->exists() &&
                        !DB::connection('osano')->table('warehouses')->where('id', $value)->exists()
                    ) {
                        $fail('The selected '.$attribute.' is invalid.');
                    }
                }
            ],
        ]);

        try {
            $process = RequestProcess::findOrFail($id);
            $from_type = null;

            foreach ($request->get('product_id') as $key => $productId) {
                $fromId = $request->get('from_id')[$key];
                $processQty = $request->get('process_qty')[$key];

                $remainingStock = 0;
                if (\App\Models\Store::where('id', $fromId)->exists()) {
                    $store = \App\Models\Store::find($fromId);
                    if (method_exists($store, 'getProductRemaining')) {
                        $remainingStock = $store->getProductRemaining($productId);
                    }
                    $from_type = 'store';
                } elseif (\App\Models\Warehouse::where('id', $fromId)->exists()) {
                    $warehouse = \App\Models\Warehouse::find($fromId);
                    if (method_exists($warehouse, 'getProductRemaining')) {
                        $remainingStock = $warehouse->getProductRemaining($productId);
                    }
                    $from_type = 'warehouse';
                }

                if ($processQty > $remainingStock) {
                    return redirect()->back()->withInput()->with('error', 'Qty '.$processQty.' melebihi stok tersedia ('.$remainingStock.') di lokasi asal.')->with('redirect_hash', 'produk');
                }

                $reqprocess = RequestProcessProduct::where('product_id', $productId)
                    ->where('request_process_id', $process->id)
                    ->first();
                if ($reqprocess && $reqprocess->remaining_qty < $processQty) {
                    return redirect()->back()->withInput()->with('error', 'Terdapat qty '.$processQty.' yang melebih stock belum di proses '.$reqprocess->remaining_qty)->with('redirect_hash', 'produk');
                }
            }

            foreach ($request->get('product_id') as $key => $productId){
                $reqprocess = RequestProcessProduct::where('product_id', $productId)
                    ->where('request_process_id', $process->id)
                    ->first();
                if ($reqprocess && $reqprocess->remaining_qty < $request->get('process_qty')[$key]) {
                    return redirect()->back()->withInput()->with('error', 'Terdapat qty '.$request->get('process_qty')[$key].' yang melebih stock belum di proses '.$reqprocess->remaining_qty)->with('redirect_hash', 'produk');
                }
            }

            foreach ($request->get('product_id') as $key => $productId) {
                $reqproduct = RequestOrderProduct::where('product_id', $productId)
                    ->where('request_order_id', $process->requestOrder->id)
                    ->first();

                RequestProcessProduct::create([
                    'request_process_id' => $id,
                    'from_type' => $from_type,
                    'from_id' => $request->get('from_id')[$key],
                    'product_id' => $productId,
                    'length' => $reqproduct->length ?? null,
                    'qty' => $request->get('process_qty')[$key],
                ]);
            }
            $process->save();

            session()->forget('cart_'.$id);
            return redirect()->route('request-process.setting', ['id' => $id])->with('success', 'Product Pemrosesan Permintaan Client berhasil disimpan.')->with('redirect_hash', 'produk');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal menyimpan Product Pemrosesan Permintaan Client, Error: '.$e->getMessage())->with('redirect_hash', 'produk');
        }
    }

}
