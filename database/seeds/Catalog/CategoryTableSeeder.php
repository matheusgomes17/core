<?php

use MVG\Models\Catalog\Category;
use Illuminate\Database\Seeder;

/**
 * Class CategoryTableSeeder.
 */
class CategoryTableSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();

        Category::create([
            'name'        => 'Indio Gigante',
            'slug'        => 'indio-gigante',
            'description' => 'Categoria principal',
            'parent_id'   => null,
        ]);

        Category::create([
            'name'        => 'Reprodutores',
            'slug'        => 'reprodutores',
            'description' => 'Categoria de Reprodutores',
            'parent_id'   => 1,
        ]);

        Category::create([
            'name'        => 'Matrizes',
            'slug'        => 'matrizes',
            'description' => 'Categoria principal',
            'parent_id'   => 1,
        ]);

        Category::create([
            'name'        => 'Frangos',
            'slug'        => 'frangos',
            'description' => 'Categoria de Frangos',
            'parent_id'   => 1,
        ]);

        Category::create([
            'name'        => 'Frangas',
            'slug'        => 'frangas',
            'description' => 'Categoria de Frangas',
            'parent_id'   => 1,
        ]);

        Category::create([
            'name'        => 'Pintinhos',
            'slug'        => 'pintinhos',
            'description' => 'Categoria de Pintinhos',
            'parent_id'   => 1,
        ]);

        Category::create([
            'name'        => 'Ovos',
            'slug'        => 'ovos',
            'description' => 'Categoria de Ovos',
            'parent_id'   => 1,
        ]);

        $this->enableForeignKeys();
    }
}
