<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Process;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('catalog:sync', function () {
    $this->info("Menyinkronkan data katalog produk dari Mercari...");
    $script = base_path('process_catalog.py');
    
    if (file_exists($script)) {
        $output = shell_exec("python " . escapeshellarg($script));
        $this->line($output);
        $this->info("✓ Katalog Kamelia Store berhasil diperbarui!");
    } else {
        $this->error("Script process_catalog.py tidak ditemukan.");
    }
})->purpose('Sinkronkan katalog Kamelia Store dengan data scrape Mercari terbaru');

