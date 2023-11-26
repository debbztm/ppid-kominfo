<link rel="apple-touch-icon" href="{{ asset('frontend/img/apple-touch-icon.png') }}">
<!-- Place favicon.ico in the root directory -->
<link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/normalize.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
<script src="{{ asset('frontend/js/modernizr-2.8.3.min.js') }}"></script>
<style>
    ul.nav.navbar-nav li .main-menu {
        color: #fee50f !important;
    }


    .ticker-container {
        height: 60px;
        width: 100%;
        text-align: center;
        position: relative;
        overflow: hidden;
        background-color: rgba(0, 0, 0, 1);
        color: white;
        font-size: 1.1em;
    }

    .ticker-container .ticker-caption {
        height: 50%;
        width: 100%;
        background-color: #EC0B43;
        display: table;
        position: absolute;
        color: white;
        font-size: 0.8em;
        z-index: 1;
    }

    .ticker-container .ticker-caption p {
        height: inherit;
        width: inherit;
        display: table-cell;
        vertical-align: middle;
        font-weight: bold;
    }

    .ticker-container ul {
        list-style: none;
        padding: 0;
        height: auto;
    }

    .ticker-container ul div {
        overflow: hidden;
        position: absolute;
        z-index: 0;
        display: inline;
        min-width: 100%;
        left: 0;
        height: 50%;
        transition: 0.25s ease-in-out;
    }

    .ticker-container ul div.ticker-active {
        top: 25px;
    }

    .ticker-container ul div.not-active {
        top: 60px;
    }

    .ticker-container ul div.remove {
        top: 0;
    }

    .ticker-container ul div li {
        padding: 9px 0;
        font-size: 13px;
    }

    .ticker-container ul div li a {
        color: #EC0B43;
    }

    @media (min-width: 500px) {
        .ticker-container {
            height: 40px;
            text-align: left;
        }

        .ticker-container .ticker-caption {
            height: 100%;
            width: 150px;
            background: url({{asset('frontend/img/ticker-caption-bg.png')}});
        }

        .ticker-container .ticker-caption p {
            text-align: left;
            padding-left: 7px;
        }

        .ticker-container ul {
            margin-left: 170px;
            height: 100%;
        }

        .ticker-container ul div {
            height: 100%;
            left: 170px;
        }

        .ticker-container ul div.ticker-active {
            top: 0;
        }

        .ticker-container ul div.not-active {
            top: 40px;
        }

        .ticker-container ul div.remove {
            top: -40px;
        }
    }
</style>
