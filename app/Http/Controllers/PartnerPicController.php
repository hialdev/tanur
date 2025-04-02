<?php

namespace App\Http\Controllers;

use App\Models\PartnerPic;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PartnerPicController extends Controller
{
    public function store(Request $request, $id){
        $request->merge([
            'partner_id' => (string) $id,
        ]);
        $request->validate([
            'image' => 'nullable|image|mimes:webp,png,jpg,jpeg,jfif,svg|max:2048',
            'partner_id' => 'required|string|exists:osano.partners,id',
            'parent_pic_id' => 'nullable|string|exists:osano.partner_pics,id',
            'name' => [
                'required', 'string', 'min:3',
                Rule::unique('osano.partner_pics', 'name')
                    ->where(function ($query) use ($request) {
                        return $query->where('partner_id', $request->partner_id);
                    }),
            ],
            'email' => 'nullable|email|min:4',
            'phone' => 'nullable|numeric|min:4',
            'description' => 'nullable|string|min:4',
        ]);
        try {
            $pic = new PartnerPic();
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('partners/pics', 'public');
                $pic->image = $imagePath;
            }
            $pic->partner_id = $request->get('partner_id');
            $pic->name = $request->get('name');
            $pic->email = $request->get('email');
            $pic->phone = $request->get('phone');
            $pic->description = $request->get('description');
            $pic->parent_pic_id = $request->get('parent_pic_id');
            $pic->save();

            return redirect()->route('partner.setting', $id)->with('success', 'PIC atau Sales Principal dengan nama '.$pic->name.' berhasil dibuat.')->with('redirect_hash', 'pic');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('redirect_hash', 'pic')->with('error', 'Gagal menambahkan PIC atau Sales principal, Error: '.$e->getMessage());
        }
    }

    public function update($id, $pic_id, Request $request){
        $request->merge([
            'partner_id' => (string) $id,
        ]);
        $request->validate([
            'image' => 'nullable|image|mimes:webp,png,jpg,jpeg,jfif,svg|max:2048',
            'partner_id' => 'required|string|exists:osano.partners,id',
            'parent_pic_id' => 'nullable|string|exists:osano.partner_pics,id',
            'name' => [
                'required', 'string', 'min:3',
                Rule::unique('osano.partner_pics', 'name')
                    ->where(function ($query) use ($request) {
                        return $query->where('partner_id', $request->partner_id);
                    })
                    ->ignore($request->id),
            ],
            'email' => 'nullable|email|min:4',
            'phone' => 'nullable|numeric|min:4',
            'description' => 'nullable|string|min:4',
        ]);
        try {
            $pic = PartnerPic::find($pic_id);
            if ($request->hasFile('image')) {
                if ($pic->image && file_exists(storage_path('app/public/' . $pic->image))) {
                    unlink(storage_path('app/public/' . $pic->image));
                }
                $imagePath = $request->file('image')->store('partners/pics', 'public');
                $pic->image = $imagePath;
            }
            $pic->partner_id = $request->get('partner_id');
            $pic->name = $request->get('name');
            $pic->email = $request->get('email');
            $pic->phone = $request->get('phone');
            $pic->description = $request->get('description');
            $pic->parent_pic_id = $request->get('parent_pic_id');
            $pic->save();

            return redirect()->route('partner.setting', $id)->with('success', 'PIC atau Sales Principal dengan nama '.$pic->name.' berhasil diperbarui.')->with('redirect_hash', 'pic');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('redirect_hash', 'pic')->with('error', 'Gagal memperbarui PIC atau Sales principal, Error: '.$e->getMessage());
        }
    }

    public function destroy($id, $pic_id){
        try {
            $pic = PartnerPic::find($pic_id);
            $pic->delete();

            return redirect()->route('partner.setting', $id)->with('success', 'PIC atau Sales Principal dengan nama '.$pic->name.' berhasil dihapus.')->with('redirect_hash', 'pic');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('redirect_hash', 'pic')->with('error', 'Gagal menghapus PIC atau Sales principal, Error: '.$e->getMessage());
        }
    }
}
