<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    <link rel="icon" type="image/png" href="{{ asset('uploads') }}/favicon.png">

    <title>Admin Panel</title>

    {{-- css --}}
    @include('admin.layouts.styles')


    {{-- scripts --}}
    @include('admin.layouts.scripts')


</head>

<body>
    <div id="app">
        <div class="main-wrapper">

            {{-- navbar --}}
            @include('admin.layouts.nav')

            {{-- sidebar --}}
            @include('admin.layouts.sidebar')

            <div class="main-content">
                <section class="section">
                    <div class="section-header justify-content-between">
                        <h1>@yield('heading')</h1>
                        @yield('button')
                    </div>

                    {{-- content --}}
                    @yield('main_content')

                </section>
            </div>

        </div>
    </div>


    {{-- scripts footer --}}
    @include('admin.layouts.scripts_footer')


    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                iziToast.error({
                    title: '',
                    position: 'topRight',
                    message: '{{ $error }}',
                });
            </script>
        @endforeach
    @endif

    @if (session()->get('error'))
        <script>
            iziToast.error({
                position: 'topRight',
                message: '{{ session()->get('error') }}',
            });
        </script>
    @endif


    @if (session()->get('success'))
        <script>
            iziToast.success({
                position: 'topRight',
                message: '{{ session()->get('success') }}',
            });
        </script>
    @endif


    @stack('scripts')
</body>

</html>
