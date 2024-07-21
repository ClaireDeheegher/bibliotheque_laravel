<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Book
 * Contient les infos des livres
 * @mixin Builder
 * @package App
 */
class Book extends Model
{
    use HasFactory;
    public $timestamps = false;
}
