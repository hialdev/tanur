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
        $meccaWeather = $helper->getWeather('mecca');
        $madinahWeather = $helper->getWeather('medina');
        $meccaUpdated = $helper->getLastUpdated('weather_mecca');
        $madinahUpdated = $helper->getLastUpdated('weather_medina');
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

        return view('index', compact('meccaWeather', 'madinahWeather', 'meccaUpdated', 'madinahUpdated', 'excUpdated', 'kurs',
                                     'jumbotrons', 'values', 'type_packages', 'facilities', 'featured_reviews', 'reviews', 'news', 'socmeds', 'packages'
                                    ));
    }

    public function about(){
        $values = Value::all();
        $legalitas = Legalitas::all();
        $teams = Team::orderBy('urutan', 'ASC')->get();
        $seo = [
            'title' => 'Tentang Tanur Muthmainnah',
        ];
        $timelines = Timeline::orderBy('date', 'ASC')->get();

        return view('about', compact('seo', 'timelines', 'values', 'legalitas', 'teams'));
    }

    public function contact(){
        $offices = Office::all();
        $seo = [
            'title' => 'Hubungi Kami',
        ];
        return view('contact', compact('seo', 'offices'));
    }
}
