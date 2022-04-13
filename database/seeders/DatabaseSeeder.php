<?php

namespace Database\Seeders;

use App\Models\Tag;
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
    }
}
