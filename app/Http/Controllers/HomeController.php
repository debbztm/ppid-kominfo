<?php

namespace App\Http\Controllers;

use App\Models\Infographic;
use App\Models\MaLink;
use App\Models\MaOfficialPpidProfile;
use App\Models\MaPost;
use App\Models\MaReview;
use App\Models\MaSetting;
use App\Models\MaSlide;
use App\Models\MaAgenda;
use App\Models\MaDownload;
use App\Models\MaGallery;
use App\Models\MaImageGallery;
use App\Models\MaRegulation;
use App\Models\MaVideo;
use App\Models\Page;
use App\Models\PublicInformation;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $title = "Dinas Energi dan Sumber Daya Mineral Provinsi Jawa Tengah";
        $slide = MaSlide::where("is_publish", "Y")->orderBy('order', 'asc')->get();
        $meta = MaSetting::first();
        // $hmanggaran = Page::where("category", "homeanggaran")->get();
        $infografis = Infographic::orderBy('id', 'desc')->limit(5)->get();
        $link = MaLink::orderBy("id", "desc")->get();
        $officialppid = MaOfficialPpidProfile::all();
        $news1 = MaPost::where("is_publish", "Y")->where("type", "1")->orderBy("date", "desc")->first();
        $news2 = MaPost::where("is_publish", "Y")->where("type", "2")->orderBy("date", "desc")->first();
        $news3 = MaPost::where("is_publish", "Y")->where("type", "3")->orderBy("date", "desc")->first();
        $news4 = MaPost::where("is_publish", "Y")->where("type", "4")->orderBy("date", "desc")->first();
        $news = [];
        if ($news1) {
            array_push($news, $news1);
        }
        if ($news2) {
            array_push($news, $news2);
        }
        if ($news3) {
            array_push($news, $news3);
        }
        if ($news4) {
            array_push($news, $news4);
        }
        $news5 = MaPost::where("is_publish", "Y")->where("type", "5")->limit(8)->orderBy("date", "desc")->get();
        $agenda = MaAgenda::orderBy('time', 'desc')->first();
        $reviews = MaReview::orderBy('id', 'desc')->limit(10)->get();
        // $gallery = MaGallery::where('title', 'HOME')->first();
        // $imggallery = [];
        // if ($gallery) {
        //     $imggallery = MaImageGallery::where('ma_gallery_id', $gallery->id)->orderBy('id', 'desc')->limit(4)->get();
        // }
        $imggallery = MaImageGallery::orderBy('id', 'desc')->limit(4)->get();
        $video = MaVideo::orderBy('id', 'desc')->first();
        $regulation = MaRegulation::orderBy('id', 'desc')->where('is_url', '0')->limit(10)->get();
        $download = MaDownload::orderBy('id', 'desc')->limit(10)->get();
        return view(
            "pages.front.home",
            compact(
                'title',
                'slide',
                'meta',
                'news',
                // 'hmanggaran',
                'infografis',
                'link',
                'officialppid',
                'news5',
                'agenda',
                'reviews',
                'imggallery',
                'video',
                'regulation',
                'download'
            )
        );
    }

    // HANDLER API
    public function getAgenda()
    {
        try {
            $agenda = MaAgenda::orderBy('time', 'desc')->first();


            if (!$agenda) {
                return response()->json([
                    "status" => "error",
                    "message" => "Data tidak ditemukan",
                ], 404);
            }

            return response()->json([
                "status" => "success",
                "data" => $agenda
            ]);
        } catch (\Exception $err) {
            return response()->json([
                "status" => "error",
                "message" => $err->getMessage()
            ], 500);
        }
    }

    public function informationAndFormulir()
    {
        $public_information = PublicInformation::all();
        $title = "Information & Formulir - Dinas Energi dan Sumber Daya Mineral Provinsi Jawa Tengah";
        return view("pages.front.information-and-formulir", compact('title', 'public_information'));
    }
}
