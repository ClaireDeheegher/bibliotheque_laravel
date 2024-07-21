<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class books extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
           'name'=>Str::random(10),
           'author'=>Str::random(10),
           'publisher'=>Str::random(10),
           'isbn'=>Str::random(13),
            'pages'=>Str::random(10),
            'language'=>Str::random(10),
            'resume'=>Str::random(10),
        ]);
    }
}
