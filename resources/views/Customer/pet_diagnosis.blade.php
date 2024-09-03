<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>InfoSec Project - LARAGOD</title>
    
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


                    <div class="col offset-2" id="main">
                    <br><br>
                    <div style="color: white;"><center><h2>Pet Medical Record</h2></center></div><hr>
                    <div class="text-center p-3">
                        <div class="row justify-content-center">
                            <div class="col">
                                <div class="text-start">
                                    <a href="/dashboard/customer"><button type="button" class="btn btn-secondary" style="width: 100px">Back</button></a>
                                </div>
                            </div>
                        </div><br>
<!-- A FORM START-->

                 
@foreach ($petlist as $item)

@if ($item->records->isNotEmpty())
    <div class="container pt-4 mb-4 rounded-2 border" style="background-color:azure">
        <header class="text-start mb-4">
            <div class="row">
                <div class="col">
                    <b>Pet Name:</b> {{ $item->id }}
                    <b>Pet Name:</b> {{ $item->petname }}
                </div>
                @php
                    $getDoctor = DB::table('users')->where('id', $item->records->first()->doctor_id)->first(); 
                @endphp
                <div class="col text-end">
                    <b>Doctor: {{$getDoctor->name}}</b> 
                </div>
            </div>

<br>
            <div class="row">
                <div class="col text-end" style="color: orange;">
                    <b style="color: black;">Status:</b> <b>{{$item->records->first()->status}}</b>
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
                        <td>{{ $item->records->first()->diagnosis }}</td>
                    </tr>
                </tbody>
            </table>

            
            <div class="text-start" style="background-color: white; margin-left: 20%; margin-right: 20%;">
                <table class="table table-bordered">
                    <thead style="fw-semibold">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Prescribed Medicines</th>
                            <th scope="col">Quantity</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach($item->records as $record)

                       
                            <tr>
                                <th scope="row">{{ $record->id }}</th>
                                <td>{{ $record->medicinename }}</td>
                                <td>{{ $record->quantity }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mb-3">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#clickModal" data-bs-whatever="@mdo">Process</button>
            </div>
            <!-- start modal -->                       
            <div class="modal fade" id="clickModal" tabindex="-1" aria-labelledby="clickModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="clickModalLabel">Make Transaction</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="row g-3" action="{{ route('fromDiagnosis.transaction') }}" method="POST">
                                @csrf
                                @php
                                
                                    $user = DB::table('users')->where('id', $item->user_id)->first();
                                @endphp
                                
                                <input type="hidden" name="petname" value="{{ $item->petname }}">
                                <input type="hidden" name="doctorname" value="{{$getDoctor->name}}">
                                <input type="hidden" name="pet_id" value="{{$item->id}}">
                                <input type="hidden" name="diagnosis" value="{{$item->records->first()->diagnosis}}">
                                @foreach($item->records as $record)
                                
                                <input type="hidden" name="medicine" value="{{$record->Medicine}}">
                                <input type="hidden" name="quantity" value="{{$record->Quantity}}">
                                <input type="hidden" name="Status" value="{{$record->Status}}">
                                @endforeach
                               
                                <div class="col-sm w-100 ">
                                    <input type="text" placeholder="Name/Customer" readonly name="name" value="{{ $user->name }}" required class="form-control">
                                </div>
                                <div class="col-sm">
                                    <input type="text" placeholder="email" name="email" readonly value="{{ $user->email }}" required class="form-control">
                                </div>
                                <div class="col-sm">
                                    <select class="form-select" id="inputState" for="inputState" name="medicine" onchange="updateStocksAvailable(this)" required class="form-control">
                                        <option selected disabled>Please select medicine</option>
                                        @foreach ($stocks as $stock)
                                        <option value="{{$stock->id}}">{{$stock->GenericName}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm">
                                    <input type="number" placeholder="Quantity" id="quantity" name="quantity" min="1" onchange="updatePayment() " required class="form-control">
                                </div>
                                <div>
                                    <p id="stocksAvailable" style="color: green; text-align: left;"><b>Stocks available: <span id="stocksCount">---</span></b></p>
                                </div>
                                <div>
                                    <input type="text" class="form-control" readonly placeholder="Total Payment" id="payment" name="payment">
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
    </div>
@endif
@endforeach
<!-- A FORM END-->
                        <hr>
<!-- ANNOTHER FORM START-->
                        <h3 class="text-start fw-bold" style="color: white;">HISTORY</h3>
                        @foreach($historys as $history)
                        <div class="container pt-4 mb-5 rounded-2 " style="background-color:azure">
                            <header class="text-start mb-4">
                                <div class="row">
                                    <div class="col">
                                        <b>Pet Name:</b> {{ $history->petname }}
                                    </div>

                                    <div class="col text-end">
                                        <b>Doctor:</b> {{ $history->doctorname }}
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col text-end" style="color: green;">
                                        <b style="color: black;">Status:</b> <b>{{$history->Status}}</b>
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
                                            <td>{{ $history->diagnosis }}</td>
                                        </tr>
                                    </tbody>
                                </table>


                               
                                    <div class="text-start" style="background-color: white; margin-left: 20%; margin-right: 20%;">
                                        <table class="table table-bordered">
                                            <thead style="fw-semibold">
                                                <tr>
                                                    <th scope="col">Prescribed Medicines</th>
                                                    <th scope="col">Quantity</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-group-divider">
                                                <tr>
                                                    <td>{{ $history->medicine }}</td>
                                                    <td>{{ $history->quantity }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                
                            </div>
                        </div>
                        @endforeach
                        
                        
<!-- ANOTHER FORM END-->

                    </div>
                </div>
        </div>
    </div>
</body>
<script>
    function updateStocksAvailable() {
        const selectElement = document.getElementById('inputState');
        var medicineId = selectElement.value;
        
        if (medicineId) {
            var url = "{{ route('get-stocks', ['medicineId' => ':medicineId']) }}";
            url = url.replace(':medicineId', medicineId);


            var xhr = new XMLHttpRequest();
            xhr.open('GET', url, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var response = JSON.parse(xhr.responseText);
                        document.getElementById('stocksCount').textContent = response.stocksAvailable;
                    } else {
                        console.error('Error fetching stocks:', xhr.status);
                    }
                }
            };
            xhr.send();
        } else {
            document.getElementById('stocksCount').textContent = '---'; // Or any default text
        }
    }
    function updatePayment() {
        const selectElement = document.getElementById('inputState');
        var medicineId = selectElement.value;
        console.log(medicineId);
        const quantity = document.getElementById('quantity').value;
        console.log(quantity);

        if (medicineId) {

            var url = "{{ route('get-payment', ['medicineId' => ':medicineId', 'quantity' => ':quantity']) }}";
            url = url.replace(':medicineId', medicineId);
            url = url.replace(':quantity', quantity);
            console.log(url);
            var xhr = new XMLHttpRequest();
            xhr.open('GET', url, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var response = JSON.parse(xhr.responseText);
                        document.getElementById('payment').value = "₱"+response.payment;
                    } else {
                        console.error('Error fetching stocks:', xhr.status);
                    }
                }
            };
            xhr.send();
        } else {
            document.getElementById('payment').textContent = '---'; // Or any default text
        }
    }
</script>