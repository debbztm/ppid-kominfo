<footer>
    <div class="upper-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <img class="img-responsive" src="{{ asset('frontend/img/esdmjateng.png') }}" alt="">
                    <p class="gray-aaa mt-20">{!! $meta->about !!}</p>
                    <div class="footer-social list-inline mt-25">
                        <a href="{{ $meta->facebook }}"><i class="fa fa-facebook"></i></a>
                        <a href="{{ $meta->twitter }}"><i class="fa fa-twitter"></i></a>
                        <a href="{{ $meta->instagram }}"><i class="fa fa-instagram"></i></a>
                        <a href="{{ $meta->youtube }}"><i class="fa fa-youtube"></i></a>
                    </div>
                </div>
                <div class="col-md-2 col-md-offset-1 col-sm-3">
                    <h6 class="text-uppercase text-bold gray-e8 bb display-ib">Twitter</h6>
                    <a class="twitter-timeline" data-height="300" href="https://twitter.com/ESDMJateng">Tweets by
                        ESDMJateng</a>
                    <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                </div>
                <div class="col-md-2 col-md-offset-1 col-sm-3">
                    <h5 class="text-uppercase text-bold gray-e8 bb display-ib">Jejak Pendapat</h5>
                    @if ($polling)
                        <ul class="polling list-unstyled useful-links">
                            <h4 class="ubuntu fz-14 gray-aaa display-block">{{ $polling->question }}</h4>
                            <br>
                            <li class="col-md-12 no-padding ubuntu fz-14 gray-aaa display-block"
                                style="color:rgb(149, 149, 149)">
                                <input type="radio" name="vote" value="1" required> {{ $polling->answer1 }}
                            </li>
                            <li class="col-md-12 no-padding ubuntu fz-14 gray-aaa display-block"
                                style="color:rgb(149, 149, 149)">
                                <input type="radio" name="vote" value="2" required> {{ $polling->answer2 }}
                            </li>
                            <li class="col-md-12 no-padding ubuntu fz-14 gray-aaa display-block"
                                style="color:rgb(149, 149, 149)">
                                <input type="radio" name="vote" value="3" required> {{ $polling->answer3 }}
                            </li>
                            <li class="col-md-12 no-padding ubuntu fz-14 gray-aaa display-block"
                                style="color:rgb(149, 149, 149)">
                                <input type="radio" name="vote" value="4" required> {{ $polling->answer4 }}
                            </li>
                        </ul>
                        <li class="mb-100">
                            <a href="javascript:void(0)" onclick="addSurvey()"
                                class="f-donate text-uppercase martel text-bold mt-30 "style="float:left; padding: 0 8px !important; background-color:#e65d4f !important; border:none !important; border-radius: 3px !important; line-height: 30px !important;">Pilih</a>
                            <a href="/polling" class="f-donate text-uppercase martel text-bold mt-30 "
                                style="float:right; padding: 0 8px !important; background-color: #3498db !important; border: none !important; border-radius: 3px !important; line-height: 30px !important;">Lihat
                                Hasil</a>
                        </li>
                    @endif
                </div>
                <div class="col-md-3 col-sm-3">
                    <h6 class="text-uppercase text-bold gray-e8 bb display-ib">Kontak Kami</h6>
                    <span class="ubuntu fz-14 gray-aaa display-block mt-30 lh-24">Alamat :
                        {{ $meta->web_address }}</span>
                    <span class="ubuntu fz-14 gray-aaa display-block lh-24">Phone : {{ $meta->web_phone }}</span>
                    <span class="ubuntu fz-14 gray-aaa display-block lh-24">Email : {{ $meta->web_email }}</span>
                    <br>
                    <a href="https://info.flagcounter.com/ixn2"><img
                            src="https://s11.flagcounter.com/count/ixn2/bg_0B121F/txt_FFFFFF/border_0B121F/columns_3/maxflags_12/viewers_0/labels_0/pageviews_0/flags_0/percent_0/"
                            alt="Flag Counter" border="0"></a>
                </div>
            </div>
        </div>
    </div>
    <div class="lower-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <span class="ubuntu fz-12 text-uppercase text-medium">Copyright © 2023 Dinas Energi Sumber Daya
                        Mineral (ESDM) Provinsi Jawa Tengah. All right reserved <a href="http://esdm.jatengprov.go.id"
                            target="_blank">| ESDM Jateng</span>
                </div>
            </div>
        </div>

    </div>
</footer>
