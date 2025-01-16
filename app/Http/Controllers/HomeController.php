<?php

namespace App\Http\Controllers;

use App\Models\Flyer;
use App\Models\FlyerView;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $role = auth()->user()->getRoleNames()[0];
        $isAdmin = in_array($role, ['admin', 'developer']);

        // Menghitung Total Views Hari Ini dan Kemarin
        $todayViewsCount = !$isAdmin ? FlyerView::whereHas('flyer', function ($query){
                                $query->where('user_id', auth()->user()->id);
                            })->whereDate('created_at', Carbon::today())->count()
                            : FlyerView::whereDate('created_at', Carbon::today())->count();
        $yesterdayViewsCount = !$isAdmin ? FlyerView::whereHas('flyer', function ($query){
                                $query->where('user_id', auth()->user()->id);
                            })->whereDate('created_at', Carbon::yesterday())->count()
                            : FlyerView::whereDate('created_at', Carbon::yesterday())->count();

        // Hitung Pertumbuhan
        $growthPercentage = $this->calculateGrowth($todayViewsCount, $yesterdayViewsCount);

        // Menentukan Pertumbuhan
        $isGrowth = $growthPercentage >= 0;

        // Menghitung Hourly Views
        $hourlyData = $this->getHourlyData(
            $isAdmin ? FlyerView::whereDate('created_at', Carbon::today())->get() : 
            FlyerView::whereHas('flyer', function ($query) {
                $query->where('user_id', auth()->user()->id);
            })->whereDate('created_at', Carbon::today())->get()
        );

        //dd($isAdmin, $todayViewsCount, Carbon::today(), $yesterdayViewsCount,Carbon::yesterday(), $growthPercentage, $hourlyData);
        if ($isAdmin) {
            $count = (object)[
                'user' => User::withoutRole('developer')->count(),
                'flyer' => Flyer::count(),
                'views' => FlyerView::count(),
            ];

            $latest_views = FlyerView::latest()->limit(5)->with('flyer')->get();
        } else {
            $user = auth()->user();
            $totalViews = $user->flyers->sum(function ($flyer) {
                return $flyer->views->count();
            });

            $count = (object)[
                'user' => User::role('marketing')->count(),
                'flyer' => Flyer::where('user_id', $user->id)->count(),
                'views' => $totalViews,
            ];

            $latest_views = FlyerView::whereHas('flyer', function ($query) {
                $query->where('user_id', auth()->user()->id);
            })
            ->with('flyer')
            ->latest()->limit(5)
            ->get();
        }

        return view('welcome', compact('count', 'latest_views', 'hourlyData', 'todayViewsCount', 'growthPercentage', 'isGrowth'));
    }

    private function calculateGrowth($current, $previous) {
        if ($previous == 0) {
            return $current > 0 ? 100 : 0;
        }
        return (($current - $previous) / $previous) * 100;
    }

    private function getHourlyData($views)
    {
        $hourlyViews = $views->groupBy(function ($view) {
            return Carbon::parse($view->created_at)->format('H');
        })->map(function ($group) {
            return $group->count();
        });

        $hourlyData = [];
        for ($i = 0; $i < 24; $i++) {
            $hour = str_pad($i, 2, '0', STR_PAD_LEFT);
            $hourlyData[] = $hourlyViews->get($hour, 0);
        }
        return $hourlyData;
    }

}
