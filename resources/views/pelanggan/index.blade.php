<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Kaykia</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="../pelanggan/assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../pelanggan/css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="/">KayKia Shop</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="/">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#!">All Products</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                                <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="/">Pembayaran</a></li>
                    </ul>
                    {{-- <form class="d-flex">
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                        </button>
                    </form> --}}
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Tobacco Shop</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Sale Tobacco and tools</p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    @foreach ($barang as $item)
                        <div class="col mb-5">
                            <div class="card h-100">
                                <!-- Product image-->
                                <img class="card-img-top" src="{{ asset('storage/barang/' . $item->images) }}" alt="{{ $item->images }}" />
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder">{{ $item->nama_barang }}</h5>
                                        <!-- Product price-->
                                        Rp. {{ $item->harga }}
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center">
                                        <a class=" font-weight-bold text-xm btn btn-outline-dark"
                                                data-bs-toggle="modal" data-bs-target="#belibarang-{{ $item->id }}" href="">
                                                Buy
                                            </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- Footer-->

        @foreach ($barang as $edit)
        <!-- Edit Modal -->
        <div class="modal fade" id="belibarang-{{ $edit->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">{{ $edit->nama_barang }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <img src="{{ asset('storage/barang/' . $edit->images) }}" class="me-4 mb-4"
                                alt="{{ $edit->images }}" style="width: 150px; height: 150px;">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <form method="post" action="{{ route('buy.pelanggan') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <input type="text" value="{{ $edit->id }}" name="id" style="display: none">
                                        <div class="col-md-6 mb-2">
                                            <div class="form-group text-center">
                                                <input type="number" class="form-control" placeholder="Jumlah" name="jumlah">
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <div class="form-group text-center">
                                                <input type="text" class="form-control" placeholder="Nama Pembeli" name="nama">
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <div class="form-group text-center">
                                                <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" cols="30" rows="10"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <button type="submit" class="btn btn-primary">Buy</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        @endforeach

        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Kaykia 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="../pelanggan/js/scripts.js"></script>
    </body>
</html>
