<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request){
        $filter = (object) [
            'q' => $request->get('search') ?? '',
            'field' => $request->get('field') ?? 'name',
            'order' => $request->get('order') ? ($request->get('order') == 'newest' ? 'desc' : 'asc') : 'asc',
        ];

        $customers = Customer::query()
            ->where('name', 'LIKE', '%' . $filter->q . '%');
        $customers->orderBy($filter->field, $filter->order);
        $customers = $customers->get();

        $cities = City::orderBy('city_name', 'ASC')->get();

        return view('customers.index', compact('customers', 'filter', 'cities'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string',
            'email' => 'nullable|string|unique:osano.customers,email',
            'phone' => 'nullable|string|unique:osano.customers,phone',
            'description' => 'nullable|string',
            
            'city' => 'nullable|string',
            'postal_code' => 'nullable|numeric|min:4',
            'address' => 'nullable|string|min:4',
        ]);
        try {

            $customer = new Customer();
            $customer->name = $request->get('name');
            $customer->email = $request->get('email');
            $customer->phone = $request->get('phone');
            $customer->description = $request->get('description');
            
            $customer->city = $request->get('city');
            $customer->postal_code = $request->get('postal_code');
            $customer->address = $request->get('address');
            $customer->save();

            return redirect()->back()->with('success', 'Customer '.$customer->name.' berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan Customer, Error: '.$e->getMessage());
        }
    }

    public function update($id, Request $request){
        $request->validate([
            'name' => 'required|string',
            'email' => 'nullable|string|unique:osano.customers,email,'.$id,
            'phone' => 'nullable|string|unique:osano.customers,phone,'.$id,
            'description' => 'nullable|string',
            
            'city' => 'nullable|string',
            'postal_code' => 'nullable|numeric|min:4',
            'address' => 'nullable|string|min:4',
        ]);
        try {
            $customer = Customer::find($id);
            $customer->name = $request->get('name');
            $customer->email = $request->get('email');
            $customer->phone = $request->get('phone');
            $customer->description = $request->get('description');
            
            $customer->city = $request->get('city');
            $customer->postal_code = $request->get('postal_code');
            $customer->address = $request->get('address');
            $customer->save();

            return redirect()->route('customer.index')->with('success', 'Customer '.$customer->name.' berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui Customer, Error: '.$e->getMessage());
        }
    }

    public function destroy($id){
        try {
            $customer = Customer::find($id);
            if($customer->packs->count() > 0){
                return redirect()->back()->with('error', 'Gagal menghapus Customer, Customer '.$customer->name.' memiliki data Pengemasan, Hapus terlebih dahulu atau perbarui ke Customer yang lain agar dapat menghapus Customer.');
            }
            if($customer->products->count() > 0){
                return redirect()->back()->with('error', 'Gagal menghapus Customer, Customer '.$customer->name.' terhubung ke data produk, Kelola nilai Customer pada product terkait dahulu untuk menghapus Customer.');
            }
            $customer->delete();

            return redirect()->route('customer.index')->with('success', 'Customer '.$customer->name.' berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal menghapus Customer, Error: '.$e->getMessage());
        }
    }
}
