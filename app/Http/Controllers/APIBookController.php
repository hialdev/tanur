<?php

namespace App\Http\Controllers;

use App\Models\BookChapter;
use Illuminate\Http\Request;

class APIBookController extends Controller
{
    public function index(Request $request)
    {
        $limit = $request->input('limit', 100);
        $page = $request->input('page', 1);
        $query = $request->input('q', '');
        $desc = $request->input('desc', 0);
        $section = $request->input('with_section', 0);

        $book = BookChapter::when($query, function ($q) use ($query) {
                return $q->where('name', 'like', "%$query%");
            })
            ->orderBy('created_at', $desc ? 'desc' : 'asc')
            ->paginate($limit, ['*'], 'page', $page);

        if($section){
            $book = BookChapter::with('sections')->when($query, function ($q) use ($query) {
                return $q->where('name', 'like', "%$query%");
            })
            ->orderBy('created_at', $desc ? 'desc' : 'asc')
            ->paginate($limit, ['*'], 'page', $page);
        }
        return response()->json([
            'success' => true,
            'status' => 200,
            'data' => $book->items()
        ]);
    }

    public function show($id)
    {
        $book = BookChapter::with('sections')->find($id);

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
            'data' => $book
        ]);
    }
}
