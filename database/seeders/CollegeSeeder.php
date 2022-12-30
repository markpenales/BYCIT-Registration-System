<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\College;

class CollegeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colleges = [
            "Camarines Sur Polytechnic Colleges",
            "Camarines Sur Polytechnic Colleges - Buhi Campus",
            "Ceguera Technological Colleges",
            "Ama Computer Learning Center - Iriga",
            "Bicol University - Polangui",
            "St. Bridget School",
            "Oliveros College Inc"
        ];

        foreach($colleges as $college){
            $school = new College;
            $school->name = $college;
            $school->save();
        }
    }
}
