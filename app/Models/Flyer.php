<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Flyer extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'priode', 'user_id', 'title', 'open_seat', 'left_seat', 'image', 'description'];

    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * Set UUID otomatis sebelum menyimpan data
     */
    protected static function booted()
    {
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
        static::deleting(function ($model) {
            if ($model->image) {
                Storage::disk('public')->delete($model->image);
            }
            $model->views()->delete();
        });
    }

    /**
     * Relasi dengan FlyerView
     */
    public function views()
    {
        return $this->hasMany(FlyerView::class, 'flyer_id');
    }

    public function md(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function viewsCount(){
        $views = $this->views();
        return $views->count();
    }

    /**
     * Mendapatkan statistik Flyer
     */
    public function statFlyer()
    {
        return [
            'total_view' => $this->views()->count(),
            'locations' => $this->views()
                ->select('location', DB::raw('count(*) as count'))
                ->groupBy('location')
                ->get(),
            'created_at' => $this->created_at,
        ];
    }

}
