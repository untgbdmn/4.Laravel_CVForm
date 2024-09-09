@extends('layouts.default')

@section('title', 'Download')

@section('section')
    <div class="container-md mt-5">
        <div class="row">
            {{-- Left --}}
            <div class="col left">
                <div class="left-container">
                    {{-- Profile --}}
                    <div class="profile">
                        <div class="image-container">
                            <img src="{{ asset('pictures/'. $data->foto) }}"
                            alt="Profile" class="img">
                        </div>
                        <div class="name-title">
                            <h1 class="name">{{ $data->nama }}</h1>
                            <h2 class="title">{{ $data->title }}</h2>
                        </div>
                    </div>
                    {{-- Informasi Dasar --}}
                    <div class="informasi-dasar">
                        <h3 class="title">INFORMASI DASAR</h3>
                        <div class="divider">
                            <div class="line"></div>
                        </div>
                        <div class="row">
                            <div class="col col-lg-5 info-label mt-3">
                                <h5 class="label">No. Handphone</h5>
                                <h5 class="label">Email</h5>
                                <h5 class="label">Alamat</h5>
                            </div>
                            <div class="col info mt-3">
                                <h5 class="value">{{ $data->no_hp }}</h5>
                                <h5 class="value">{{ $data->email }}</h5>
                                <h5 class="value">{{ $data->alamat }}o</h5>
                            </div>
                        </div>
                    </div>
                    {{-- Tentang Saya --}}
                    <div class="tentang-saya">
                        <h3 class="title">TENTANG SAYA</h3>
                        <div class="divider">
                            <div class="line"></div>
                        </div>
                        <p class="tentang mt-3">
                            {!! $data->tentangsaya->biografi !!}
                        </p>
                    </div>
                    {{-- Keahlian --}}
                    <div class="keahlian">
                        <h3 class="title">KEAHLIAN</h3>
                        <div class="divider">
                            <div class="line"></div>
                        </div>
                        <div class="container-bar-keahlian">
                            @foreach ($data->keahlian as $keahlian)
                                <div class="container-bar mt-3">
                                    <h5 class="bar-title">{{ $keahlian->nama_keahlian }}</h5>
                                    <div class="row">
                                        <div class="col col-lg-10">
                                            <div class="bar-label">
                                                <div class="bar-fill" style="background-color: #03662B; width: {{ $keahlian->level_keahlian }}%;"></div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="bar-value">
                                                <h6 class="value">{{ $keahlian->level_keahlian }}%</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            {{-- Right --}}
            <div class="col right">
                <div class="right-container">
                    {{-- Pendidikan --}}
                    <div class="pendidikan">
                        <h3 class="title">PENDIDIKAN</h3>
                        <div class="divider">
                            <div class="line"></div>
                        </div>
                        <div class="pendidikan-item mt-3">
                            @foreach ($data->pendidikan as $pendidikan)
                                <div class="row">
                                    <div class="col col-lg-1 bullet-list">
                                        <div class="bullet-container">
                                            <i class="bi bi-circle-fill"></i>
                                        </div>
                                    </div>
                                    <div class="col item-pend mb-2">
                                        <h6 class="tahun">{{ $pendidikan->tahun }}</h6>
                                        <h6 class="jurusan">{{ $pendidikan->nama_prodi }} <span>-</span> <span
                                                class="instansi">{{ $pendidikan->nama_lembaga }}</span> </h6>
                                        <p class="opsional">
                                            {{ $pendidikan->informasi_relevan }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {{-- Pengalaman --}}
                    <div class="pengalaman">
                        <h3 class="title">PENGALAMAN</h3>
                        <div class="divider">
                            <div class="line"></div>
                        </div>
                        <div class="pengalaman-item mt-3">
                            @foreach ($data->pengalaman as $pengalaman)
                                <div class="row">
                                    <div class="col col-lg-1 bullet-list">
                                        <div class="bullet-container">
                                            <i class="bi bi-circle-fill"></i>
                                        </div>
                                    </div>
                                    <div class="col item-peng mb-2">
                                        <h6 class="tahun">{{ $pengalaman->tahun }}</h6>
                                        <h6 class="posisi">{{ $pengalaman->posisi_pekerjaan }} <span>-</span> <span
                                                class="perusahaan">{{ $pengalaman->nama_perusahaan }}</span> </h6>
                                        <p class="opsional">
                                            {{ $pengalaman->informasi_relevan }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                {{-- Button --}}
                <div class="con-button">
                    <div class="btn-container">
                        <a class="btn btn-download" href="{{ route('form.edit', ['id' => $data->id]) }}">Edit CV</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
