<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>PAWMED - Audit Report</title>

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
    .text{
        text-align: start;
        background-color: 
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
    <!-- end of fixed navbar -->

        <div class="container-fluid">
            <div class="row">
    <!-- start of sticky sidebar -->
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


                <div class="col offset-2 pt-0" id="main">
                    <!-- <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active "><a href="#">Dashboard</a></li>
                        </ol>
                    </nav> -->
                    <br><br>
                    <div class="grid text-center rounded-4" style="--bs-columns: 3;">
                        <div class="p-3 pt-3" style="color: white;"><center><h2>Audit Reports</h2></center>
                    <hr class="border-3">
                    </div>

                    <div class="container p-3 rounded-3">
                        
                        <table class="table table-hover table-bordered caption-top col-md ">
                            <br><br>
                            <thead>
                                <tr class="table table-dark">
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Last Login</th>
                                    <th scope="col">Last LogOut</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Verified</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                                            
                                @forelse ($users as $user)

                                
                                    <tr>
                                        <th scope="row">{{ $user->id }}</th>
                                        <td class="text">{{ $user->Name }}</td>
                                        <td class="text">{{ $user->Email }}</td>
                                        <td class="text">{{ $user->LastLoginTime }}</td>
                                        <td class="text">{{ $user->LastLoginOutTime }}</td>
                                        <td class="text">{{ $user->Status }}</td>
                                        <td class="text">{{ $user->Verified }}</td>
                                        <td>
                                            <div class="col d-md-flex gap-1">
                                                <center><button type="button" class="btn btn-primary" style="width: 70px;" data-bs-toggle="modal" data-bs-target="#exampleModal">View</button></center>

                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Activity</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <table class="table">
                                                                <thead>
                                                                  <tr>
                                                                    <th scope="col">IP Address</th>
                                                                  </tr>
                                                                </thead>
                                                                <tbody>
                                                                  <tr>
                                                                    <td>{{ $user->IpAddress }}</td>
                                                                  </tr>
                                                                </tbody>
                                                              </table>
                                                        </div>
                                                        <div class="modal-footer justify-content-center">
                                                        <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                
                                                
                                                
                                            </div>
                                        </td>
                                    </tr>
                                
                                @empty
                                <tr>
                                    <td colspan="10" class="text-center">No data found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>

                        {{ $users->links() }}
                    </div>
                    </div>
                    <!-- end of available med -->
                </div>
            </div>
        </div>

</body>