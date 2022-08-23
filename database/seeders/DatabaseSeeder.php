<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Province;
use Illuminate\Database\Seeder;
use Database\Seeders\AcehCitySeeder;
use Database\Seeders\ProvinceSeeder;
use Database\Seeders\ApplicantSeeder;
use Database\Seeders\AcehVillageSeeder;
use Database\Seeders\AcehDistrictSeeder;
use Database\Seeders\EducationLevelSeeder;
use Database\Seeders\AcehSubDistrictSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'name' => 'Ardian F Firmansyah',
            'email' => 'ardianfirmansyah123@gmail.com',
            'password' => bcrypt('ardian123@'),
            'email_verified_at' => now(),
        ]);
        $this->call(ProvinceSeeder::class);
        $this->call(AcehDistrictSeeder::class);
        $this->call(AcehSubDistrictSeeder::class);
        $this->call(AcehVillageSeeder::class);
        $this->call(ApplicantSeeder::class);
        $this->call(EducationSeeder::class);
        $this->call(StatusSeeder::class);
    }
}