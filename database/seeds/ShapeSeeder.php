<?php

use App\Shape;
use Illuminate\Database\Seeder;

class ShapeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shapes = [
            (object)['name'=>'Square', 'description'=>'square'],
            (object)['name'=>'Sphere', 'description'=>'sphere'],
            (object)['name'=>'Cylinder', 'description'=>'cylinder'],
            (object)['name'=>'Other', 'description'=>'other'],
        ];

        foreach ($shapes as $shape)
        {
            factory(Shape::class)->create([
                'name'=>$shape->name,
                'description'=>$shape->description
            ]);
        }
    }
}
