<footer class="pt-30 pb-30">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-lg-3">
                <div class="footer-item">
                    <div class="footer-logo">
                        <a class="logo-link" href="/">
                            <img src="{{ asset('/frontend/icon.png') }}" alt="ESDM Jateng">
                        </a>
                        <p class="txtwhite">
                            {{-- <?= $meta->about ?> --}}
                        </p>
                        <ul>
                            <li>
                                {{-- <?= $meta->sosmed_facebook ?> --}}
                                <a href="" target="_blank">
                                    <i class='bx bxl-facebook'></i>
                                </a>
                            </li>
                            <li>
                                {{-- <?= $meta->sosmed_twitter ?> --}}
                                <a href="" target="_blank">
                                    <i class='bx bxl-twitter'></i>
                                </a>
                            </li>
                            <li>
                                {{-- <?= $meta->sosmed_instagram ?> --}}
                                <a href="" target="_blank">
                                    <i class='bx bxl-instagram'></i>
                                </a>
                            </li>
                            <li>
                                {{-- <?= $meta->sosmed_youtube ?> --}}
                                <a href="" target="_blank">
                                    <i class='bx bxl-youtube'></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="footer-item">
                    <div class="footer-service">
                        <h3>Twitter</h3>
                        <a class="twitter-timeline" data-height="300" href="https://twitter.com/ESDMJateng">Tweets by
                            ESDMJateng</a>
                        <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="footer-item">
                    <div class="footer-service">
                        <h3>Jejak Pendapat</h3>
                        {{-- <?php echo form_open(base_url('home/savepolling')); ?>
                        <ul class="polling">
                            <p class="cl-white"><b><?php $polling = $this->home_model->polling();
                            echo $polling->question; ?></b></p>
                            <li class="col-md-12 no-padding cl-white"><input type="radio" name="vote"
                                    value="1" required> <?php echo $polling->answer1; ?></li>
                            <li class="col-md-12 no-padding cl-white"><input type="radio" name="vote"
                                    value="2" required> <?php echo $polling->answer2; ?></li>
                            <li class="col-md-12 no-padding cl-white"><input type="radio" name="vote"
                                    value="3" required> <?php echo $polling->answer3; ?></li>
                            <li class="col-md-12 no-padding cl-white"><input type="radio" name="vote"
                                    value="4" required> <?php echo $polling->answer4; ?></li>
                            <button type="submit" class="btn btn--sm btn--red" name="xvote">Pilih</button>
                            <a class="btn btn--sm btn--blue float-right" href="<?php echo base_url('polling'); ?>">Lihat
                                Hasil</a>
                        </ul>
                        <?php echo form_close(); ?> --}}
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="footer-item">
                    <div class="footer-touch">
                        <h3>Kontak Kami</h3>
                        <ul>
                            <li>
                                <i class='bx bxs-phone-call'></i>
                                <h4>Phone</h4>
                                <span>+6224 7608203, 7610121</span>
                            </li>
                            <li>
                                <i class='bx bx-mail-send'></i>
                                <h4>Email</h4>
                                <span>esdm@jatengprov.go.id</span>
                            </li>
                            <li>
                                <i class='bx bx-location-plus'></i>
                                <h4>Alamat</h4>
                                <span>Jl. Madukoro AA-BB No.44 Semarang 50144</span>
                            </li>
                        </ul><br>
                        <a href="https://info.flagcounter.com/ixn2"><img
                                src="https://s11.flagcounter.com/count/ixn2/bg_0B121F/txt_FFFFFF/border_0B121F/columns_3/maxflags_12/viewers_0/labels_0/pageviews_0/flags_0/percent_0/"
                                alt="Flag Counter" border="0"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="copyright-area">
    <div class="container">
        <div class="copyright-item">
            <p>Copyright © 2021 Dinas Energi Sumber Daya Mineral (ESDM) Provinsi Jawa Tengah. All right reserved <a
                    href="http://esdm.jatengprov.go.id" target="_blank">| ESDM Jateng</a></p>
        </div>
    </div>
</div>
