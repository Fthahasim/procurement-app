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
        <span class="ms-5">
            <img src="{{ asset('/logo/shopping-cart.png') }}" width="60">
        </span>
    </nav>

    
    <div class="card-login d-flex justify-content-center position-absolute align-items-center">
        <div class="card-blue bg-proc-primary text-light h-100 px-5 d-flex flex-column justify-content-center">
            <h1>Welcome To Procureease</h1>
            <p class="text-center fs-6 fw-light">Your trusted partner for efficient and seamless procurement managment</p>
        </div>
        <div class="card-form h-100 w-50  d-flex flex-column justify-content-center">
            <h2 class="text-center">Login</h2>
            <label for="username">Username</label>
            <input type="text" class="form-control shadow-none" id="exampleFormControlInput1" placeholder="Enter username">
            
            <a href="{{Route('procurement.home')}}">
                <button type="submit" class="mt-4 w-100 p-2 border-0 text-light">Login</button>
            </a>
        </div>
    </div>
    





    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS (loaded after jQuery) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap Table JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.21.1/bootstrap-table.min.js"></script>
    
    @vite('resources/js/app.js')
</body>
</html>