
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>PAWMED - Medicine Inventory</title>

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


                <div class="col offset-2 pt-0" id="main">
                    <!-- <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active "><a href="#">Dashboard</a></li>
                        </ol>
                    </nav> -->
                    <br><br>
                    <div class="grid text-center rounded-4" style="--bs-columns: 3; background-color: azure;">
                        <div class="p-3 pt-5"><center><h2>Medicine Inventory</h2></center>
                        <hr class="border-3">
                        </div>

                        <div class="container p-2 rounded-3">
                        
<!-- start modal -->                       
                            <div class="modal fade" id="clickModal" tabindex="-1" aria-labelledby="clickModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="clickModalLabel">New Medicine</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="row g-3" action="{{ route('store.inventory') }}" method="POST">

                                                @csrf
                                                <div>
                                                    <input type="text" placeholder="Drug Code" name="Dcode" required class="form-control">
                                                </div>
                                                <div class="col-sm">
                                                    <input type="text" placeholder="Generic Name" name="Gname" required class="form-control">
                                                </div>
                                                <div class="col-sm">
                                                    <input type="text" placeholder="Brand Name" name="Bname" required class="form-control">
                                                </div>
                                                <div class="col-sm">
                                                    <input type="text" placeholder="Quantity" name="Quantity" required class="form-control">
                                                </div>
                                                <div class="text-start fw-semibold">
                                                    <caption>Type of Medicine</caption>
                                                    <select class="form-select" required class="form-control" id="inputState" name="Category" for="inputState">
                                                        <option selected></option>
                                                        <option> Antibiotic </option>
                                                        <option> Antibacterial </option>
                                                        <option> Dog Soap </option>
                                                        <option> Anti-inflammatory </option>
                                                        <option> Mucolytic </option>
                                                        <option> Antioxidants </option>
                                                        <option> Antipyretic </option>
                                                        <option> Antifungal </option>
                                                    </select>
                                                </div>
                                                <div class="col-sm text-start fw-semibold">
                                                    <caption>Expiration Date</caption>
                                                    <input type="date" placeholder="Expiration Date" id="" name="ExpDate" required class="form-control">
                                                </div>
                                                <div class="col-sm pt-4">
                                                    <input type="number" placeholder="Price" id="" name="Price" required class="form-control">
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
                        </div>

                        <div class="container p-2 rounded-3">
<!-- start update modal -->                       
                            <div class="modal fade" id="clickUpdateModal" tabindex="-1" aria-labelledby="clickUpdateModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="clickUpdateModalLabel">Update Medicine</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="row g-3" action="{{ route('store.inventory') }}" method="POST">
                                            @csrf
                                                <div>
                                                    <input type="text" placeholder="Drug Code" name="Dcode" required class="form-control">
                                                </div>
                                                <div class="col-sm">
                                                    <input type="text" placeholder="Generic Name" name="Gname" required class="form-control">
                                                </div>
                                                <div class="col-sm">
                                                    <input type="text" placeholder="Brand Name" name="Bname" required class="form-control">
                                                </div>
                                                <div class="col-sm">
                                                    <input type="text" placeholder="Quantity" name="Quantity" required class="form-control">
                                                </div>
                                                <div class="text-start fw-semibold">
                                                    <caption>Type of Medicine</caption>
                                                    <select class="form-select" required class="form-control" id="inputState" name="Category" for="inputState">
                                                        <option selected></option>
                                                        <option> Antibiotic </option>
                                                        <option> Antibacterial </option>
                                                        <option> Dog Soap </option>
                                                        <option> Anti-inflammatory </option>
                                                        <option> Mucolytic </option>
                                                        <option> Antioxidants </option>
                                                        <option> Antipyretic </option>
                                                        <option> Antifungal </option>
                                                    </select>
                                                </div>
                                                <div class="col-sm text-start fw-semibold">
                                                    <caption>Expiration Date</caption>
                                                    <input type="date" placeholder="Expiration Date" id="" name="ExpDate" required class="form-control">
                                                </div>
                                                <div class="col-sm pt-4">
                                                    <input type="number" placeholder="Price" id="" name="Price" required class="form-control">
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
<!-- end update modal -->
                        </div>                        

                        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#clickModal" data-bs-whatever="@mdo">Add Medicine</button>
                        </div>

                    <div class="container p-3 rounded-3">
                        <div class="row">
                            <div class="col-sm">
                                <form class="d-flex" role="search" action="{{ route('search.inventory') }}" method="get">
                                    @csrf
                                    <input class="form-control me-2 col-sm" type="search" placeholder="Search" name="search" aria-label="Search">
                                    <button class="btn btn-secondary" style="width: 20%;" type="submit">Search</button>
                                </form>
                            </div>
                        </div>
                        <table class="table table-hover table-bordered caption-top col-md ">
                            <br><br>
                            <thead>
                                <tr class="table table-dark text-start">
                                    <th scope="col">Drug Code</th>
                                    <th scope="col">Generic Name</th>
                                    <th scope="col">Brand Name</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Expiration Date</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                              
                                
                                
                                @forelse ($items as $item)

                                
                                    <tr>
                                        <td class="text">{{ $item->DrugCode }}</td>
                                        <td class="text">{{ $item->GenericName }}</td>
                                        <td class="text">{{ $item->Brandname }}</td>
                                        <td class="text">{{ $item->Category }}</td>
                                        <td class="text">{{ $item->Quantity }}</td>
                                        <td class="text">{{ $item->ExpDate }}</td>
                                        <td class="text">{{ $item->Price }}</td>
                                        <td>
                                            <div class="col d-md-flex gap-1">
                                                <center><button type="add" class="btn btn-info" style="width: 40px;" data-bs-toggle="modal" data-bs-target="#clickUpdateModal" data-bs-whatever="@mdo"><i class="fas fa-edit"></i></button></center>

                                                <form action="{{ route('delete.inventory', $item->id)}}" method="POST">
                                                    @csrf
                                                    <center><button type="delete" class="btn btn-danger" style="width: 40px;"><i class="fas fa-trash"></i></button>
                                                </form>
                                                
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

                        {{-- @php
                        dd($items);
                    @endphp --}}

                        <!-- pagination -->
                        {{ $items->links() }}
                    </div>
                    </div>
                    <!-- end of available med -->
                </div>
            </div>
        </div>

</body>