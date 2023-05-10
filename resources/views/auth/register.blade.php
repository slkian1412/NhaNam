{{--<x-guest-layout>--}}
{{--    <x-authentication-card>--}}
{{--        <x-slot name="logo">--}}
{{--            <x-authentication-card-logo />--}}
{{--        </x-slot>--}}

{{--        <x-validation-errors class="mb-4" />--}}

{{--        <form method="POST" action="{{ route('register') }}">--}}
{{--            @csrf--}}

{{--            <div>--}}
{{--                <x-label for="name" value="{{ __('Name') }}" />--}}
{{--                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />--}}
{{--            </div>--}}

{{--            <div class="mt-4">--}}
{{--                <x-label for="email" value="{{ __('Email') }}" />--}}
{{--                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />--}}
{{--            </div>--}}

{{--            <div class="mt-4">--}}
{{--                <x-label for="password" value="{{ __('Password') }}" />--}}
{{--                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />--}}
{{--            </div>--}}

{{--            <div class="mt-4">--}}
{{--                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />--}}
{{--                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />--}}
{{--            </div>--}}

{{--            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())--}}
{{--                <div class="mt-4">--}}
{{--                    <x-label for="terms">--}}
{{--                        <div class="flex items-center">--}}
{{--                            <x-checkbox name="terms" id="terms" required />--}}

{{--                            <div class="ml-2">--}}
{{--                                {!! __('I agree to the :terms_of_service and :privacy_policy', [--}}
{{--                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',--}}
{{--                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',--}}
{{--                                ]) !!}--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </x-label>--}}
{{--                </div>--}}
{{--            @endif--}}

{{--            <div class="flex items-center justify-end mt-4">--}}
{{--                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">--}}
{{--                    {{ __('Already registered?') }}--}}
{{--                </a>--}}

{{--                <x-button class="ml-4">--}}
{{--                    {{ __('Register') }}--}}
{{--                </x-button>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </x-authentication-card>--}}
{{--</x-guest-layout>--}}




    <!DOCTYPE html>
<html lang="en">

<head>
    <title>Đăng ký</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="admin/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="admin/css/util.css">
    <link rel="stylesheet" type="text/css" href="admin/css/main.css">
    <!--===============================================================================================-->
</head>

<body>
<div class="wrap-login100">
    <div class="login100-pic js-tilt" data-tilt>
        <a href="{{ route('book') }}">
            <img class="logo" src="/admin/asset/logo.png" alt="">
        </a>
        <img src="admin/asset/Group 3653.png" alt="IMG">
        <div class="cpr text-center p-t-180">Copyright Reserved @2021</div>
    </div>

    <form class="login100-form validate-form" action="{{route('register')}}" method="POST">
        @csrf
        <span class="login100-form-title">
                Register!
            </span>
        <span class="login100-form-title-2">
                New User
            </span>

        <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
            <x-label for="name" value="{{ __('Name') }}" />
            <input class="input100" type="text" name="name" placeholder="Username">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                </span>
        </div>

        <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
            <x-label for="email" value="{{ __('Email') }}" />
            <input class="input100" type="email" name="email" placeholder="Email">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                </span>
        </div>

        <div class="wrap-input100 validate-input" data-validate="Password is required">
            <x-label for="password" value="{{ __('Password') }}" />
            <input class="input100" type="password" name="password" placeholder="******">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                </span>
        </div>

        <div class="wrap-input100 validate-input" data-validate="Password is required">
            <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
            <input class="input100" type="password" name="password_confirmation" placeholder="******">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                </span>
        </div>
        <div class="container-login100-form-btn">
            <button class="login100-form-btn">
                Sign Up
            </button>
        </div>

        <div class="text-center p-t-12">
                <span class="txt2">
                    Already registered?
                </span>
            <a class="txt2" href="{{route('login')}}">
                Sign In?
            </a>
        </div>
        <div class="text-center p-t-230">
            <td>
                <a class="txt3" href="#">
                    Terms and Conditions
                </a>
                <span class="txt3">|</span>
                <a class="txt3" href="#">
                    Privacy Policy
                </a>
            </td>
        </div>
    </form>
</div>


<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/tilt/tilt.jquery.min.js"></script>
<script>
    $('.js-tilt').tilt({
        scale: 1.1
    })
</script>
<!--===============================================================================================-->
<script src="js/main.js"></script>

</body>

</html>
