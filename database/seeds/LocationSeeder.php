<?php

use App\InventoryLocation;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locations = [
            (object)['name'=>'upstairs', 'description'=>'located on upstairs'],
            (object)['name'=>'refrigerator', 'description'=>'located on refrigerator'],
            (object)['name'=>'backyard', 'description'=>'backyard']
        ];

        foreach ($locations as $location)
        {
            factory(InventoryLocation::class)->create([
                'name'=>$location->name,
                'description'=>$location->description
            ]);
        }
    }
}
