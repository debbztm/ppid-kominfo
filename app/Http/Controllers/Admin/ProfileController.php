<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MaOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function profile()
    {
        $title = "Profile";
        return view('pages.admin.profile', compact('title'));
    }

    public function history()
    {
        $title = "Sejarah";
        return view('pages.admin.profile', compact('title'));
    }

    public function vision()
    {
        $title = "Visi dan Misi";
        return view('pages.admin.profile', compact('title'));
    }

    public function tupoksi()
    {
        $title = "Tupoksi";
        return view('pages.admin.profile', compact('title'));
    }

    public function Organization()
    {
        $title = "Organisasi";
        return view('pages.admin.profile', compact('title'));
    }

    public function official()
    {
        $title = "Profil Pejabat";
        return view('pages.admin.profile', compact('title'));
    }

    // HANDER API

    public function getDetail(Request $request)
    {
        $type = $request->query('type');
        try {
            $data = MaOption::where('type', $type)->first();
            if (!$data) {
                return response()->json([
                    "status" => "error",
                    "message" => "Data " . $type . " tidak ditemukan"
                ], 404);
            }

            return response()->json([
                "status" => "success",
                "type" => $type,
                "data" => $data
            ]);
        } catch (\Throwable $err) {
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
                "type" => "required|string",
                "value" => "required|string",

            ];

            if ($data["action"] == "create" && ($data['type'] == "organization" || $data['type'] == "oficial")) {
                $rules['file'] = "required|max:10240|mimes:jpg,pdf,doc";
            }

            $messages = [
                "type.required" => "Telpon harus diisi",
                "value.required" => "Deskripsi harus diisi",

                "file.required" => "File harus diisi",
                "file.max" => "Ukuran File maximal 10MB",
                "file.mimes" => "Format File harus jpg,pdf,doc",
            ];

            $validator = Validator::make($data, $rules, $messages);
            if ($validator->fails()) {
                return response()->json([
                    "status" => "error",
                    "message" => $validator->errors()->first()
                ], 400);
            }

            $data["seo"] = Str::slug($data["title"]);


            if ($data["id"] || $data["action"] != "create") {
                $profile = MaOption::find($data["id"]);
                if ($profile) {
                    // update
                    if ($request->file("file")) {
                        unset($data["file"]);
                        unlink(public_path("storage/" . $profile->file));
                        $data["file"] = $request->file("file")->store("assets/profile", "public");
                    }
                    $profile->update($data);
                    return response()->json([
                        "status" => "success",
                        "message" => "Data berhasil diperbarui"
                    ]);
                }
            }

            // ceate
            if ($request->file('file')) {
                $data["file"] = $request->file("file")->store("assets/profile", "public");
            }
            MaOption::create($data);

            return response()->json([
                "status" => "success",
                "message" => "Data berhasil disimpan"
            ]);
        } catch (\Exception $err) {
            if ($request->file("file")) {
                unlink(public_path("storage/assets/option/" . $request->file->hashName()));
            }
            return response()->json([
                "status" => "error",
                "message" => $err->getMessage()
            ], 500);
        }
    }


}
