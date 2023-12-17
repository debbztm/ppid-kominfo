<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PublicInformation;
use App\Models\PublicInformationNew;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PublicInformationNewsController extends Controller
{
    public function index()
    {
        $title = "Berita Informasi Publik";
        $public_informations = PublicInformation::all();
        return view("pages.admin.public-information.news", compact("title", "public_informations"));
    }

    // HOME 
    public function homeInformationNew($seo)
    {
        $news = PublicInformationNew::where("seo", $seo)->first();
        if (!$news) {
            return redirect()->route('information-and-formulir');
        }

        $data["views"] = $news->views + 1;
        $news->update($data);
        $title = $news['title'];
        return view("pages.front.information.detail", compact('title', 'news'));
    }

    // HANDLE API
    public function dataTable(Request $request)
    {
        $query = PublicInformationNew::query();

        if ($request->query("search")) {
            $searchValue = $request->query("search")['value'];
            $query->where(function ($query) use ($searchValue) {
                $query->where('title', 'like', '%' . $searchValue . '%');
            });
        }

        $recordsFiltered = $query->count();

        $data = $query->orderBy('id', 'desc')
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
                                <a class='dropdown-item' href='/admin/public-information-file/$item->id/detail' title='File Berita'>File Informasi Publik</a>
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
            $title = "<p>" . Str::limit(strip_tags($item->title), 50) . "</p>";

            $item['action'] = $action;
            $item['is_publish'] = $is_publish;
            $item['image'] = $image;
            $item['title'] = $title;
            return $item;
        });

        $total = PublicInformationNew::count();
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
            $publicInformation = PublicInformationNew::find($id);

            if (!$publicInformation) {
                return response()->json([
                    "status" => "error",
                    "message" => "Data tidak ditemukan",
                ], 404);
            }

            return response()->json([
                "status" => "success",
                "data" => $publicInformation
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
                "public_information_id" => "required",
                "description" => "required|string",
                "is_publish" => "required|string|in:Y,N",
                "image" => "required|image|max:1024|mimes:giv,svg,jpeg,png,jpg"
            ];

            $messages = [
                "title.required" => "Judul harus diisi",
                "description.required" => "Deskripsi harus diisi",
                "is_publish.required" => "Status harus diisi",
                "is_publish.in" => "Status tidak sesuai",
                "public_information_id.required" => "Tipe Informasi Publik harus diisi",
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
                $data['image'] = $request->file('image')->store('assets/pinw', 'public');
            }
            $data["seo"] = Str::slug($data["title"]);
            $user = json_decode(Cookie::get("user"));
            $data["username"] = $user->username;

            PublicInformationNew::create($data);
            return response()->json([
                "status" => "success",
                "message" => "Data berhasil dibuat"
            ]);
        } catch (\Exception $err) {
            if ($request->file("image")) {
                unlink(public_path("storage/assets/pinw/" . $request->image->hashName()));
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
                "public_information_id" => "required",
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
                "public_information_id.required" => "Tipe Informasi Publik harus diisi",
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

            $pinw = PublicInformationNew::find($data['id']);
            if (!$pinw) {
                return response()->json([
                    "status" => "error",
                    "message" => "Data tidak ditemukan"
                ], 404);
            }

            // delete undefined data image
            unset($data["image"]);
            if ($request->file("image")) {
                unlink(public_path("storage/" . $pinw->image));
                $data["image"] = $request->file("image")->store("assets/pinw", "public");
            }

            if ($data["title"]) {
                $data["seo"] = Str::slug($data["title"]);
            }

            $pinw->update($data);
            return response()->json([
                "status" => "success",
                "message" => "Data berhasil diperbarui"
            ]);
        } catch (\Exception $err) {
            if ($request->file("image")) {
                unlink(public_path("storage/assets/pinw/" . $request->image->hashName()));
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

            $pinw = PublicInformationNew::find($data['id']);
            if (!$pinw) {
                return response()->json([
                    "status" => "error",
                    "message" => "Data tidak ditemukan"
                ], 404);
            }
            $pinw->update($data);
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
            $data = PublicInformationNew::find($id);
            if (!$data) {
                return response()->json([
                    "status" => "error",
                    "message" => "Data tidak ditemukan"
                ], 404);
            }
            unlink(public_path('storage/' . $data->image));
            $data->delete();
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

    // API FRONTEND
    public function homeDataTable(Request $request, $seo)
    {
        $publicInformation = PublicInformation::where("seo", $seo)->first();

        if (!$publicInformation) {
            return response()->json([
                'draw' => $request->query('draw'),
                'recordsFiltered' => 0,
                'recordsTotal' => 0,
                'data' => [],
            ]);
        }

        $query = PublicInformationNew::query();

        if ($request->query("search")) {
            $searchValue = $request->query("search")['value'];
            $query->where(function ($query) use ($searchValue) {
                $query->where('title', 'like', '%' . $searchValue . '%');
            });
        }

        $query->where('public_information_id', $publicInformation->id);
        $query->where('is_publish', 'Y');
        $recordsFiltered = $query->count();

        $data = $query->orderBy('created_at', 'desc')
            ->skip($request->query('start'))
            ->limit($request->query('length'))
            ->get();

        $output = $data->map(function ($item, $index) {
            $item['no'] = $index + 1;
            $item['title'] = "<p>" . Str::limit(strip_tags($item->title), 50) . "</p>";
            $item['description'] = "<p>" . Str::limit(strip_tags($item->description), 100) . "</p>";
            $item['detail'] = '<a class="badge badge-primary" href="' . route('information-news', $item->seo) . '">Detail</a>';
            return $item;
        });

        $total = PublicInformationNew::count();
        return response()->json([
            'draw' => $request->query('draw'),
            'recordsFiltered' => $recordsFiltered,
            'recordsTotal' => $total,
            'data' => $output,
        ]);
    }
}
