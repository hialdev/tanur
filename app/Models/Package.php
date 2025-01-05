<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    public function type(){
        return $this->belongsTo(PackageType::class, 'package_type_id');
    }
}
