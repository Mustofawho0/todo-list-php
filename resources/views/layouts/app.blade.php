<!DOCTYPE html>
<html data-theme="light" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.22/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Laravel Todo List Apps</title>

    <style type="text/tailwindcss">
        .input-area {
            @apply rounded-lg border border-slate-200 shadow-md text-gray-500 text-sm leading-tight
        }

        .error-message {
            @apply text-red-500 text-xs font-medium
        }

        .label {
            @apply uppercase tracking-wide
        }

        .error-message-area {
            @apply rounded-lg border border-red-500 shadow-md
        }
    </style>
</head>

<body class="container mx-auto my-10 max-w-3xl border border-slate-200 shadow-xl rounded-lg antialiased">
    <h1 class="text-3xl tracking-wider font-semibold flex justify-center pt-4 px-4 text-center">@yield('title')</h1>
    <div class="p-6" x-data="{ flash: true }">
        @if (session()->has('success'))
            <div x-show="flash"
                class="relative border border-green-700 bg-green-200 text-green-800 rounded-lg shadow-md p-4"
                role="alert">
                <div class="font-bold">Success!</div>
                <span>{{ session('success') }}</span>

                <span class="absolute top-0 bottom-0 right-0 px-4 py-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        @click="flash = false" stroke="currentColor" class="h-5 w-5 cursor-pointer">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </span>
            </div>
        @endif
        @yield('content')
    </div>
</body>

</html>
