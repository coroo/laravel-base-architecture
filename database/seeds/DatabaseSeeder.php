<?php

use App\Models\Account\UserProfile;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    { 
        $this->call(UsersTableSeeder::class);
        // $this->call(UserProfilesTableSeeder::class);
        // $this->call(TailorPlacePhotosTableSeeder::class);
        // $this->call(TailorPlaceCategoryTableSeeder::class);
        // $this->call(TailorPlaceMapCategoryTableSeeder::class);
        // $this->call(TailorPlaceWorkingHourTableSeeder::class);
        // $this->call(BidPhotoTableSeeder::class);
        // $this->call(BidSizeLogTableSeeder::class);
    }
}
