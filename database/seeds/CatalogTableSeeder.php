<?php

use Illuminate\Database\Seeder;

/**
 * Class CatalogTableSeeder.
 */
class CatalogTableSeeder extends Seeder
{
    use DisableForeignKeys, TruncateTable;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();

        $this->truncateMultiple([
            config('catalog.products_table'),
            config('catalog.categories_table'),
        ]);

        $this->call(CategoryTableSeeder::class);
        //$this->call(ProductTableSeeder::class);

        $this->enableForeignKeys();
    }
}
