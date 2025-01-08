<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\PackageType;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;

class PackageController extends Controller
{
    public function index(Request $request)
    {
        $filter = (object) [
            'q' => $request->get('q', ''),
            'jenis' => $request->get('jenis', ''),
        ];

        // Mengambil data unik untuk opsi filter
        $typeOptions = PackageType::all();

        // Query dasar
        $packages = Package::query();

        // Filter berdasarkan jenis paket
        if (!empty($filter->jenis)) {
            $packages->where('package_type_id', $filter->jenis);
        }

        // Filter berdasarkan pencarian umum (q)
        if (!empty($filter->q)) {
            $packages->where(function ($query) use ($filter) {
                $query->where('title', 'LIKE', '%' . $filter->q . '%')
                    ->orWhere('lama_hari', 'LIKE', '%' . $filter->q . '%')
                    ->orWhere('bandara', 'LIKE', '%' . $filter->q . '%');
            });
        }

        // Dapatkan hasil query
        $packages = $packages->get();

        // SEO data
        $seo = [
            'title' => 'Paket Umroh dan Haji - Tanur Muthmainnah',
        ];

        return view('package.index', compact('seo', 'packages', 'typeOptions', 'filter'));
    }


    public function show($slug){
        $package = Package::where('slug', $slug)->first();
        $seo = [
            'title' => "$package->title - Paket Tanur Muthmainnah",
            "image" => Voyager::image($package->image),
            "description" => $package->description,
        ];
        return view('package.show', compact('seo', 'package'));
    }
}
