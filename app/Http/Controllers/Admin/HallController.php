<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hall;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cookie;

class HallController extends Controller
{
    public function index()
    {
        $title = "Balai";
        return view("pages.admin.hall", compact("title"));
    }

    //for user role
    public function hallProfile()
    {

        $title = "Profile Balai";
        return view('pages.admin.hall-profile', compact('title'));
    }

    public function hallContact()
    {
        $title = "Kontak Balai";
        return view('pages.admin.hall-contact', compact('title'));
    }

    // HANDLE API
    public function dataTable(Request $request)
    {
        $query = Hall::query();

        if ($request->query("search")) {
            $searchValue = $request->query("search")["value"];
            $query->where("name", "like", "%" . $searchValue . "%");
        }

        $data = $query->orderBy("id", "desc")
            ->skip($request->query("start"))
            ->limit($request->query("length"))
            ->get();

        $output = $data->map(function ($item) {
            $action = "<div class='dropdown-primary dropdown open'>
                                <button class='btn btn-sm btn-primary dropdown-toggle waves-effect waves-light' id='dropdown-{$item->id}' data-toggle='dropdown' aria-haspopup='true' aria-expanded='true'>
                                    Aksi
                                </button>
                                <div class='dropdown-menu' aria-labelledby='dropdown-{$item->id}' data-dropdown-out='fadeOut'>
                                    <a class='dropdown-item' onclick='return getData(\"{$item->id}\");' href='javascript:void(0);' title='Edit'>Edit</a>
                                    <a class='dropdown-item' onclick='return removeData(\"{$item->id}\");' href='javascript:void(0)' title='Hapus'>Hapus</a>
                                </div>
                            </div>";
            $item["action"] = $action;
            return $item;
        });

        $total = Hall::count();
        return response()->json([
            "draw" => $request->query("draw"),
            "recordsFiltered" => $total,
            "recordsTotal" => $total,
            "data" => $output
        ]);
    }

    public function create(Request $request)
    {
        try {
            $data = $request->all();
            $rules = [
                "name" => "required|string",
                "phone" => "required|string",
                "email" => "required|string",
                "whatsapp" => "required|string",
                "image" => "required|image|max:1024|mimes:jpeg,png,gpj",
                "profile" => "required|string",
            ];

            $messages = [
                "name.required" => "Nama harus diisi",
                "phone.required" => "Telpon harus diisi",
                "email.reuired" => "Email harus diisi",
                "whatsapp.required" => "WhatsApp harus diisi",
                "image.required" => "Gambar harus diisi",
                "image.image" => "Gambar tidak valid",
                "image.max" => "Gambar maximal 1MB",
                "image.mimes" => "Format Gambar tidak mendukung",
                "profile.required" => "Deskripsi harus diisi"
            ];

            $validator = Validator::make($data, $rules, $messages);
            if ($validator->fails()) {
                return response()->json([
                    "status" => "error",
                    "message" => $validator->errors()->first()
                ], 400);
            }
            $data["seo"] = Str::slug($data["name"]);
            $data["image"] = $request->file("image")->store("assets/hall", "public");

            Hall::create($data);
            return response()->json([
                "status" => "success",
                "message" => "Data Balai berhasil disimpan"
            ]);
        } catch (\Exception $err) {
            if ($request->file("image")) {
                unlink(public_path("storage/assets/hall/" . $request->image->hashName()));
            }
            return response()->json([
                "status" => "error",
                "message" => $err->getMessage(),
            ], 500);
        }
    }

    public function getDetail($id)
    {
        try {
            $hall = Hall::find($id);
            if (!$hall) {
                return response()->json([
                    "status" => "error",
                    "message" => "Data balai tidak ditemukan"
                ], 404);
            }

            return response()->json([
                "status" => "success",
                "data" => $hall
            ]);
        } catch (\Exception $err) {
            return response()->json([
                "status" => "error",
                "message" => $err->getMessage()
            ], 500);
        }
    }

    public function update(Request $request)
    {
        try {
            $data = $request->all();
            $rules = [
                "id" => "required|integer",
                "name" => "required|string",
                "phone" => "required|string",
                "email" => "required|string",
                "whatsapp" => "required|string",
                "image" => "nullable",
                "profile" => "required|string",
            ];

            if ($request->file('image')) {
                $rules['image'] .= '|image|max:1024|mimes:giv,svg,jpeg,png,jpg';
            }

            $messages = [
                "id.required" => "Data ID harus diisi",
                "id.integer" => "Type ID tidak sesuai",
                "name.required" => "Nama harus diisi",
                "phone.required" => "Telpon harus diisi",
                "email.reuired" => "Email harus diisi",
                "whatsapp.required" => "WhatsApp harus diisi",
                "image.image" => "Gambar tidak valid",
                "image.max" => "Gambar maximal 1MB",
                "image.mimes" => "Format Gambar tidak mendukung",
                "profile.required" => "Deskripsi harus diisi"
            ];

            $validator = Validator::make($data, $rules, $messages);
            if ($validator->fails()) {
                return response()->json([
                    "status" => "error",
                    "message" => $validator->errors()->first()
                ], 400);
            }

            $hall = Hall::find($data["id"]);
            if (!$hall) {
                return response()->json([
                    "status" => "error",
                    "message" => "Data balai tidak ditemukan"
                ], 404);
            }

            // delete undefined data image
            unset($data["image"]);
            if ($request->file("image")) {
                unlink(public_path("storage/" . $hall->image));
                $data["image"] = $request->file("image")->store("assets/hall", "public");
            }

            if ($data["name"]) {
                $data["seo"] = Str::slug($data["name"]);
            }

            $hall->update($data);
            return response()->json([
                "status" => "success",
                "message" => "Data balai berhasil diperbarui"
            ]);
        } catch (\Exception $err) {
            if ($request->file("image")) {
                unlink(public_path("storage/assets/hall/" . $request->image->hashName()));
            }
            return response()->json([
                "status" => "error",
                "message" => $err->getMessage(),
            ], 500);
        }
    }

    public function destroy(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), ["id" => "required|integer"], [
                "id.required" => "Data ID harus diisi",
                "id.integer" => "Type ID tidak valid"
            ]);

            if ($validator->fails()) {
                return response()->json([
                    "status" => "error",
                    "message" => $validator->errors()->first()
                ], 400);
            }

            $id = $request->id;
            $hall = Hall::find($id);
            if (!$hall) {
                return response()->json([
                    "status" => "error",
                    "message" => "Data slide tidak ditemukan"
                ], 404);
            }
            unlink(public_path('storage/' . $hall->image));
            $hall->delete();
            return response()->json([
                "status" => "success",
                "message" => "Data balai berhasil dihapus"
            ]);
        } catch (\Exception $err) {
            return response()->json([
                "status" => "error",
                "message" => $err->getMessage()
            ], 500);
        }
    }

    // FOR ROLE USER
    public function getHallProfileContact()
    {
        try {

            $user = json_decode(Cookie::get('user'));
            if (!$user->hall_id) {
                return response()->json([
                    "status" => "error",
                    "message" => "Pengguna belum memiliki balai"
                ], 404);
            }

            $hall = Hall::find($user->hall_id);
            if (!$hall) {
                return response()->json([
                    "status" => "error",
                    "message" => "Data balai tidak ditemukan"
                ], 404);
            }

            $hall["image"] = "<img src='" . Storage::url($hall["image"]) . "'class='img img-thumbnail' width='500px'>";


            return response()->json([
                "status" => "success",
                "data" => $hall
            ]);
        } catch (\Exception $err) {
            return response()->json([
                "status" => "error",
                "message" => $err->getMessage()
            ], 500);
        }
    }

    public function updateSaveProfile(Request $request)
    {
        try {
            $data = $request->all();
            $rules = [
                "id" => "required|integer",
                "profile" => "required|string",
                "image" => "nullable",
            ];

            if ($request->file('image')) {
                $rules['image'] .= '|image|max:1024|mimes:giv,svg,jpeg,png,jpg';
            }

            $messages = [
                "id.required" => "Data ID harus diisi",
                "id.integer" => "Type ID tidak sesuai",
                "profile.required" => "Deskripsi harus diisi",
                "image.image" => "Gambar tidak valid",
                "image.max" => "Gambar maximal 1MB",
                "image.mimes" => "Format Gambar tidak mendukung",
            ];

            $validator = Validator::make($data, $rules, $messages);
            if ($validator->fails()) {
                return response()->json([
                    "status" => "error",
                    "message" => $validator->errors()->first()
                ], 400);
            }

            $hall = Hall::find($data["id"]);
            if (!$hall) {
                return response()->json([
                    "status" => "error",
                    "message" => "Data balai tidak ditemukan"
                ], 404);
            }

            // delete undefined data image
            unset($data["image"]);
            if ($request->file("image")) {
                unlink(public_path("storage/" . $hall->image));
                $data["image"] = $request->file("image")->store("assets/hall", "public");
            }

            $hall->update($data);
            return response()->json([
                "status" => "success",
                "message" => "Data balai berhasil diperbarui"
            ]);
        } catch (\Exception $err) {
            if ($request->file("image")) {
                unlink(public_path("storage/assets/hall/" . $request->image->hashName()));
            }
            return response()->json([
                "status" => "error",
                "message" => $err->getMessage(),
            ], 500);
        }
    }


    public function updateSaveContact(Request $request)
    {
        try {
            $data = $request->all();
            $rules = [
                "id" => "required|integer",
                "phone" => "required|string",
                "email" => "required|string",
                "whatsapp" => "required|string",
            ];

            if ($request->file('image')) {
                $rules['image'] .= '|image|max:1024|mimes:giv,svg,jpeg,png,jpg';
            }

            $messages = [
                "id.required" => "Data ID harus diisi",
                "id.integer" => "Type ID tidak sesuai",
                "phone.required" => "Telpon harus diisi",
                "email.reuired" => "Email harus diisi",
                "whatsapp.required" => "WhatsApp harus diisi",
            ];

            $validator = Validator::make($data, $rules, $messages);
            if ($validator->fails()) {
                return response()->json([
                    "status" => "error",
                    "message" => $validator->errors()->first()
                ], 400);
            }

            $hall = Hall::find($data["id"]);
            if (!$hall) {
                return response()->json([
                    "status" => "error",
                    "message" => "Data balai tidak ditemukan"
                ], 404);
            }

            $hall->update($data);
            return response()->json([
                "status" => "success",
                "message" => "Data balai berhasil diperbarui"
            ]);
        } catch (\Exception $err) {

            return response()->json([
                "status" => "error",
                "message" => $err->getMessage(),
            ], 500);
        }
    }
}
