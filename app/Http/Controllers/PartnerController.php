<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Partner;
use App\Models\PartnerPic;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index(Request $request){
        $filter = (object) [
            'q' => $request->get('search') ?? '',
            'field' => $request->get('field') ?? 'name',
            'order' => $request->get('order') ? ($request->get('order') == 'newest' ? 'desc' : 'asc') : 'asc',
        ];

        $partners = Partner::where('name', 'LIKE', '%'.$filter->q.'%')->orderBy($filter->field, $filter->order)->get();
        return view('partners.index', compact('partners', 'filter'));
    }

    public function add(){
        $cities = City::orderBy('city_name', 'asc')->get();
        return view('partners.add', compact('cities'));
    }

    public function store(Request $request){
        $request->validate([
            'image' => 'nullable|image|mimes:webp,png,jpg,jpeg,jfif,svg|max:2048',
            'name' => 'required|string|min:3|unique:osano.partners,name',
            'npwp' => 'nullable|numeric|digits_between:15,16',
            'email' => 'nullable|email',
            'phone' => 'nullable|numeric',
            'fax' => 'nullable|numeric',
            'description' => 'nullable|string',

            'city' => 'required|string',
            'postal_code' => 'required|numeric|min:4',
            'address' => 'required|string|min:4',
        ]);
        try {
            $partner = new Partner();
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('partners', 'public');
                $partner->image = $imagePath;
            }
            $partner->name = $request->get('name');
            $partner->npwp = $request->get('npwp');
            $partner->email = $request->get('email');
            $partner->phone = $request->get('phone');
            $partner->fax = $request->get('fax');
            $partner->description = $request->get('description');
            
            $partner->city = $request->get('city');
            $partner->postal_code = $request->get('postal_code');
            $partner->address = $request->get('address');
            $partner->save();

            return redirect()->route('partner.setting', $partner->id)->with('success', 'partner '.$partner->name.' berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan partner, Error: '.$e->getMessage());
        }
    }

    public function setting($id){
        $partner = Partner::find($id);
        $cities = City::orderBy('city_name', 'asc')->get();
        $pics = PartnerPic::where('partner_id', $id)->get();
        return view('partners.setting', compact('partner', 'cities', 'pics'));
    }
    
    public function update($id, Request $request){
        $request->validate([
            'image' => 'nullable|image|mimes:webp,png,jpg,jpeg,jfif,svg|max:2048',
            'name' => 'required|string|min:3|unique:osano.partners,name,'.$id,
            'npwp' => 'nullable|numeric|digits_between:15,16',
            'email' => 'nullable|email',
            'phone' => 'nullable|numeric',
            'fax' => 'nullable|numeric',
            'description' => 'nullable|string',

            'city' => 'required|string',
            'postal_code' => 'required|numeric|min:4',
            'address' => 'required|string|min:4',
        ]);

        try {
            $partner = Partner::find($id);
            if ($request->hasFile('image')) {
                if ($partner->image && file_exists(storage_path('app/public/' . $partner->image))) {
                    unlink(storage_path('app/public/' . $partner->image));
                }
                $imagePath = $request->file('image')->store('partners', 'public');
                $partner->image = $imagePath;
            }
            $partner->name = $request->get('name');
            $partner->npwp = $request->get('npwp');
            $partner->email = $request->get('email');
            $partner->phone = $request->get('phone');
            $partner->fax = $request->get('fax');
            $partner->description = $request->get('description');
            
            $partner->city = $request->get('city');
            $partner->postal_code = $request->get('postal_code');
            $partner->address = $request->get('address');
            $partner->save();


            return redirect()->route('partner.index')->with('success', 'partner '.$partner->name.' berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui partner, Error: '.$e->getMessage());
        }
    }

    public function destroy($id){
        try {
            $partner = Partner::find($id);
            $partner->delete();

            return redirect()->route('partner.index')->with('success', 'partner '.$partner->name.' berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal menghapus partner, Error: '.$e->getMessage());
        }
    }
}
