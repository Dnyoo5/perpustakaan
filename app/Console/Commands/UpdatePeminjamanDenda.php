<?php

namespace App\Console\Commands;

use App\Jobs\UpdatePeminjamanDendaJob;
use Illuminate\Console\Command;
use App\Models\Peminjaman;

class UpdatePeminjamanDenda extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'peminjaman:update-denda';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update status peminjaman menjadi "denda" jika melewati tanggal kembali';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        UpdatePeminjamanDendaJob::dispatch(); // Menjalankan job
        $this->info("Job untuk memperbarui status peminjaman ke 'denda' telah dikirim.");
    }
}
