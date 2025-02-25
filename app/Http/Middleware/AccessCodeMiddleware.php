<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AccessCodeMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $apiKey = $request->header('Authorization'); // API Key dikirim via Authorization
        $validApiKey = env('API_CODE', 'bacadoaduluyaanakanakbismillahirrahmanirrahim'); 

        if (!$apiKey || $apiKey !== $validApiKey) {
            return response()->json([
                'success' => false,
                'status' => 403,
                'message' => 'Unauthorized'
            ], 403);
        }

        return $next($request);
    }
}
