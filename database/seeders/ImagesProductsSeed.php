<?php

namespace Database\Seeders;

use App\Models\ImagesProducts;
use Illuminate\Database\Seeder;

class ImagesProductsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ImagesProducts::create(
            [
                'image' => 'caja1.2.jpg',
                'product_id' => 1
            ]
        );
        ImagesProducts::create([
            'image' => 'caja1.3.jpg',
            'product_id' => 1
        ]);
        ImagesProducts::create([
            'image' => 'caja1.jpg',
            'product_id' => 1
        ]);
        ImagesProducts::create([
            'image' => 'caja2.2.jpg',
            'product_id' => 2
        ]);
        ImagesProducts::create([
            'image' => 'caja2.3.jpg',
            'product_id' => 2
        ]);
        ImagesProducts::create([
            'image' => 'caja2.jpg',
            'product_id' => 2
        ]);
        ImagesProducts::create([
            'image' => 'caja2.jpg',
            'product_id' => 3
        ]);
        ImagesProducts::create([
            'image' => 'caja3.2.jpg',
            'product_id' => 3
        ]);
        ImagesProducts::create([
            'image' => 'caja3.3.jpg',
            'product_id' => 3
        ]);
    }
}
