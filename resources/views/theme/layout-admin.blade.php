<!DOCTYPE html>
<html lang="en">
<head>
    @include('theme.meta')
    <title>Fameran House - @yield('title')</title>
</head>

<body class="bg-theme bg-theme2">
    <div id="wrapper">

        @include('theme.sidebar')

        @include('theme.header')

        <div class="clearfix"></div>
	
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="overlay toggle-menu">
                    @yield('content')
                </div>
            </div>
        </div>
        
        @include('theme.footer')
        
    </div>
    
    @include('theme.script')
    @stack('script')
 
</body>
</html>
