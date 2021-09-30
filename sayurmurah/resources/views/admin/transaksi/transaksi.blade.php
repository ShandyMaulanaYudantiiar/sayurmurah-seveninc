{{-- Menghubungkan dengan Template --}}
@extends('admin.template')

{{-- Breadcrumb --}}
@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Data Transaksi</li>
@endsection


{{-- Page Content --}}
@section('page-content')
    <div class="container-fluid mt--6">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @elseif ($message = Session::get('loginError'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <div class="row">
            <div class="col-xl-12">
                <div class="card bg-white">
                    <div class="card-header bg-transparent">
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="example-date-input" class="form-control-label">Telusuri sejak :</label>
                                    <input class="form-control" type="date" value="2018-11-23" id="example-date-input">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="example-date-input" class="form-control-label">Hingga :</label>
                                    <input class="form-control" type="date" value="2018-11-23" id="example-date-input">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <button class="btn btn-icon btn-success" type="button" style="margin-top: 30px">
                                        <span class="btn-inner--icon"><i class="ni ni-zoom-split-in"></i></span>
                                        <span class="btn-inner--text">Tampilkan</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="table-responsive">
                                    <div>
                                        <table class="table align-items-center">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col" class="sort" data-sort="name">No</th>
                                                    <th scope="col" class="sort" data-sort="budget">Tanggal
                                                    </th>
                                                    <th scope="col" class="sort" data-sort="status">Pemesan
                                                    </th>
                                                    <th scope="col">Total Transaksi</th>
                                                    <th scope="col" class="sort" data-sort="completion">
                                                        Status</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list">
                                                <?php $no = 1; ?>
                                                <tr>
                                                    <td>{{ $no }}</td>
                                                    <td>{{ Date('d-m-Y') }}</td>
                                                    <td>Gojou Satoru</td>
                                                    <td>Rp. {{ number_format(75400) }}</td>
                                                    <td><span class="badge badge-success">Lunas</span></td>
                                                    <td>
                                                        <a href="{{ route('detail.trans') }}"
                                                            class="btn btn-icon btn-warning" type="button">
                                                            <span class="btn-inner--icon text-light"><i
                                                                    class="ni ni-zoom-split-in"></i></span>
                                                            <span class="btn-inner--text text-light">Detail</span>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php $no++; ?>
                                            </tbody>
                                        </table>
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
        </div>
    </div>
@endsection
