<?php

use Illuminate\Database\Seeder;
use App\Option;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(OptionTableSeeder::class);
        $this->command->info('Option Table seeded!');
    }
}

class OptionTableSeeder extends Seeder {

    public function run()
    {
        DB::table('options')->delete();

        $json = json_encode( array(
            '#FF0000',
            '#00FF00',
            '#0000FF',
        ), true);

        Option::create([
            'name' => 'color',
            'value' => $json
            ]);

        $json = json_encode( array(
            'DEWAL',
            'ANDIS',
            'DOVO',
            'ERMILA',
            'MOSER',
            'GD',
            'WAHL',
            'TAYO',
            'BaByliss',
            'YES',
        ), true);

        Option::create([
            'name' => 'brend',
            'value' => $json
            ]);

        $json = json_encode( array(
            'нержавеющий сталь',
            'пластмасса',
            'серебро',
        ), true);

        Option::create([
            'name' => 'material',
            'value' => $json
            ]);
    }

}
