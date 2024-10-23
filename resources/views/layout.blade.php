<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  
    @vite('resources/css/app.css')
    <title>Procurement Application</title>
</head>
<body>

    <section>
        <!-- overlay -->
        <div id="sidebar-overlay" class="overlay w-100 vh-100 position-fixed d-none z-1"></div>
        <nav class="w-100 d-flex shadow-sm nav-header bg-proc-primary position-fixed top-0 z-3">
            <div class="logo-image d-flex justify-content-center m-2 col-md-3 col-lg-2 ">
                <img src="/logo/shopping-cart.png" class="p-2">
            </div>
            <!-- close sidebar -->
            <button class="btn py-0 d-md-none ms-auto" id="open-sidebar">
                <span class="bi bi-list text-light h3"></span>
            </button>
        </nav>
        <!-- sidebar -->
        <div class="col-md-3 col-lg-2 px-0 position-fixed h-100 shadow-sm sidebar z-2 top-0 left-0" id="sidebar">
            <div class="list-group rounded-0 bg-proc-primary mt-5 h-100">
                <div class="menu-items mt-4">
                    <a href="{{ Route('procurement.home') }}" class="text-decoration-none ms-3 p-2 d-flex align-items-center text-light border-0">
                        <span class="bi bi-house fs-4"></span>
                        <span class="ms-3 fw-normal-lite">Dashboard</span>
                    </a>
                    <a href="{{ Route('supplier.index') }}" class="text-decoration-none ms-3 p-2 d-flex align-items-center text-light border-0">
                        <span class="bi bi-people-fill fs-4"></span>
                        <span class="ms-3 fw-normal-lite">Suppliers</span>
                    </a>
                    <a href="{{ Route('items.index') }}" class="text-decoration-none ms-3 p-2 d-flex align-items-center text-light border-0">
                        <span class="bi bi-box-seam-fill fs-4"></span>
                        <span class="ms-3 fw-normal-lite">Items</span>
                    </a>
                    <a href="{{Route('purchase.order.index')}}" class="text-decoration-none ms-3 p-2 d-flex align-items-center text-light border-0">
                        <span class="bi bi-cart-fill fs-4"></span>
                        <span class="ms-3 fw-normal-lite ">Purchase Order</span>
                    </a>
                    <a href="{{Route('login.page')}}" class="text-decoration-none ms-3 mb-5 p-2 d-flex align-items-center text-light border-0">
                        <span class="bi bi-box-arrow-right fs-4"></span>
                        <span class="ms-3 fw-normal-lite">Log out</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-9 col-lg-10 ms-md-auto px-0 ms-md-auto mt-5 py-5">
            <main class="container-fluid min-vh-100 mt-0 mt-sm-2 tab-content" id="nav-tabContent">
                @yield('content')
            </main>
        </div>

    </section>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS (loaded after jQuery) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap Table JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.21.1/bootstrap-table.min.js"></script>
    
    @vite('resources/js/app.js')

    </body>
</html>