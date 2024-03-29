<?php

namespace Database\Seeders;

use App\Models\ComponentCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComponentCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ComponentCategory::create(
            [
                'id' => 1,
                'name' => 'spare parts'
            ]
        );

        ComponentCategory::create(
            [
                'id' => 2,
                'name' => 'pelumas'
            ]
        );

        ComponentCategory::create(
            [
                'id' => 3,
                'name' => 'ban'
            ]
        );
    }
}
