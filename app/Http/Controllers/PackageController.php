<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\PackageType;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;

class PackageController extends Controller
{
    public function index(Request $request){
        $filter = (object) [
            'q' => $request->get('q') ?? '',
            'total' => $request->get('total') ?? '',
            'jenis' => $request->get('jenis') ?? '',
            'bandara' => $request->get('bandara') ?? '',
        ];
        $lamaHariOptions = Package::pluck('lama_hari')->unique();
        $bandaraOptions = Package::pluck('bandara')->unique();
        $typeOptions = PackageType::all();
        $packages = Package::where('title', 'LIKE', '%'.$filter->q.'%')
                            ->where('lama_hari', 'LIKE', '%'.$filter->total.'%')
                            ->where('package_type_id', 'LIKE', '%'.$filter->jenis.'%')
                            ->where('bandara', 'LIKE', '%'.$filter->bandara.'%')
                            ->get();
        $seo = [
            'title' => 'Paket Umroh dan Haji - Tanur Muthmainnah',
        ];

        return view('package.index', compact('seo', 'packages', 'typeOptions', 'bandaraOptions', 'filter', 'lamaHariOptions'));
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
