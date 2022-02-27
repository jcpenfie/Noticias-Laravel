<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\usuario;
use App\Models\noticia;
use App\Models\Categoria;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $cat = new Categoria();
        $cat ->id = 1;
        $cat ->nombre = "Economía";
        $cat->save();
        $cat = new Categoria();
        $cat ->id = 2;
        $cat ->nombre = "Internacional";
        $cat->save();
        $cat = new Categoria();
        $cat ->id = 3;
        $cat ->nombre = "Sociedad";
        $cat->save();
        $cat = new Categoria();
        $cat ->id = 4;
        $cat ->nombre = "Deportes";
        $cat->save();
        $cat = new Categoria();
        $cat ->id = 5;
        $cat ->nombre = "Cultura";
        $cat->save();

        usuario::factory(5)->create();
        noticia::factory(30)->create();
    }
}
// php artisan migrate --seed