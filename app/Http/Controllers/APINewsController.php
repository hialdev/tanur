<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;

class APINewsController extends Controller
{
    public function imageHost(){
        return response()->json([
            'success' => true,
            'status' => 200,
            'data' => Voyager::image('/'),
        ]);
    }
    public function index(Request $request)
    {
        $limit = $request->input('limit', 10);
        $page = $request->input('page', 1);
        $query = $request->input('q', '');
        $desc = $request->input('desc', 0);

        $news = News::when($query, function ($q) use ($query) {
                return $q->where('title', 'like', "%$query%")
                    ->orWhere('content', 'like', "%$query%");
            })
            ->orderBy('created_at', $desc ? 'desc' : 'asc')
            ->paginate($limit, ['*'], 'page', $page);

        return response()->json([
            'success' => true,
            'status' => 200,
            'data' => $news->items()
        ]);
    }

    public function latest(Request $request)
    {
        $limit = $request->input('limit', 10);
        $query = $request->input('q', '');
        $desc = $request->input('desc', 0);

        // Ambil berita yang is_featured = 1
        $featuredNews = News::when($query, function ($q) use ($query) {
                return $q->where('title', 'like', "%$query%")
                        ->orWhere('content', 'like', "%$query%");
            })
            ->where('is_featured', 1)
            ->orderBy('created_at', $desc ? 'desc' : 'asc')
            ->limit($limit)
            ->get();

        $remainingCount = $limit - $featuredNews->count();

        if ($remainingCount > 0) {
            // Ambil berita terbaru yang tidak termasuk dalam featuredNews
            $latestNews = News::when($query, function ($q) use ($query) {
                    return $q->where('title', 'like', "%$query%")
                            ->orWhere('content', 'like', "%$query%");
                })
                ->whereNotIn('id', $featuredNews->pluck('id')) // Hindari duplikasi
                ->orderBy('created_at', 'desc')
                ->limit($remainingCount)
                ->get();
        } else {
            $latestNews = collect(); // Jika sudah cukup, kosongkan latestNews
        }

        // Gabungkan kedua koleksi
        $news = $featuredNews->merge($latestNews);

        return response()->json([
            'success' => true,
            'status' => 200,
            'data' => $news
        ]);
    }


    public function show($id)
    {
        $news = News::find($id);

        if (!$news) {
            return response()->json([
                'success' => false,
                'status' => 404,
                'message' => 'News not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'status' => 200,
            'data' => $news
        ]);
    }
}
