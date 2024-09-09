<?php

namespace App\Http\Controllers;
use Intervention\Image\Facades\Image;

use App\Models\InformasiDasar;
use App\Models\Keahlian;
use App\Models\Pendidikan;
use App\Models\Pengalaman;
use App\Models\TentangSaya;
use Illuminate\Http\Request;

class InsertDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('input');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // 1.Validate data
        $validasiData = $request->validate([
            // 1.1 Validasi Informasi Dasar
            'nama' => 'required|string',
            'title' => 'required|string',
            'email' => 'required|string',
            'nomor' => 'required|string',
            'alamat' => 'required|string',
            'photo' => 'image|mimes:jpg,png,jpeg|max:10240',

            // 1.2 Validai Tentang Saya
            'bio' => 'required',

            // 1.3 Validasi Pendidikan
            'nama-prodi' => 'required',
            'nama-lembaga' => 'required',
            'tahun' => 'required',
            'info-relevan' => 'nullable',

            // 1.4 Validasi Pengalaman
            'posisi-pekerjaan' => 'required',
            'nama-perusahaan' => 'required',
            'tahunEx' => 'required',
            'info-relevanEx' => 'nullable',
        ]);

        // 2.Handle Photo - Informasi Dasar
        $photo_file = $request->file('photo');
        $photo_extension = $photo_file->getClientOriginalExtension();
        $photo_name = date('ymdhis') . '.' . $photo_extension;
        $photo_file->move(public_path('pictures'), $photo_name);

        // 3.Insert Data
        // 3.1 Informasi Dasar
        $informasiDasar = new InformasiDasar();
        $informasiDasar->nama = $request->input('nama');
        $informasiDasar->title = $request->input('title');
        $informasiDasar->email = $request->input('email');
        $informasiDasar->no_hp = $request->input('nomor');
        $informasiDasar->alamat = $request->input('alamat');
        $informasiDasar->foto = $photo_name;
        $informasiDasar->save();

        // 3.2 Tentang Saya
        $tentangSaya = new TentangSaya();
        $tentangSaya->info_id = $informasiDasar->id;
        $tentangSaya->biografi = $request->input('bio');
        $tentangSaya->save();

        // 3.3 Keahlian
        $skills = $request->input('skills');
        $levels = $request->input('levels');
        if ($skills && $levels) {
            foreach ($skills as $index => $skillName) {
                Keahlian::create([
                    'info_id' => $informasiDasar->id,
                    'nama_keahlian' => $skillName,
                    'level_keahlian' => $levels[$index],
                ]);
            }
        }

        // 3.4 Pendidikan
        $jurusans = $request->input('nama-prodi');
        $sekolahs = $request->input('nama-lembaga');
        $tahun_edus = $request->input('tahun');
        $info_edus = $request->input('info-relevan');

        if ($jurusans && $sekolahs && $tahun_edus && $info_edus) {
            foreach ($jurusans as $index => $jurusan) {
                Pendidikan::create([
                    'info_id' => $informasiDasar->id,
                    'nama_prodi' => $jurusan,
                    'nama_lembaga' => $sekolahs[$index],
                    'tahun' => $tahun_edus[$index],
                    'informasi_relevan' => $info_edus[$index],
                ]);
            }
        }

        // 3.5 Pengalaman
        $posisi = $request->input('posisi-pekerjaan');
        $perusahaan = $request->input('nama-perusahaan');
        $tahunEx = $request->input('tahunEx');
        $infoEx = $request->input('info-relevanEx');

        if ($posisi && $perusahaan && $tahunEx && $infoEx) {
            foreach ($posisi as $index => $posisi) {
                Pengalaman::create([
                    'info_id' => $informasiDasar->id,
                    'posisi_pekerjaan' => $posisi,
                    'nama_perusahaan' => $perusahaan[$index],
                    'tahun' => $tahunEx[$index],
                    'informasi_relevan' => $infoEx[$index],
                ]);
            }
        }

        // 4.Return Back
        return redirect()->route('form.show')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $data = InformasiDasar::latest("id")->with('tentangSaya', 'keahlian', 'pendidikan', 'pengalaman')->first();
        return view('download', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $editData = InformasiDasar::with('tentangSaya', 'keahlian', 'pendidikan', 'pengalaman')->find($id);
        return view('edit',['oldData' => $editData]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $validasiData = $request->validate([
            // 1.1 Validasi Informasi Dasar
            'nama' => 'required|string',
            'title' => 'required|string',
            'email' => 'required|string',
            'nomor' => 'required|string',
            'alamat' => 'required|string',
            'photo' => 'image|mimes:jpg,png,jpeg|max:10240',

            // 1.2 Validai Tentang Saya
            'bio' => 'required',

            // 1.3 Validasi Pendidikan
            'nama-prodi' => 'required',
            'nama-lembaga' => 'required',
            'tahun' => 'required',
            'info-relevan' => 'nullable',

            // 1.4 Validasi Pengalaman
            'posisi-pekerjaan' => 'required',
            'nama-perusahaan' => 'required',
            'tahunEx' => 'required',
            'info-relevanEx' => 'nullable',
        ]);

        // 2.Handle Photo - Informasi Dasar
        $photo_file = $request->file('photo');
        if ($photo_file) {
            $photo_extension = $photo_file->getClientOriginalExtension();
            $photo_name = date('ymdhis') . '.' . $photo_extension;
            $photo_file->move(public_path('pictures'), $photo_name);
        } else {
            $photo_name = InformasiDasar::find($id)->foto;
        }

        // 3.Insert Data
        // 3.1 Informasi Dasar
        $informasiDasar = InformasiDasar::find($id);
        $informasiDasar->nama = $request->input('nama');
        $informasiDasar->title = $request->input('title');
        $informasiDasar->email = $request->input('email');
        $informasiDasar->no_hp = $request->input('nomor');
        $informasiDasar->alamat = $request->input('alamat');
        $informasiDasar->foto = $photo_name;
        $informasiDasar->save();

        // 3.2 Tentang Saya
        $tentangSaya = TentangSaya::where('info_id', $id)->first();
        $tentangSaya->biografi = $request->input('bio');
        $tentangSaya->save();

        // 3.3 Keahlian
        Keahlian::where('info_id', $id)->delete();
        $skills = $request->input('skills');
        $levels = $request->input('levels');
        if ($skills && $levels) {
            foreach ($skills as $index => $skillName) {
                Keahlian::create([
                    'info_id' => $id,
                    'nama_keahlian' => $skillName,
                    'level_keahlian' => $levels[$index],
                ]);
            }
        }

        // 3.4 Pendidikan
        Pendidikan::where('info_id', $id)->delete();
        $jurusans = $request->input('nama-prodi');
        $sekolahs = $request->input('nama-lembaga');
        $tahun_edus = $request->input('tahun');
        $info_edus = $request->input('info-relevan');

        if ($jurusans && $sekolahs && $tahun_edus && $info_edus) {
            foreach ($jurusans as $index => $jurusan) {
                Pendidikan::create([
                    'info_id' => $id,
                    'nama_prodi' => $jurusan,
                    'nama_lembaga' => $sekolahs[$index],
                    'tahun' => $tahun_edus[$index],
                    'informasi_relevan' => $info_edus[$index],
                ]);
            }
        }

        // 3.5 Pengalaman
        Pengalaman::where('info_id', $id)->delete();
        $posisi = $request->input('posisi-pekerjaan');
        $perusahaan = $request->input('nama-perusahaan');
        $tahunEx = $request->input('tahunEx');
        $infoEx = $request->input('info-relevanEx');

        if ($posisi && $perusahaan && $tahunEx && $infoEx) {
            foreach ($posisi as $index => $posisi) {
                Pengalaman::create([
                    'info_id' => $id,
                    'posisi_pekerjaan' => $posisi,
                    'nama_perusahaan' => $perusahaan[$index],
                    'tahun' => $tahunEx[$index],
                    'informasi_relevan' => $infoEx[$index],
                ]);
            }
        }
        return redirect()->route('form.show')->with('success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pendidikan = Pendidikan::find($id);
        $pendidikan->delete();

        return redirect()->back()->with('success', 'Data berhasil Dihapus!');
    }
}
