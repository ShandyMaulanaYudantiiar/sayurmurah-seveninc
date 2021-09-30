{{-- Menghubungkan dengan Template Utama --}}
@extends('admin.template')
@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Profile</li>
@endsection

@section('page-content')
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <body>
        <div class="main-content">
            <!-- Page content -->
            <div class="container-fluid mt--7">
                <div class="row">
                    <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                        <div class="card card-profile shadow">
                            <div class="row justify-content-center">
                                <div class="col-lg-3 order-lg-2">
                                    <div class="card-profile-image">
                                        <a href="{{ route('profile.show', $data->id_admin) }}">
                                            <img src="{{ asset('image/admin/akun/'. $data->foto)  }}"
                                                class="rounded-circle">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0 pt-md-4">
                                <div class="row">
                                    <div class="col">
                                        <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                            <h3>
                                                {{ $data->nama }}<span class="font-weight-light"></span>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <div class="h5 font-weight-300">
                                        @if ($data->akses == 0)
                                            <h4>Super Admin</h4>
                                        @elseif ($data->akses == 1)
                                            <h4>Admin</h4>
                                        @elseif ($data->akses == 2)
                                            <h4>Mitra</h4>
                                        @elseif ($data->akses == 3)
                                            <h4>User</h4>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 order-xl-1">
                        <div class="card bg-secondary shadow">
                            <div class="card-header bg-white border-0">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <h3 class="mb-0">My account</h3>
                                    </div>
                                    <div class="col-4 text-right">
                                        <a href="#" class="btn btn-sm btn-primary">Edit</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form>
                                    <h6 class="heading-small text-muted mb-4">Biodata</h6>
                                    <div class="pl-lg-4">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group focused">
                                                    <label class="form-control-label" for="input-username">Nama</label>
                                                    <input type="text" id="input-username" disabled
                                                        value="{{ $data->nama }}"
                                                        class="form-control form-control-alternative"
                                                        placeholder="Username">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-email">Email
                                                    </label>
                                                    <input type="email" id="input-email" disabled
                                                        value="{{ $data->email }}"
                                                        class="form-control form-control-alternative"
                                                        placeholder="jesse@example.com">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group focused">
                                                    <label class="form-control-label" for="input-first-name">Telepon</label>
                                                    <input type="text" id="input-first-name" disabled
                                                        class="form-control form-control-alternative"
                                                        placeholder="First name" value="{{ $data->telepon }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group focused">
                                                    <label class="form-control-label" for="input-last-name">Status Akun</label>
                                                    @if ($data->status == 0)
                                                        <input type="text" id="input-last-name" disabled
                                                        class="form-control form-control-alternative"
                                                        placeholder="Last name" value="Tidak Aktif">
                                                    @elseif($data->status == 1)
                                                        <input type="text" id="input-last-name" disabled
                                                        class="form-control form-control-alternative"
                                                        placeholder="Last name" value="Aktif">   
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-4">
                                    <!-- Description -->
                                    <h6 class="heading-small text-muted mb-4">Foto</h6>
                                    <div class="pl-lg-4">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-email">Foto
                                                    </label>
                                                    <input name="foto_profile" id="foto_profile" accept="image/*" disabled
                                                        onchange="previewProfile(this, 'preview')" class="form-control"
                                                        type="file" placeholder="Upload foto">
<<<<<<< Updated upstream
                                                    <h6 class="text-danger">*Harap upload file berekstensi gambar
=======
                                                    <h6 class="text-danger">*Harap upload file berekstensi gambar --}}
                                                    <img alt="Image placeholder"
                                                        src="{{ asset('assets-admin/img/theme/team-4.jpg') }}"
                                                        width="300px">
>>>>>>> Stashed changes
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="input-group">
                                                    <img id="preview" src="preview" alt="" width="200px" /> <br>
                                                    <img alt="Image placeholder"
                                                        src="{{ asset('image/admin/akun/'. $data->foto)  }}"
                                                        width="200px">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    {{-- SCRIPT TAMPILKAN GAMBAR --}}
    <script type="text/javascript">
        function previewProfile(gambar, idpreview) {
            //                membuat objek gambar
            var gb = gambar.files;
            //                loop untuk merender gambFar
            for (var i = 0; i < gb.length; i++) {
                //                    bikin variabel
                var gbPreview = gb[i];
                var imageType = /image.*/;
                var preview = document.getElementById(idpreview);
                var reader = new FileReader();
                if (gbPreview.type.match(imageType)) {
                    //                        jika tipe data sesuai
                    preview.file = gbPreview;
                    reader.onload = (function(element) {
                        return function(e) {
                            element.src = e.target.result;
                        };
                    })(preview);
                    //                    membaca data URL gambar
                    reader.readAsDataURL(gbPreview);
                } else {
                    //                        jika tipe data tidak sesuai
                    alert(
                        "Hanya dapat menampilkan preview tipe gambar. Harap simpan perubahan untuk melihat dan merubah gambar."
                    );
                }
            }
        }
    </script>
@endsection
