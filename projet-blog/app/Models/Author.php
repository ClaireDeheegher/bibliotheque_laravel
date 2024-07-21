<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
/**
 * Class Book
 * Contient les infos des livres
 * @mixin Builder
 * @package App
 */
class Author extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function books(){
        return $this->hasMany(Book::class);
    }
}
