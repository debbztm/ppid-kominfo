<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Hall;
use App\Models\MaHallMenu;
use App\Models\MaPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $title = "Berita";
        $hall_menus = MaHallMenu::all();
        $halls = Hall::all();
        $hall_id = json_decode(Cookie::get("user"))->hall_id;
        return view("pages.admin.post", compact("title", 'hall_menus', 'halls', "hall_id"));
    }

    // HANDLE API
    public function dataTable(Request $request)
    {
        $query = MaPost::query();
        $user = json_decode(Cookie::get("user"));

        if ($request->query("search")) {
            $searchValue = $request->query("search")['value'];
            $query->where(function ($query) use ($searchValue) {
                $query->where('title', 'like', '%' . $searchValue . '%');
            });
        }

        // Kalau role == Admin . list all
        // kalau tidak . list by username nya
        if($user->role->name == "USER"){
            $query->where("username", $user->username);
        }

        $data = $query->orderBy('date', 'desc')
            ->skip($request->query('start'))
            ->limit($request->query('length'))
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

            $is_publish = $item->is_publish == 'Y' ? '
                    <div class="text-center">
                        <span class="label-switch">Publish</span>
                    </div>
                    <div class="input-row">
                        <div class="toggle_status on">
                            <input type="checkbox" onclick="return updateStatus(\'' . $item->id . '\', \'Draft\');" />
                            <span class="slider"></span>
                        </div>
                    </div>' :
                '
                    <div class="text-center">
                        <span class="label-switch">Draft</span>
                    </div>
                    <div class="input-row">
                        <div class="toggle_status off">
                            <input type="checkbox" onclick="return updateStatus(\'' . $item->id . '\', \'Publish\');" />
                            <span class="slider"></span>
                        </div>
                    </div>';
            $image = '<div class="thumbnail">
                            <div class="thumb">
                                <img src="' . Storage::url($item->image) . '" alt="" width="300px" height="300px" 
                                class="img-fluid img-thumbnail" alt="' . $item->title . '">
                            </div>
                        </div>';
            $item['action'] = $action;
            $item['is_publish'] = $is_publish;
            $item['image'] = $image;
            return $item;
        });

        $total = MaPost::count();
        return response()->json([
            'draw' => $request->query('draw'),
            'recordsFiltered' => $total,
            'recordsTotal' => $total,
            'data' => $output,
        ]);
    }

    public function getDetail($id)
    {
        try {
            $post = MaPost::find($id);

            if (!$post) {
                return response()->json([
                    "status" => "error",
                    "message" => "Data tidak ditemukan",
                ], 404);
            }

            return response()->json([
                "status" => "success",
                "data" => $post
            ]);
        } catch (\Exception $err) {
            return response()->json([
                "status" => "error",
                "message" => "Data tidak ditemukan"
            ], 500);
        }
    }

    public function create(Request $request)
    {
        try {
            $data = $request->all();
            $rules = [
                "title" => "required|string",
                "ma_hall_menu_id" => "nullable",
                "link" => "required|string",
                "phone" => "required|string",
                "hall_id" => "nullable",
                "description" => "required|string",
                "is_publish" => "required|string",
                "type" => "required|integer",
                "tag_post" => "required|string",
                "image" => "required|image|max:10240|mimes:jpeg,png,jpg"
            ];

            $messages = [
                "title.required" => "Judul harus diisi",
                "link.required" => "Link harus diisi",
                "phone.required" => "No WA harus diisi",
                "description.required" => "Deskripsi harus diisi",
                "is_publish.required" => "Status harus diisi",
                "type.required" => "Tipe harus diisi",
                "tag_post.required" => "Tags harus diisi",
                "image.required" => "Gambar harus diisi",
                "image.image" => "Gambar yang di upload tidak valid",
                "image.max" => "Ukuran gambar maximal 1MB",
                "image.mimes" => "Format gambar harus jpeg/png/jpg"
            ];

            $validator = Validator::make($data, $rules, $messages);
            if ($validator->fails()) {
                return response()->json([
                    "status" => "error",
                    "message" => $validator->errors()->first(),
                ], 400);
            }

            $data['image'] = $request->file('image')->store('assets/news', 'public');
            $data["seo"] = Str::slug($data["title"]);
            $data["day"] = Helper::currentDay();
            $data["date"] = Helper::currentDate();
            $user = json_decode(Cookie::get("user"));
            $data["username"] = $user->username;
            $data["is_hall"] = $user->hall_id;
            $data["hall_menu"] = "";

            MaPost::create($data);
            return response()->json([
                "status" => "success",
                "message" =>  "Data berhasil dibuat"
            ]);
        } catch (\Exception $err) {
            if ($request->file("image")) {
                unlink(public_path("storage/assets/news/" . $request->image->hashName()));
            }
            return response()->json([
                "status" => "error",
                "message" => $err->getMessage(),
            ], 500);
        }
    }

    public function update(Request $request)
    {
        try {
            $data = $request->all();
            $rules = [
                "id" => "required|integer",
                "title" => "required|string",
                "ma_hall_menu_id" => "nullable",
                "link" => "required|string",
                "phone" => "required|string",
                "hall_id" => "nullable",
                "description" => "required|string",
                "is_publish" => "required|string",
                "type" => "required|integer",
                "tag_post" => "required|string",
                "image" => "nullable"
            ];

            if ($request->file('image')) {
                $rules['image'] .= '|image|max:10240|mimes:jpeg,png,jpg';
            }

            $messages = [
                "id.required" => "Data ID harus diisi",
                "id.integer" => "Type ID tidak sesuai",
                "title.required" => "Judul harus diisi",
                "link.required" => "Link harus diisi",
                "phone.required" => "No WA harus diisi",
                "description.required" => "Deskripsi harus diisi",
                "is_publish.required" => "Status harus diisi",
                "type.required" => "Tipe harus diisi",
                "tag_post.required" => "Tags harus diisi",
                "image.image" => "Gambar yang di upload tidak valid",
                "image.max" => "Ukuran gambar maximal 1MB",
                "image.mimes" => "Format gambar harus jpeg/png/jpg"
            ];

            $validator = Validator::make($data, $rules, $messages);
            if ($validator->fails()) {
                return response()->json([
                    "status" => "error",
                    "message" => $validator->errors()->first(),
                ], 400);
            }

            $post = MaPost::find($data['id']);
            if (!$post) {
                return response()->json([
                    "status" => "error",
                    "message" => "Data tidak ditemukan"
                ], 404);
            }

            // delete undefined data image
            unset($data["image"]);
            if ($request->file("image")) {
                unlink(public_path("storage/" . $post->image));
                $data["image"] = $request->file("image")->store("assets/news", "public");
            }

            if ($data["title"]) {
                $data["seo"] = Str::slug($data["title"]);
            }

            $post->update($data);
            return response()->json([
                "status" => "success",
                "message" => "Data berhasil diperbarui"
            ]);
        } catch (\Exception $err) {
            if ($request->file("image")) {
                unlink(public_path("storage/assets/news/" . $request->image->hashName()));
            }
            return response()->json([
                "status" => "error",
                "message" => $err->getMessage(),
            ], 500);
        }
    }

    public function updateStatus(Request $request)
    {
        try {
            $data = $request->all();
            $rules = [
                "id" => "required|integer",
                "is_publish" => "required|string",
            ];

            if ($request->file('image')) {
                $rules['image'] .= '|image|max:10240|mimes:jpeg,png,jpg';
            }

            $messages = [
                "id.required" => "Data ID harus diisi",
                "id.integer" => "Type ID tidak sesuai",
                "is_publish.required" => "Status harus diisi",
            ];

            $validator = Validator::make($data, $rules, $messages);
            if ($validator->fails()) {
                return response()->json([
                    "status" => "error",
                    "message" => $validator->errors()->first(),
                ], 400);
            }

            $post = MaPost::find($data['id']);
            if (!$post) {
                return response()->json([
                    "status" => "error",
                    "message" => "Data tidak ditemukan"
                ], 404);
            }
            $post->update($data);
            return response()->json([
                "status" => "success",
                "message" => "Status berhasil diperbarui"
            ]);
        } catch (\Exception $err) {
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
            $post = MaPost::find($id);
            if (!$post) {
                return response()->json([
                    "status" => "error",
                    "message" => "Data tidak ditemukan"
                ], 404);
            }
            unlink(public_path('storage/' . $post->image));
            $post->delete();
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
}
