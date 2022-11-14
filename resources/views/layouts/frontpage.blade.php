<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ 'سوق تعز الالكتروني | البائع' }}</title>
  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  @livewireStyles
  <!-- Scripts -->
  @wireUiScripts

  {{-- --}}
  <!-- include libraries(jQuery, bootstrap) -->
  <!-- include summernote css/js -->

  <script src="{{ mix('js/app.js') }}" defer></script>
  <script src="{{ asset('assets/js/jquery-3.6.0.js') }}"></script>
  <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>

</head>

<body class="font-sans antialiased">
  <div class="min-h-screen">
    <x-navigation-customer-menu />

    @if (isset($header))
    <header class="bg-white">
      <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        {{ $header }}
      </div>
    </header>
    @endif
    <!-- Page Content -->
    <main>
      {{ $slot }}
    </main>
    <x-notifications />
  </div>
  @stack('modals')
  <x-dialog />
  <x-footer />
  @livewireScripts
 
</body>

</html>