<!DOCTYPE html>
<html lang="en">
    <head>
        @include('partials.head')
    </head>

    <body>

        {{-- navbar default --}}
        @include('partials.navbar')
        {{-- end navbar --}}

        {{-- content default --}}
        <div class="container">
            @include('partials.message')

            @yield('content')
        </div>
        {{-- end content --}}

        @include('partials.footer')

        @include('partials.javascript')
        @yield('scripts')

    </body>
</html>
