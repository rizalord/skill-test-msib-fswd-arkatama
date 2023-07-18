<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfileRequest;
use App\Models\Profile;
use Illuminate\Support\Str;


class HomeController extends Controller
{
    public function index()
    {
        $data = Profile::all();
        return view('home', compact('data'));
    }

    public function store(StoreProfileRequest $request)
    {
        // Mendapatkan data dari input form
        $data = $request->input('data');

        // Membersihkan data dari input form
        $data = $this->cleanInput($data);

        // Mengambil angka dari data
        $number = preg_replace('/[^0-9]/', '', $data);

        // Jika tidak ada angka, maka data tidak valid
        if (empty($number)) {
            return redirect()->back()->with('error', 'Format data tidak valid. Pastikan menggunakan format NAMA USIA KOTA.');
        }

        // Memisahkan teks dari angka
        $text = explode($number, $data);

        // Jika jumlah teks lebih dari 2, maka data valid
        if (count($text) >= 2) {

            // Mengambil teks dari data
            $name = empty($text[0]) ? '-' : Str::upper($text[0]);
            $age = $number;
            $city = empty($text[1]) ? '-' : Str::upper($text[1]);

            // Menyimpan data ke database
            Profile::create([
                'name' => $name,
                'age' => $age,
                'city' => $city,
            ]);
            
            // Mengembalikan response
            return redirect()->back()->with('success', 'Data berhasil disimpan.');
        }

        // Jika jumlah teks kurang dari 2, maka data tidak valid
        return redirect()->back()->with('error', 'Format data tidak valid. Pastikan menggunakan format NAMA USIA KOTA.');
    }

    private function cleanInput($input)
    {
        // Menghapus kata-kata 'TAHUN', 'THN', atau 'TH' dari input
        $cleanInput = preg_replace('/TAHUN|THN|TH/i', '', $input);

        // Menghapus spasi yang mungkin ada di awal atau akhir input
        $cleanInput = trim($cleanInput);

        return $cleanInput;
    }
}
