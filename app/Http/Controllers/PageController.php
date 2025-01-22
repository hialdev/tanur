<?php

namespace App\Http\Controllers;

use App\Helpers\GeneralHelper;
use App\Models\Facility;
use App\Models\FeaturedReview;
use App\Models\Jumbotron;
use App\Models\Legalitas;
use App\Models\News;
use App\Models\Office;
use App\Models\Package;
use App\Models\PackageType;
use App\Models\Review;
use App\Models\Socmed;
use App\Models\Team;
use App\Models\Timeline;
use App\Models\Value;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $helper = new GeneralHelper();
        $excUpdated = $helper->getLastUpdated('exchange_rate_SAR_to_IDR');
        $kurs = $helper->getExchangeRate('SAR','IDR');

        $jumbotrons = Jumbotron::where('is_active', 1)->get();
        $values = Value::all();
        $type_packages = PackageType::all();
        $facilities = Facility::all();
        $featured_reviews = FeaturedReview::all();
        $reviews = Review::latest()->limit(4)->get();
        $news = News::latest()->limit(4)->get();
        $socmeds = Socmed::all();
        $packages = Package::where('is_featured', 1)->limit(8)->get();
        if ($packages->isEmpty()) {
            $packages = $packages->merge(Package::latest()->limit(5)->get());
        }
        $runnings = \App\Models\Running::orderBy('urutan', 'asc')->get();

        return view('index', compact('excUpdated', 'kurs',
                                     'jumbotrons', 'values', 'type_packages', 'facilities', 'featured_reviews', 'reviews', 'news', 'socmeds', 'packages', 'runnings'
                                    ));
    }

    public function about(){
        $values = Value::all();
        $legalitas = Legalitas::all();
        $teams = Team::orderBy('urutan', 'ASC')->get();
        $seo = [
            'title' => 'Tentang Tanur Muthmainnah',
        ];

        $columns = isset($_COOKIE['timeline_columns']) ? (int) $_COOKIE['timeline_columns'] : 4;
        $timelines = Timeline::orderBy('date', 'ASC')->get();

        $timelinesArray = $timelines->toArray();
        $chunks = array_chunk($timelinesArray, $columns);

        foreach ($chunks as $index => &$chunk) {
            if ($index % 2 == 1) { // Setiap blok ke-2, ke-4, dst, dibalik
                $chunk = array_reverse($chunk);
            }
        }

        $timelinesReverse = collect(array_merge(...$chunks));


        return view('about', compact('seo', 'timelines', 'columns', 'timelinesReverse', 'values', 'legalitas', 'teams'));
    }

    public function contact(){
        $offices = Office::all();
        $seo = [
            'title' => 'Hubungi Kami',
        ];
        return view('contact', compact('seo', 'offices'));
    }
}
