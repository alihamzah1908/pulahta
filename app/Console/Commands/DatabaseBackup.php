<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;

class DatabaseBackup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'database:backup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Database backup description';

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
     * @return int
     */
    public function handle()
    {
        $username = config('app.username');
        $password = config('app.password');
        $database = config('app.database');
        $host = config('app.host');
        $filename = "backup-" . Carbon::now()->format('Y-m-d') . ".sql";
        $command = "C:/xampp/mysql/bin/mysqldump.exe --user=" . $username ." --password=" . $password . " --host=" . $host . " " . $database . " > " . storage_path() . "/app/backup/" . $filename;
        $returnVar = NULL;

        $output  = NULL;
        exec($command, $output, $returnVar);
    }
}
