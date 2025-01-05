<?php

namespace App\Http\Controllers;

use App\Models\JumbotronMerch;
use App\Models\Merchandise;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;

class MerchandiseController extends Controller
{
    public function index(Request $request){
        $filter = (object) [
            'q' => $request->get('q') ?? '',
            'order' => $request->get('order') ?? 'desc',
            'price' => $request->get('price') == 'high' ? 'desc' : 'asc',
        ];
        $merchJumbotrons = JumbotronMerch::all();
        $merchandises = Merchandise::where('title', 'LIKE', '%'.$filter->q.'%')
                            ->orderBy('created_at', $filter->order)
                            ->orderBy('price', $filter->price)
                            ->get();
        $seo = [
            'title' => "Merchandise Tanur Muthmainnah",
        ];

        return view('merchandise.index', compact('seoeb', 'merchandises', 'merchJumbotrons', 'filter'));
    }

    public function show($slug){
        $merch = Merchandise::where('slug', $slug)->first();
        $reccomend_merchs = Merchandise::where('slug', '!=', $slug)->latest()->limit(5)->get();
        $seo = [
            'title' => "$merch->title - Merchandise Tanur Muthmainnah",
            "image" => Voyager::image($merch->image),
        ];
        return view('merchandise.show', compact('seoeb', 'merch', 'reccomend_merchs'));
    }
}