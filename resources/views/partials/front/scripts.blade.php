<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
    window.jQuery || document.write(`<script src="{{ asset('frontend/js/jquery-1.11.3.min.js') }}"><\/script>`)
    $(document).ready(function() {
        console.log("disini tempatnya")
        let breakingNewsEl = $("#breaking-news");
        $.ajax({
            url: "/api/running-text",
            method: "GET",
            dataType: "json",
            success: function(msg) {
                let data = msg.data;
                if (data.length) {
                    data.forEach((val, i) => {
                        var newItem = $(`
                            <div class="finished ${i == 0 ? 'ticker-active' : 'not-active'}" style="transition: all 0.25s ease-in-out 0s;">
                                <li style="width: 1750px;">
                                    <span>${val.text}</span>
                                </li>
                            </div>`);

                        $('#breaking-news').append(newItem);
                    })
                }
            }
        })
    })
</script>
<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/js/owl.carousel.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.mixitup.js') }}"></script>
<script src="{{ asset('frontend/js/Chart.min.js') }}"></script>
<script src="{{ asset('frontend/js/custom-chart.js') }}"></script>
<script src="{{ asset('frontend/js/main.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

