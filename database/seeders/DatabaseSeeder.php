<?php

namespace Database\Seeders;

use App\Models\Kanban;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Mee Admin',
            'email' => 'admin@mail.com',
        ]);

        $this->call(ComponentCategoriesSeeder::class);
        $this->call(ComponentsTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(OrderItemsTableSeeder::class);
        $this->call(SellsTableSeeder::class);
        $this->call(SellItemsTableSeeder::class);

        Kanban::create(
            [
                'board' => json_encode(
                    [
                        [
                            "id" => Str::orderedUuid(),
                            "title" => "Pendding",
                            "item" =>  []
                        ],
                        [
                            "id" => Str::orderedUuid(),
                            "title" => "Delivery",
                            "item" =>  []
                        ],
                        [
                            "id" => Str::orderedUuid(),
                            "title" => "Success",
                            "item" =>  []
                        ]
                    ]
                )
            ]
        );
    }
}
