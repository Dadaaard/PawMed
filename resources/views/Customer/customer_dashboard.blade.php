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
    <link rel="shortcut icon" href="images/favicon.png" />

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

        <div class="w-100">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="nav-link active custom-link rounded-2 w-100" type="submit" >Logout</button>
                            </form>
                        </div> 
    <!-- end of sticky sidebar -->





            
                <div class="col offset-2" id="main">
                    <!-- <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active "><a href="#">Dashboard</a></li>
                        </ol>
                    </nav> -->
                    <br><br>
                    <div class="justify-content-end" style="color: white;"><center><h2>CUSTOMER HOME</h2></center></div>
                    <div class="text-center p-5 border border-black border-3">
                        
                        <div class="justify-content-center">
                            <div class="container col-2 p-3 border border-primary border-3">
                                <input class="form-control" type="text" value="Number of Patients" aria-label="Disabled input example" disabled readonly>
                            </div>  

                            <div class="container col-2 p-3 border border-warning border-3">
                                <input class="form-control" type="text" value="Number of Patients" aria-label="Disabled input example" disabled readonly>
                            </div> 

                        </div>

                        <div>
                            
                        </div>
                        
                    </div>
                </div>
        </div>
    </div>

    </body>

    