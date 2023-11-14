<div class="navbar-area nav-area-two sticky-top">
    <div class="mobile-nav">
        <a href="" class="logo"><img src="{{ asset('/frontend/icon.png') }}" alt="ESDM Jateng"></a>
    </div>

    <div class="main-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="/" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link dropdown-toggle">Profil <i
                                    class='bx bx-chevron-down'></i></a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="profil/profil-dinas" class="nav-link">Profil Dinas</a>
                                </li>
                                <li class="nav-item">
                                    <a href="profil/sejarah-dinas" class="nav-link">Sejarah Dinas</a>
                                </li>
                                <li class="nav-item">
                                    <a href="profil/visi-misi" class="nav-link">Visi Misi</a>
                                </li>
                                <li class="nav-item">
                                    <a href="profil/tupoksi" class="nav-link">Tupoksi</a>
                                </li>
                                <li class="nav-item">
                                    <a href="profil/struktur-organisasi" class="nav-link">Struktur Organisasi</a>
                                </li>
                                <li class="nav-item">
                                    <a href="profil/profil-pejabat" class="nav-link">Profil Pejabat</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link dropdown-toggle">Balai/UPT <i
                                    class='bx bx-chevron-down'></i></a>
                            <ul class="dropdown-menu">
                                {{-- <?php $balai = $this->home_model->menubalai(); ?>
                                <?php foreach ($balai as $key => $balai): ?>
                                <li class="nav-item"><a
                                        href="<?= base_url('balai/profil/' . $balai->id_balai . '/' . $balai->seo_balai) ?>"
                                        class="nav-link"><?= $balai->nama_balai ?></a></li>
                                <?php endforeach ?> --}}
                            </ul>
                        </li>
                        <li class="nav-item"><a href=/berita" class="nav-link">Berita</a></li>
                        <!-- <li class="nav-item"><a href="#" class="nav-link">SOP Rekap Izin</a></li> -->
                        <li class="nav-item">
                            <a href="#" class="nav-link dropdown-toggle">Pengaduan <i
                                    class='bx bx-chevron-down'></i></a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="http://subsidi.djk.esdm.go.id" class="nav-link">Pengaduan Subsidi
                                        Listrik</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://ppidnew.esdm.jatengprov.go.id/formulir-pengaduan-asn"
                                        class="nav-link">Pengaduan ASN</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://ppidnew.esdm.jatengprov.go.id/formulir-keberatan"
                                        class="nav-link">Keberatan Informasi Publik</a>
                                </li>
                                <li class="nav-item">
                                    <a href="http://laporgub.jatengprov.go.id" class="nav-link">LaporGub</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link dropdown-toggle">Portal Data <i
                                    class='bx bx-chevron-down'></i></a>
                            <ul class="dropdown-menu">
                                {{-- <?php $portaldata = $this->home_model->menuportaldata(); ?>
                                <?php foreach ($portaldata as $key => $portaldata): ?>
                                <li class="nav-item"><a href="<?= $portaldata->url ?>"
                                        class="nav-link"><?= $portaldata->title ?></a></li>
                                <?php endforeach ?> --}}
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link dropdown-toggle">Regulasi <i
                                    class='bx bx-chevron-down'></i>
                            </a>
                            <ul class="dropdown-menu">
                                {{-- <?php $regulasi = $this->home_model->menuregulasi(); ?>
                                <?php foreach ($regulasi as $key => $mr): ?>
                                <?php if ($mr->is_url == '1'): ?>
                                <li class="nav-item"><a href="<?= $mr->url ?>" target="_blank"
                                        class="nav-link"><?php echo $mr->title_regulasi; ?></a></li>
                                <?php else: ?>
                                <li class="nav-item"><a href="<?php echo base_url('regulasi/' . $mr->seo_regulasi); ?>"
                                        class="nav-link"><?php echo $mr->title_regulasi; ?></a></li>
                                <?php endif ?>
                                <?php endforeach ?> --}}
                            </ul>
                        </li>
                        <li class="nav-item"><a href="/unduh" class="nav-link">Unduh</a></li>
                        <li class="nav-item"><a href="/agenda" class="nav-link">Agenda</a></li>
                        <li class="nav-item">
                            <a href="#" class="nav-link dropdown-toggle">Galery <i class='bx bx-chevron-down'></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a href="/foto" class="nav-link">Foto</a>
                                </li>
                                <li class="nav-item"><a href="/video" class="nav-link">Video</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="/hubungi-kami" class="nav-link">Hubungi Kami</a>
                        </li>
                    </ul>
                    <div class="side-nav">
                        <a href="https://ppidnew.esdm.jatengprov.go.id">PPID PELAKSANA</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
