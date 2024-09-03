<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<title>Document</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<style>

    .img{
            background-image: url('images/bg-image-aniall.jpg'); /* Replace with your image path */
            background-size: cover; /* Ensure the image covers the entire background */
            background-position: center; /* Center the image */
            background-repeat: no-repeat;
            padding-top: 55%;
            
        }

        .center{
            display: flex;
            justify-content: center;
            text-align: center;
        }

        .justify-content-center{
            background-color: white;
            border-radius: 8px;
        }

        .btn{
            width: 50%;
        }

    </style>

    
  
</head>

    <body class="img">
        <div class="container-fluid position-absolute top-50 start-50 translate-middle w-75 shadow-lg" >
            <div class="row justify-content-center shadow">
                <div class="col-5 pt-5">
                    <img src="/images/app-logo.jpg" class="img-fluid " alt="...">
                </div>
                <div class="col-6 p-5 top-50 center border-start border-black border-4">
                    <div class="mx-auto" style="font-size: 12px;">
                        <h1><b> Registration Form </b></h1>
                        <form method="POST" action="{{ route('register')}}">
                        @csrf
                            <div class="row mx-auto justify-content-center">
                                <div class="row g-1 gap-1">
                                    <!-- Name -->
                                    <x-input-label/>
                                    <x-text-input id="name" class="form-control col-sm" placeholder="Name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    
                                    <!-- Email -->
                                    <x-input-label/>
                                    <x-text-input id="email" class="form-control col-sm" placeholder="Email" type="email" name="email" :value="old('email')" required autocomplete="username" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />

                                    <x-input-label/>
                                    <x-text-input id="phonenumber" class="form-control col-sm" placeholder="Phone Number" type="text" name="phonenumber" :value="old('phonenumber')" required autocomplete="username" />
                                    
                                </div><br>

                                <div class="row g-1 col gap-1">
                                    <!-- Password -->

                                    <x-input-label for="password"/>
                                    <x-text-input id="password" class="form-control col-sm" placeholder="Password" type="password" name="password" required autocomplete="new-password" />
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />

                                    <!-- Confirm Password -->
                                    <x-input-label for="password_confirmation"/>
                                    <x-text-input id="password_confirmation" class="form-control col-sm" placeholder="Confirm Password" type="password" name="password_confirmation" required autocomplete="new-password" />
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>

                                <!-- google recaptch -->
                                <div class="mt-4">
                                    {!! NoCaptcha::renderJs() !!}
                                    {!! NoCaptcha::display() !!}
                                    @if ($errors->has('g-recaptcha-response'))
                                    <x-input-error :messages="$errors->first('g-recaptcha-response')" />
                                    @endif
                                </div>


                            </div>
                            
                                <br>
                            <div>
                                <button type="submit" class="btn btn-info w-100"> {{ __('Register') }} </button>
                            </div><br>
                            <div>  
                                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                                    {{ __('Already registered?') }}
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>




