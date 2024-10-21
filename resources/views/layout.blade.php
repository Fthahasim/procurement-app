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
    <nav class="navbar navbar-expand-lg bg-proc-primary">
        <div class="container d-flex">
            <a class="navbar-brand" href="#">
                <!-- <img src="/docs/5.3/assets/brand/bootstrap-logo.svg" width="30" height="24"> -->
            </a>
        </div>
    </nav>

    <div class="container border proc-content my-5">
        <nav class="nav bg-proc-primary">
            <div class="container">
                <ul class="nav text-center">
                    <li class="nav-item px-3">
                        <a class="nav-link text-light"  href="{{Route('supplier.index')}}">Supplier</a>
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link text-light" href="{{Route('items.index')}}">Items</a>
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link text-light" href="{{Route('purchase.order.index')}}">Purchase Order</a>
                    </li>
                </ul>
            </div>
        </nav>


        @yield('content')


        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Bootstrap JS (loaded after jQuery) -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Bootstrap Table JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.21.1/bootstrap-table.min.js"></script>
@vite('resources/js/app.js')
</body>
</html>