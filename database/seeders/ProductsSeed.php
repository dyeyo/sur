<?php

namespace Database\Seeders;

use App\Models\Products;
use Illuminate\Database\Seeder;

class ProductsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Products::create(
            [
                'name' => 'caja1',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis illo adipisci beatae dolores odio ipsum cum fuga ratione doloribus. Tempore sit velit quae nesciunt dignissimos consequatur dolore earum blanditiis odio?',
                'price' => 1000,
                'stock' => 60
            ]
        );
        Products::create(
            [
                'name' => 'caja2',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis illo adipisci beatae dolores odio ipsum cum fuga ratione doloribus. Tempore sit velit quae nesciunt dignissimos consequatur dolore earum blanditiis odio?',
                'price' => 1000,
                'stock' => 60
            ],
        );
        Products::create(

            [
                'name' => 'caja3',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis illo adipisci beatae dolores odio ipsum cum fuga ratione doloribus. Tempore sit velit quae nesciunt dignissimos consequatur dolore earum blanditiis odio?',
                'price' => 1000,
                'stock' => 60
            ],

        );
    }
}
