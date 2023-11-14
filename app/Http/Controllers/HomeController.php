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
        $meta = MaSetting::first();
        $slide = MaSlide::where("is_publish", "Y")->orderBy('order', 'asc')->get();
        $news1 = MaPost::where("is_publish", "Y")->orderBy("date", "desc")->limit(1)->get();
        $news2 = MaPost::where('is_publish', 'Y')->orderBy('date', 'desc')->skip(1)->take(2)->get();
        $hmanggaran = Page::where("category", "homeanggaran")->get();
        $infografis = Infographic::all();
        $link = MaLink::orderBy("id", "desc")->get();
        $officialppid = MaOfficialPpidProfile::all();
        return view("pages.front.home", compact('title', 'meta', 'slide', 'news1', 'news2', 'hmanggaran', 'infografis', 'link', 'officialppid'));
    }
}
