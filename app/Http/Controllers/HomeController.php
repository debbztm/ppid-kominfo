<?php

namespace App\Http\Controllers;

use App\Models\Infographic;
use App\Models\MaLink;
use App\Models\MaOfficialPpidProfile;
use App\Models\MaPost;
use App\Models\MaSetting;
use App\Models\MaSlide;
use App\Models\Page;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $title = "Dinas Energi dan Sumber Daya Mineral Provinsi Jawa Tengah";
        $slide = MaSlide::where("is_publish", "Y")->orderBy('order', 'asc')->get();
        $meta = MaSetting::first();
        $news = MaPost::where("is_publish", "Y")->orderBy("date", "desc")->limit(10)->get();
        $hmanggaran = Page::where("category", "homeanggaran")->get();
        $infografis = Infographic::all();
        $link = MaLink::orderBy("id", "desc")->get();
        $officialppid = MaOfficialPpidProfile::all();
        return view("pages.front.home", compact('title', 'slide', 'meta', 'news', 'hmanggaran', 'infografis', 'link', 'officialppid'));
    }
}
