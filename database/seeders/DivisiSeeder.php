<?php

namespace Database\Seeders;

use App\Models\Divisi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DivisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $divisis = [
            '',
            'Sekretaris Perusahaan',
            'Satuan Pengawasan Intern',
            'Keuangan dan Akutansi',
            'Human Capitan and General Affairs',
            "Manajemen Risiko dan Hukum",
            'Teknologi',
            'Riset dan Pengembangan',
            'Subsidiary and Bussiness Strategy',
            'Pemasaran',
            'Perancangan dan Pengendalian Operasi',
            'Produksi',
            'Pabrik Banyuwangi',
            'Pengelolaan Kualitas dan Dukungan Produk',
            'Pengelolaan Kualitas Proses Bisnis',
            'Logistik',
        ];
        
        forEach ($divisis as $divisi) {
            Divisi::factory()->create([
                'nama' => $divisi,
            ]);
        }
    }
}
