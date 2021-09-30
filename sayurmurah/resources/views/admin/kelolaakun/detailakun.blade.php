{{-- Menghubungkan dengan Template --}}
@extends('admin.template')

{{-- Breadcrumb --}}
@section('breadcrumb')
    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('kelolaakun') }}">Kelola Akun</a></li>
    <li class="breadcrumb-item active" aria-current="page">Detail Akun</li>
@endsection

{{-- Page Content --}}
@section('page-content')
    <form action="" method="POST">
        {{ csrf_field() }}
        @method('PUT')
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card bg-white">
                        <div class="card-header bg-transparent">
                            <button class="btn btn-icon btn-success" type="submit" name="aktif" id="aktif">
                                <span class="btn-inner--icon"><i class="ni ni-check-bold"></i></span>
                                <span class="btn-inner--text">Aktif</span>
                            </button>
                            <button class="btn btn-icon btn-warning" type="submit" name="mati" id="mati">
                                <span class="btn-inner--icon"><i class="ni ni-fat-delete"></i></span>
                                <span class="btn-inner--text">Non-Aktif</span>
                            </button>
                            <div class="row align-items-center">
                                {{-- @foreach ($data_akun as $row) --}}
                                <div class="col">
                                    <img src="{{ asset('/image/' . $data_akun->foto) }}" alt="Foto Profil"
                                        class="logo mx-auto d-block mb-5 rounded-circle" width="200px">
                                    <div class="row">
                                        <div class="my-auto col-sm-2">
                                            <p>Nama Lengkap:</p>
                                        </div>
                                        <div class="my-auto col-sm-9">
                                            <p>{{ $data_akun->nama }}</p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="my-auto col-sm-2">
                                            <p>Email:</p>
                                        </div>
                                        <div class="my-auto col-sm-9">
                                            <p>{{ $data_akun->email }}</p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="my-auto col-sm-2">
                                            <p>Status:</p>
                                        </div>
                                        <div class="my-auto col-sm-9">
                                            <p>
                                                @if ($data_akun->status == 1)
                                                    <span class="badge badge-success">Aktif</span>
                                                @else
                                                    <span class="badge badge-danger">Non-Aktif</span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="my-auto col-sm-2">
                                            <p>Telepon/Whatsapp:</p>
                                        </div>
                                        <div class="my-auto col-sm-9">
                                            <p>{{ $data_akun->telepon }}</p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="my-auto col-sm-2">
                                            <p>Jabatan:</p>
                                        </div>
                                        <div class="my-auto col-sm-9">
                                            <p>
                                                @if ($data_akun->akses == 0)
                                                    <span class="badge badge-primary">Super Admin</span>
                                                @elseif ($data_akun->akses == 1)
                                                    <span class="badge badge-info">Admin</span>
                                                @elseif ($data_akun->akses == 2)
                                                    <span class="badge badge-warning">Mitra</span>
                                                @elseif ($data_akun->akses == 3)
                                                    <span class="badge badge-secondary">User</span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    <a href="{{ route('kelolaakun') }}" class="btn btn-icon btn-danger" type="submit"
                                        style="margin-bottom: 0px">
                                        <span class="btn-inner--icon"><i class="ni ni-bold-left"></i></span>
                                        <span class="btn-inner--text">Kembali</span>
                                    </a>
                                </div>
                            </div>
                            {{-- @endforeach --}}
                        </div>
                    </div>
                </div>
            @endsection


</form>
