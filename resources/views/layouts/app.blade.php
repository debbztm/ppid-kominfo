@php
    $meta = \App\Models\MaSetting::first();
    $portalData = \App\Models\PortalData::where('is_active', 'Y')->get();
    $regulations = \App\Models\MaRegulation::all();
    $halls = \App\Models\Hall::all();
    $polling = \App\Models\MaPolling::first();
@endphp
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{ asset('frontend/img/icon.png') }}">
    <title>@yield('title') </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('partials.front.styles')
    @stack('styles')
</head>

<body>
    @include('partials.front.header')
    @yield('content')
    @include('partials.front.footer')
    @include('partials.front.scripts')
    @stack('scripts')
    <script>
        var speed = 5000;
        canTick = true;

        $(document).ready(function() {
            $('.ticker-container ul div').each(function(i) {
                if ($(window).width() >= 500) {
                    $(this).find('li').width($(window).width() - parseInt($(this).css('left')));
                }
                if (i == 0) {
                    $(this).addClass('ticker-active');
                } else {
                    $(this).addClass('not-active');
                }
                if ($(this).find('li').height() > 30) {
                    $(this).find('li').css({
                        'height': '20px',
                        'width': '200%',
                        'text-align': 'left',
                        'padding-left': '5px'
                    });
                    $(this).find('li').css('width', $(this).find('li span').width());
                }
            });
            startTicker();
            animateTickerElementHorz();
        });

        $(window).resize(function() {
            $('.ticker-container ul div').each(function(i) {
                if ($(this).find('li').height() > 30) {
                    $(this).css({
                        'height': '20px',
                        'width': '200%',
                        'text-align': 'left',
                        'padding-left': '5px'
                    });
                    $(this).find('li').css('width', $(this).find('li span').width());
                }
            });
        });

        function startTicker() {
            setInterval(function() {
                if (canTick) {
                    $('.ticker-container ul div.ticker-active')
                        .removeClass('ticker-active')
                        .addClass('remove');
                    if ($('.ticker-container ul div.remove').next().length) {
                        $('.ticker-container ul div.remove')
                            .next()
                            .addClass('next');
                    } else {
                        $('.ticker-container ul div')
                            .first()
                            .addClass('next');
                    }
                    $('.ticker-container ul div.next')
                        .removeClass('not-active next')
                        .addClass('ticker-active');
                    setTimeout(function() {
                        $('.ticker-container ul div.remove')
                            .css('transition', '0s ease-in-out')
                            .removeClass('remove')
                            .addClass('not-active finished');
                        if ($(window).width() < 500) {
                            if ($('.ticker-container ul div.finished li').width() < $(window).width()) {
                                $('.ticker-container ul div.finished').removeClass('finished');
                            }
                        } else {
                            if ($('.ticker-container ul div.finished li').width() < ($(window).width() - (
                                    parseInt($('.ticker-container ul div.ticker-active').css('left')) +
                                    15))) {
                                $('.ticker-container ul div.finished').removeClass('finished');
                            }
                        }
                        setTimeout(function() {
                            $('.ticker-container ul div')
                                .css('transition', '0.25s ease-in-out');
                        }, 75);
                        animateTickerElementHorz();
                    }, 250);
                }
            }, speed);
        }

        function animateTickerElementHorz() {
            if ($(window).width() < 500) {
                if ($('.ticker-container ul div.ticker-active li').width() > $(window).width()) {
                    setTimeout(function() {
                        $('.ticker-container ul div.ticker-active li').animate({
                            'margin-left': '-' + (($('.ticker-container ul div.ticker-active li').width() -
                                $(window).width()) + 15)
                        }, speed - (speed / 5), 'swing', function() {
                            setTimeout(function() {
                                $('.ticker-container ul div.finished').removeClass('finished').find(
                                    'li').css('margin-left', 0);
                            }, ((speed / 5) / 2));
                        });
                    }, ((speed / 5) / 2));
                }
            } else {
                if ($('.ticker-container ul div.ticker-active li').width() > ($(window).width() - parseInt($(
                        '.ticker-container ul div.ticker-active').css('left')))) {
                    setTimeout(function() {
                        $('.ticker-container ul div.ticker-active li').animate({
                            'margin-left': Math.abs($('.ticker-container ul div.ticker-active li').width() -
                                ($(window).width() - parseInt($(
                                    '.ticker-container ul div.ticker-active').css('left'))) + 15) * -1
                        }, speed - (speed / 5), 'swing', function() {
                            setTimeout(function() {
                                $('.ticker-container ul div.finished').removeClass('finished').find(
                                    'li').css('margin-left', 0);
                            }, ((speed / 5) / 2));
                        });
                    }, ((speed / 5) / 2));
                }
            }
        }

        $('.ticker-container').on('mouseover', function() {
            canTick = false;
        });

        $('.ticker-container').on('mouseout', function() {
            canTick = true;
        });

        function addSurvey() {
            var selectedRadio = document.querySelector('input[name="vote"]:checked');
            if (selectedRadio) {
                var selectedValue = {
                    vote: selectedRadio.value
                };
                $.ajax({
                    url: "/api/polling/update",
                    data: JSON.stringify(selectedValue),
                    method: "POST",
                    dataType: "json",
                    contentType: "application/json",
                        success: function(res) {
                            console.log("result :", res)
                        window.location.href = "{{ route('home-polling') }}";
                    },
                    error: function(err) {
                        console.log("error :", err)
                    }

                })
            }
        }
    </script>

</body>

</html>
