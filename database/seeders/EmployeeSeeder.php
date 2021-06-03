<?php

namespace Database\Seeders;

use App\Models\Employee;
use DB;
use Faker\Provider\ru_RU\Person as RuPerson;
use Illuminate\Database\Seeder;
use Faker\Factory;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $faker->addProvider(new RuPerson($faker));

        for ($i = 0; $i < 20; $i++) {
            $data = [];

            for ($y = 0; $y < 50; $y++) {
                $employee = [
                    'birthdate' => $faker->dateTimeBetween('-35 years', '-18 years'),
                    'department_id' => $faker->numberBetween(1, 6),
                    'position' => $faker->jobTitle,
                ];

                if ($faker->boolean) {
                    $employee['payment_type'] = Employee::PAYMENT_TYPE_MONTHLY;
                    $employee['payment_value'] = $faker->numberBetween(500, 1500);
                    $employee['hour_per_month'] = 0;
                } else {
                    $employee['payment_type'] = Employee::PAYMENT_TYPE_HOURLY;
                    $employee['payment_value'] = $faker->numberBetween(3, 12);
                    $employee['hour_per_month'] = 160;
                }

                if ($faker->boolean) {
                    $employee['name'] = $faker->firstNameMale;
                    $employee['surname'] = $faker->lastName(RuPerson::GENDER_MALE);
                    $employee['patronymic'] = $faker->middleNameMale;
                    $employee['gender'] = 'm';
                } else {
                    $employee['name'] = $faker->firstNameFemale;
                    $employee['surname'] = $faker->lastName(RuPerson::GENDER_FEMALE);
                    $employee['patronymic'] = $faker->middleNameFemale;
                    $employee['gender'] = 'f';
                }

                array_push($data, $employee);
            }
            DB::table('employees')->insert($data);
        }
    }
}
