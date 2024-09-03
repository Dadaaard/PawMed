<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>PAWMED - MEDICAL RECORDS</title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </head>

<style>
    .image-container {
            position: relative;
            display: inline-block;
            text-align: center;
        }
    .image-container img {
            display: block;
            width: 100%;
            height: auto;
        }
    .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); /* Black background with transparency */
            display: flex;
            justify-content: center;
            align-items: center;
            padding-bottom: 30%;
            color: white; /* Text color */
        }
    .overlay-text {
            padding-left: 20px;
        }
    .text-align{
            white-space: nowrap; */
            justify-content: space-between;
            padding: 10px;
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
        font-size: 16px;
        background-color: azure;
    }
    .btn-logout{
        padding-bottom: 100px;
        background-color:
    }
    .sticky-top {
        position: sticky;
        top: 0;
        z-index: 1020;
    }
</style>




<body style="background-color: lightsteelblue;">
<!-- Navbar -->
<nav class="sticky-top">
        <div class="navbar navbar-expand-sm shadow p-3" style="height: 80px; background-color: ghostwhite">
            <a class="navbar-brand fw-semibold" href="#">
                <img src="/images/app-logo.jpg" width="30" height="26" class="d-inline-block align-text-top">
                    <b>PAWMED</b>
            </a>
            <div class="container-fluid m-3 p-2 justify-content-center">
                <div class="row gap-4">
                    <div class="col-sm text-align">
                        <a class="nav-link active custom-link rounded-2 fw-semibold text-center" aria-current="page" href="/test">HOME</a>
                    </div> 
                    <div class="col-sm text-align">
                        <a class="nav-link active custom-link rounded-2 fw-semibold text-center" aria-current="page" href="/test-customer-purchase">PURCHASED ITEMS</a>
                    </div>
                    <div class="col-sm text-align">
                        <a class="nav-link active custom-link rounded-2 fw-semibold text-center" aria-current="page" href="/test-customer-medical-records">MEDICAL RECORDS</a>
                    </div>
                    <div class="col-sm text-align">
                        <a class="nav-link active custom-link rounded-2 fw-semibold text-center" aria-current="page" href="/dashboard/customer/appointment">APPOINTMENTS</a>
                    </div>
                </div>
            </div>
            <div class="container justify-content-end">
                <div class="row">
                    <div class="col-sm">
                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#clickModal" data-bs-whatever="@mdo"><i class="fas fa-person"></i></button>
                    </div>
                    <div class="col-sm">
                        <form method="POST" action="{{ route('logout') }}">
                        @csrf
                            <button class="btn btn-info" type="submit" ><i class="fa-solid fa-arrow-right-from-bracket"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- ACCOUNT INFORMATION START -->
    <div class="modal fade" id="clickModal" tabindex="-1" aria-labelledby="clickModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="clickModalLabel">Account Information</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        @php
                            $pets = \App\Models\Pet::where('user_id', Auth::user()->id)->get('petname')->count();
                        @endphp
                        <div class="modal-dialog">
                            
                                <div class="row gap-5">
                                    <div class="col-sm left-align">
                                        Name:
                                    </div>
                                    <div class="col-sm left-align">
                                        {{Auth::user()->name}}
                                    </div>
                                </div>
                                <br>
                                <div class="row gap-5">
                                    <div class="col-sm left-align">
                                        Date Joined:
                                    </div>
                                    <div class="col-sm left-align">
                                        {{Auth::user()->created_at}}
                                    </div>
                                </div>
                                <br>
                                <div class="row gap-5">
                                    <div class="col-sm left-align">
                                        Pets:
                                    </div>
                                    <div class="col-sm left-align">
                                        {{ $pets }}
                                    </div>
                                </div>

                                <br>
                        </div>
                    </div>
                </div>
            </div>
            
<!-- ACCOUNT INFORMATION MODAL END -->
        <hr>

        <div class="row gap-5 m-5  w-500">
        @foreach ($petlist as $pet)
        
        <div class="col justify-content-center">
            
                    <div class="container-fluid pt-2 mb-3 rounded-2 border border shadow" style="background-color: azure">
                        <header class="text-start mb-2">
                            <div class="row">
                                <div class="col">
                                    <b>Pet Name: {{ $pet->petname }}  </b>
                                    <div class="row">
                                        <span><b>Pet Owner:</b> {{ $pet->user->name }}</span> <!-- Assuming you have a relationship setup -->
                                    </div>
                                </div>
                                <div class="col-6 col-md-4">
                                    <div class="">
                                    </div>
                                    <div class="">
                                        
                                        <b>Date:</b> {{ $pet->date }} <!-- Update with actual date if available -->
                                        
                                    </div>
                                    <div class="">
                                        <b>Doctor:</b> wala pa
                                    </div>
                                </div>
                            </div>
                        </header>

                        <div class="table-responsive">
                            <table class="table align-middle text-start border border-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">Diagnosis</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pet->records as $record)
                                    <tr>
                                        <td>{{$record->diagnosis}}</td> <!-- Replace with actual diagnosis -->
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="text-start" style="background-color: white; margin-left: 10%; margin-right: 10%;">
                                <table class="table table-bordered">
                                    <thead style="font-weight: bold;">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Prescribed Medicines</th>
                                            <th scope="col">Quantity</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody class="table-group-divider">
                                        @foreach($pet->records as $record)
                                            <tr>
                                                <th scope="row">{{ $record->id}}</th>
                                                <td>{{ $record->Medicine}}</td>
                                                <td>{{ $record->Quantity}}</td> 
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="p-1 text-end">
                                <button class="btn btn-secondary" onclick="window.print()" style="width: 15%;"><i class="fas fa-print"></i> PRINT DIALYSIS</button>
                            </div>
                        </div>
                    </div>
                    
                @endforeach
                <div class="d-flex justify-content-end">
                    {{ $petlist->links() }} <!-- Pagination links -->
                </div>
        </div>

        {{-- <div class="col justify-content-center border border-dark p-5">
            <div class="container-fluid pt-2 mb-3 rounded-2 border border-dark shadow" style="background-color:azure">
                <header class="text-start mb-2">
                    <div class="row">
                        <div class="col">
                            <b>Pet Name:</b> Tiger
                            <div class="row">
                                <span><b>Pet Owner:</b> Christine Jane Gorgon</span>
                                <div class="row">
                                    <span><b>Test/Laboratory:</b> Physical Examination</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="">
                                <b>Purpose:</b> General Examination
                            </div>
                            <div class="">
                                <b>Date:</b> 10-07-2024
                            </div>
                            <div class="">
                                <b>Doctor:</b> Luna Lunarian
                            </div>
                        </div>
                    </div>
                </header>
        
                <div class="table-responsive">
                    <table class="table align-middle text-start border border-dark">
                        <thead>
                            <tr>
                                <th scope="col">Diagnosis</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>sdsdsdsdsdsdsdsd</td>
                            </tr>
                        </tbody>
                    </table>
        
                    <table class="table align-middle text-start border border-dark">
                        <thead>
                            <tr>
                                <th scope="col">Prescription</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>sdsdsdsdsdsdsdsd</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="text-start" style="background-color: white; margin-left: 10%; margin-right: 10%;">
                        <table class="table table-bordered">
                            <thead style="fw-semibold">
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Prescribed Medicines</th>
                                <th scope="col">Quantity</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <tr>
                                <th scope="row">1</th>
                                <td>DIPHENHYDRAMINE</td>
                                <td>10</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="p-1 text-end">
                        <button class="btn btn-secondary" style="width: 15%;"><i class="fas fa-print"></i> PRINT DIALYSIS</button>
                    </div>
                </div>
            </div>
        </div> --}}
        
    </div>
        
        <!-- jQuery and Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>

    