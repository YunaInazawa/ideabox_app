<?php

use Illuminate\Database\Seeder;
use Carbon\carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $now = Carbon::now();

        // User( admin + hoge )
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'admin' => true, 
                'email' => 'admin@gmail.com', 
                'password' => Hash::make('admin'), 
                'created_at' => $now, 
                'updated_at' => $now
            ],
            [
                'name' => 'hoge',
                'admin' => false, 
                'email' => 'hoge@gmail.com', 
                'password' => Hash::make('hogehoge'), 
                'created_at' => $now, 
                'updated_at' => $now
            ]
        ]);

        // Response( ene + wantdo + stock )
        DB::table('responses')->insert([
            ['main' => 'ene', 'created_at' => $now, 'updated_at' => $now],
            ['main' => 'wantdo', 'created_at' => $now, 'updated_at' => $now],
            ['main' => 'stock', 'created_at' => $now, 'updated_at' => $now]
        ]);

        // Tag( SNS + Search + MgrTool )
        DB::table('tags')->insert([
            ['main' => 'SNS', 'created_at' => $now, 'updated_at' => $now],
            ['main' => 'Search', 'created_at' => $now, 'updated_at' => $now],
            ['main' => 'MgrTool', 'created_at' => $now, 'updated_at' => $now]
        ]);
    }
}
