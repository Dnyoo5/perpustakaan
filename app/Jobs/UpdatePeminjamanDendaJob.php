<?php

namespace App\Jobs;

use App\Models\Peminjaman;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class UpdatePeminjamanDendaJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Execute the job.
     */
    public function handle()
{
    $jumlahTerupdate = Peminjaman::where('status', 'dipinjam')
        ->where('created_at', '<=', now()->subMinutes(3)) // Jika peminjaman sudah lebih dari 3 menit
        ->update(['status' => 'denda']);

    Log::info("Sebanyak {$jumlahTerupdate} peminjaman telah diperbarui ke status 'denda'.");
}
}
