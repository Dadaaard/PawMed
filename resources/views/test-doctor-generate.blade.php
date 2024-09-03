<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>PAWMED - Doctor GENERATE</title>
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


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </head>

<style>
    /* .btn{
        width: 10%;
    } */
    /* .navbar{
        padding: 20px;
        background-color: aliceblue;
    } */
    .custom-link {
            color: black; /* Change the color to whatever you prefer */
        }

        .custom-link:hover {
            color: whitesmoke; /* Change the hover color if needed */
            background-color: black;
            border-radius: round(3);
        }
    
    .btn-logout{
        padding-bottom: 100px;
    }
    .sticky-top {
        position: sticky;
        top: 0;
        z-index: 1020;
        background-color:aquamarine
    }
    p{
        font-size: 12px;
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
                <ul class="gap-4 nav flex-column vh-100 d-flex" style="">
                    <li class="nav-item">
                        <a class="nav-link active custom-link rounded-2" aria-current="page" href="/test-doctor">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link custom-link rounded-2" href="/test-doctor-generate">Patient Records</a>
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
                    <div style="color: white;"><center><h2>Patients</h2></center></div><hr>
                    <div class="text-center p-3">
                        <div class="row justify-content-center">
                            <div class="col">
                                <form class="d-flex" role="search" action="{{ route('search.inventory') }}" method="get">
                                    @csrf
                                    <input class="form-control me-2 col-sm" type="search" placeholder="Search pet name" name="search" aria-label="Search">
                                    <button class="btn btn-secondary" style="width: 20%;" type="submit">Search</button>
                                </form>
                            </div>
                        </div><br>
<!-- PATIENTS CARD START -->
                        <div class="row row-cols-1 row-cols-md-4 g-4 pt-4">

                @foreach($pets as $pet)
                    <div class="col">
                        <a href="{{ route('record.patient', $pet->id) }}" style="text-decoration: none;">
                            <div class="card h-80">
                                <img src="{{ asset($pet->image) }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $pet->petname }}</h5>
                                    <p class="card-text text-start">Owner: {{ $pet->user->name }}</p>
                                    <p class="card-text text-start">Email: {{ $pet->user->email }}</p>
                                </div>
                               
                                @if($pet->count() >= 1)
                                    @php
                                        $records = App\Models\Records::where('pet_id', $pet->user->id)->latest()->first();
                                    @endphp
                                    @if($records)
                                        <div class="card-footer" style="background-color: azure;">
                                            <small class="text-body-secondary">Updated {{ $records->created_at->diffForHumans() }}</small>
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </a>
                    </div>
                @endforeach

                            
                        </div>
<!-- PATIENTS CARD END -->
                    </div>
                </div>
        </div>
    </div>
</body>

    