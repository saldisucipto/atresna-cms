<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,viewport-fit=cover">
    {!! \App\Http\Utils\Meta::render() !!}

    {{-- tailwind css --}}
    <title>{{ $title }}</title>
    @livewireStyles

    @if ($companyInfo->company_favicon == 'logo.png')
        <link rel="shortcut icon" href="/assets/img/logo.png" type="image/x-icon">
    @else
        <link rel="shortcut icon" href="/storage/img/company/favicon/{{ $companyInfo->company_favicon }}"
            type="image/x-icon">
    @endif
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="/assets/css/atresnaStyle.css">
    {{-- add font awesome --}}
    <script src="https://kit.fontawesome.com/7a249e95a6.js" crossorigin="anonymous"></script>
</head>

<body class="text-gray-800">
    <div class="w-full h-full m-0 font-primary flex flex-col gap-10">
        @yield('konten')
    </div>
    @livewireScripts
    <script src="/assets/js/atresnaScript.js"></script>
</body>

</html>
