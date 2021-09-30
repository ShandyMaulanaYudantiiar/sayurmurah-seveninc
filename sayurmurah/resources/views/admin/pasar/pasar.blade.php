{{-- Menghubungkan dengan Template Utama --}}
@extends('admin.template')
@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Data Pasar</li>
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
                        <a href="{{ route('pasar.show') }}" class="btn btn-icon btn-success" type="button">
                            <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                            <span class="btn-inner--text">Tambah Pasar</span>
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
                                                        Nama Pasar</th>
                                                    <th scope="col" class="sort" data-sort="status">
                                                        Alamat Pasar</th>
                                                    <th scope="col">Foto</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                                <?php $no = 1; ?>
                                                @foreach ($data_pasar as $pasar)
                                                    <tr>
                                                        <td>{{ $no }}</td>
                                                        <td>{{ $pasar['nama_pasar'] }}</td>
                                                        <td>{{ $pasar['alamat_pasar'] }}</td>
                                                        <td>
                                                            <img class="avatar rounded-circle mr-3"
                                                                src="{{ asset('/image/admin/pasar/' . $pasar['foto_pasar']) }}"
                                                                alt="img" width="100px">
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('edit.pasar',$pasar->id_pasar)}}" style="margin-bottom: 0"
                                                                class="btn btn-icon btn-primary" type="button">
                                                                <span class="btn-inner--icon text-white"><i
                                                                        class="ni ni-ruler-pencil"></i></span>
                                                                <span class="btn-inner--text text-white">Edit</span>
                                                            </a>
                                                            <a href="{{ route ('delete.pasar', $pasar->id_pasar )}}"
                                                                class="btn btn-icon btn-danger btn-rounded-circle"
                                                                type="button" onclick="confirm_modal('')"
                                                                data-toggle="modal"
                                                                data-target="#deleteModal{{ $pasar->id_pasar }}">
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
                                        <div class="modal fade" id="deleteModal{{ $pasar->id_pasar }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                        <a href="{{ route('delete.pasar', $pasar->id_pasar ) }}" type="button"
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
