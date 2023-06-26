<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Technology;
// importare per controllo univocità (sotto)
use Illuminate\Support\Facades\DB;

class ProjectsTechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 50; $i++){

            $project = Project::inRandomOrder()->first();

            $technology_id = Technology::inRandomOrder()->first()->id;

            // per univocità
            $check_project = DB::table('project_technology')
                ->where('project_id', $project->id)
                ->where('technology_id', $technology_id)
                ->count();

            if (!$check_project) {
                $project->technologies()->attach($technology_id);
            }

        }
    }
}
