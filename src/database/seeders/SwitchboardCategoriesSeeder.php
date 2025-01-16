<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SwitchboardCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $switchboardCategories = [
            "Cleanliness",
            "Animal and pest",
            "Littering"
        ];

        foreach ($switchboardCategories as $value) {
            DB::table("switchboard_categories")->insert([
                "category" => $value
            ]);
        }
    }
}
