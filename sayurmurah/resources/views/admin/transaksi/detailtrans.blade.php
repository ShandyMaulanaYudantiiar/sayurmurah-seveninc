{{-- Menghubungkan dengan Template --}}
@extends('admin.template')

{{-- Breadcrumb --}}
@section('breadcrumb')
    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('transaksi') }}">Data Transaksi</a></li>
    <li class="breadcrumb-item active" aria-current="page">Tambah Akun</li>
@endsection

{{-- Page Content --}}
@section('page-content')
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12">
                <div class="card bg-white">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <form action="{{ route('tambah') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Kode
                                                    Transaksi</label>
                                                <input id="kode" name="kode" class="form-control" type="text"
                                                    placeholder="270920212050" id="example-text-input" disabled>
                                                @if ($errors->has('nama'))<small style="padding-left: 0; margin-left: 0;" class="text-danger" role="alert">{{ $errors->first('nama') }}</small>@endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="example-search-input" class="form-control-label">Pemesan</label>
                                                <input id="pemesan" name="pemesan" class="form-control" type="text"
                                                    placeholder="Gojou Satoru" id="example-search-input" disabled>
                                                @if ($errors->has('telepon'))<small style="padding-left: 0; margin-left: 0;" class="text-danger" role="alert">{{ $errors->first('telepon') }}</small>@endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Alamat
                                                    Pengiriman</label>
                                                <textarea id="alamat" name="alamat" class="form-control" type="text"
                                                    placeholder="Jl. Sagitarius no 34"
                                                    id="example-text-input">Jl. Sagitarius no 34</textarea>
                                                @if ($errors->has('nama'))<small style="padding-left: 0; margin-left: 0;" class="text-danger" role="alert">{{ $errors->first('nama') }}</small>@endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="example-search-input" class="form-control-label">Sub
                                                    Total</label>
                                                <input id="pemesan" name="pemesan" class="form-control" type="text"
                                                    placeholder="Rp. 75,400" id="example-search-input" disabled>
                                                @if ($errors->has('telepon'))<small style="padding-left: 0; margin-left: 0;" class="text-danger" role="alert">{{ $errors->first('telepon') }}</small>@endif
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="form-group">
                                    <label for="example-email-input" class="form-control-label">Alamat</label>
                                    <textarea class="form-control" placeholder="Masukkan alamat lengkap ..."
                                        id="example-email-input"></textarea>
                                </div> --}}
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="example-password-input" class="form-control-label">Total
                                                    Bayar</label>
                                                <input id="password1" name="password1" class="form-control" type="text"
                                                    placeholder="Rp. 100,000" id="example-password-input">
                                                @if ($errors->has('password1'))<small style="padding-left: 0; margin-left: 0;" class="text-danger" role="alert">{{ $errors->first('password1') }}</small>@endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="example-password-input"
                                                    class="form-control-label">Kembali</label>
                                                <input id="password2" name="password2" class="form-control" type="text"
                                                    placeholder="Rp. 25,400" id="example-password-input" disabled>
                                                @if ($errors->has('password2'))<small style="padding-left: 0; margin-left: 0;" class="text-danger" role="alert">{{ $errors->first('password2') }}</small>@endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="example-password-input" class="form-control-label">Bukti
                                                    Pembayaran</label>
                                                {{-- <input name="foto" id="foto" accept="image/*"
                                                    onchange="tampilkanPreview(this, 'preview')" class="form-control"
                                                    type="file" placeholder="Upload foto" id="example-password-input"> --}}
                                                <a href="#" class="form-control">Lihat bukti pembayaran</a>
                                                <h6 class="text-danger">*Harap upload file berekstensi gambar
                                                </h6>
                                                @if ($errors->has('foto'))<small style="padding-left: 0; margin-left: 0;" class="text-danger" role="alert">{{ $errors->first('foto') }}</small>@endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-control-label">Status Transaksi</label>
                                                <select class="form-control" name="status" id="status">
                                                    <option selected disabled>---Pilih status---</option>
                                                    <option value="1">Lunas</option>
                                                    <option value="2">Belum bayar</option>
                                                    <option value="3">Tolak</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="input-group">
                                                <img id="preview" src="" alt="" width="300px" /> <br>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="input-group">
                                                <input type="hidden" name="blank" id="blank"
                                                    class="form-control border-dark small mb-3" placeholder="blank"
                                                    aria-describedby="basic-addon2">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <a href="{{ route('kelolaakun') }}" class="btn btn-icon btn-danger" type="submit"
                                            style="margin-bottom: 0px">
                                            <span class="btn-inner--icon"><i class="ni ni-bold-left"></i></span>
                                            <span class="btn-inner--text">Kembali</span>
                                        </a>
                                        <button href="{{ route('kelolaakun') }}" class="btn btn-icon btn-success"
                                            type="submit">
                                            <span class="btn-inner--icon"><i class="ni ni-cloud-upload-96"></i></span>
                                            <span class="btn-inner--text">Simpan</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
    </div>
    <!-- Footer -->
</div>
</div>
<!-- Argon Scripts -->
<script>
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
