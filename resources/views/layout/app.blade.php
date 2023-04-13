<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
          integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <title>ZaNakupku | Admin panel</title>
</head>
<body class="">
@yield('content')
<script>
    const pickerInline2 = document.querySelector("#timepicker-inline-24");
    const timepickerMaxMin2 = new te.Timepicker(pickerInline2, {
        format24:
            true, inline: true,
    });
    const sidenav2 = document.getElementById("sidenav-1");
    const sidenavInstance2 = te.Sidenav.getInstance(sidenav2);

    let innerWidth2 = null;

    const setMode2 = (e) => {
        if (window.innerWidth === innerWidth2) {
            return;
        }

        innerWidth2 = window.innerWidth;

        if (window.innerWidth < sidenavInstance2.getBreakpoint("xl")) {
            sidenavInstance2.changeMode("over");
            sidenavInstance2.hide();
        } else {
            sidenavInstance2.changeMode("side");
            sidenavInstance2.show();
        }
    };

    setMode2();

    window.addEventListener("resize", setMode2);

    if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }

    function setDarkTheme() {
        document.documentElement.classList.add("dark");
        localStorage.theme = "dark";
    };

    function setLightTheme() {
        document.documentElement.classList.remove("dark");
        localStorage.theme = "light";
    };

    setLightTheme();
</script>
</body>
</html>
