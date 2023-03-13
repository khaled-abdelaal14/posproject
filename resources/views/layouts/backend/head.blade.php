<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="HTML5 Template" />
<meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
<meta name="author" content="potenzaglobalsolutions.com" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<title>@yield('title')</title>

<!-- Favicon -->
<link rel="shortcut icon" href="images/favicon.ico" />
<link rel="shortcut icon" href="{{URL::asset('backend/assets/images/favicon.ico')}}" type="image/x-icon" />
<!-- Font -->
<link  rel="stylesheet" href="{{URL::asset('backend/assets/fonts/fontawesome/css/all.css')}}">

<!-- css -->
{{-- <link rel="stylesheet"  href="{{URL::asset('backend/assets/css/style.css')}}" /> --}}
@if (App::getLocale()=='en')
    <link rel="stylesheet" href="{{URL::asset('backend/assets/css/ltr.css')}}">
@else ()
    <link rel="stylesheet" href="{{URL::asset('backend/assets/css/rtl.css')}}">
@endif

@yield('css')