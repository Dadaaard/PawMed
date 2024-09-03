<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>PAWMED - Appointments</title>
    
    <!-- CSS links -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- JavaScript links -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        .custom-link {
            color: black;
        }

        .custom-link:hover {
            color: whitesmoke;
            background-color: black;
            border-radius: 3px;
        }

        .card-link {
            color: black;
        }

        .card-link:hover {
            color: white;
            background-color: darkslategray;
            border-radius: 3px;
        }

        .fixed-size-img {
            width: 300px;
            height: 150px;
            object-fit: fill;
        }

        .text {
            text-align: start;
        }

        .btn-logout {
            padding-bottom: 100px;
        }

        .sticky-top {
            position: sticky;
            top: 0;
            z-index: 1020;
            background-color: white;
        }
    </style>
</head>
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
                <ul class="gap-3 nav flex-column vh-100 d-flex">
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
                    <div class="p-4"><center><h2>Appointments</h2></center>
                        <hr class="border-3">
                    </div>
                    
                    <div class="container p-2 rounded-3">
                        
                        <br
                        
                        <!-- Appointments table -->
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr class="table-dark">
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Pet Name</th>
                                    <th scope="col">Purpose</th>
                                    <th scope="col">Appointment Date and Time</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Mobile Number</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($appointments as $appointment)

                                @php

                                $appointmentDate = Carbon\Carbon::parse($appointment->appointmentDate)->format('M-d-Y h:i A');

                                @endphp
                                    <tr>
                                        <th scope="row">{{ $appointment->id }}</th>
                                        <td>{{ $appointment->Name }}</td>
                                        <td>{{ $appointment->PetName }}</td>
                                        <td>{{ $appointment->Purpose }}</td>
                                        <td>{{ $appointmentDate }}</td>
                                        <td>{{ $appointment->user->email }}</td>
                                        <td>{{ $appointment->user->phonenumber }}</td>
                                        <td>
                                            <button type="button" class="btn btn-success" disabled style="width: 100px;">{{ $appointment->status }}</button>
                                        </td>
                                        <td>
                                            <div class="col d-md-flex gap-1 justify-content-center">
                                                <button type="button" class="btn btn-info" style="width: 40px;" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $appointment->id }}"><i class="fas fa-info"></i></button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal{{ $appointment->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $appointment->id }}" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel{{ $appointment->id }}">Medical Information</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <ul class="list-group mb-3">
                                                                    <li class="list-group-item disabled fw-bold" style="background-color: darkseagreen;" aria-disabled="true">Pet's Conditions</li>
                                                                    @if (is_array($appointment->conditions))
                                                                        @foreach ($appointment->conditions as $condition)
                                                                            <li class="list-group-item text-start">{{ $condition }}</li>
                                                                        @endforeach
                                                                    @else
                                                                        <li class="list-group-item text-start">{{ $appointment->conditions }}</li>
                                                                    @endif
                                                                </ul>
                                                                <hr>
                                                                <ul class="list-group">
                                                                    <li class="list-group-item disabled fw-bold" style="background-color: darkseagreen;" aria-disabled="true">Current Symptoms</li>
                                                                    @if (is_array($appointment->symptoms))
                                                                        @foreach ($appointment->symptoms as $symptom)
                                                                            <li class="list-group-item text-start">{{ $symptom }}</li>
                                                                        @endforeach
                                                                    @else
                                                                        <li class="list-group-item text-start">{{ $appointment->symptoms }}</li>
                                                                    @endif
                                                                </ul>
                                                            </div>
                                                            <div class="modal-footer justify-content-center">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Modal -->
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        <div class="d-flex justify-content-center">
                            
                        </div>
                    </div>
                </div>
                <hr class="border-3">
            </div>
        </div>
    </div>
</body>
</html>