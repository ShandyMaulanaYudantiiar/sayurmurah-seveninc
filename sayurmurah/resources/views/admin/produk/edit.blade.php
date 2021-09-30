@extends('admin.template')
@section('breadcrumb')
    <li class="breadcrumb-item" aria-current="page">Produk</li>
    <li class="breadcrumb-item active" aria-current="page">Edit Produk</li>
@endsection
@section('page-content')
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12">
                <div class="card bg-white">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <form action="{{ route('update.produk', $data->id_produk) }}" method="post"
                                    enctype="multipart/form-data">
                                    {{-- {{ csrf_field() }} --}}
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Nama
                                                    Produk</label>
                                                <input class="form-control" type="text" name="nama_produk"
                                                    id="example-text-input" value="{{ $data->nama_produk }}">
                                                @if ($errors->has('nama_produk'))<small style="padding-left: 0; margin-left: 0;" class="text-danger" role="alert">{{ $errors->first('nama_produk') }}</small>@endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-control-label">Jenis Produk</label>
                                                {{-- <select class="form-control" id="id_jenis_produk" name="id_jenis_produk">
                                                    <option value="{{ $data->jenis_produk }}">--- Pilih Jenis Produk---</option>
                                                    @foreach ($data as $jenis)
                                                        <option value="{{ $jenis->id_jenis_produk }}">
                                                            {{ $jenis->jenis_produk }}</option>
                                                    @endforeach
                                                </select> --}}
                                                @if ($errors->has('id_jenis_produk'))<small style="padding-left: 0; margin-left: 0;" class="text-danger" role="alert">{{ $errors->first('id_jenis_produk') }}</small>@endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-control-label">Satuan</label>
                                                <select class="form-control" name="satuan" id="satuan">
                                                    <option selected disabled>---Pilih Satuan---</option>
                                                    <option value="ons">Ons</option>
                                                    <option value="kilogram">Kg (Kilogram)</option>
                                                    <option value="ikat">Ikat</option>
                                                    <option value="bungkus">Bungkus</option>
                                                </select>
                                                @if ($errors->has('satuan'))<small style="padding-left: 0; margin-left: 0;" class="text-danger" role="alert">{{ $errors->first('satuan') }}</small>@endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="example-search-input" class="form-control-label">
                                                    Harga
                                                </label>
                                                <input class="form-control" type="text" name="harga_produk" id="rupiah"
                                                    value="{{ $data->harga_produk }}">
                                                @if ($errors->has('harga_produk'))<small style="padding-left: 0; margin-left: 0;" class="text-danger" role="alert">{{ $errors->first('jumlah_pasar') }}</small>@endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="form-control-label">Pasar</label>
                                                {{-- <select class="form-control" id="pasar" name="pasar">
                                                    <option >--- Pilih Pasar---</option>
                                                    @foreach ($r_pasar as $data)
                                                        <option value="{{ $data->id_pasar }}"> {{ $data->nama_pasar }}
                                                        </option>
                                                    @endforeach
                                                </select> --}}
                                                @if ($errors->has('pasar'))<small style="padding-left: 0; margin-left: 0;" class="text-danger" role="alert">{{ $errors->first('pasar') }}</small>@endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="example-password-input" class="form-control-label">Foto
                                                    Produk</label>
                                                <input name="foto_produk" id="foto" accept="image/*"
                                                    onchange="previewProduk(this, 'preview')" class="form-control"
                                                    type="file" placeholder="Upload foto">
                                                <h6 class="text-danger">*Harap upload file berekstensi gambar
                                                </h6>
                                                @if ($errors->has('foto_produk'))<small style="padding-left: 0; margin-left: 0;" class="text-danger" role="alert">{{ $errors->first('foto_produk') }}</small>@endif
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
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-control-label">Deskripsi Produk</label>
                                                <textarea class="form-control"
                                                    name="deskripsi_produk">{{ $data->deskripsi_produk }}</textarea>
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
                                            <span class="btn-inner--text">Edit Data</span>
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
        function previewProduk(gambar, idpreview) {
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
