<?php

namespace App\Http\Controllers;

use App\Models\BookChapter;
use App\Models\BookSection;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;

class APIBookController extends Controller
{
    public function index(Request $request)
    {
        $limit = $request->input('limit', 100);
        $page = $request->input('page', 1);
        $query = $request->input('q', '');
        $desc = $request->input('desc', 0);

        $books = BookChapter::when($query, function ($q) use ($query) {
                return $q->where('name', 'like', "%$query%");
            })
            ->orderBy('created_at', $desc ? 'desc' : 'asc')
            ->paginate($limit, ['*'], 'page', $page);
        $books->getCollection()->transform(function ($item) {
            return $this->formatIt($item);
        });

        return response()->json([
            'success' => true,
            'status' => 200,
            'data' => $books->items()
        ]);
    }

    public function section($id)
    {
        $sections = BookSection::where('chapter_id', $id)
                ->select('id', 'order', 'title', 'slug', 'created_at', 'updated_at')
                ->get();

        if (!$sections) {
            return response()->json([
                'success' => false,
                'status' => 404,
                'message' => 'Book not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'status' => 200,
            'data' => $sections,
        ]);
    }

    public function content($id)
    {
        $book = BookSection::find($id);

        if (!$book) {
            return response()->json([
                'success' => false,
                'status' => 404,
                'message' => 'Book not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'status' => 200,
            'data' => $this->formatIt($book),
        ]);
    }

    private function formatIt($item)
    {
        return [
            'id' => $item->id,
            'name' => $item->name,
            'slug' => $item->slug,
            'icon' => Voyager::image($item->icon),
            'description' => $item->description,
            'created_at' => $item->created_at,
            'updated_at' => $item->updated_at,
        ];
    }
}

