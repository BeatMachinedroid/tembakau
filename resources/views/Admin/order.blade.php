@include('layout.header')

@section('title', 'Order')

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
        navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
                </ol>
                <h6 class="font-weight-bolder mb-0">@yield('title')</h6>
            </nav>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    <div class="input-group">
                        <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                        <form action="" method="get">
                            <input type="text" class="form-control" placeholder="Type here..." name="search">
                        </form>
                    </div>
                </div>
                <ul class="navbar-nav  justify-content-end">
                    {{-- <li class="nav-item d-flex align-items-center">
                        <a class="btn btn-outline-primary btn-sm mb-0 me-3" target="_blank"
                            href="https://www.creative-tim.com/builder?ref=navbar-soft-ui-dashboard">Online Builder</a>
                    </li> --}}
                    <li class="nav-item d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body font-weight-bold px-0">
                            <i class="fa fa-user me-sm-1"></i>
                            <span class="d-sm-inline d-none">username</span>
                        </a>
                    </li>
                    <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                            </div>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid py-4">

        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">


                    </div>

                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    @if (session()->has('message'))
                                            <div class="alert alert-success">
                                                {{ session()->get('message') }}
                                            </div>
                                        @endif
                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-xm font-weight-bolder text-center">
                                            No</th>
                                        <th class="text-uppercase text-secondary text-xm font-weight-bolder opacity-7">
                                            Nama pembeli</th>
                                        <th
                                            class="text-uppercase text-secondary text-xm font-weight-bolder opacity-7 ps-2">
                                            alamat</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xm font-weight-bolder opacity-7">
                                            Nama Barang</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xm font-weight-bolder opacity-7">
                                            Jumlah</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xm font-weight-bolder opacity-7">
                                            Total</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xm font-weight-bolder opacity-7">
                                            tgl bayar</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xm font-weight-bolder opacity-7">
                                            keterangan</th>
                                        <th
                                            class="text-text-left text-uppercase text-secondary text-xm font-weight-bolder opacity-7">
                                            Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($order as $no => $item)
                                    <tr>
                                        <td>
                                            <div>
                                                <h6 class="text-xs font-weight-bold mb-0 text-center">{{ $no + 1 }}</h6>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-xm">{{ $item->transaksi->nama_pembeli }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xm font-weight-bold mb-0">{{ $item->transaksi->alamat }}</p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <p class="text-xm font-weight-bold mb-0">{{ $item->transaksi->barang->nama_barang }}</p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <p class="text-xm font-weight-bold mb-0">{{ $item->transaksi->jumlah }}</p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <p class="text-xm font-weight-bold mb-0">{{ $item->transaksi->jumlah }}</p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <p class="text-xm font-weight-bold mb-0">{{ $item->total_bayar }}</p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <p class="text-xm font-weight-bold mb-0">{{ $item->tgl_bayar }}</p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <p class="text-xm font-weight-bold mb-0">{{ $item->keterangan }}</p>
                                        </td>
                                        <td class="align-middle">
                                            <a class="text-secondary text-left font-weight-bold text-xm"
                                                data-bs-toggle="modal" data-bs-target="#editBarang-{{ $item->id }}" href="">
                                                Edit
                                            </a>
                                            <span>|</span>
                                            <a class="text-primary text-left font-weight-bold text-xm" href="{{ route('delete.supplier', ['id' => $item->id]) }}"
                                                onclick="return confirm('Are you sure ?')">
                                                Delete
                                            </a>
                                        </td>

                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="9">
                                            <div class="alert alert-danger text-white">
                                                Data is Empty
                                            </div>
                                        </td>
                                   </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <div class="pagen">
                                {{ $order->links('layout.paginate') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer pt-3  ">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6 mb-lg-0 mb-4">
                        <div class="copyright text-center text-sm text-muted text-lg-start">
                            © <script>
                                document.write(new Date().getFullYear())
                            </script>,
                            made with <i class="fa fa-heart"></i> by
                            <a href="" class="font-weight-bold" target="_blank">Kaykia</a>
                            for a better web.
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</main>

@include('layout.footer')

@foreach ($order as $edit)
<!-- Edit Modal -->
<div class="modal fade" id="editBarang-{{ $edit->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit | @yield('title')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('edit.order') }}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <input type="hidden" name="id" value="{{ $edit->id }}">
                        <div class="text-center">
                            <img src="{{ asset('storage/bukti_bayar/' . $edit->bukti_transfer) }}" class="me-4 mb-4"
                                alt="{{ $edit->bukti_transfer }}" style="width: 120px; height: 120px;">
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Nama Barang" name="nama_supplier" value="{{ $edit->total_bayar }}" disabled>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input type="text" class="form-control" value="{{ $edit->transaksi->barang->nama_barang }}" disabled>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input type="text" class="form-control" value="{{ $edit->transaksi->jumlah }}" disabled>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <select class="form-control" name="keterangan">
                                    <option>Keteragan</option>
                                    <option value="success">Success</option>
                                    <option value="pending">Pending</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
@endforeach

{{-- modal Add --}}

