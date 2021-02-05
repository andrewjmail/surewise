<?php

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
        $navigation = factory(\App\Navigation::class)->create(['name' => 'main']);

        $navigation->each(function($navigation) {
            factory(App\NavigationCategory::class, 5)->create(['navigation_id' => $navigation->id])->each(function($navigationCategory) {
                factory(App\NavigationItem::class, 3)->create(['navigation_category_id' => $navigationCategory->id]);
            });
        });

    }
}
