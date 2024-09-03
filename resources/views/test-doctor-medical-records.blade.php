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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


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
                    <div style="color: white;"><center><h2>Pet Medical Record</h2></center></div><hr>
                    <div class="text-center p-3">
                        <div class="row justify-content-center">
                            <div class="col">
                                <div class="text-start">
                                    <a href="/test-doctor-generate"><button type="button" class="btn btn-secondary" style="width: 100px">Back</button></a>
                                </div>
                            </div>
                        </div><br>

                        
                        <form method="POST" action="{{ route('store.medical-record', $pet->id) }}" id="medicalRecordForm">
                        @csrf
                        

                    <div id="printableArea">
                        <div class="container pt-4 mb-5 rounded-2"  style="background-color:azure">
                            <header class="text-start mb-4">

                                <input type="hidden" name="petname" value="{{$pet->id}}">
                                <input type="hidden" name="pet_id" value="{{$pet->id}}">
                                <input type="hidden" name="status" value="PENDING">
                                <div class="row">
                                    <div class="col" name="petname">
                                        <b>Pet Name:</b> {{$pet->petname}}
                                    </div>

                                    <div class="col text-end">
                                        <b>Doctor:</b> {{Auth::user()->name}}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <b>Pet Owner:</b> {{$pet->user->name}}
                                    </div>
                                </div><br>
                                
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
                                            <td><textarea id="w3review" name="diagnosis" rows="4" cols="170">
                                                
                                            </textarea></td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="text-start" style="background-color: white; margin-left: 20%; margin-right: 20%;">
                                <table class="table align-middle text-start border border-dark">
                                    <thead>
                                        <tr>
                                            <th scope="col">Prescription</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="input-group">
                                                    <span class="input-group-text">Medicine and Quantity</span>
                                                    <input type="text" aria-label="First name" id="medicine" name="medicine[]" class="form-control">
                                                    <input type="text" aria-label="Last name" id="quantity" name="quantity[]" class="form-control">
                                                    <button class="btn btn-outline-secondary" type="button" id="addButton">Add</button>
                                              </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                </div>
                                <div class="text-start" style="background-color: white; margin-left: 20%; margin-right: 20%;">
                                    <table class="table table-bordered">
                                        <thead style="fw-semibold">
                                            <tr>
                                            <th scope="col"></th>
                                            <th scope="col">Prescribed Medicines</th>
                                            <th scope="col">Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody id="medicineTableBody">
                                            
                                        </tbody>
                                    </table>
                                </div>
                                <input type="hidden" name="medicineData" id="medicineData">

                                
                                <div class="p-2 text-end">
                                    <button type="submit" class="btn btn-success" onclick="submitForm()">Submit</button>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                        </form>
                    </div>
                        <button type="button" onclick="printDiv('printableArea')" class="btn btn-secondary" style="width: 15%;"><i class="fas fa-print" ></i>  PRINT DIALYSIS</button>
                        
                    </div>
                </div>
        </div>
    </div>
</body>


<script>
    const addButton = document.getElementById('addButton');
    const medicineTableBody = document.getElementById('medicineTableBody');
    const medicineInput = document.getElementById('medicine');
    const quantityInput = document.getElementById('quantity');


    addButton.addEventListener('click', () => {
        // Get current values from input fields
        const medicineValue = medicineInput.value.trim();
        const quantityValue = quantityInput.value.trim();

        if (medicineValue !== '' && quantityValue !== '') {
            // Create a new row for the table
            const row = document.createElement('tr');
            row.innerHTML = `
                <th scope="row">${medicineTableBody.children.length + 1}</th>
                <td>${medicineValue}</td>
                <td>${quantityValue}</td>
            `;
            medicineTableBody.appendChild(row);

            // Clear input fields after adding to table
            medicineInput.value = '';
            quantityInput.value = '';
        } else {
            alert('Please enter both medicine and quantity.');
        }
    });

    // Function to submit the form with table data
    function submitForm() {
        const form = document.getElementById('medicalRecordForm');

        // Prepare data array
        const data = [];
        const rows = document.querySelectorAll('#medicineTableBody tr');

        // Iterate through each row in the table
        rows.forEach(function(row) {
            const cells = row.querySelectorAll('td');
            const medicine = cells[0].textContent.trim();
            const quantity = cells[1].textContent.trim();

            // Add data to array
            data.push({
                medicine: medicine,
                quantity: quantity
            });
        });

        console.log(data);

        // Add data to a hidden input field in JSON format
        document.getElementById('medicineData').value = JSON.stringify(data);

        // Submit the form
        form.submit();
    }
    function printDiv(divId) {
        
            var printContents = document.getElementById(divId).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
            
        }
</script>

