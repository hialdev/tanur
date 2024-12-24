<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class FlyerView extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'flyer_id', 'location'];

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
    }

    /**
     * Relasi ke Flyer
     */
    public function flyer()
    {
        return $this->belongsTo(Flyer::class, 'flyer_id');
    }
}
