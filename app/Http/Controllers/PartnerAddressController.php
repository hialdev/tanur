<?php

namespace App\Http\Controllers;

use App\Models\PartnerAddress;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PartnerAddressController extends Controller
{
    public function store(Request $request, $id){
        $request->merge([
            'partner_id' => (string) $id,
        ]);
        $request->validate([
            'name' => [
                'required', 'string', 'min:3',
                Rule::unique('osano.partner_addresses', 'name')
                    ->where(function ($query) use ($request) {
                        return $query->where('partner_id', $request->partner_id);
                    }),
            ],
            'partner_id' => 'required|string|exists:osano.partners,id',
            'city' => 'required|string|exists:cities,city_name',
            'postal_code' => 'required|numeric|min:4',
            'address' => 'required|string|min:4',
        ]);
        try {
            $address = new PartnerAddress();
            $address->partner_id = $request->get('partner_id');
            $address->name = $request->get('name');
            $address->city = $request->get('city');
            $address->postal_code = $request->get('postal_code');
            $address->address = $request->get('address');
            $address->save();

            return redirect()->route('partner.setting', $id)->with('success', 'Alamat Principal Pabrik / Lainnya dengan nama '.$address->name.' berhasil dibuat.')->with('redirect_hash', 'alamat-pabrik');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('redirect_hash', 'alamat-pabrik')->with('error', 'Gagal menambahkan alamat principal, Error: '.$e->getMessage());
        }
    }

    public function update($id, $address_id, Request $request){
        $request->merge([
            'partner_id' => (string) $id,
        ]);
        $request->validate([
            'name' => [
                'required', 'string', 'min:3',
                Rule::unique('osano.partner_addresses', 'name')
                    ->where(function ($query) use ($request) {
                        return $query->where('partner_id', $request->partner_id);
                    })
                    ->ignore($id),
            ],
            'partner_id' => 'required|string|exists:osano.partners,id',
            'city' => 'required|string|exists:cities,city_name',
            'postal_code' => 'required|numeric|min:4',
            'address' => 'required|string|min:4',
        ]);
        try {
            $address = PartnerAddress::find($address_id);
            $address->partner_id = $request->get('partner_id');
            $address->name = $request->get('name');
            $address->city = $request->get('city');
            $address->postal_code = $request->get('postal_code');
            $address->address = $request->get('address');
            $address->save();

            return redirect()->route('partner.setting', $id)->with('success', 'Alamat Principal Pabrik / Lainnya dengan nama '.$address->name.' berhasil diperbarui.')->with('redirect_hash', 'alamat-pabrik');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('redirect_hash', 'alamat-pabrik')->with('error', 'Gagal memperbarui alamat principal, Error: '.$e->getMessage());
        }
    }

    public function destroy($id, $address_id){
        try {
            $address = PartnerAddress::find($address_id);
            $address->delete();

            return redirect()->route('partner.setting', $id)->with('success', 'Alamat Principal Pabrik / Lainnya dengan nama '.$address->name.' berhasil dihapus.')->with('redirect_hash', 'alamat-pabrik');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('redirect_hash', 'alamat-pabrik')->with('error', 'Gagal menghapus alamat principal, Error: '.$e->getMessage());
        }
    }
}
