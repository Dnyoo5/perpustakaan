<?php

namespace App\Console\Commands;

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
        $peminjaman = Peminjaman::where('status', 'disetujui')
            ->where('tanggal_kembali', '<', now())
            ->get();

        foreach ($peminjaman as $pinjam) {
            $pinjam->status = 'denda';
            $pinjam->save();
        }

        $this->info('Status peminjaman yang melewati batas waktu telah diperbarui ke "denda".');
    }
}
