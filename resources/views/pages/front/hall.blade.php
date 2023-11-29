@extends('layouts.app')
@section('title', $title)
@push('styles')
    {{-- <style>
        .hall-upt .tabbable-responsive {
            display: block;
            min-width: 100%;
            overflow-x: auto;

            margin: 0px -20px -13px -20px;
        }

        .hall-upt .tabbable {
            min-width: 100%;

            .nav-tabs {
                white-space: nowrap;
                display: inline-block;
                min-width: 100%;

                // Some tweaks for card-header
                padding: 0px 21px;

                .nav-item {
                    display: inline-block;

                    .nav-link {
                        display: inline-block;
                    }
                }
            }
        }

        .hall-utp small {
            font-size: 12px;
        }

        .hall-utp .card {
            box-shadow: 0 5px 15px -5px rgba(0, 0, 0, 0.15);
        }

        .hall-utp a {
            color: #0da58e;

            &:hover {
                color: #075e51;
            }
        }

        .hall-upt .text-dark {
            text-decoration: none !important;
        }

        .hall-utp .elmahio-ad {
            background: #fff;
            box-shadow: 0px 0px 0px 1px #ddd;
            border-radius: 4px;
            overflow: hidden;

            .logo {
                background: #0da58e;
                width: 60px;
                height: 60px;
                text-align: center;
                line-height: 52px;

                img {
                    width: 50px;
                }
            }

            .motto {
                width: 180px;
                font-size: 12px;
                font-weight: bolder;
                padding: 12px;
            }
        }
    </style> --}}
    <style>
        #abas {
            margin: 0;
            padding: 0;
        }

        #abas li {
            display: inline-block;
            border: 1px solid #CCCCCC;
            border-bottom: none;
            background-color: #EEEEEE;
        }

        #abas li a {
            padding: 10px 20px;
            display: block;
            text-decoration: none;
            color: #000000;
        }

        #abas li.selecionada {
            background-color: #FFFFFF;
            position: relative;
            top: 1px;
            font-weight: bold;
        }

        #abas li.selecionada a {
            padding-top: 11px
        }

        .conteudo {
            display: block;
            padding: 10px;
            border: 1px solid #CCCCCC;
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
                    {{-- <div class="card-header">

                        <div class="d-flex">
                            <div class="title pt-3 pb-4">
                                <h3>Amenities</h3>
                            </div>
                        </div>

                        <!-- START TABS DIV -->
                        <div class="tabbable-responsive">
                            <div class="tabbable">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="first-tab" data-toggle="tab" href="#first"
                                            role="tab" aria-controls="first" aria-selected="true">First Tab</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="second-tab" data-toggle="tab" href="#second" role="tab"
                                            aria-controls="second" aria-selected="false">Second Tab</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="third-tab" data-toggle="tab" href="#second" role="tab"
                                            aria-controls="second" aria-selected="false">Third Tab</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="first" role="tabpanel"
                                aria-labelledby="first-tab">
                                <h5 class="card-title">First Tab header</h5>
                                <p class="card-text">test 1</p>
                            </div>
                            <div class="tab-pane fade" id="second" role="tabpanel" aria-labelledby="second-tab">
                                <h5 class="card-title">Second Tab header</h5>
                                <p class="card-text">test 2</p>
                            </div>
                            <div class="tab-pane fade" id="third" role="tabpanel" aria-labelledby="third-tab">
                                <h5 class="card-title">Third Tab header</h5>
                                <p class="card-text">test 3</p>
                            </div>

                        </div>
                    </div> --}}

                    <ul id="abas" class="teste">
                        <li class="selecionada"><a id="aba_1" href="#aba_1">Tab 1</a></li>
                        <li><a id="aba_2" href="#aba_2">Tab 2</a></li>
                        <li><a id="aba_3" href="#aba_3">Tab 3</a></li>
                    </ul>
                    <div id="conteudos">
                        <div id="conteudo_1" class="conteudo visivel">
                            <p><b>What is CodeHim?</b></p>
                            <p> CodeHim is one of the BEST developer websites that provide web designers and developers with
                                a simple way to preview and download a variety of free code & scripts.</p>
                        </div>
                        <div id="conteudo_2" class="conteudo">
                            <p>Conteúdo da Aba 2</p>
                            
                        </div>
                        <div id="conteudo_3" class="conteudo">
                            <p>Conteúdo da Aba 3</p>
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
            abas.getElementsByClassName("selecionada")[0].classList.remove("selecionada");
            conteudos.getElementsByClassName("visivel")[0].classList.remove("visivel");
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
            conteudos.querySelector("#conteudo" + itemSelecionado).classList.add("visivel");
        });
    </script>
@endpush
