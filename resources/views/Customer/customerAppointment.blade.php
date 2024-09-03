<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>PAWMED - PURCHASED ITEMS</title>
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
        background-color:lightsteelblue
    
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
                        <div class="modal-dialog">
                            @csrf
                                <div class="row gap-5">
                                    <div class="col-sm left-align">
                                        Name:
                                    </div>
                                    <div class="col-sm left-align">
                                        {{Auth::user()->name}}
                                    </div>
                                </div>
                                <hr>
                                <div class="row gap-5">
                                    <div class="col-sm left-align">
                                        Date Joined:
                                    </div>
                                    <div class="col-sm left-align">
                                        {{Auth::user()->created_at}}
                                    </div>
                                </div>
                                <hr>
                                <div class="row gap-5">
                                    <div class="col-sm left-align">
                                        Pets:
                                    </div>
                                    <div class="col-sm left-align">
                                        @php
                                        $appointments1 = App\Models\Appointment::where('id', Auth::user()->id)->count();
                                        @endphp
                                        {{$appointments1}}
                                    </div>
                                </div>
                                <hr>
                        </div>
                    </div>
                </div>
            </div>
<!-- ACCOUNT INFORMATION MODAL END -->

        <div class="container">
            <h1 class="success" id="success"></h1>
        </div><br>
       
        <div class="container p-3 mb-5 border border-dark border-2 rounded-3 shadow" style="background-color: white">
            <form action="{{ route('store.appointment') }}" method="POST">
                @csrf
                <div class="row">
                    <h3 class="mb-4">Appointment Form</h3>
                    <div class="col-sm">
                        <input type="text" class="form-control" placeholder="Name" required-class="form-control" id="Name" name="Name"></input>
                    </div>
                    <div class="col-sm">
                        <input type="text" class="form-control" placeholder="Petname" required-class="form-control" id="Petname" name="Petname"></input>
                    </div>
                    <div class="col-sm">
                        <select class="form-select" required class="form-control" id="inputState" name="Purpose"  id="inputState" for="inputState">
                            <option selected>Purpose</option>
                            <option> General Check-up </option>
                            <option> Vaccination </option>
                            <option> Deworming </option>
                        </select>
                    </div>
                    <br>
                    <br><br>
                    <p class="m-2" style="color: red; font-size: 12px;"> *Please ensure that you are available by phone at ALL times until your pet is released back into your care</p><br><hr>
                    <div class="row gap-5 m-2 p-2">

                        <div class="col-6 row p-2 rounded-2" style="background-color: darkseagreen">
                            <h6>*Check the conditions that apply to your pet.</h6>
                            <div class="col-sm">
                                <div class="form-check">
                                    <input class="form-check-input" value="Coughing" type="checkbox"  name="conditions[]"><label class="form-check-label">Coughing</label">
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="Vomiting"type="checkbox"  name="conditions[]"><label class="form-check-label">Vomiting</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="Eye Discharge" type="checkbox" name="conditions[]"><label class="form-check-label">Eye Discharge</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="Nasal Discharge" type="checkbox" name="conditions[]"><label class="form-check-label">Nasal Discharge</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="Skin Issue" type="checkbox" name="conditions[]"><label class="form-check-label">Skin Issue</label>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-check">
                                    <input class="form-check-input" value="Sneezing" type="checkbox" name="conditions[]"><label class="form-check-label">Sneezing</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="Diarrhea" type="checkbox" name="conditions[]"><label class="form-check-label">Diarrhea</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="Dirty/Itchy Ears" type="checkbox" name="conditions[]"><label class="form-check-label">Dirty/Itchy Ears</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="Limping" type="checkbox" name="conditions[]"><label class="form-check-label">Limping</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="No Concerns" type="checkbox" name="conditions[]"><label class="form-check-label">No Concerns</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="row p-2 rounded-2" style="background-color: darkseagreen">
                                <h6>*Check the symptoms that your pet is currently experiencing.</h6>
                                <div class="col-sm">
                                    <div class="form-check">
                                        <input class="form-check-input" name="symptoms[]" type="checkbox" value="Not Eating"><label class="form-check-label">Not Eating</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="symptoms[]" type="checkbox" value="Trouble Defecating"><label class="form-check-label">Trouble Defecating</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="symptoms[]" type="checkbox" value="Weight Gain"><label class="form-check-label">Weight Gain</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="symptoms[]" type="checkbox" value="Change in Behavior"><label class="form-check-label">Change in Behavior</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="symptoms[]" type="checkbox" value="No Concerns"><label class="form-check-label">No Concerns</label>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="form-check">
                                        <input class="form-check-input" name="symptoms[]" type="checkbox" value=""><label class="form-check-label">Trouble Breathing</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="symptoms[]" type="checkbox" value="Trouble Breathing"><label class="form-check-label">Trouble Urinating</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="symptoms[]" type="checkbox" value="Weight Loss"><label class="form-check-label">Weight Loss</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="symptoms[]" type="checkbox" value="Change in activity level"><label class="form-check-label">Change in activity level</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><br><hr>
                    <!-- CALENDAR -->
                    <div>
                        <input type="datetime-local" class="form-control" name ="date" id="date" required-class="form-control"></input>
                    </div>
                </div><br>
                <div class="footer text-end p-3">
                    <button type="button" class="btn btn-secondary" id="clear">Clear</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div><br>
        
        <hr>
        <div class="container text-center">
            <h2>Recent Appointments</h2>
            <table class="table table-hover table-bordered caption-top col-md">
                <br>
                <thead>
                    <tr class="table table-dark text-center">
                        <th scope="col">Appointment Date</th>
                        <th scope="col">Pet Name</th>
                        <th scope="col">Purpose</th>
                    </tr>
                </thead>
                    <tbody>
                        
                        @forelse ($appointments as $appointment)
                        <tr>

                            @php

                            $appointmentDate = Carbon\Carbon::parse($appointment->appointmentDate)->format('M-d-Y h:i A');
    
                            @endphp
                        <td  class="text-center">{{$appointmentDate}}</td>
                        <td  class="text-center">{{$appointment->PetName}}</td>
                        <td  class="text-center">{{$appointment->Purpose}}</td>
                        @empty
                        <td colspan="10" class="text-center">No data found</td>
                        @endforelse
                        
                        </tr>
                    </tbody>
            </table>
        </div>
    <br><br><br>
</body>
<script>

document.getElementById('clear').addEventListener('click', function() {

    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
      checkboxes.forEach(function(checkbox) {
        checkbox.checked = false;
      });
      
      document.getElementById('Name').value = '';
      document.getElementById('Petname').value = '';
      document.getElementById('inputState').selectedIndex = 0;
      document.getElementById('date').value = '';
    });
</script>


    