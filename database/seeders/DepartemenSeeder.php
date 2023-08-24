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
            [2, 'Hubungan Masyarakat dan Kantor Perwakilan'],
            [2, 'Tata Kelola Manajemen Korporasi'],
            [3, 'Audit Operasional'],
            [3, 'Audit Keuangan'],
            [4, 'Perencanaan dan Pengendalian Keuangan'],
            [4, 'Pendanaan dan Perbendaharaan'],
            [4, 'Akutansi dan Perpajakan'],
            [5, 'Pengelolaan Organisasi dan SDM'],
            [5, 'Personalia dan Hubungan Industrial'],
            [5, 'General Affairs'],
            [6, 'Manajemen Risiko dan Kepatuhan'],
            [6, 'Hukum'],
            [6, ''],
            [7, ''],
            [7, 'Engineering'],
            [7, 'Design'],
            [7, 'Teknologi Produksi'],
            [8, 'Pengembangan Produk dan Teknologi'],
            [8, 'Pengembangan Bisnis'],
            [8, 'Teknologi Informasi'],
            [9, 'Subsidiary and Investment Planning'],
            [9, ''],
            [1, 'Sistem dan Komponen Tier 1'],
            [10, 'Pemasaran Proyek'],
            [10, 'Bid and Pricing'],
            [11, 'Perencanaan dan Pengendalian Produksi'],
            [11, 'Pengendalian dan Pemeliharaan Aset'],
            [12, 'Dukungan Bisnis'],
            [12, 'Operaional'],
            [13, 'Fabrikasi'],
            [13, 'Finishing'],
            [14, 'Pengelolaan Kualitas Produk'],
            [14, 'Pengelolaan Kualitas Pabrik Banyuwangi'],
            [14, 'Dukungan Kepuasan Pelanggan'],
            [14, ''],
            [15, 'Quality Management and Safety Health Environment'],
            [15, ''],
            [16, 'Pengadaan 1'],
            [16, 'Pengadaan 2'],
            [16, 'Ekspedisi dan Gudang'],
        ];
        
        forEach ($departemens as $departemen) {
            Departemen::factory()->create([
                'divisi_id' => $departemen[0],
                'nama' => $departemen[1],
            ]);
        }
    }
}
