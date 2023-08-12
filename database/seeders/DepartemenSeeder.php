<?php

namespace Database\Seeders;

use App\Models\Departemen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartemenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departemens = [
            [0, 'Sistem dan Komponen Tier 1'],
            [1, 'Hubungan Masyarakat dan Kantor Perwakilan'],
            [1, 'Tata Kelola Manajemen Korporasi'],
            [2, 'Audit Operasional'],
            [2, 'Audit Keuangan'],
            [3, 'Perencanaan dan Pengendalian Keuangan'],
            [3, 'Pendanaan dan Perbendaharaan'],
            [3, 'Akutansi dan Perpajakan'],
            [4, 'Pengelolaan Organisasi dan SDM'],
            [4, 'Personalia dan Hubungan Industrial'],
            [4, 'General Affairs'],
            [5, 'Manajemen Risiko dan Kepatuhan'],
            [5, 'Hukum'],
            [5, 'Tangguna Jawab Sosial dan Lingkungan'],
            [6, 'Engineering'],
            [6, 'Design'],
            [6, 'Teknologi Produksi'],
            [7, 'Pengembangan Produk dan Teknologi'],
            [7, 'Pengembangan Bisnis'],
            [7, 'Teknologi Informasi'],
            [8, 'Subsidiary and Investment Planning'],
            [9, 'Pemasaran Proyek'],
            [9, 'Bid and Pricing'],
            [10, 'Perencanaan dan Pengendalian Produksi'],
            [10, 'Pengendalian dan Pemeliharaan Aset'],
            [11, 'Dukungan Bisnis'],
            [11, 'Operaional'],
            [12, 'Fabrikasi'],
            [12, 'Finishing'],
            [13, 'Pengelolaan Kualitas Produk'],
            [13, 'Pengelolaan Kualitas Pabrik Banyuwangi'],
            [13, 'Dukungan Kepuasan Pelanggan'],
            [14, 'Quality Management and Safety Health Environment'],
            [15, 'Pengadaan 1'],
            [15, 'Pengadaan 2'],
            [15, 'Ekspedisi dan Gudang'],
        ];
        
        forEach ($departemens as $departemen) {
            Departemen::factory()->create([
                'divisi_id' => $departemen[0],
                'nama' => $departemen[1],
            ]);
        }
    }
}
