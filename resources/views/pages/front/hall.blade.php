@extends('layouts.app')
@section('title', $title)
@push('styles')
    <style>
        #abas {
            margin: 0;
            padding: 0;
        }

        #abas li {
            display: inline-block;
            border: 1px solid #fee50f;
            border-bottom: none;
            background-color: #ffd677;
        }

        #abas li a {
            padding: 10px 20px;
            display: block;
            text-decoration: none;
            color: #000000;
            cursor: pointer;
        }

        #abas li.selecionada {
            background-color: #ffe600;
            position: relative;
            top: 1px;
            font-weight: bold;
        }

        #abas li.selecionada a {
            padding-top: 11px
        }

        .conteudo {
            display: block;
            padding: 50px;
            border: 1px solid #fee50f;
            display: none;
        }

        .conteudo.visivel {
            display: block;
        }
    </style>
@endpush
@section('content')
    <div class="container">
        <div class="row mt-100 mb-150">
            <div class="col-md-12 hall-upt">
                <div class="card">

                    <ul id="abas" class="teste text-center">
                        <li class="selecionada"><a id="aba_profile">Profile</a></li>
                        <li><a id="aba_news">Berita</a></li>
                        <li><a id="aba_contact">Kontak</a></li>
                    </ul>
                    <div id="conteudos">
                        <div id="conteudo_profile" class="conteudo visivel">
                            {!! $hall->profile !!}
                        </div>
                        <div id="conteudo_news" class="conteudo">
                            <div class="row mt-100 mb-50">
                                @foreach ($news as $new)
                                    <div class="col col-md-4 mt-10" style="height: 600px !important;">
                                        <div class="blog-post">
                                            <div class="blog-post-img">
                                                <img class="img-responsive" src="{{ Storage::url($new->image) }}"
                                                    alt="{{ $new->title }}"
                                                    style="width:350px!important; height: 200px!important; margin: 0 auto; image-fit:cover !important;">
                                                <div class="blog-post-date"><img
                                                        src="{{ asset('frontend/img/blog-c.png') }}" alt=""><span
                                                        class="white martel fz-13 text-uppercase">{!! (new \App\Helpers\Helper())->tgl_indo($new->date) !!}</span>
                                                </div>
                                            </div>
                                            <h5 class="black-23 mt-20">{{ Illuminate\Support\Str::limit($new->title, 100) }}
                                            </h5>
                                            <h6 class="ubuntu fz-13 gray-777 mt-20">Dibuat oleh {{ $new->username }}</h6>
                                            <p class="mt-20 lh-28">{!! Illuminate\Support\Str::limit($new->description, 200) !!}</p>
                                            <div class="mt-10">
                                                <a href="{{ route('read-news', ['id' => $new->id, 'seo' => $new->seo]) }}"
                                                    class="btn-green-br lh-40  no-radius">Selengkapnya</a>
                                            </div>
                                            <hr class="ed-divider mt-40">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="row">
                                <div class="col-md-12 mx-auto text-center">
                                    {{ $news->links() }}
                                </div>
                            </div>

                        </div>
                        <div id="conteudo_contact" class="conteudo">
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    <div class="contact-info clearfix mx-auto mt-20">
                                        <div class="pull-left">
                                            <h5 class="fz-15 black text-bold mb-10">Phone / WhatsApp</h5>
                                            @if ($hall)
                                                <span class="ubuntu fz-14 gray-777 lh-22">Phone {{ $hall->phone }} <br>WA :
                                                    {{ $hall->whatsapp }}</span>
                                            @endif
                                        </div>
                                        <div class="contact-icon pull-right position-r">
                                            <img src="{{ asset('frontend/img/phone.png') }}" alt="">
                                            <img src="{{ asset('frontend/img/phone-hover.png') }}" alt="">
                                        </div>
                                        <div class="clearfix"></div>
                                        <hr class="c-border">
                                    </div>
                                    <div class="contact-info clearfix mt-20">
                                        <div class="pull-left">
                                            <h5 class="fz-15 black text-bold mb-10">E-mail</h5>
                                            @if ($hall)
                                                <span class="ubuntu fz-14 gray-777 lh-22">{{ $hall->email }}</span>
                                            @endif
                                        </div>
                                        <div class="contact-icon pull-right position-r">
                                            <img src="{{ asset('frontend/img/mail.png') }}" alt="">
                                            <img src="{{ asset('frontend/img/mail-hover.png') }}" alt="">
                                        </div>
                                        <div class="clearfix"></div>
                                        <hr class="c-border">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
@endsection
@push('scripts')
    <script>
        var abas = document.getElementById("abas");
        var conteudos = document.getElementById("conteudos");

        /* Essa funÃ§Ã£o retira a classe "selecionada" e esconde a DIV com o conteÃºdo visÃ­vel */
        function limparSelecao() {
            abas.getElementsByClassName("selecionada")[0]?.classList.remove("selecionada");
            conteudos.getElementsByClassName("visivel")[0]?.classList.remove("visivel");
        }

        /* Essa Ã© executada quando alguma das abas Ã© clicada */
        abas.addEventListener("click", function(event) {
            var abaClicada = event.target.id;
            var itemSelecionado = abaClicada.substring(abaClicada.lastIndexOf("_"));

            /* Chama funÃ§Ã£o que tira a seleÃ§Ã£o do item atual */
            limparSelecao();

            /* Insere a classe "selecionada" na nova aba visÃ­vel */
            event.target.parentElement.classList.add("selecionada");

            /* Insere a classe "visivel" para o conteÃºdo da aba selecionada */
            conteudos.querySelector("#conteudo" + itemSelecionado)?.classList.add("visivel");
        });
    </script>
@endpush
