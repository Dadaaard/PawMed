<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>PAWMED - Analytics</title>
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
        z-index: 1020; /* Ensure the navbar is above other content */
        background-color:
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
                    <div class="grid rounded-4 shadow pt-6" style="--bs-columns: 3; background-color: ;">
                        <div class="p-3" style="color: white;"><center><h2>Analytics</h2></center>
                            <hr class="border-3">
                        </div>

                            <div class="container p-2 row justify-content-center">
                                <div class="row">
                                    <div class="col-sm mb-2">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4>Total Transactions</h4>
                                                <p>{{$transactions}}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm mb-2">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4>Customers</h4>
                                                    <p>{{$Customers}}</p>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                
                                
<!-- Daily Income / Monthly Income / Annual Income -->
                                <div class="row gap-3 mt-2">
                                    <div class="col-md">
                                        <div class="card">
                                            <div class="card-header" style="background-color: burlywood;"></div>
                                            <div class="card-body">
                                                <h1>{{ $chart2->options['chart_title'] }}</h1>
                                                {!! $chart2->renderHtml() !!}
                                            </div>
                                        </div>
                                    </div>
                        
                                    <div class="col-md">
                                        <div class="card">
                                            <div class="card-header" style="background-color: cadetblue;"></div>
                                            <div class="card-body">
                                                <h1>{{ $chart3->options['chart_title'] }}</h1>
                                                {!! $chart3->renderHtml() !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md">
                                        <div class="card">
                                            <div class="card-header" style="background-color: darkolivegreen;"></div>
                                            <div class="card-body">
                                                <h1>{{ $chart4->options['chart_title'] }}</h1>
                                                {!! $chart4->renderHtml() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

<!-- Monthly Customers -->          
                                <div class="col-md p-4">
                                    <div class="card">
                                        <div class="card-header" style="background-color: salmon;"></div>
                                        <div class="card-body">
                                            <h1>{{ $chart1->options['chart_title'] }}</h1>
                                            {!! $chart1->renderHtml() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                
                    
                    @section('javascript')
                    {!! $chart1->renderChartJsLibrary() !!}
                    {!! $chart1->renderJs() !!}
                    {!! $chart2->renderChartJsLibrary() !!}
                    {!! $chart2->renderJs() !!}
                    {!! $chart3->renderChartJsLibrary() !!}
                    {!! $chart3->renderJs() !!}
                    {!! $chart4->renderChartJsLibrary() !!}
                    {!! $chart4->renderJs() !!}
        </div>            
    </div>
</body>

    