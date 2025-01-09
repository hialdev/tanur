<?php
namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;  // Import Log facade

class GeneralHelper
{
    protected $apiUrl = 'https://v6.exchangerate-api.com/v6';
    protected $api_exchange = '8c734af4a2574a02a4ea11b8';
    protected $weatherUrl = 'https://api.openweathermap.org/data/2.5/weather';

    public function getExchangeRate($from, $to, $updateInterval = 60)
    {
        $cacheKey = "exchange_rate_{$from}_to_{$to}";
        $timestampKey = "{$cacheKey}_timestamp";
        $exchangeRate = Cache::get($cacheKey);

        if (!$exchangeRate) {
            $url = "{$this->apiUrl}/{$this->api_exchange}/latest/{$from}";

            try {
                $response = Http::timeout(10)
                    ->withHeaders(['Content-Type' => 'application/json'])
                    ->get($url);

                if ($response->successful()) {
                    $data = $response->json();
                    if (isset($data['conversion_rates'][$to])) {
                        $rate = $data['conversion_rates'][$to];

                        // Simpan kurs dan timestamp ke cache
                        Cache::put($cacheKey, $rate, now()->addMinutes($updateInterval));
                        Cache::put($timestampKey, now(), now()->addMinutes($updateInterval));

                        return $this->formatCurrency($rate, $to);
                    }
                }
            } catch (\Exception $e) {
                Log::error('Exchange Rate API Exception', ['message' => $e->getMessage(), 'url' => $url]);
            }

            return null;
        }

        return $this->formatCurrency($exchangeRate, $to);
    }

    private function formatCurrency($amount, $currency)
    {
        $formatted = number_format($amount, 2, ',', '.');
        return "{$formatted} {$currency}";
    }

    public static function formatRupiah($angka)
    {
        return 'Rp ' . number_format($angka, 0, ',', '.');
    }

    public function getWeather($city, $updateInterval = 2)
    {
        $cacheKey = "weather_{$city}";
        $timestampKey = "{$cacheKey}_timestamp";
        $weatherData = Cache::get($cacheKey);

        if (!$weatherData) {
            $response = Http::withHeaders(['Content-Type' => 'application/json'])
                ->get($this->weatherUrl, [
                    'q' => $city,
                    'appid' => '9f9375d560d0bce7b22c61813784d142',
                    'units' => 'metric',
                ]);

            if ($response->successful()) {
                $data = $response->json();
                if (isset($data['weather'][0])) {
                    $weatherData = [
                        'icon' => 'https://openweathermap.org/img/wn/' . $data['weather'][0]['icon'] . '@2x.png',
                        'weather' => $data['weather'][0]['description'],
                        'location' => $data['name'],
                        'temperature' => $data['main']['temp'] . '°C',
                    ];

                    // Simpan data cuaca dan timestamp ke cache
                    Cache::put($cacheKey, $weatherData, now()->addMinutes($updateInterval));
                    Cache::put($timestampKey, now(), now()->addMinutes($updateInterval));

                    return $weatherData;
                }
            }

            return null;
        }

        return $weatherData;
    }

    public function getLastUpdated($cacheKey)
    {
        $timestampKey = "{$cacheKey}_timestamp";
        $lastUpdated = Cache::get($timestampKey);

        if ($lastUpdated) {
            return now()->diffForHumans($lastUpdated, true); // Format seperti "2 jam yang lalu"
        }

        return 'Belum pernah diperbarui';
    }

    public static function waLink($text){
        return "https://wa.me/".setting('site.whatsapp')."?text=$text";
    }

}
