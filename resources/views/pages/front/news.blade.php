@extends('layouts.app')
@section('title', $title)
@push('styles')
@endpush
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 mt-100 pull-right">
                <form action="{{route('home-news')}}" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" name="s" placeholder="Cari berita..">
                        <div class="input-group-addon"><i class="fa fa-search"></i></div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row mt-100 mb-50">
            @foreach ($news as $new)
                <div class="col col-md-4 mt-10" style="height: 600px !important;">
                    <div class="blog-post">
                        <div class="blog-post-img">
                            <img class="img-responsive" src="{{ Storage::url($new->image) }}" alt="{{ $new->title }}"
                                style="width:400px!important; height: 250px!important; margin: 0 auto; image-fit:cover !important;">
                            <div class="blog-post-date"><img src="{{ asset('frontend/img/blog-c.png') }}"
                                    alt=""><span
                                    class="white martel fz-13 text-uppercase">{!! (new \App\Helpers\Helper())->tgl_indo($new->date) !!}</span></div>
                        </div>
                        <h5 class="black-23 mt-20">{{ Illuminate\Support\Str::limit($new->title, 100) }}</h5>
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
            <div class="col-md-12 mx-auto text-center mb-50">
                {{ $news->links() }}
            </div>
        </div>
    </div>
@endsection
