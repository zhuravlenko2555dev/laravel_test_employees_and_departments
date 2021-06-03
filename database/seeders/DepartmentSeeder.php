<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Production',
            ],
            [
                'name' => 'Research and Development',
            ],
            [
                'name' => 'Purchasing',
            ],
            [
                'name' => 'Marketing',
            ],
            [
                'name' => 'Human Resource Management',
            ],
            [
                'name' => 'Accounting and Finance',
            ],
        ];
        DB::table('departments')->insert($data);
    }
}
