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
    <div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="background-color: #FDC716; color: white;">
                <div class="modal-header">
                    <h4 class="modal-title" id="searchModalLabel">Cari Informasi Disini</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        style="margin-top: -30px">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"> 
                    <input type="text" id="searchInputModal" class="form-control" style="background-color: #ffe6ab;"
                        placeholder="Masukan pencarian..." />
                    <ul id="searchResults" class="search-results" style="margin-top: -5px"></ul>
                </div>
            </div>
        </div>
    </div>
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

        const menuLinks = document.querySelectorAll(".menu-link");

        function showDropdown(element) {
            element.classList.add("open");
        }

        function hideDropdown(element) {
            element.classList.remove("open");
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>
    <script src="https://code.responsivevoice.org/responsivevoice.js?key=fpuCvNhu"></script>
    <script>
        (function(d) {
            var s = d.createElement("script");
            /* uncomment the following line to override default position*/
            /* s.setAttribute("data-position", 1);*/
            /* uncomment the following line to override default size (values: small, large)*/
            /* s.setAttribute("data-size", "large");*/
            /* uncomment the following line to override default language (e.g., fr, de, es, he, nl, etc.)*/
            /* s.setAttribute("data-language", "null");*/
            /* uncomment the following line to override color set via widget (e.g., #053f67)*/
            /* s.setAttribute("data-color", "#2d68ff");*/
            /* uncomment the following line to override type set via widget (1=person, 2=chair, 3=eye, 4=text)*/
            /* s.setAttribute("data-type", "1");*/
            /* s.setAttribute("data-statement_text:", "Our Accessibility Statement");*/
            /* s.setAttribute("data-statement_url", "http://www.example.com/accessibility";*/
            /* uncomment the following line to override support on mobile devices*/
            /* s.setAttribute("data-mobile", true);*/
            /* uncomment the following line to set custom trigger action for accessibility menu*/
            /* s.setAttribute("data-trigger", "triggerId")*/
            s.setAttribute("data-account", "3yWzk3kUPN");
            s.setAttribute("src", "https://cdn.userway.org/widget.js");
            (d.body || d.head).appendChild(s);
        })(document)
    </script>
    <noscript>
        Please ensure Javascript is enabled for purposes of
        <a href="https://userway.org">website accessibility</a>
    </noscript>

    <script>
        // Ambil elemen-elemen yang diperlukan
        const btnSearch = document.getElementById('btnSearch');
        const searchInputModal = document.getElementById('searchInputModal');
        // const searchResultsModal = document.getElementById('searchResultsModal');
        const searchResults = $("#searchResults");

        // Fungsi untuk melakukan pencarian berita (contoh)
        function searchNews(query) {
            // Lakukan pencarian berita dan tampilkan hasilnya di searchResultsModal
            // Contoh: Ajax request untuk mendapatkan hasil pencarian
            console.log("seach term :", query)
            if (query.length === 0) {
                searchResults.html("");
                return;
            }

            if (query == "") {
                searchResults.empty();
            } else {
                $.getJSON(
                    `/api/news?search=${query}`,
                    function(data) {
                        console.log("data :", data)
                        searchResults.empty();

                        $.each(data.data, function(index, result) {
                            const li = $("<li>").css({
                                display: "flex",
                                alignItems: "center",
                            });

                            let image = result.image;
                            let title = result.title;
                            li.append(image, title);
                            searchResults.append(li);
                        });
                    }
                );
            }
        }

        // Tambahkan event listener untuk tombol pencarian di modal
        btnSearch.addEventListener('click', function() {
            // Kosongkan input pencarian ketika modal terbuka
            searchInputModal.value = '';
            //kosongkan list pencarian
            searchResults.empty();

            // Tambahkan event listener untuk input pencarian modal
            searchInputModal.addEventListener('input', function() {
                const query = searchInputModal.value;
                // Lakukan pencarian realtime dan tampilkan hasilnya
                searchNews(query);
            });
        });
    </script>

</body>

</html>
