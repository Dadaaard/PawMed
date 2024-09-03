<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>PAWMED - Login</title>

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
            background-color: ligh
        }

    </style>

</head>

    <body class="img">
        <x-auth-session-status :status="session('status')" />
            <div class="container-fluid position-absolute top-50 start-50 translate-middle w-50 shadow-lg" >
                <div class="row justify-content-center">
                    <div class="col-6 pt-5">
                        <img src="/images/app-logo.jpg" class="img-fluid" alt="logo">
                    </div>
                    <div class="col-6 p-5 top-50 center border-start border-black border-4 shadow-lg">
                        <div class="mx-auto" style="font-size: 12px;">
                            <h1><b> PAWMED </b></h1>
                            <p> Animal Health Clinic </p>
                                <form method="POST" action="{{ route('login') }}">
                                @csrf
                                    <div class="row g-2">
                                        <!-- Email Input -->
                                        <x-input-label/>
                                        <x-text-input class="form-control" placeholder="Email" id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                                        <x-input-error :messages="$errors->get('email')"/>

                                        <!-- Password Input -->
                                        <x-input-label/>
                                        <x-text-input id="password" class="block mt-1 w-full" placeholder="Password" type="password" class="form-control" name="password" required autocomplete="current-password" />
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />

                                        <!-- Forgot Password -->
                                        @if (Route::has('password.request'))
                                            <a class="underline text-sm text-start text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                                                {{ __('Forgot your password?') }}
                                            </a>
                                        @endif
                                    </div><br><br>

                                    <!-- Login Button -->
                                    <div class="justify-content-center">
                                        <button type="submit" class="btn btn-success w-100">{{__('Log in')}}</button><br>
                                    </div><hr>

                                    <!-- Register Button -->
                                    <div class="justify-content-center">
                                        <p> OR </p>
                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}" class="btn btn-secondary ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                                        @endif
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
    </body>
</html>
