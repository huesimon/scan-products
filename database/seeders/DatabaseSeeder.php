<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // tags
        $drinkware = Tag::factory()->state(['name' => 'drinkware'])->create();
        $hardware = Tag::factory()->state(['name' => 'hardware'])->create();
        $kvmSwitch = Tag::factory()->state(['name' => 'kvm switch'])->create();
        $hoodies = Tag::factory()->state(['name' => 'hoodies'])->create();
        $specials = Tag::factory()->state(['name' => 'specials'])->create();

        // products
        Product::factory()->state(['name' => 'Coffee Mug'])->hasAttached([
            $drinkware,
        ])->create();

        Product::factory()->hasSubProducts([
            'name' => 'Drink Coaster',
            'price' => 5
        ])
            ->state([
                'name' => 'Coffee Mug + Coaster combo'
            ])
            ->hasAttached([
                $drinkware,
            ])->create();

        // product with multiple tags
        Product::factory()
            ->state([
                'name' => '1.4 Display Port KVM Switch - Dual Monitor - Two Computer',
                'price' => 449
            ])
            ->hasAttached([
                $hardware,
                $specials
            ])
            ->create();

        // product with a sub product, and multiple tags
        Product::factory()
            ->state([
                'name' => '1.4 Display Port KVM Switch - Quad Monitor - Two Computer',
                'price' => 800
            ])->hasAttached([
                $hardware,
                $specials,
            ])->hasSubProducts([
                'name' => 'USB-C to USB-C Cable - Black | 39 Inches (100 cm)',
                'price' => 5,
            ])->create();
    }
}
