@extends('admin.template')
@section('breadcrumb')
    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('data.daerah') }}">Data Daerah</a></li>
    <li class="breadcrumb-item active" aria-current="page">Tambah Daerah</li>
@endsection
@section('page-content')
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12">
                <div class="card bg-white">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <form action="{{ route('tambah.daerah') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Nama
                                                    Daerah</label>
                                                <input class="form-control" type="text" name="nama_daerah"
                                                    id="example-text-input">
                                                @if ($errors->has('nama_daerah'))<small style="padding-left: 0; margin-left: 0;" class="text-danger" role="alert">{{ $errors->first('nama_daerah') }}</small>@endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-control-label">Jumlah Pasar</label>
                                                <input class="form-control" type="text" name="jumlah_pasar"
                                                    id="example-text-input">
                                                @if ($errors->has('jumlah_pasar'))<small style="padding-left: 0; margin-left: 0;" class="text-danger" role="alert">{{ $errors->first('jumlah_pasar') }}</small>@endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <a href="akun" class="btn btn-icon btn-danger" type="submit"
                                            style="margin-bottom: 0px">
                                            <span class="btn-inner--icon"><i class="ni ni-bold-left"></i></span>
                                            <span class="btn-inner--text">Kembali</span>
                                        </a>
                                        <button class="btn btn-icon btn-success" type="submit">
                                            <span class="btn-inner--icon"><i class="ni ni-cloud-upload-96"></i></span>
                                            <span class="btn-inner--text">Tambah Daerah</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- SCRIPT --}}
    <script type="text/javascript">
        function tampilkanPreview(gambar, idpreview) {
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
