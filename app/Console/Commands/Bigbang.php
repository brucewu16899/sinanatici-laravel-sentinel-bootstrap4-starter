<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Bigbang extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sinan:bigbang';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'That\' a big bang!';

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
        $this->call('migrate:fresh');
        $this->info('- Veritabanı sıfırlandı');
        $this->call('db:seed');
        $this->info('- Başlangıç veritabanı bilgileri yüklendi.');
    }
}
