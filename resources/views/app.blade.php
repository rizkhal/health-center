<!DOCTYPE html>
<html class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8" />
    <meta
        name="robots"
        content="noindex"
    >
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    />
    <link
        rel="icon"
        type="image/svg+xml"
        href="/favicon.ico"
    >
    <link
        href="{{ asset('css/app.css') }}"
        rel="stylesheet"
    >

    @routes

    <script
        defer
        src="{{ mix('/js/app.js') }}"
    ></script>
</head>

<body class="font-sans leading-none text-gray-700 antialiased overflow-x-hidden m-0">
    @inertia

    <script
        id="dsq-count-scr"
        src="//portal-berita-1.disqus.com/count.js"
        async
    ></script>

    @production
        <script
            async
            src="https://www.googletagmanager.com/gtag/js?id=UA-235284297-1"
        ></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
        </script>
    @endproduction
</body>

</html>
