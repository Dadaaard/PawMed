
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>PAWMED - Transaction</title>

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



                <div class="col offset-2 pt-5" id="main">
                    <!-- <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active "><a href="#">Dashboard</a></li>
                        </ol>
                    </nav> -->
                    
                    <div class="grid text-center rounded-4" style="--bs-columns: 3; background-color: azure;">
                        <div class="p-4 pt-5"><center><h2>Customer Transaction</h2></center>
                        <hr class="border-3">
                    </div>

                        <div class="container p-1 rounded-3">
                        
<!-- start modal -->                       
                            <div class="modal fade" id="clickModal" tabindex="-1" aria-labelledby="clickModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="clickModalLabel">New Transaction</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="row g-3" action="{{ route('store.transaction') }}" method="POST" enctype="multipart/form-data">

                                                @csrf

                                                <div class="col-sm w-100 ">
                                                    <input type="text" placeholder="Name/Customer" name="name" required class="form-control">
                                                </div>

                                                <div class="col-sm">
                                                    <input type="text" placeholder="Email" name="email" required class="form-control">
                                                </div>

                                                <div class="text-start fw-semibold">
                                                    <caption>Transaction Date</caption>
                                                    <input type="date" placeholder="Date" name="date" required class="form-control">
                                                </div>

                                                @php
                                                   
                                                @endphp
                                                <div class="col-sm">
                                                    <select class="form-select" id="inputState" for="inputState" name="medicine" required class="form-control" onchange="updateStocksAvailable(this)">
                                                        <option selected disabled>Please select medicine</option>
                                                        @foreach ($medicines as $medicine)
                                                        <option value="{{$medicine->id}}"> {{$medicine->GenericName}} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-sm">
                                                    <input type="number" placeholder="Quantity" min="1" id="quantity" name="quantity" required class="form-control" onchange="updatePayment()">
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

                        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#clickModal" data-bs-whatever="@mdo">New Transaction</button>
                        </div>
                    <div class="container p-3 rounded-3">
                        <div class="row">
                            <div class="col-sm">
                                <form class="d-flex" role="search">
                                    <input class="form-control me-2 col-sm" type="search" placeholder="Search" aria-label="Search">
                                    <button class="btn btn-secondary" style="width: 20%;" type="submit">Search</button>
                                </form>
                            </div>
                        </div>
                        <table class="table table-hover table-bordered caption-top col-md ">
                            <br><br>
                            <thead>
                                <tr class="table table-dark text-start">
                                    <th scope="col">#</th>
                                    <th scope="col" class="text-center">Date</th>
                                    <th scope="col">Name/Customer</th>
                                    <th scope="col">Medicine Name</th>
                                    <th scope="col" class="text-center">Quantity</th>
                                    <th scope="col" class="text-center">Total Payment</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($transactions as $transaction)
                                <tr>
                                    @php
                                        $medicinename = App\Models\Inventory::where('id', $transaction->MedicineOrdered)->value('GenericName');
                                    @endphp
                                    <th scope="row">{{$transaction->id}}</th>
                                    <td>{{$transaction->Date}}</td>
                                    <td class="text">{{$transaction->Name}}</td>
                                    <td class="text">{{$medicinename}}</td>
                                    <td>{{$transaction->Quantity}}</td>
                                    <td class="text text-center">{{$transaction->Total}}</td>
                                    <td>
                                        <div class="col d-md-flex gap-1 justify-content-center">
                                            <center><button type="view" class="btn btn-warning" style="width: 40px;" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $transaction->id }}"><i class="fas fa-eye"></i></button>
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
                    </div>
                    </div>
                    <!-- end of available med -->
                </div>
            </div>
        </div>
    </div>

    @foreach ($transactions as $transaction)
            <!-- modal -->
            <div class="modal fade" id="exampleModal{{ $transaction->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $transaction->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel{{ $transaction->id }}">Customer Email</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="p-5">
                                        <b>Email:</b> {{$transaction->Email}}
                                    </div>
                                    <div class="modal-footer justify-content-center">
                                        <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
    @endforeach

</body>
</html>
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