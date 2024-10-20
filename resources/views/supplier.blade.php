<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">

    @vite('resources/css/app.css')
    <title>Procurement Application</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-proc-primary">
        <div class="container d-flex">
            <a class="navbar-brand" href="#">
                <img src="/docs/5.3/assets/brand/bootstrap-logo.svg" width="30" height="24">
            </a>
        </div>
    </nav>

    <div class="container border proc-content mt-5">
        <nav class="nav bg-proc-primary">
            <div class="container">
                <ul class="nav text-center">
                    <li class="nav-item px-3">
                        <a class="nav-link text-light"  href="#">Supplier</a>
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link text-light" href="#">Items</a>
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link text-light" href="#">Purchase Order</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container mt-4">
            <div class="add-supplier ">
                <button type="button" class="btn border" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Add Supplier
                </button>
                <!-- modal add supplier -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel"><b>Add Supplier</b></h1>
                                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn bg-proc-primary text-light">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- modal ends -->
            </div>
            <div class="proc-supplier-table mt-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Supplier No</th>
                            <th scope="col">Supplier Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">TAX No</th>
                            <th scope="col">Country</th>
                            <th scope="col">Mobile No</th>
                            <th scope="col">Email</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>
                                <a href=""><i class="bi bi-pencil-square fs-4"></i></a>
                                <a href=""><i class="bi bi-trash3-fill fs-4 ms-3"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    @vite('resources/js/app.js')
</body>
</html>


