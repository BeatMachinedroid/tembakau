@include('layout.header')

@section('title', 'Barang')

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
                        <input type="text" class="form-control" placeholder="Type here...">
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
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Tambah Barang
                        </button>

                    </div>

                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-xm font-weight-bolder text-center">
                                            No</th>
                                        <th class="text-uppercase text-secondary text-xm font-weight-bolder opacity-7">
                                            Barang</th>
                                        <th
                                            class="text-uppercase text-secondary text-xm font-weight-bolder opacity-7 ps-2">
                                            category</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xm font-weight-bolder opacity-7">
                                            Stock</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xm font-weight-bolder opacity-7">
                                            tanggal masuk</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xm font-weight-bolder opacity-7">
                                            supplier</th>
                                        <th
                                            class="text-text-left text-uppercase text-secondary text-xm font-weight-bolder opacity-7">
                                            Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($barang as $no => $item)
                                    <tr>
                                        <td>
                                            <div>
                                                <h6 class="text-xs font-weight-bold mb-0 text-center">{{ $no + 1 }}</h6>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <img src="{{ asset('storage/barang/' . $item->images) }}" class="avatar avatar-xm me-4"
                                                        alt="{{ $item->images }}">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-xm">{{ $item->nama_barang }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xm font-weight-bold mb-0">{{ $item->category }}</p>
                                        </td>
                                        <td class="align-middle text-center text-xm">
                                            @if ($item->stock >= 5)
                                            <span class="badge badge-xm bg-gradient-success">{{ $item->stock }}
                                                ons</span>
                                            @else
                                            <span class="badge badge-xm bg-gradient-danger">{{ $item->stock }}
                                                ons</span>
                                            @endif
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xm font-weight-bold">{{
                                                $item->created_at->format('d / m / Y') }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <p class="text-xm font-weight-bold mb-0">{{ $item->supplier->nama_supplier }}</p>
                                        </td>
                                        <td class="align-middle">
                                            <a class="text-secondary text-left font-weight-bold text-xm"
                                                data-bs-toggle="modal" data-bs-target="#editBarang-{{ $item->id }}" href="">
                                                Edit
                                            </a>
                                            <span>|</span>
                                            <a class="text-primary text-left font-weight-bold text-xm" href=""
                                                onclick="return confirm('Are you sure ?')">
                                                Delete
                                            </a>
                                        </td>

                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
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

@foreach ($barang as $edit)
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
                <div class="text-center">
                    <img src="{{ asset('storage/barang/' . $edit->images) }}" class="me-4 mb-4"
                        alt="{{ $edit->images }}" style="width: 120px; height: 120px;">
                </div>
                <form method="post" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Nama Barang" name="name" value="{{ $edit->nama_barang }}">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input type="file" class="form-control" placeholder="Image" name="image">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <select class="form-control" name="category">
                                    <option disabled>-- Category --</option>
                                    <option value="{{ $edit->category }}">{{ $edit->category }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Price" name="price" value="Rp. {{ $edit->harga }}">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Stock" name="stock" value="{{ $edit->stock }} ons">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <select class="form-control" name="category">
                                    <option>-- Supplier --</option>
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
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah | Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('add.barang') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Nama Barang" name="nama_barang">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input type="file" class="form-control" placeholder="Image" name="images">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <select class="form-control" name="category">
                                    <option>-- Category --</option>
                                    <option>Tembakau</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Price" name="harga">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Stock" name="stock">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <select class="form-control" name="supplier">
                                    <option>-- Supplier --</option>
                                    @foreach ($supplier as $item2)
                                        <option value="{{ $item2->id }}">{{ $item2->nama_supplier }}</option>
                                    @endforeach
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
