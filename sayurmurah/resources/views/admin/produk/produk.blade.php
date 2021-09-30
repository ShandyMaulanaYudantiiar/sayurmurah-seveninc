{{-- Menghubungkan dengan Template Utama --}}
@extends('admin.template')
@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Data Produk</li>
@endsection

@section('page-content')
    <div class="container-fluid mt--6">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @elseif ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <div class="row">
            <div class="col-xl-12">
                <div class="card bg-white">
                    <div class="card-header bg-transparent">
                        <a href="{{ route('produk.show') }}" class="btn btn-icon btn-success" type="button">
                            <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                            <span class="btn-inner--text">Tambah Produk</span>
                        </a>
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="table-responsive">
                                    <div style="overflow-y: auto;">
                                        <table class="table align-items-center">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col" class="sort" data-sort="name">No
                                                    </th>
                                                    <th scope="col" class="sort" data-sort="budget">
                                                        Nama Produk</th>
                                                    <th scope="col" class="sort" data-sort="status">
                                                        Harga Produk</th>
                                                    <th scope="col" class="sort" data-sort="status">
                                                        Satuan Produk</th>
                                                    <th scope="col" class="sort" data-sort="status">
                                                        Foto Produk</th>
                                                    {{-- <th scope="col">Foto</th> --}}
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                                <?php $no = 1; ?>
                                                @foreach ($produk as $produk)
                                                    <tr>
                                                        <td>{{ $no }}</td>
                                                        <td>{{ $produk['nama_produk'] }}</td>
                                                        <td>{{ $produk['harga_produk'] }}</td>
                                                        <td>{{ $produk['satuan'] }}</td>
                                                        <td>
                                                            <img class="avatar rounded-circle mr-3"
                                                                src="{{ asset('/image/admin/produk/' . $produk['foto_produk']) }}"
                                                                alt="img" width="100px">
                                                        </td>
                                                        <td>
                                                            {{-- <a href="produk/edit/{{ $produk->id_produk }}" style="margin-bottom: 0" --}}
                                                            <a href="{{ route('edit.produk', $produk->id_produk) }}" style="margin-bottom: 0"
                                                                class="btn btn-icon btn-primary" type="button">
                                                                <span class="btn-inner--icon text-white"><i
                                                                        class="ni ni-ruler-pencil"></i></span>
                                                                <span class="btn-inner--text text-white">Edit</span>
                                                            </a>
                                                            <a href="{{ route('delete.produk',$produk->id_produk ) }}"
                                                                class="btn btn-icon btn-danger btn-rounded-circle"
                                                                type="button" onclick="confirm_modal('')"
                                                                data-toggle="modal"
                                                                data-target="#deleteModal{{ $produk->id_produk }}">
                                                                <span class="btn-inner--icon text-white"><i
                                                                        class="ni ni-fat-remove"></i></span>
                                                                <span class="btn-inner--text text-white">Delete</span>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <?php $no++; ?>
                                                @endforeach
                                            </thead>
                                            <tbody class="list">
                                            </tbody>
                                        </table>
                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="deleteModal{{ $produk->id_produk }}"
                                            tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Apakah
                                                            anda yakin ingin menghapus data?</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Pilih tombol cancel untuk kembali, dan pilih tombol
                                                            delete untuk menghapus.</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal"
                                                            style="margin-bottom: 0;">Cancel</button>
                                                        <a href="{{route('delete.produk', $produk->id_produk )}}" type="button"
                                                            class="btn btn-success">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <nav aria-label="...">
                                            <ul class="pagination justify-content-end">
                                                <li class="page-item disabled">
                                                    <a class="page-link" href="#" tabindex="-1">
                                                        <i class="fa fa-angle-left"></i>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                </li>
                                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                                <li class="page-item ">
                                                    <a class="page-link" href="#">2 <span
                                                            class="sr-only">(current)</span></a>
                                                </li>
                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#">
                                                        <i class="fa fa-angle-right"></i>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
