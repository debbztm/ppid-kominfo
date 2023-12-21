@extends('layouts.app')
@section('title', $title)
@section('content')
    <section class="mt-150 mb-150 contact-us">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8">
                    <h3 class="black h-sep"><span class="text-extra-bold">Hubungi Kami</span></h3>
                    <p class="fz-16 gray-666 mt-50">
                        @if ($setting)
                            {!! $setting->about !!}
                        @endif
                    </p>
                    <form id="contact" class="mt-20 checkout-form" action="{{ route('create-contact') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mt-30">
                                <input id="name" type="text" name="name" class="form-control" placeholder="Nama"
                                    required>
                            </div>
                            <div class="col-md-6 mt-30">
                                <input id="email" type="email" name="email" class="form-control" placeholder="Email"
                                    required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mt-30">
                                <input id="phone" type="text" name="phone" class="form-control" placeholder="Phone"
                                    required>
                            </div>
                        </div>
                        <textarea id="message" rows="10" name="message" class="mt-30 form-control" placeholder="Pesan"required></textarea>
                        <div class="mt-50 submit">
                            <input type="submit" class="martel text-extra-bold text-uppercase fz-14" value="Send message">
                        </div>
                    </form>

                </div>
                <div class="col-md-3 col-md-offset-1 col-sm-4 mt-150">
                    <div class="contact-info clearfix">
                        <div class="pull-left">
                            <h5 class="fz-15 black text-bold mb-10">Alamat Kantor</h5>
                            @if ($setting)
                                @php
                                    $words = explode(' ', $setting->web_address);
                                    $halfway = ceil(count($words) / 2);

                                    $part1 = implode(' ', array_slice($words, 0, $halfway));
                                    $part2 = implode(' ', array_slice($words, $halfway));

                                    $result = [$part1, $part2];
                                @endphp
                                <span class="ubuntu fz-14 gray-777 lh-22">{{ $result[0] }} <br>{{ $result[1] }}</span>
                            @endif
                        </div>
                        <div class="contact-icon pull-right position-r">
                            <img src="{{ asset('frontend/img/office.png') }}" alt="">
                            <img src="{{ asset('frontend/img/office-hover.png') }}" alt="">
                        </div>
                        <div class="clearfix"></div>
                        <hr class="c-border">
                    </div>
                    <div class="contact-info clearfix mt-20">
                        <div class="pull-left">
                            <h5 class="fz-15 black text-bold mb-10">Phone</h5>
                            @if ($setting)
                                <span class="ubuntu fz-14 gray-777 lh-22">{{ $setting->web_phone }} <br>WA PIC :
                                    08112681126</span>
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
                            @if ($setting)
                                <span class="ubuntu fz-14 gray-777 lh-22">{{ $setting->web_email }}</span>
                            @endif
                        </div>
                        @if ($setting)
                            <a href="mailto:?body={{ $setting->web_email }}" target="_blank">
                                <div class="contact-icon pull-right position-r">
                                    <img src="{{ asset('frontend/img/mail.png') }}" alt="">
                                    <img src="{{ asset('frontend/img/mail-hover.png') }}" alt="">
                                </div>
                            </a>
                        @else
                            <div class="contact-icon pull-right position-r">
                                <img src="{{ asset('frontend/img/mail.png') }}" alt="">
                                <img src="{{ asset('frontend/img/mail-hover.png') }}" alt="">
                            </div>
                        @endif
                        <div class="clearfix"></div>
                        <hr class="c-border">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
