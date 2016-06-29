<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{

    public $tables = [
        'users',
        'tickets',
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->command->info('Local Env');

        $this->emptyTables($this->tables);
        $this->call(UsersTableSeeder::class);
        $this->call(TicketsTableSeeder::class);
    }

    public function emptyTables($tables)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        foreach ($tables as $table) {

            DB::table($table)->truncate();

        }

    }
}
