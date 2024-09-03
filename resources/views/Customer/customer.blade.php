<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>PAWMED - Customers</title>
    
    <!-- this add-on extra for here onleeh -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


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
    .sticky-top {
        position: sticky;
        top: 0;
        z-index: 1020; /* Ensure the navbar is above other content */
    }

</style>

<body style="background-color: lightslategray;">
<!-- Navbar -->
<nav class="navbar navbar-expand-sm shadow p-3 sticky-top" style="background-color: ghostwhite;">
        <div>
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
                <ul class="gap-3 nav flex-column vh-100 d-flex" style="">
                    <li class="nav-item">
                        <a class="nav-link active custom-link rounded-2" aria-current="page" href="/dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link custom-link rounded-2" href="/dashboard/customer">Customers</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle custom-link rounded-2" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Inventory</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/dashboard/inventory/medicine">Medicine</a></li>
                            </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link custom-link rounded-2" href="/dashboard/transactions">Transaction</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link custom-link rounded-2" href="/dashboard/appointment">Appointment</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link custom-link rounded-2" href="/dashboard/analytics">Analytics</a>
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

                    <div class="col offset-2 pt-4" id="main">
                        <br>
                        <div class="grid text-center rounded-4" style="--bs-columns: 3; background-color: azure;"><br>
                            <div class="p-4"><center><h2>Customers</h2></center>
                            <hr class="border-3">
                            </div>
                            <div class="container p-2 rounded-3">
            <!-- update modal -->                       

                                <div class="modal fade" id="clickModal" tabindex="-1" aria-labelledby="clickModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="clickModalLabel">Update Customer Details</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                                <div class="modal-body">
                                                    <form class="row g-2" action="" method="POST">
                                            <!-- Customer Info -->
                                                        @csrf
                                                        <div>
                                                            <input type="text" placeholder="Owner Name" id="" name="name" required class="form-control">
                                                        </div>
                                                        <div class="">
                                                            <input type="text" placeholder="Address" id="" name="name" required class="form-control">
                                                        </div>
                                                        <div class="col-sm">
                                                            <input type="text" placeholder="Mobile Number" id="" name="name" required class="form-control">
                                                        </div>
                                                        <div class="col-sm">
                                                            <input type="email" placeholder="Email" id="" name="name" required class="form-control">
                                                        </div>
                                                        <br><br><br>
                                                        <div class="text-start">
                                                            <caption>Date Joined</caption>
                                                            <input type="date" placeholder="Date Joined" id="" name="name" required class="form-control">
                                                        </div>

                                                        <div class="col-sm p-3">
                                                            <input type="submit" class="btn btn-primary w-100" value="Save">
                                                        </div>
                                                    </form>
                                                </div>
                                        </div>
                                    </div>
                                </div>
            <!-- end update modal -->
                            </div>


                            
                            <div class="d-flex-md container p-3 rounded-3">
                                <div class="row">
                                    <div class="col-sm">
                                        <form class="d-flex" role="search">
                                            <input class="form-control me-2 col-sm" type="search" placeholder="Search" aria-label="Search">
                                            <button class="btn btn-secondary" style="width: 20%;" type="submit">Search</button>
                                        </form>
                                    </div>
                                </div>

                                <table class="table table-hover table-bordered">
                                    <br>
                                    <thead>
                                        <tr class="table table-dark">
                                            <th scope="col">#</th>
                                            <th scope="col">Date Joined</th>
                                            <th scope="col">Last Visit</th>
                                            <th scope="col">Owner Name</th>
                                            <th scope="col">Mobile Number</th>
                                            <th scope="col">Pets</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($customers as $customer)
                                        <tr>
                                            <td>{{ $customer->id }}</td>
                                            <td>{{ $customer->created_at }}</td>
                                            <td>{{ $customer->updated_at }}</td>
                                            <td>{{ $customer->name }}</td>
                                            <td>{{ $customer->phonenumber }}</td> <!-- Replace with actual mobile number -->
                                            <td>
                                                {{ $customer->pet_count }}
                                            </td>
                                            <td>
                                                <div class="col d-md-flex gap-1">
                                                    <a href="/dashboard/customer/view/{{ $customer->id }}">
                                                        <button type="view" class="btn btn-info" style="width: 80px;">Pet Info</button>
                                                    </a>
                                                    <button type="update" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#clickModal" data-bs-whatever="@mdo" style="width: 40px;"><i class="fas fa-edit"></i></button>

                                                    <form method="POST" action="{{ route('destroy.customer', ['id' => $customer->id]) }}">
                                                        @csrf
                                                        <button type="delete" class="btn btn-danger" style="width: 40px;"><i class="fas fa-trash"></i></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6">No records found</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                                
                        <!-- end of available med -->
                        <hr class="border-3">
                
                    </div>
            </div>
        </div>

    </body>