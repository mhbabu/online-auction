<?php

use App\Modules\Product\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductCategory::create([
            'name' => 'Live',
            'status' => 1
        ]);

        ProductCategory::create([
            'name' => 'Up Coming',
            'status' => 1
        ]);

        ProductCategory::create([
            'name' => 'Pre-biding',
            'status' => 1
        ]);
    }
}
