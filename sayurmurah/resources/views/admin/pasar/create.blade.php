@extends('admin.template')
@section('breadcrumb')
    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('data.pasar') }}">Data Pasar</a></li>
    <li class="breadcrumb-item active" aria-current="page">Tambah Pasar</li>
@endsection
@section('page-content')
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12">
                <div class="card bg-white">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <form action="{{ route('tambah.pasar') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Nama
                                                    Pasar</label>
                                                <input class="form-control" type="text" name="nama_pasar"
                                                    id="example-text-input" placeholder="Masukkan nama pasar ...">
                                                @if ($errors->has('nama_pasar'))<small style="padding-left: 0; margin-left: 0;" class="text-danger" role="alert">{{ $errors->first('nama_pasar') }}</small>@endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-control-label">Daerah</label>
                                                <select class="form-control" id="id_daerah" name="id_daerah">
                                                    <option>--- Pilih Daerah---</option>
                                                    @foreach ($r_daerah as $daerah)
                                                        <option value="{{ $daerah->id_daerah }}">
                                                            {{ $daerah->nama_daerah }}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('id_daerah'))<small style="padding-left: 0; margin-left: 0;" class="text-danger" role="alert">{{ $errors->first('id_daerah') }}</small>@endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="example-password-input" class="form-control-label">Foto
                                                    Pasar</label>
                                                <input name="foto_pasar" id="foto" accept="image/*"
                                                    onchange="previewPasar(this, 'preview')" class="form-control"
                                                    type="file" placeholder="Upload foto">
                                                <h6 class="text-danger">*Harap upload file berekstensi gambar
                                                </h6>
                                                @if ($errors->has('foto_pasar'))<small style="padding-left: 0; margin-left: 0;" class="text-danger" role="alert">{{ $errors->first('foto_pasar') }}</small>@endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="input-group">
                                                <input type="hidden" name="blank" id="blank"
                                                    class="form-control border-dark small mb-3" placeholder="blank"
                                                    aria-describedby="basic-addon2">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="input-group">
                                                <img id="preview" src="preview" alt="" width="200px" /> <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="form-control-label">Alamat Pasar</label>
                                                <textarea class="form-control" type="text" name="alamat_pasar"
                                                    id="example-text-input"
                                                    placeholder="Masukkan alamat pasar ..."></textarea>
                                                @if ($errors->has('alamat_pasar'))<small style="padding-left: 0; margin-left: 0;" class="text-danger" role="alert">{{ $errors->first('alamat_pasar') }}</small>@endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <a href="{{ route('data.pasar') }}" class="btn btn-icon btn-danger" type="submit"
                                            style="margin-bottom: 0px">
                                            <span class="btn-inner--icon"><i class="ni ni-bold-left"></i></span>
                                            <span class="btn-inner--text">Kembali</span>
                                        </a>
                                        <button class="btn btn-icon btn-success" type="submit">
                                            <span class="btn-inner--icon"><i class="ni ni-cloud-upload-96"></i></span>
                                            <span class="btn-inner--text">Tambah Pasar</span>
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
        function previewPasar(gambar, idpreview) {
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
