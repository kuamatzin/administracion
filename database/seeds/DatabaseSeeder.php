<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // 
        factory(App\Account::class, 5)->create();
        factory(App\Construction::class, 5)->create();
        factory(App\GeneralExpenditure::class, 30)->create();
        factory(App\ExpenditureType::class, 100)->create();
        factory(App\Expenditure::class, 3000)->create();
        factory(App\Income::class, 100)->create();
    }
}
