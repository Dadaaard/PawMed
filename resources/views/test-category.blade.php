<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>PAWMED - HOME</title>
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
    <link rel="shortcut icon" href="images/app-logo.jpg" />

    <!-- this add-on extra for here onleeh -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </head>

<style>
    .text-align{
            white-space: nowrap;
            justify-content: space-between;
        }
    .custom-link {
            color: black; /* Change the color to whatever you prefer */
            font-size: 16px;
            padding: 5px;
        }

        .custom-link:hover {
            color: whitesmoke; /* Change the hover color if needed */
            background-color: black;
            border-radius: round(3);
        }
    
    .btn{
        color: black; 
        font-size: 19px;
        background-color: azure;
    }
    .btn-logout{
        padding-bottom: 100px;
        background-color:
    }
    .card{
        text-align: left;
    }
        .card-title{
            font-size: 14px;
        }

</style>




<body style="background-color: azure;">
<!-- Navbar -->
    <nav>
        <div class="navbar navbar-expand-sm shadow p-3 positio" style="height: 80px; background-color: ghostwhite">
            <a class="navbar-brand fw-semibold" href="#">
                <img src="/images/app-logo.jpg" width="30" height="26" class="d-inline-block align-text-top">
                    <b>PAWMED</b>
            </a>
            <div class="container-fluid m-3 p-2 justify-content-center">
                <div class="row gap-5">
                    <div class="col-sm text-align">
                        <a class="nav-link active custom-link rounded-2 text-center" aria-current="page" href="/test">HOME</a>
                        <!-- <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="nav-link active custom-link rounded-2 w-100" type="submit" >Logout</button>
                        </form> -->
                    </div> 
                    <div class="col-sm text-align dropdown nav-link custom-link rounded-2">
                            <a class="nav-link dropdown-toggle custom-link rounded-2" data-bs-toggle="dropdown" href="#" role="button">CATEGORIES</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/test-category">Health Medicine</a></li>
                                <li><a class="dropdown-item" href="#">Ticks and Flea</a></li>
                                <li><a class="dropdown-item" href="#">Food Treats</a></li>
                            </ul>
                    </div>
                    <div class="col-sm text-align">
                        <a class="nav-link active custom-link rounded-2 text-center" aria-current="page" href="#">PURCHASED ITEMS</a>
                    </div>
                    <div class="col-sm text-align">
                        <a class="nav-link active custom-link rounded-2 text-center" aria-current="page" href="#">MY PETS</a>
                    </div>
                    <div class="col-sm text-align">
                        <a class="nav-link active custom-link rounded-2 text-center" aria-current="page" href="#">SERVICES</a>
                    </div>
                </div>
            </div>
            <div class="p-2">
                <a href=""> Account </a>
            </div>
        </div>
    </nav>


    <div class="container-fluid">
            <div class="container text-center p-5">
                <h2> Health Medicine </h2><br><hr><br>
                <div class="row row-cols-1 row-cols-md-5 g-4">
                    <div class="col">
                        <div class="card h-100">
                        <img src="images/med1.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Apoquel (oclacitinib) Tablets for Dogs, 16-mg, 30 tablets</h5>
                            <p class="card-text">₱300.00</p>
                        </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                        <img src="images/med2.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Heartgard Plus Chew for Dogs, 51-100 lbs, (Brown Box), 6 Chews (6-mos. supply)</h5>
                            <p class="card-text">₱250.00</p>
                        </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                        <img src="images/med3.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Atopica (Cyclosporine) Capsules for Dogs, 50-mg, 15 capsules</h5>
                            <p class="card-text">₱362.00</p>
                        </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                        <img src="images/med4.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">NexGard Chew for Dogs, 10.1-24 lbs, (Blue Box), 3 Chews (3-mos. supply)</h5>
                            <p class="card-text">₱478.00</p>
                        </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                        <img src="images/med5.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Praziquantel Compounded Oral Liquid Chicken Flavored for Dogs and Cats, 5-mg/mL, 30 mL</h5>
                            <p class="card-text">₱390.00</p>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</body>

    