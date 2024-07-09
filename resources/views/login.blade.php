<!DOCTYPE html>
<html lang="en" class="h-full bg-white">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        @vite('resources/css/app.css')
        <title>{{ $slot }}</title>
        <?php use Carbon\Carbon;?>

    </head>
    <body class="h-full">
        <div class=" flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm"><h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Log In</h2></div>
            <div class="sm:mx-auto sm:w-full sm:max-w-sm"><h5 class="mt-2 text-center text-md leading-9 tracking-tight text-gray-900">{{ Session::get('mess') }}</h5></div>
        
            <div class="mt-2 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="{{ route('login') }}" method="POST">
                @csrf
                <div>
                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
                <div class="mt-2">
                    <input id="email" name="email" value="{{ Session::get('email') }}" type="email" autocomplete="email" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 @error('email')border-red-500 @enderror">
                    @error('email')
                    <div class="text-sm text-red-500 mt-0">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                </div>
        
                <div>
                <div class="flex items-center justify-between">
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                    <div class="text-sm">
                    {{-- <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot password?</a> --}}
                    </div>
                </div>
                <div class="mt-2">
                    <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 @error('password') border-red-500 @enderror">
                    @error('email')
                    <div class="text-sm text-red-500 mt-0">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                </div>
        
                <div>
                <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
                </div>
                <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                    Don't have an account yet?
                    <a href="{{ route('pg.register') }}" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign up</a>
                </p>
            </form>
            </div>
        </div>
  
    </body>
</html>