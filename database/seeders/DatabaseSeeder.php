<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Province;
use Database\Seeders\FaqSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\StatusSeeder;
use Database\Seeders\AcehCitySeeder;
use Database\Seeders\ProvinceSeeder;
use Database\Seeders\ApplicantSeeder;
use Database\Seeders\AcehVillageSeeder;
use Database\Seeders\ApplicationSeeder;
use Database\Seeders\AcehDistrictSeeder;
use App\Models\EducationLevelsPenelitian;
use Database\Seeders\EducationLevelSeeder;
use Database\Seeders\AcehSubDistrictSeeder;
use Database\Seeders\ApplicationTypeSeeder;

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
            'role' => 'USER'
        ]);
        User::factory()->create([
            'name' => 'Rahasya Pratiwi',
            'email' => 'pratiwi@gmail.com',
            'password' => bcrypt('tiwi123@'),
            'email_verified_at' => now(),
            'role' => 'USER'
        ]);
        User::factory()->create([
            'name' => 'Ardian CS',
            'email' => 'contact.ardianff@gmail.com',
            'password' => bcrypt('ardian123@'),
            'email_verified_at' => now(),
            'role' => 'CS'
        ]);
        User::factory()->create([
            'name' => 'dr. Edy Noegroho',
            'email' => 'testing@gmail.com',
            'password' => bcrypt('edy12345@'),
            'email_verified_at' => now(),
            'role' => 'KABID'
        ]);
        User::factory()->create([
            'name' => 'Hanif Pandu S',
            'email' => '12345@gmail.com',
            'password' => bcrypt('hanif12345@'),
            'email_verified_at' => now(),
            'role' => 'KASI'
        ]);
        User::factory()->create([
            'name' => 'Agung P',
            'email' => 'test123@gmail.com',
            'password' => bcrypt('agung12345@'),
            'email_verified_at' => now(),
            'role' => 'PETUGAS'
        ]);
        User::factory()->create([
            'name' => 'Ardian FM',
            'email' => 'test12345@gmail.com',
            'password' => bcrypt('ardian12345@'),
            'email_verified_at' => now(),
            'role' => 'SUPERADMIN'
        ]);
        $this->call(ProvinceSeeder::class);
        $this->call(AcehDistrictSeeder::class);
        $this->call(AcehSubDistrictSeeder::class);
        $this->call(AcehVillageSeeder::class);
        $this->call(ApplicationTypeSeeder::class);
        $this->call(ApplicantSeeder::class);
        $this->call(ApplicationSeeder::class);
        $this->call(EducationPenelitianSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(FaqSeeder::class);
        $this->call(LokasiTujuanSedeer::class);
        $this->call(AddOnApplicantSeeder::class);
        $this->call(LogSuratSeeder::class);
    }
}