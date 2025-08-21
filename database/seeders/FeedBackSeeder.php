<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FeedBack;

class FeedBackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FeedBack::create([
            'enrollment_id' => 1,
            'rating' => 5,
            'message' => 'Excellent course, very informative!',

        ]);

        FeedBack::create([
            'enrollment_id' => 2,
            'rating' => 4,
            'message' => 'Good course, but could use more examples.',
        ]); 

        FeedBack::create([
            'enrollment_id' => 3,
            'rating' => 3,
            'message' => 'Average course, some topics were not clear.',
        ]);

        FeedBack::create([
            'enrollment_id' => 4,
            'rating' => 2,
            'message' => 'Not satisfied with the course content, needs improvement.',
        ]);
    }
}
