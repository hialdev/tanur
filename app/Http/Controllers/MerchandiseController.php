<?php

namespace App\Http\Controllers;

use App\Models\JumbotronMerch;
use App\Models\Merchandise;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;

class MerchandiseController extends Controller
{
    public function index(Request $request){
        if(!setting('site.show_merchandise')){
            return view('merchandise.comingsoon');
        }
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

        return view('merchandise.index', compact('seo', 'merchandises', 'merchJumbotrons', 'filter'));
    }

    public function show($slug){
        if(!setting('site.show_merchandise')){
            return view('merchandise.comingsoon');
        }
        $merch = Merchandise::where('slug', $slug)->first();
        $reccomend_merchs = Merchandise::where('slug', '!=', $slug)->latest()->limit(5)->get();
        $seo = [
            'title' => "$merch->title - Merchandise Tanur Muthmainnah",
            "image" => Voyager::image($merch->image),
        ];
        return view('merchandise.show', compact('seo', 'merch', 'reccomend_merchs'));
    }
}
