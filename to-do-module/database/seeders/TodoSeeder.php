<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Todo;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $new_todo=Todo::create([
            'name'=>'First task',
            'description'=>'Complete your task and click on Done for change status',
            'completed'=>0
        ]);



    }
}
