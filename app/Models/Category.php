<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $primaryKey = 'category_id';
    protected $keyType = 'string';
    protected $guarded = ['name-translite'];
    public $incrementing = false;   

    // Выгружаем из responce json (из тз 1с) в бд, проверяем изменения. Если надо добавляем новые записи.
}
