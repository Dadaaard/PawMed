<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>PAWMED - Doctor DASHBOARD</title>
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
    .fixed-size-textarea {
    width: 100%;
    height: 150px;
    resize: none; /* Prevent resizing */
    box-sizing: border-box; /* Include padding and border in the element's total width and height */
    padding: 10px;
    font-size: 14px;
    line-height: 1.5;
}
    h4{
        color: white;
        padding-left: 20px;
    }
    .sticky-top {
        position: sticky;
        top: 0;
        z-index: 1020;
    }
    .form-control{
        background-color: darkgrey;
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
                    <div class="row">
                        <div class="col">
                            <h4>Good Day, <b> Dr. {{Auth::user()->name}} </b></h4>
                        </div>
                    </div>


<!-- APPOINTMENTS -->
                    <div class="container-appointment rounded-2 shadow" style="background-color: azure;">
                        <div><br>
                            <div class="col-sm header-title text-center">
                                <h4 style="color: black;"><b>WEEKLY APPOINTMENTS</b></h4>
                            </div><br>
                            <div class="table-container p-2">
                                <table class="table border">
                                    <thead class="table-dark">
                                        <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Pet Name</th>
                                        <th scope="col">Purpose</th>
                                        <th scope="col">Appointment Date and Time</th>
                                        <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($WeeklyAppointments as $WeeklyAppointment)
                                            @php
                                                $date = \Carbon\Carbon::parse($WeeklyAppointment->appointmentDate)->format('Y-m-d h:i A');
                                            @endphp
                                            <tr>
                                                <th scope="row">{{ $WeeklyAppointment->id }}</th>
                                                <td>mimi@gmail.com</td>
                                                <td>{{ $WeeklyAppointment->PetName }}</td>
                                                <td>{{ $WeeklyAppointment->Purpose }}</td>
                                                <td>{{ $date }}</td>
                                                <td class="col fw-semibold">

                                                    <form action="{{ route('update.session', $WeeklyAppointment->id) }}" method="post">
                                                        @csrf

                                                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#startSessionModal{{ $WeeklyAppointment->id }}">START SESSION</button>

                                                    </form>



                                                    <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#infoModal{{ $WeeklyAppointment->id }}"><i class="fas fa-info"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                
                                @foreach($WeeklyAppointments as $WeeklyAppointment)
                                    <!-- Info Modal -->
                                    <div class="modal fade" id="infoModal{{ $WeeklyAppointment->id }}" tabindex="-1" aria-labelledby="infoModalLabel{{ $WeeklyAppointment->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="infoModalLabel{{ $WeeklyAppointment->id }}">Medical Information</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <ul class="list-group mb-3">
                                                        <li class="list-group-item disabled fw-bold text-center" style="background-color: darkseagreen;" aria-disabled="true">Pet's Conditions</li>
                                                        <li class="list-group-item text-start">{{ $WeeklyAppointment->conditions}}</li>
                                                    </ul>
                                                    <hr>
                                                    <ul class="list-group">
                                                        <li class="list-group-item disabled fw-bold text-center" style="background-color: darkseagreen;" aria-disabled="true">Current Symptoms</li>
                                                        <li class="list-group-item text-start">{{ $WeeklyAppointment->symptoms }}</li>
                                                    </ul>
                                                </div>
                                                <div class="modal-footer justify-content-center">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                
                                @endforeach
                                </table>
                    <!-- modal -->
                                
                            </div>
                        </div>
                    </div>
                        
        </div>
    </div>
</body>

    