<?php

namespace App\Console\Commands;

use App\Models\Article;
use App\Models\Comment;
use App\Models\Section;
use App\Models\User;
use Illuminate\Console\Command;

class ClearDB extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clear:db';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'You can clear all of the data from the DB from Here';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Comment::truncate();
        Article::truncate();
        Section::truncate();
        User::truncate();

        return $this->info('You have clean DB right now');
    }
}
