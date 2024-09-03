<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>InfoSec Project - LARAGOD</title>
    
    <!-- this add-on extra for here onleeh -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </head>

<style>
    .custom-link {
            color: black; /* Change the color to whatever you prefer */
        }

        .custom-link:hover {
            color: whitesmoke; /* Change the hover color if needed */
            background-color: black;
            border-radius: round(3);
        }
    .card-link {
        color: black;
    }
        .card-link:hover {
            color:white;
            background-color:darkslategray;
            border-radius: round(3);
        }

    .fixed-size-img {
        width: 300px;
        height: 150px;
        object-fit: fill; /* optional, to maintain aspect ratio and cover the area */
        }
    .text{
        text-align: start;
    }
    .btn-logout{
        padding-bottom: 100px;
    }

</style>

<body style="background-color: lightslategray;">
<!-- Navbar -->
<nav >
        <div class="navbar navbar-expand-sm shadow p-3" style="background-color: ghostwhite">
            <a class="navbar-brand fw-semibold" href="#">
                <img src="/images/app-logo.jpg" width="30" height="26" class="d-inline-block align-text-top">
                    <b>PAWMED</b>
            </a>
        </div>
    </nav>
   
    <div class="container-fluid">
        <div class="row">
            <div class="col-2 px-2 py-5 position-fixed" style="background-color: ghostwhite;" id="sticky-sidebar">
            <!-- Sidebar -->
                <ul class="gap-4 nav flex-column vh-100 d-flex" style="">
                    <li class="nav-item">
                        <a class="nav-link active custom-link rounded-2" aria-current="page" href="/dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link custom-link rounded-2" href="/dashboard/customer">Customers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link custom-link rounded-2" href="/dashboard/patient">Patient Records</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle custom-link rounded-2" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Inventory</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/dashboard/inventory/medicine">Medicine</a></li>
                                <li><a class="dropdown-item" href="#">Products</a></li>
                                <li><a class="dropdown-item" href="#">Equipments</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Expenses</a></li>
                            </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link custom-link rounded-2" href="/dashboard/transactions">Transaction</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link custom-link rounded-2" href="/dashboard/audit">Audit Report</a>
                    </li>
                    <li class="btn-logout mt-auto mb-5 nav-item d-flex justify-content-center">
                        <div class="w-100">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="nav-link active custom-link rounded-2 w-100" type="submit" >Logout</button>
                            </form>
                        </div> 
                    </li>
                </ul>
            </div>
    <!-- end of sticky sidebar -->

                    <div class="col offset-2" id="main">
                        <!-- <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active "><a href="#">Dashboard</a></li>
                            </ol>
                        </nav> -->
                        <br><br>
                        <div class="grid text-center rounded-4" style="--bs-columns: 3; background-color: lavender;">
                            <div class="p-3"><center><h2>Patient Records</h2></center></div>

                            <div class="container p-2 rounded-3">
                                <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#clickModal" data-bs-whatever="@mdo">Add Patient</button>
                                </div>
            <!-- start modal -->                       

                                <div class="modal fade" id="clickModal" tabindex="-1" aria-labelledby="clickModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="clickModalLabel">New Patient</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                                <div class="modal-body">
                                                    <form class="row g-2" action="" method="POST">
                                            <!-- Pet Info -->
                                                        @csrf
                                                        <div>
                                                            <input type="text" placeholder="Pet Name" id="" name="name" required class="form-control">
                                                        </div>
                                                        <div class="col-sm">
                                                            <input type="text" placeholder="Animal ID" id="" name="name" required class="form-control">
                                                        </div>
                                                        <div class="col-sm">
                                                            <select class="form-select" required class="form-control" id="inputState" for="inputState">
                                                                <option selected> Male </option>
                                                                <option> Female </option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm">
                                                            <select class="form-select" required class="form-control" id="inputState" for="inputState">
                                                                <option selected> Canine </option>
                                                                <option> Feline </option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm">
                                                            <input type="text" placeholder="Breed" id="" name="name" required class="form-control">
                                                        </div>
                                                        <div class="">
                                                            <input type="text" placeholder="Date of Birth" id="" name="name" required class="form-control">
                                                        </div>
                                                        <div>
                                                            <textarea id="message" for="message" placeholder="Color/Markings" name="message" required class="form-control"></textarea>
                                                        </div>
                                                        <br><br><br><br><br>

                                            <!-- Owner Info -->
                                                        <caption><b>Owner Information</b></caption><hr><br>
                                                        <div class="col-sm">
                                                            <input type="text" placeholder="Pet Owner" id="" name="name" required class="form-control">
                                                        </div>
                                                        <div>
                                                            <input type="text" placeholder="Address" id="" name="name" required class="form-control">
                                                        </div>
                                                        <div class="col-sm">
                                                            <input type="text" placeholder="Contact Number" id="" name="name" required class="form-control">
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                        </div>

                                                    </form>
                                                </div>
                                        </div>
                                    </div>
                                </div>
            <!-- end modal -->
                            </div><hr class="border-3">
                                
                            <div class="d-flex-md container p-3 rounded-3">
                                <div class="row">
                                    <div class="col-sm">
                                        <form class="d-flex" role="search">
                                            <input class="form-control me-2 col-sm" type="search" placeholder="Search" aria-label="Search">
                                            <button class="btn btn-success" style="width: 20%;" type="submit">Search</button>
                                        </form>
                                    </div>
                                </div>

                                <table class="table table-hover table-bordered">
                                    <br><br>
                                    <thead>
                                        <tr class="table table-dark">
                                            <th scope="col">#</th>
                                            <th scope="col">Animal ID</th>
                                            <th scope="col">Pet Name</th>
                                            <th scope="col">Type</th>
                                            <th scope="col">Breed</th>
                                            <th scope="col">Pet Owner</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>101</td>
                                                <td class="text">Tiger</td>
                                                <td class="text">Feline</td>
                                                <td class="text">Black-Gray</td>
                                                <td class="text">Mim Gorugonyo</td>
                                                <td>
                                                    <div class="col d-md-flex gap-1">
                                                        <center><button type="add" class="btn btn-success" style="width: 70px;">Add</button></center>
                                                        <center><button type="delete" class="btn btn-danger" style="width: 70px;">Delete</button>
                                                        <button type="view" class="btn btn-warning" style="width: 70px;">View</button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>102</td>
                                                <td class="text">Shade</td>
                                                <td class="text">Feline</td>
                                                <td class="text">White</td>
                                                <td class="text">Xtin Gorugonyo</td>
                                                <td>
                                                    <div class="col d-md-flex gap-1">
                                                        <center><button type="add" class="btn btn-success" style="width: 70px;">Add</button></center>
                                                        <center><button type="delete" class="btn btn-danger" style="width: 70px;">Delete</button>
                                                        <button type="view" class="btn btn-warning" style="width: 70px;">View</button>
                                                    </div>
                                                </td>                                
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>103</td>
                                                <td class="text">Luna</td>
                                                <td class="text">Feline</td>
                                                <td class="text">Black-White</td>
                                                <td class="text">Ram Dampog</td>
                                                <td>
                                                    <div class="col d-md-flex gap-1">
                                                        <center><button type="add" class="btn btn-success" style="width: 70px;">Add</button></center>
                                                        <center><button type="delete" class="btn btn-danger" style="width: 70px;">Delete</button>
                                                        <button type="view" class="btn btn-warning" style="width: 70px;">View</button>
                                                    </div>
                                                </td>                                
                                            </tr>
                                            <tr>
                                                <th scope="row">4</th>
                                                <td>104</td>
                                                <td class="text">Lamog</td>
                                                <td class="text">Feline</td>
                                                <td class="text">Black-Gray</td>
                                                <td class="text">Ram Dampog</td>
                                                <td>
                                                    <div class="col d-md-flex gap-1">
                                                        <center><button type="add" class="btn btn-success" style="width: 70px;">Add</button></center>
                                                        <center><button type="delete" class="btn btn-danger" style="width: 70px;">Delete</button>
                                                        <button type="view" class="btn btn-warning" style="width: 70px;">View</button>
                                                    </div>
                                                </td>                                
                                            </tr>
                                            <tr>
                                                <th scope="row">5</th>
                                                <td>105</td>
                                                <td class="text">Rocky</td>
                                                <td class="text">Canine</td>
                                                <td class="text">German Shepherd </td>
                                                <td class="text">Mel Gorugonyo</td>
                                                <td>
                                                    <div class="col d-md-flex gap-1">
                                                        <center><button type="add" class="btn btn-success" style="width: 70px;">Add</button></center>
                                                        <center><button type="delete" class="btn btn-danger" style="width: 70px;">Delete</button>
                                                        <button type="view" class="btn btn-warning" style="width: 70px;">View</button>
                                                    </div>
                                                </td>                                
                                            </tr>
                                            <tr>
                                                <th scope="row">6</th>
                                                <td>106</td>
                                                <td class="text">Yura</td>
                                                <td class="text">Canine</td>
                                                <td class="text">Dachshund</td>
                                                <td class="text">Amr Gorugonyo</td>
                                                <td>
                                                    <div class="col d-md-flex gap-1">
                                                        <center><button type="add" class="btn btn-success" style="width: 70px;">Add</button></center>
                                                        <center><button type="delete" class="btn btn-danger" style="width: 70px;">Delete</button>
                                                        <button type="view" class="btn btn-warning" style="width: 70px;">View</button>
                                                    </div>
                                                </td>                                
                                            </tr>
                                        </tbody>
                                </table>
                            </div>
                        </div>
                                
                        <!-- end of available med -->
                    </div>
            </div>
        </div>





    
        <!-- <div class="offcanvas offcanvas-start border border-danger" style="width: 18%" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
            <div class="offcanvas-header ">
                <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active custom-link rounded-2" aria-current="page" href="#">Dashboard</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle custom-link rounded-2" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Inventory</a>
                        <ul class="dropdown-menu" style="background-color: lightgray">
                            <li><a class="dropdown-item" href="/inventory_medicine">Medicine</a></li>
                            <li><a class="dropdown-item" href="#">Products</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Separated link</a></li>
                        </ul>
                    </li>
                    <hr>
                    <li class="nav-item">
                        <a class="nav-link custom-link rounded-2" href="#">Patient Records</a>
                    </li>
                </ul>
            </div>
        </div> -->
<!-- <br>
        <div class="d-grid gap-2 col-6 mx-auto">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#clickModal" data-bs-whatever="@mdo">Add New Patient</button>
        </div> -->

<!-- 
        <div class="container">
            
            <div class="row row-cols-1 row-cols-md-4 g-4 p-5 position-center">
                <div class="col">
                    <a class="nav-link active rounded-2 " aria-current="page" href="/dashboard">
                        <div class="card h-100 card-link ">
                                <img src="/images/shade.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Shade</h5>
                                <p class="card-text"></p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <div class="card h-100 card-link">
                    <img src="/images/tiger.jpg" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Tiger</h5>
                        <p class="card-text"></p>
                    </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 card-link">
                    <img src="/images/colette.jpg" class="card-img-top img-fluid" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Colette</h5>
                        <p class="card-text"></p>
                    </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 card-link">
                    <img src="/images/img_2.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text"></p>
                    </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 card-link">
                    <img src="/images/img_2.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text"></p>
                    </div>
                    </div>
                </div>
            </div>
        </div> -->



    </body>