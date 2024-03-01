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

    // FOR FRONTEND
    public function homePost(Request $request)
    {
        $data = $request->all();
        $title = "Berita - Dinas Energi dan Sumber Daya Mineral Provinsi Jawa Tengah";
        $news = MaPost::where(function ($query) use ($request) {
            if (($s = $request->s)) {
                $query->orWhere('title', 'LIKE', '%' . $s . '%')
                    ->orWhere('description', 'LIKE', '%' . $s . '%')
                    ->get();
            }
        })->orderBy('date', 'desc')->paginate(12);
        return view('pages.front.news', compact('title', 'news'));
    }

    public function homePostDetail($id, $seo)
    {
        $title = "Berita - Dinas Energi dan Sumber Daya Mineral Provinsi Jawa Tengah";
        $news = MaPost::where('id', $id)->where('seo', $seo)->first();
        if (!$news) {
            return abort(404);
        }
        $title = $news->title;
        $data["views"] = $news->views + 1;
        $news->update($data);

        return view("pages.front.news-detail", compact("title", "news"));
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
        if ($user->role->name == "USER") {
            $query->where("username", $user->username);
        }

        $recordsFiltered = $query->count();

        $data = $query->orderBy('date', 'desc')
            ->skip($request->query('start'))
            ->limit($request->query('length'))
            ->get();

        $output = $data->map(function ($item) {
            $action = " <div class='dropdown-primary dropdown open'>
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
            $title = "<p>
                            " . Str::limit(strip_tags($item->title), 100) . "
                        </p>";
            $item['action'] = $action;
            $item['is_publish'] = $is_publish;
            $item['image'] = $image;
            $item['title'] = $title;
            return $item;
        });

        $total = MaPost::count();
        return response()->json([
            'draw' => $request->query('draw'),
            'recordsFiltered' => $recordsFiltered,
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
                "message" => $err->getMessage()
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
                "description" => "required|string",
                "is_publish" => "required|string|in:Y,N",
                "type" => "required|integer",
                "image" => "required|image|max:1024|mimes:giv,svg,jpeg,png,jpg"
            ];

            $messages = [
                "title.required" => "Judul harus diisi",
                "description.required" => "Deskripsi harus diisi",
                "is_publish.required" => "Status harus diisi",
                "is_publish.in" => "Status tidak sesuai",
                "type.required" => "Tipe harus diisi",
                "image.required" => "Gambar harus di isi",
                "image.image" => "Gambar yang di upload tidak valid",
                "image.max" => "Ukuran gambar maximal 1MB",
                "image.mimes" => "Format gambar harus giv/svg/jpeg/png/jpg"
            ];

            $validator = Validator::make($data, $rules, $messages);
            if ($validator->fails()) {
                return response()->json([
                    "status" => "error",
                    "message" => $validator->errors()->first(),
                ], 400);
            }

            if ($request->file('image')) {
                $data['image'] = $request->file('image')->store('assets/news', 'public');
            }
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
                "message" => "Data berhasil dibuat"
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
                "hall_id" => "nullable",
                "description" => "required|string",
                "is_publish" => "required|string|in:Y,N",
                "type" => "required|integer",
                "image" => "nullable"
            ];

            if ($request->file('image')) {
                $rules['image'] .= '|image|max:1024|mimes:giv,svg,jpeg,png,jpg';
            }

            $messages = [
                "id.required" => "Data ID harus diisi",
                "id.integer" => "Type ID tidak sesuai",
                "title.required" => "Judul harus diisi",
                "description.required" => "Deskripsi harus diisi",
                "is_publish.required" => "Status harus diisi",
                "is_publish.in" => "Status tidak sesuai",
                "type.required" => "Tipe harus diisi",
                "image.image" => "Gambar yang di upload tidak valid",
                "image.max" => "Ukuran gambar maximal 1MB",
                "image.mimes" => "Format gambar harus giv/svg/jpeg/png/jpg"
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
                "is_publish" => "required|string|in:Y,N",
            ];

            $messages = [
                "id.required" => "Data ID harus diisi",
                "id.integer" => "Type ID tidak sesuai",
                "is_publish.required" => "Status harus diisi",
                "is_publish.in" => "Status tidak sesuai",
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
                "message" => "Data berhasil dihapus"
            ]);
        } catch (\Exception $err) {
            return response()->json([
                "status" => "error",
                "message" => $err->getMessage()
            ], 500);
        }
    }

    // API SEARCH FOR FRONTEND
    public function search(Request $request)
    {
        $query = MaPost::query();

        if ($request->query("search")) {
            $searchValue = $request->query("search");
            $query->where(function ($query) use ($searchValue) {
                $query->where('title', 'like', '%' . $searchValue . '%');
            });
        }

        $data = $query->orderBy('date', 'desc')
            ->where('is_publish', 'Y')
            ->get();
        $output = $data->map(function ($item) {
            $image = '<img src="' . Storage::url($item->image) . '" alt="" style="width:100px!important; height:75px!important object-fit: cover!important; margin-right:10px" 
                                    class="" alt="' . $item->title . '">';
            $title = "
                <div>
                    <p>
                        <a href='" . route('read-news', ['id' => $item->id, 'seo' => $item->seo]) . "' style='font-weight: 600'>" . Str::limit(strip_tags($item->title), 75) . "</a>
                    </p>
                    <small class='text-muted'>
                        " . Str::limit(strip_tags($item->description), 100) . "
                    </small>
                </div>
            ";
            $item['image'] = $image;
            $item['title'] = $title;
            return $item;
        });
        return response()->json([
            'status' => 'success',
            'data' => $output
        ]);
    }
}
