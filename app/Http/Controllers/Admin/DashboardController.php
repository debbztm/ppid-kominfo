<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hall;
use App\Models\MaAgenda;
use App\Models\MaDownload;
use App\Models\MaImageGallery;
use App\Models\MaPolling;
use App\Models\MaPost;
use App\Models\MaRegulation;
use App\Models\MaReview;
use App\Models\MaSetting;
use App\Models\MaSlide;
use App\Models\MaVideo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = json_decode(Cookie::get("user"));
        $title = "DASHBOARD";
        $hall = Hall::count();
        $slide = MaSlide::count();
        $photo = MaImageGallery::count();
        $video = MaVideo::count();
        $download = MaDownload::count();
        $regulation = MaRegulation::count();
        $message = MaSetting::count();
        $users = User::count();
        $review = MaReview::count();
        $polling = MaPolling::first();
        $news = MaPost::count();
        $agenda = MaAgenda::count();
        if ($user->role->name != "ADMIN") {
            $news = MaPost::where('username', $user->username)->count();
            $agenda = MaAgenda::where('username', $user->username)->count();
        }

        return view("pages.admin.index", compact(
            "title",
            "hall",
            "slide",
            "photo",
            "video",
            "download",
            "regulation",
            "message",
            "users",
            "review",
            "polling",
            "news",
            "agenda",
        ));
    }
}
