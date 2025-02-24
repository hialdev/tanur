<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookChapter extends Model
{
    use HasFactory;

    public function sections(){
        return $this->hasMany(BookSection::class, 'chapter_id')->orderBy('order','asc');
    }
}
