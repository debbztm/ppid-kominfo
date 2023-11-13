<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MaSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    public function index()
    {
        $title = "Setting";
        return view("pages.admin.setting", compact("title"));
    }

    public function webinfo()
    {
        return view("pages.admin.settings.webinfo");
    }

    public function profile()
    {
        return view("pages.admin.settings.profile");
    }

    public function sosmed()
    {
        return view("pages.admin.settings.sosmed");
    }

    public function image()
    {
        return view("pages.admin.settings.image");
    }

    public function maps()
    {
        return view("pages.admin.settings.maps");
    }

    // HANDLER API
    public function getDetail()
    {
        try {
            $data = MaSetting::first();

            if (!$data) {
                return response()->json([
                    "status" => "error",
                    "message" => "Data setting masih kosong"
                ], 404);
            }

            $data['maps_preview'] = "<iframe src='" . $data["maps_location"] . "' allowfullscreen class='w-100' height='500'></iframe>";
            $data['image_preview'] = "<img src='" . Storage::url($data["web_logo"]) . "' class='img img-thumbnail'>";
            return response()->json([
                "status" => "success",
                "data" => $data
            ]);
        } catch (\Exception $err) {
            return response()->json([
                "status" => "error",
                "message" => $err->getMessage()
            ], 500);
        }
    }

    public function createAndUpdate(Request $request)
    {
        try {
            $data = $request->all();
            $rules = [
                "id" => "nullable",
                "web_name" => "required|string",
                "web_phone" => "required|string",
                "web_description" => "required|string",
                "web_email" => "required|string",
                "web_address" => "required|string",
                "web_tag" => "required|string",
                "is_online" => "required|string|in:Y,N",
                "about" => "required|string",
                "facebook" => "required|string",
                "twitter" => "required|string",
                "instagram" => "required|string",
                "youtube" => "required|string",
                "maps_location" => "required|string",
            ];

            if ($data["action"] == "create") {
                $rules['web_logo'] = "required|image|max:200|mimes:giv,svg,jpeg,png,jpg";
            }

            $messages = [
                "web_name.required" => "Nama Website harus diisi",
                "web_phone.required" => "Telpon harus diisi",
                "web_description.required" => "Deskripsi Website harus diisi",
                "web_email.required" => "Email harus diisi",
                "web_address.required" => "Alamat harus diisi",
                "web_tag.required" => "Keyword harus diisi",
                "is_online.required" => "Status Online harus diisi",
                "about.required" => "Profil website harus diisi",
                "facebook.required" => "Link Facebook harus diisi",
                "twitter.required" => "Link Twitter harus diisi",
                "instagram.required" => "Link Instagram harus diisi",
                "youtube.required" => "Link Youtube harus diisi",
                "web_logo.required" => "Gambar logo harus diisi",
                "web_logo.image" => "Gambar yang di upload tidak valid",
                "web_logo.max" => "Ukuran gambar maximal 200KB",
                "web_logo.mimes" => "Format gambar harus giv/svg/jpeg/png/jpg",
                "maps_location.required" => "Link Maps harus diisi",
            ];

            $validator = Validator::make($data, $rules, $messages);
            if ($validator->fails()) {
                return response()->json([
                    "status" => "error",
                    "message" => $validator->errors()->first()
                ], 400);
            }

            $setting = MaSetting::first();

            if ($setting) {
                // update
                if ($request->file("web_logo")) {
                    unset($data["web_logo"]);
                    unlink(public_path("storage/" . $setting->web_logo));
                    $data["web_logo"] = $request->file("web_logo")->store("assets/setting", "public");
                }
                $setting->update($data);
                return response()->json([
                    "status" => "success",
                    "message" => "Data berhasil diperbarui"
                ]);
            }

            // ceate
            $data["web_logo"] = $request->file("web_logo")->store("assets/setting", "public");
            MaSetting::create($data);

            return response()->json([
                "status" => "success",
                "message" => "Data berhasil disimpan"
            ]);
        } catch (\Exception $err) {
            if ($request->file("web_logo")) {
                unlink(public_path("storage/assets/setting/" . $request->web_logo->hashName()));
            }
            return response()->json([
                "status" => "error",
                "message" => $err->getMessage()
            ], 500);
        }
    }
}
