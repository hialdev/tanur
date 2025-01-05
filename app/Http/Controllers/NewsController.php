<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;

class NewsController extends Controller
{
    public function index(Request $request){
        $filter = (object) [
            'q' => $request->get('q') ?? '',
            'order' => $request->get('order') ?? 'desc',
        ];
        $featured_news = News::where('is_featured', 1)->get();
        $news = News::where('title', 'LIKE', '%'.$filter->q.'%')
                            ->orderBy('created_at', $filter->order)
                            ->get();
        $seo = [
            'title' => "Berita - Tanur Muthmainnah",
        ];
        return view('news.index', compact('seo', 'news','featured_news', 'filter'));
    }

    public function show($slug){
        $news = News::where('slug', $slug)->first();
        $reccomend_news = News::where('slug', '!=', $slug)->latest()->limit(5)->get();
        $seo = [
            'title' => "$news->title - Berita Tanur Muthmainnah",
            "image" => Voyager::image($news->image),
            "description" => $news->excerpt,
        ];
        return view('news.show', compact('seo', 'news', 'reccomend_news'));
    }
}
