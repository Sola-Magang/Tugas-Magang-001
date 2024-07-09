<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>{{ $title }}</title>
    <?php use Carbon\Carbon;?>

</head>
<body>
</body>
    <div class="min-h-full">
        <header class="overflow-hidden w-screen fixed flex items-center bg-gray-300 shadow">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-2 lg:px-4">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $title }}</h1>
            </div>

            <div class="grid grid-cols-2 place-items-end mx-auto max-w-7xl px-4 py-6 sm:px-2 lg:px-4">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <input type="submit" value="Log Out" class="text-white bg-gray-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 transition-colors">
                </form>
                <form class="flex items-center">
                    @if (request('category'))<input type="hidden" value="{{ request('category') }}" name="category">@endif
                  <label for="search" class="sr-only">Search</label>
                  <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                      <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                      </svg>
                    </div>
                    <input type="text" id="simple-search" class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search" type="search" name="search" id="search" autocomplete="off">
                  </div>
                  <div class="relative">
                    <button type="submit" class="block p-2 pl-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 hover:bg-gray-200 transition-colors">Cari</button>
                  </div>
                </form>
              </div>
        </header>
        <main>
            <div class="mx-auto max-w-14xl px-4 lg:py-10 py-24 sm:px-6 lg:px-4">
                {{ $slot }}
            </div>
        </main>
    </div>
</html>