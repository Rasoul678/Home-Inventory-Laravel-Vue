<?php

use App\ItemType;
use Illuminate\Database\Seeder;

class ItemTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['Foods', 'Clothes', 'Electrics', 'Utensils'];

        foreach ($types as $type)
        {
            factory(ItemType::class)->create([
                'name'=>$type
            ]);
        }
    }
}
