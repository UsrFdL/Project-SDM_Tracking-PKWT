<?php

namespace App\Http\Controllers;

use App\Models\Bagian;
use App\Models\Departemen;
use App\Models\Divisi;
use App\Models\Karyawan;
use App\Models\Kontrak;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index($nik)
    {
        $karyawan = Karyawan::withTrashed()->where('nik', $nik)->first();
        $divisis = Divisi::all();
        $departemens = Departemen::all();
        $bagians = Bagian::all();

        $totalHari = 0;
        // $lamaKontrak = [];
        $kontraks = $karyawan->kontrak;
        forEach($kontraks as $kontrak) {
            $startDate = Carbon::create($kontrak->tglMulai);
            $endDate = Carbon::create($kontrak->tglSelesai);
            // $diff = $startDate->diff($endDate);
            // $lamaKontrak[] = $diff;
            $diff = $startDate->diffInDays($endDate);
            $totalHari += $diff;
        }

        $years = floor($totalHari / 365);
        $remainingDays = $totalHari % 365;
        $months = floor($remainingDays / 30);
        $days = $remainingDays % 30;

        $duration = '';

        if ($years > 0) {
            $duration .= "$years tahun, ";
        }

        if ($months > 0) {
            $duration .= "$months bulan, ";
        }

        if ($days > 0 || ($years == 0 && $months == 0)) {
            $duration .= "$days hari";
        } else {
            // Menghapus koma ekstra jika tidak ada hari yang ditampilkan
            $duration = rtrim($duration, ', ');
        }

        return view('detail-karyawan', compact('karyawan', 'divisis', 'departemens', 'bagians', 'duration'));
    }

    public function berhenti(Request $request ,$nik)
    {
        $karyawan = Karyawan::where('nik', $nik)->first();
        $kontrak = $karyawan->kontrak->last();

        $startDate = Carbon::create($kontrak->tglMulai);
        $endDate = Carbon::create(Carbon::now());
        $diff = $startDate->diff($endDate);
        $parts = [];
        if ($diff->y !== 0) {
            $parts[] = $diff->y . ' tahun';
        }
        if ($diff->m !== 0) {
            $parts[] = $diff->m . ' bulan';
        }
        if ($diff->d !== 0) {
            $parts[] = $diff->d . ' hari';
        }
        $lama = join(', ', $parts);

        $kontrak->lamaKontrak = $lama;
        $kontrak->tglSelesai = Carbon::now();
        $kontrak->save();

        return back()->with('success', 'Berhasil menghentikan kontrak');
    }

    public function tambahKontrak($nik)
    {
        $karyawan = Karyawan::withTrashed()->where('nik', $nik)->first();
        return view('tambah-kontrak', compact('karyawan'));
    }

    public function storeKontrak(Request $request, $nik)
    {
        $karyawan = Karyawan::withTrashed()->where('nik', $nik)->first();
        
        $nextHari = 0;
        $start = Carbon::create(Carbon::parse($request->input('start'))->format('Y-m-d'));
        $end = Carbon::create(Carbon::parse($request->input('end'))->format('Y-m-d'));
        $diff = $start->diffInDays($end);
        $nextHari += $diff;

        $totalHari = 0;
        // $lamaKontrak = [];
        $kontraks = $karyawan->kontrak;
        forEach($kontraks as $kontrak) {
            $startDate = Carbon::create($kontrak->tglMulai);
            $endDate = Carbon::create($kontrak->tglSelesai);
            // $diff = $startDate->diff($endDate);
            // $lamaKontrak[] = $diff;
            $diff = $startDate->diffInDays($endDate);
            $totalHari += $diff;
        }

        $years = floor((1825 - $totalHari) / 365);
        $remainingDays = (1825 - $totalHari) % 365;
        $months = floor($remainingDays / 30);
        $days = $remainingDays % 30;

        $duration = '';

        if ($years > 0) {
            $duration .= "$years tahun, ";
        }

        if ($months > 0) {
            $duration .= "$months bulan, ";
        }

        if ($days > 0) {
            $duration .= "$days hari";
        } else {
            // Menghapus koma ekstra jika tidak ada hari yang ditampilkan
            $duration = rtrim($duration, ', ');
        }

        if ($karyawan->kontrak->last()->tglSelesai > Carbon::now()) {
            // /* Irisan kontrak */
            // $kontrakTerakhir = $karyawan->kontrak->last();
            // $kontrakTerakhir->tglSelesai = Carbon::parse($request->input('start'))->format('Y-m-d');
            // $kontrakTerakhir->save();
            return redirect()->route('detail', ['nik' => $nik])->withErrors(['gagal.tambah' => 'Kontrak tidak bisa ditambah karena belum berakhir']);
        } else {
            if (($totalHari + $nextHari) >= 1825) {
                return redirect()->route('detail', ['nik' => $nik])->withErrors(['kontrak.lebih' => 'Lama kontrak tidak boleh lebih dari 5 tahun', 'sisa.kontrak' => 'Kontrak tersisa kurang lebih ' . $duration]);
            }
            else if($nextHari < 1) {
                return redirect()->route('detail', ['nik' => $nik])->withErrors(['kontrak.kurang' => 'Lama kontrak tidak boleh kurang dari 1 hari']);
            }
            else {
                $kontrak = new Kontrak();
                $kontrak->karyawan_nik = $nik;
                $kontrak->lamaKontrak = $request->input('lamaKontrak');
                $kontrak->tglMulai = Carbon::parse($request->input('start'))->format('Y-m-d');
                $kontrak->tglSelesai = Carbon::parse($request->input('end'))->format('Y-m-d');
                $kontrak->save();
        
                return redirect()->route('detail', ['nik' => $nik])->with('success', 'Kontrak berhasil ditambahkan');
            }
        }
        
    }

    public function editDetail(Request $request, $nik) 
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'nik' => 'required|numeric|digits_between:1,11',
            'nip' => 'required|numeric|digits_between:1,11',
            'divisi' => 'required',
            'departemen' => 'required',
            'bagian' => 'required',
        ]);

        
        $karyawan = Karyawan::withTrashed()->where('nik', $nik)->first();
        $karyawan->nama = $validatedData['nama'];
        $karyawan->nik = $validatedData['nik'];
        $karyawan->nip = $validatedData['nip'];
        $karyawan->divisi_id = $validatedData['divisi'];
        $karyawan->departemen_id = $validatedData['departemen'];
        $karyawan->bagian_id = $validatedData['bagian'];
        $karyawan->save();

        return back()->with('success', 'Detail karyawan berhasil diperbarui');
    }

    public function hapusKontrak(Request $request, $nik)
    {
        $karyawan = Karyawan::withTrashed()->where('nik', $nik)->first();
        $kontrak = $karyawan->kontrak()->where('id', $request->input('kontrak'))->first();
        $kontrak->delete();
        $kontrak->save();

        return redirect()->route('detail', ['nik' => $nik])->with('success', 'Kontrak berhasil dihapus');
    }
}
