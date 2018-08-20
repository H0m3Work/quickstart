<?php

use Illuminate\Database\Seeder;

class LinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Illuminate\Database\Eloquent\Model::reguard();
    	
        factory(App\Models\Link::class, 50)->create();
    }
}
