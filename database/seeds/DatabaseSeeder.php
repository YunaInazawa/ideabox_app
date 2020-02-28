<?php

use Illuminate\Database\Seeder;
use Carbon\carbon;
use App\User;
use App\Tag;
use App\Report;

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
            ['main' => 'Idea', 'created_at' => $now, 'updated_at' => $now],
            ['main' => 'Post', 'created_at' => $now, 'updated_at' => $now],
            ['main' => 'MgrTool', 'created_at' => $now, 'updated_at' => $now]
        ]);

        // Report + ReportFun + ReportTag( IdeaBox )
        $user = User::where('admin', true)->first();
        DB::table('reports')->insert([
            [
                'title' => 'IdeaBox', 
                'user_id' => $user->id, 
                'main' => 'アイディアを投稿したり、他人の投稿を見ることができる。', 
                'reason' => 'アイディア考えるのが苦手。', 
                'note' => '投稿する側のメリットが弱い。', 
                'release' => true, 
                'created_at' => $now, 
                'updated_at' => $now
            ]
        ]);

        $report = Report::where('title', 'IdeaBox')->first();
        DB::table('report_funs')->insert([
            [
                'report_id' => $report->id, 
                'fun' => '投稿', 
                'fun_detail' => '自分が考えたアイディアを投稿することができる。',  
                'created_at' => $now, 
                'updated_at' => $now
            ],
            [
                'report_id' => $report->id, 
                'fun' => '閲覧', 
                'fun_detail' => '他人が考えたアイディアを見ることができる。',  
                'created_at' => $now, 
                'updated_at' => $now
            ]
        ]);

        $idea = Tag::where('main', 'Idea')->first();
        $post = Tag::where('main', 'Post')->first();
        $sns = Tag::where('main', 'SNS')->first();
        DB::table('report_tags')->insert([
            ['report_id' => $report->id, 'tag_id' => $idea->id, 'created_at' => $now, 'updated_at' => $now],
            ['report_id' => $report->id, 'tag_id' => $post->id, 'created_at' => $now, 'updated_at' => $now],
            ['report_id' => $report->id, 'tag_id' => $sns->id, 'created_at' => $now, 'updated_at' => $now]
        ]);
    }
}
