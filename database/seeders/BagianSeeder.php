<?php

namespace Database\Seeders;

use App\Models\Bagian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BagianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bagians = [
            [1, 'Humas dan Protokoler'],
            [1, 'Kesekretariatan dan Kearsipan'],
            [1, 'Kantor Perwakilan Jakarta dan Bandung'],
            [2, 'Pelaporan Korporasi'],
            [2, 'Strategi Korporasi'],
            [3, 'Audit Operasional'],
            [4, 'Audit Keuangan'],
            [5, 'Perencanaan'],
            [5, 'Verifikasi'],
            [6, 'Pendanaan'],
            [6, 'Perbendaharaan dan Asuransi'],
            [7, 'Pelaporan dan Analisa Akutansi/Keuangan'],
            [7, 'Pajak dan Fasilitas Kepabeanan'],
            [8, 'Pengembangan Organisasi'],
            [8, 'Perencanaan dan Pengelolaan SDM'],
            [8, 'Pengembangan SDM dan Diklat'],
            [9, 'Personalia'],
            [9, 'HUBIN dan SISDM'],
            [10, 'Pengelolaan Aset Non Produksi'],
            [10, 'Umum dan Keamanan'],
            [11, 'Manajemen Risiko'],
            [11, 'Kepatuhan dan Tata Kelola Perusahaan'],
            [12, 'Hukum'],
            [13, 'Tanggung Jawab Sosial dan Lingkungan'],
            [14, 'Technology Process Management and Rams'],
            [15, 'Product Engineering'],
            [15, 'Quality Engineering'],
            [15, 'Electrical Engineering System'],
            [15, 'Mechanical Engineering System'],
            [16, 'Bogie and Wagon Design'],
            [16, 'Carbody Design'],
            [16, 'Mechanical and Interior Design'],
            [16, 'Electrical Design'],
            [17, 'Teknologi Proses'],
            [17, 'Teknologi Proses'],
            [17, 'Shop Drawing'],
            [17, 'Preparation and Support'],
            [17, 'Welding Technology'],
            [18, 'Pengembangan Sistem'],
            [18, 'Pengembangan Strategi Teknologi dan Manufaktur'],
            [19, 'Riset Bisnis'],
            [19, 'Skema Bisnis dan Aliansi'],
            [20, ''],
            [20, 'Operasional dan Infrastruktur Teknologi Informasi'],
            [20, 'Perencanaan dan Transformasi Teknologi Informasi'],
            [21, ''],
            [22, 'Strategi Inisiatif'],
            [23, 'Pengembangan Produk dan Sistem'],
            [23, 'Perencanaan, Pengendalian dan Proses Produksi'],
            [24, 'Perencanaan Pemasaran'],
            [24, 'Pengendalian Pemasaran'],
            [25, 'Bid Preparation and Administration'],
            [25, 'Pricing'],
            [26, 'Perencanaan Produksi dan Material'],
            [26, 'Pengendalian Produksi'],
            [26, 'Pengendalian Material'],
            [27, 'Pengendalian Peralatan dan Fasilitas Produksi'],
            [27, 'Pemeliharaan Mesin dan Alat Angkat Angkut'],
            [27, 'Pemeliharaan Gedung dan Fasilitas'],
            [28, 'Keuangan'],
            [28, 'Humas dan Hukum'],
            [28, 'HRGA and SHE'],
            [29, 'Perencanaan dan Pengendalian Produksi'],
            [29, 'Fabrikasi'],
            [29, 'Finishing'],
            [30, 'Metal Working'],
            [30, 'Machining'],
            [30, 'Minor and Sub Assembling'],
            [30, 'Carbody Assembling'],
            [30, 'Bogie Frame Assy'],
            [31, 'Pengecatan dan Proteksi'],
            [31, 'Interior'],
            [31, 'Piping and Brake System Installation'],
            [31, 'Instalasi Mekanik dan Bogie'],
            [31, 'Instalasi Sistem Elektrik'],
            [32, 'Incoming Inspection'],
            [32, 'Pengendalian Kualitas Produksi'],
            [32, 'Final Inspection and Testing'],
            [33, 'Pengendalian Kualitas Produk Pabrik Banyuwangi'],
            [33, 'Final Inspection and Testing Banyuwangi'],
            [34, 'Dukungan dan Pelatihan Pelanggan'],
            [34, 'After Sales'],
            [35, 'Pengelolaan Aset Produksi'],
            [36, 'Quality Management'],
            [36, 'Safety, Health and Environment'],
            [37, 'Manajemen dan Digitalisasi Operasi'],
            [37, 'Dokumentasi dan Mampu Telusur Produk'],
            [38, 'Pengadaan Komponen Utama'],
            [38, 'Pengadaan Komponen Elektrik'],
            [39, 'Pengadaan Komponen Mekanik'],
            [39, 'Pengadaan Jasa dan Investasi'],
            [40, 'Ekspedisi'],
            [40, 'Gudang'],
        ];

        forEach ($bagians as $bagian) {
            Bagian::factory()->create([
                'departemen_id' => $bagian[0],
                'nama' => $bagian[1],
            ]);
        }
    }
}
