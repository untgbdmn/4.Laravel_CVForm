@extends('layouts.default')

@section('title', 'Input')

@section('section')
    <x-popup></x-popup>
    <div class="main-section">
        {{-- Debug --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="container">
            <form action="{{ route('form.post') }}" method="post" enctype="multipart/form-data">
                @csrf
                {{-- Informasi Dasar --}}
                <div class="container-md ">
                    <h2 class="main-title">INFORMASI DASAR</h2>
                    {{-- Photo --}}
                    <div class="form-group photo mt-4">
                        <label for="photo" class="foto">
                            <input type="file" name="photo" id="photo" onchange="previewImage(event)" />
                            <div class="preview">
                                <div class="preFoto"></div>
                            </div>
                            <span class="add-icon"><i class="bi bi-plus-circle-fill"></i></span>
                        </label>
                    </div>
                    {{-- Input Form --}}
                    <div class="form-container">
                        <div class="form-group">
                            <div class="row g-3 mb-3">
                                <div class="col">
                                    <label for="nama" class="mb-1">Nama</label>
                                    <input type="text" name="nama" id="nama" class="form-control"
                                        placeholder="First name">
                                </div>
                                <div class="col">
                                    <label for="title" class="mb-1">Title</label>
                                    <input type="text" name="title" id="title" class="form-control"
                                        placeholder="Title">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row g-3 ">
                                <div class="col">
                                    <label for="email" class="mb-1">Email</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="bi bi-envelope"></i></span>
                                        <input type="text" name="email" id="email" class="form-control"
                                            placeholder="Email" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="nomor" class="mb-1">No.Handphone</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="bi bi-telephone"></i></span>
                                        <input type="text" name="nomor" id="nomor" class="form-control"
                                            placeholder="No Handphone" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row g-3">
                                <div class="col-6">
                                    <label for="alamat" class="mb-1">Alamat</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="bi bi-geo-alt"></i></span>
                                        <input type="text" name="alamat" id="alamat" class="form-control"
                                            placeholder="Alamat" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Tentang Saya --}}
                <div class="container-md mt-5">
                    <h2 class="main-title">TENTANG SAYA</h2>
                    <div class="form-group mt-lg-4">
                        <div class="row g-3">
                            <div class="col">
                                <textarea name="bio" id="bio" class="form-control" placeholder="Ketik Biografi Singkat Anda..."
                                    oninput="adjustTextareaHeight(this)"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Keahlian --}}
                <div class="container-md mt-5">
                    <h2 class="main-title">KEAHLIAN</h2>
                    <div class="form-group mt-4">
                        <label for="inputKeahlian">Keahlian</label>
                        <input type="text" id="inputKeahlian" class="form-control" placeholder="Keahlian anda..."
                            style="width: 80%">
                        <div id="outputKeahlian">
                            <div class="skill-item">
                                <input type="text" name="skills[]" value="UI Design" class="namaKeahlian" readonly />
                                <div class="barRange">
                                    <input type="range" name="levels[]" min="0" max="100" value="0"
                                        class="valueKeahlian" style="background-color: #03662b" />
                                    <span class="valueRange">0%</span>
                                    <span class="remove-skill"><i class="bi bi-x-circle"></i></span>
                                </div>
                            </div>
                            <div class="skill-item">
                                <input type="text" name="skills[]" value="Graphic Design" class="namaKeahlian"
                                    readonly />
                                <div class="barRange">
                                    <input type="range" name="levels[]" min="0" max="100" value="0"
                                        class="valueKeahlian" style="background-color: #03662b" />
                                    <span class="valueRange">0%</span>
                                    <span class="remove-skill"><i class="bi bi-x-circle"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Pendidikan --}}
                <div class="container-md mt-4">
                    <h2 class="main-title">PENDIDIKAN</h2>
                    <div class="ouputPendidikan" id="ouputPendidikan">
                        <div class="pendidikan-item">
                            <div class="text-pendidikan">
                                <input type="text" name="nama-prodi[]" value="Multimedia" class="jurusan" readonly />
                                <input type="text" name="nama-lembaga[]" value="SMK N 1 Jakarta" class="nama-lembaga"
                                    readonly />
                                <input type="text" name="tahun[]" value="Juli 2023" class="tahun" readonly />
                                <input type="text" name="info-relevan[]"
                                    value="Juara lomba design kejuruan antar sekolah" class="info-relevan" readonly />
                            </div>
                            <div class="aksi-pendidikan">
                                <span class="edit-pendidikan"><i class="bi bi-pencil-square"></i></span>
                                <span class="remove-pendidikan"><i class="bi bi-x-circle"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="container-input mt-3">
                        <div class="card card-body">
                            <input type="text" name="jurusan" id="jurusan" placeholder="Jurusan">
                            <input type="text" name="sekolah" id="sekolah" placeholder="Sekolah">
                            <input type="text" name="tahun-edu" id="tahun-edu" placeholder="Tahun">
                            <input type="text" name="info-edu" id="info-edu" placeholder="Informasi (Relevan)">
                        </div>
                    </div>
                    {{-- Button --}}
                    <div class="button">
                        <button class="tambahPendidikan mt-3" id="tambahPendidikan" type="button">
                            <i class="bi bi-plus-circle-fill"></i> Tambah Pendidikan
                        </button>
                    </div>
                </div>

                {{-- Pengalaman --}}
                <div class="container-md mt-4">
                    <h2 class="main-title">PENGALAMAN</h2>
                    <div class="outputPengalaman" id="outputPengalaman">
                        <div class="pengalaman-item">
                            <div class="text-pengalaman">
                                <input type="text" name="posisi-pekerjaan[]" value="UI/UX Design" class="jurusan"
                                    readonly />
                                <input type="text" name="nama-perusahaan[]" value="PT Belanja Pasti"
                                    class="nama-lembaga" readonly />
                                <input type="text" name="tahunEx[]" value="2021" class="tahun" readonly />
                                <input type="text" name="info-relevanEx[]"
                                    value="Dapat mendesign user interfase berbasis mobile maupun web "
                                    class="info-relevan" readonly />
                            </div>
                            <div class="aksi-pengalaman">
                                <span class="edit-pengalaman"><i class="bi bi-pencil-square"></i></span>
                                <span class="remove-pengalaman"><i class="bi bi-x-circle"></i></span>
                            </div>
                        </div>
                        <div class="pengalaman-item">
                            <div class="text-pengalaman">
                                <input type="text" name="posisi-pekerjaan[]" value="Graphic Design" class="jurusan"
                                    readonly />
                                <input type="text" name="nama-perusahaan[]" value="Pt Belanja Pasti"
                                    class="nama-lembaga" readonly />
                                <input type="text" name="tahunEx[]" value="2017" class="tahun" readonly />
                                <input type="text" name="info-relevanEx[]" value="" class="info-relevan"
                                    readonly />
                            </div>
                            <div class="aksi-pengalaman">
                                <span class="edit-pengalaman"><i class="bi bi-pencil-square" id="active"></i></span>
                                <span class="remove-pengalaman"><i class="bi bi-x-circle" id="active"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="container-input mt-3">
                        <div class="card card-body">
                            <input type="text" name="posisi" id="posisi" placeholder="Nama Pekerjaan">
                            <input type="text" name="instansi" id="instansi" placeholder="Nama Perusahaan">
                            <input type="text" name="tahun-ex" id="tahun-ex" placeholder="Tahun">
                            <input type="text" name="info-ex" id="info-ex" placeholder="Informasi (Relevan)">
                        </div>
                    </div>
                    {{-- Button --}}
                    <div class="button">
                        <button class="tambahPengalaman mt-3" id="tambahPengalaman" type="button">
                            <i class="bi bi-plus-circle-fill"></i> Tambah Pengalaman
                        </button>
                    </div>
                </div>

                {{-- Button --}}
                <div class="container-button">
                    <button type="submit" id="buat-cv" class="buat-cv">
                        {{-- <a href="/download">Buat CV</a> --}}Buat CV
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
