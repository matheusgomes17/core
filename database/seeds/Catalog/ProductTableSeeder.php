<?php

use MVG\Models\Catalog\Product;
use Illuminate\Database\Seeder;

/**
 * Class ProductTableSeeder.
 */
class ProductTableSeeder extends Seeder
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

        Product::create([
            'name'        => 'Indio Gigante',
            'slug'        => 'indio-gigante',
            'description' => 'Categoria principal',
            'parent_id'   => null,
        ]);

        $this->enableForeignKeys();
    }
}
