<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>InfoSec Project - LARAGOD</title>
    
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
    .fixed-width {
            width: 200px;
            word-wrap: break-word; /* Ensures that text wraps within the cell */
            white-space: normal; /* Ensures that text wraps within the cell */
        }
        .truncate {
            white-space: nowrap; /* Prevents text from wrapping */
            overflow: hidden; /* Hides overflowing text */
            text-overflow: ellipsis; /* Adds ellipsis (...) to overflowing text */
        }
    .sticky-top {
        position: sticky;
        top: 0;
        z-index: 1020;
    }

</style>

<body style="background-color: lightslategray;">
<!-- Navbar -->
<nav class="row navbar navbar-expand-sm shadow p-3 sticky-top" style="background-color: ghostwhite;">
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
                            <div class="p-3 text-start"><h2>{{ $users->name }}</h2>Pet Owner</div>
                            <hr class="border-3">
                            
                            <div class="container p-2 rounded-3">
                                <div class="text-start">
                                    <a href="/dashboard/customer"><button type="button" class="btn btn-secondary" style="width: 70px">Back</button></a>
                                </div>
            <!-- start add pet modal -->                       

                                <div class="modal fade" id="clickModal" tabindex="-1" aria-labelledby="clickModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="clickModalLabel">Add Pet Information</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                                <div class="modal-body">
                                                    <form class="row g-2" action="{{ route('store.pet', $users->id) }}" method="POST" enctype="multipart/form-data">
                                                    <!-- Customer Info -->
                                                        @csrf
                                                        <div>
                                                            <input type="text" placeholder="Pet Name"  name="petname"  class="form-control">
                                                        </div>
                                                        <div class="col-sm text-start fw-semibold">
                                                            <caption>Date of Birth</caption>
                                                            <input type="date" placeholder="Date of Birth"  name="dateofbirth"  class="form-control">
                                                        </div>
                                                        <div class="col-sm pt-4">
                                                            <input type="text" placeholder="Animal Type"  name="animaltype"  class="form-control">
                                                        </div>
                                                        <div class="">
                                                            <select class="form-select"  class="form-control" id="inputState" name="gender" for="inputState">
                                                                <option selected>Gender</option>
                                                                <option> Male </option>
                                                                <option> Female </option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm">
                                                            <input type="text" placeholder="Breed" name="breed"  class="form-control">
                                                        </div>
                                                        <div class="col-sm">
                                                            <input type="text" placeholder="Weight"  name="weight"  class="form-control">
                                                        </div>
                                                        <div class="">
                                                            <input type="text" placeholder="Color/Markings"  name="color"  class="form-control">
                                                        </div><br><br><br><hr>
                                                        <div class="pt-2 mb-1">
                                                            <input type="file" placeholder="Pet image" id="imageInput"  name="image"  class="form-control">
                                                        </div>
                                                        
                                                        <div class="col-sm p-3">
                                                            <input type="submit" class="btn btn-primary w-100" value="Save">
                                                        </div>
                                                        <br>

                                                        <div id="imagePreviewDiv" class="mt-3">
                                                            <img id="imagePreview" src="" alt="Image Preview" style="max-width: 100%; height: auto; display: none;">
                                                        </div>

                                                    </form>
                                                </div>
                                        </div>
                                    </div>
                                </div>
            <!-- end add pet modal -->
                            </div>

                            <div class="d-flex-md container p-3 rounded-3">
                                <div class="row">
                                    <div class="col-sm">
                                        <form class="d-flex" role="search">
                                            <button type="button" class="btn btn-success me-2" style="width: 20%" data-bs-toggle="modal" data-bs-target="#clickModal" data-bs-whatever="@mdo">Add Pet</button>
                                            <input class="form-control me-2 col-sm" type="search" placeholder="Search Pet" aria-label="Search">
                                            <button class="btn btn-secondary" style="width: 20%;" type="submit">Search</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="container mt-4 table-responsive">
                                <table class="table align-middle">
                                    <thead>
                                        <tr>
                                            <th scope="col">Pet Image</th>
                                            <th scope="col">Pet Name</th>
                                            <th scope="col">Date of Birth</th>
                                            <th scope="col">Animal Type</th>
                                            <th scope="col">Gender</th>
                                            <th scope="col">Breed</th>
                                            <th scope="col" class="fixed-width">Color/Markings</th>
                                            <th scope="col">Weight</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($pets as $pet)     
                                        <tr>
                                            <td><img src="{{ asset($pet->image) }}" alt="Pet Image" style="max-width: 250px; height: 200px;"></td>
                                            <td>{{ $pet->petname }}</td>
                                            <td>{{ $pet->date }}</td>
                                            <td>{{ $pet->animaltype }}</td>
                                            <td>{{ $pet->gender }}</td>
                                            <td>{{ $pet->breed }}</td>
                                            <td class="fixed-width-truncate">{{ $pet->colormarkings }}</td>
                                            <td>{{ $pet->weight }}</td>
                                            <td>
                                                <a href="{{ route('customer.diagnosis', ['id' => $pet->id]) }}"><button type="view" class="btn btn-info">Diagnosis</button></a>
                                                <button type="update" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#clickModal" data-bs-whatever="@mdo"><i class="fas fa-edit"></i></button>
                                            </td>
                                        </tr>
                                        @empty
                                            
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
        </div>
    </div>
</body>
<script>
    document.getElementById('imageInput').addEventListener('change', function(event) {
        const input = event.target;
        const preview = document.getElementById('imagePreview');
        const previewDiv = document.getElementById('imagePreviewDiv');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };

            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = '';
            preview.style.display = 'none';
        }
    });
</script>