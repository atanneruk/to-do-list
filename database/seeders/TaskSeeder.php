<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([
        [
            'name' => 'Built based on client specification',
            'complete' => false,
        ], [
            'name' => 'Cross browser checks to ensure consistency of design (IE, Edge, FF, Chrome)',
            'complete' => true,
        ], [
            'name' => 'Site is navigable with Javascript disabled',
            'complete' => false,
        ], [
            'name' => 'Favicon updated & included in site root',
            'complete' => true,
        ],
        ]);
    }
}
