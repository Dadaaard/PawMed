<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>PAWMED - Dashboard</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="css/materialdesignicons.min.css">
    <link rel="stylesheet" href="css/flag-icon.min.css">
    <link rel="stylesheet" href="css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="css/css-stars.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="css/style.css" />
    <!-- End layout styles -->
    <link rel="shortcut icon" href="images/favicon.png" />

    <!-- this add-on extra for here onleeh -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </head>

<style>
    .custom-link {
            color: black;
        }

        .custom-link:hover {
            color: whitesmoke;
            background-color: black;
            border-radius: round(3);
        }
    
    .btn-logout{
        padding-bottom: 100px;
    }
    .container-appointment{
        padding: 10px;
        margin-left: 40px;
        margin-right: 40px;
        margin-top: 20px;
    }
    .container-patient{
        margin-left: 40px;
        margin-right: 40px;
        margin-top: 20px;
    }
    .sticky-top {
        position: sticky;
        top: 0;
        z-index: 1020;
    }
    .table-container {
        width: 100%; /* or set a specific width */
        height: 200px; /* Set the desired height */
        overflow-y: auto; /* Enable vertical scrollbar */
        overflow-x: auto; /* Enable horizontal scrollbar if needed */
        border: 1px solid #ccc; /* Optional: for better visualization */
    }

        table {
            width: 100%; /* Ensure table takes full width of the container */
            border-collapse: collapse; /* Optional: for better table styling */
        }

        th, td {
            padding: 8px 12px; /* Optional: for better cell padding */
            border: 1px solid #ccc; /* Optional: for better cell border */
        }
        thead th {
            position: sticky; /* Make header row sticky */
            top: 0;
            background-color: #f1f1f1; /* Background color for header row */
            z-index: 1; /* Ensure header row stays above table body */
            background-color: 
        }
    
    /* .carousel {
            position: fixed;
            top: 50px;
            left: 0;
            width: 20%;
            z-index: 1000;
        } */

</style>




<body style="background-color: lightslategray;">
<!-- Navbar -->
    <nav class="navbar navbar-expand-sm shadow p-3 sticky-top" style="background-color: ghostwhite;">
        <div class="col-sm">
            <a class="navbar-brand fw-semibold" href="#">
                <img src="/images/app-logo.jpg" width="30" height="26" class="d-inline-block align-text-top">
                    <b>PAWMED</b>
            </a>
        </div>

    </nav>

<!-- start modal -->                       
                            <div class="modal fade" id="clickNotificationModal" tabindex="-1" aria-labelledby="clickNotificationModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="clickNotificationModalLabel">New Transaction</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body align-start">
                                            <div class="container">
                                            <div class="card">
                                                <div class="card-header" style="background-color: orange">
                                                    Near Expiration Due
                                                </div>
                                                <div class="card-body"> 
                                                    <h5 class="card-title">METRONIDAZOLE - Metrogel Medicine</h5>
                                                    <p class="card-text">2024-07-10</p>
                                                    <a href="#" class="btn btn-primary">Restock</a>
                                                </div>
                                            </div>
                                            
                                            <div class="card mt-3">
                                                <div class="card-header" style="background-color: orange">
                                                    Near Expiration Due
                                                </div>
                                                <div class="card-body"> 
                                                    <h5 class="card-title">FAMOTIDINE TABLETS - Pepcid Medicine</h5>
                                                    <p class="card-text">2024-07-15</p>
                                                    <a href="#" class="btn btn-primary">Restock</a>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
<!-- end modal -->

   
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





            
    <div class="col offset-2" id="main">
                    <br><br>
                        <div class="row text-center">
                                <div class="container col-3 p-2 rounded-2 shadow" style="background-color: azure;">
                                    <input class="form-control p-4 text-center fw-semibold" style="font-size: 38px;" type="text" value="{{$patients}}" aria-label="Disabled input example" disabled readonly>
                                    <div class="row gap-4 mt-1">
                                        <div class="col-sm header-title text-end">
                                            <b>PATIENTS</b>
                                        </div>
                                    </div>
                                </div>  

                                <div class="container col-3 p-2 rounded-2 shadow" style="background-color: azure;">
                                    <input class="form-control p-4 text-center fw-semibold" style="font-size: 38px;" type="text" value="{{$customers}}" aria-label="Disabled input example" disabled readonly>
                                    <div class="row gap-4 mt-1">
                                        <div class="col-sm sort-bar text-start">
                                            
                                        </div>
                                        <div class="col-sm header-title text-end">
                                            <b>CUSTOMERS</b>
                                        </div>
                                    </div>
                                </div>

                                {{-- <div class="container col-3 p-2 rounded-2 shadow" style="background-color: azure;">
                                    <table class="table text-start">
                                        <thead>
                                            <tr>
                                                <th scope="col">Status</th>
                                                <th scope="col">Veterinarian</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="color: green;">Active</td>
                                                <td>Dr. Luna</td>
                                            </tr>
                                            <tr>
                                                <td style="color: red;">Inactive</td>
                                                <td>Dr. Kit</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div> --}}
                        </div><br>
<!-- APPOINTMENTS -->
                    <div class="container-appointment rounded-2 shadow" style="background-color: azure;">
                        <div>
                            <div class="row">
                                <div class="col-sm header-title m-2">
                                    <h4><b>WEEKLY APPOINTMENTS</b></h4><br>
                                </div>
                                <div class="col-sm text-end sort-bar">

                                </div>
                            </div>
                            <div class="table-container">
                            <table class="table border">
                                <thead class="table-dark">
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Pet Name</th>
                                    <th scope="col">Purpose</th>
                                    <th scope="col">Appointment Date and Time</th>
                                    <th scope="col" class="text-center">Status</th>
                                    <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($appointments as $appointment)

                                    @php

                                    $email = App\Models\User::where('id', $appointment->user_id)->first();


                                    $date = Carbon\Carbon::parse($appointment->appointmentDate)->format('m-d-Y h:i A');

                                    @endphp
                                    <tr>
                                    <th scope="row">{{$appointment->id}}</th>
                                    <td>{{$email->email}}</td>
                                    <td>{{$appointment->PetName}}</td>
                                    <td>{{$appointment->Purpose}}</td>
                                    <td>{{$date}}</td>
                                    <td class="text-center"><button class="btn btn-success" Disabled="true"> {{$appointment->status}} </button></td>
                                    <td class="fw-semibold text-center">
                                        <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $appointment->id }}"><i class="fas fa-info"></i></button>
                                    </td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                                
                            </table>
                            {{$appointments->links()}}
                    <!-- modal -->

                    @foreach ($appointments as $appointment)
                        <div class="modal fade" id="exampleModal{{ $appointment->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $appointment->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel{{ $appointment->id }}">Medical Information</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <ul class="list-group mb-3">
                                            <li class="list-group-item disabled fw-bold text-center" style="background-color: darkseagreen;" aria-disabled="true">Pet's Conditions</li>
                                            <li class="list-group-item text-start">{{ $appointment->conditions}}</li>
                                        </ul><hr>

                                        <ul class="list-group">
                                            <li class="list-group-item disabled fw-bold text-center" style="background-color: darkseagreen;" aria-disabled="true">Current Symptoms</li>
                                            <li class="list-group-item text-start">{{ $appointment->symptoms }}</li>
                                        </ul>
                                    </div>
                                    <div class="modal-footer justify-content-center">
                                        <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                            </div>
                        </div>
                    </div>
                    
                    

<!-- INVENTORY ALERTS LEFT STOCKS AND EXPIRATION DUE -->
                        <div class="container-patient row gap-3">
                            <div class="container col-sm shadow rounded-2" style="background-color: azure;">
                                <div class="text-left m-2">
                                    <h4 class="mb-3"><b>INVENTORY STATUS</b></h4>
                                </div>

                                
                                
                                <ol class="list-group mb-3 table-container border">
                                    @foreach ($inventory as $inventorys)
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                        <div class="fw-bold">{{$inventorys->GenericName}}</div>
                                        {{$inventorys->Brandname}}
                                        </div>

                                            @php
                                                $expirationdate = $inventorys->ExpDate;

                                                
                                                $currentDate = Carbon\Carbon::now();
                                                $carbonparsed = Carbon\Carbon::parse($currentDate)->format('Y-m-d')
                                               
                                            @endphp
                                            @if ($currentDate->diffInDays($expirationdate)<=30)
                                            <span class="badge text-bg-warning rounded-pill"><a href="/dashboard/inventory/medicine" style="text-decoration: none; color: black;">Expire in less than 30 Days</a></span>
                                            @endif
                                            @if ($inventorys->Quantity<=10)
                                            <span class="badge text-bg-danger rounded-pill">Stocks: {{$inventorys->Quantity }}</span>
                                            @else
                                            <span class="badge text-bg-success rounded-pill">Stocks: {{$inventorys->Quantity }}</span>
                                            @endif

                                            <!-- @if ($currentDate->diffInDays($expirationdate)<=7)
                                            <span class="badge text-bg-warning rounded-pill"><a href="/dashboard/inventory/medicine" style="text-decoration: none; color: black;">Expire in less than 7 Days</a></span>
                                            @endif -->

                                        
                                        
                                    </li>
                                    @endforeach
                                </ol>
                                
                            </div>
<!-- RECENT TRANSACTION -->
                            <div class="container col-sm shadow rounded-2" style="background-color: azure;">
                                <div class="text-left m-2">
                                    <h4 class="mb-3"><b>RECENT TRANSACTIONS</b></h4>
                                </div>
                                <div class="table-container rounded-2">
                                <table class="table table-hover">
                                    <thead class="table table-dark">
                                        <tr>
                                            <th scope="col">Date Payed</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Payment</th>
                                        </tr>
                                    </thead>
                                    <tbody class="scroll-container">
                                        @foreach ($transactions as $transaction )
                                        
                                        <tr>
                                            <td>{{$transaction->Date}}</td>
                                            <td>{{$transaction->Name}}</td>
                                            <td>{{$transaction->Total}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>

<!-- INVENTORY STATUS -->
                        <div class="container-patient row gap-3">
<!-- PET IMAGES AUTO NEXT -->
                            <!-- <div class="container col-sm shadow rounded-2" style="background-color: gray;">
                            
                                <div id="carouselExampleAutoplaying" class="carousel slide p-5" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                        <img src="/images/app-logo.jpg" class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                        <img src="/images/shade.jpg" class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                        <img src="/images/colette.jpg" class="d-block w-100" alt="...">
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div> -->
                        </div>
                        <br>
                        <br>
                        <br>
                        
                </div>
        </div>
    </div>

    </body>

    