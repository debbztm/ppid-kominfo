<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MaGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{
    public function index()
    {
        $title = "Galery";
        return view("pages.admin.gallery", compact("title"));
    }

    // HANDLE API
    public function dataTable(Request $request)
    {
        $query = MaGallery::query();

        if ($request->query("search")) {
            $searchValue = $request->query("search")['value'];
            $query->where(function ($query) use ($searchValue) {
                $query->where('title', 'like', '%' . $searchValue . '%');
            });
        }

        $data = $query->orderBy('created_at', 'desc')
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
                                <a class='dropdown-item' href='/admin/image-gallery/$item->id/detail' title='Galery'>Image Gallery</a>
                                <a class='dropdown-item' onclick='return removeData(\"{$item->id}\");' href='javascript:void(0)' title='Hapus'>Hapus</a>
                            </div>
                        </div>";

            $item['action'] = $action;
            return $item;
        });

        $total = MaGallery::count();
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
            $gallery = MaGallery::find($id);

            if (!$gallery) {
                return response()->json([
                    "status" => "error",
                    "message" => "Data tidak ditemukan",
                ], 404);
            }

            return response()->json([
                "status" => "success",
                "data" => $gallery
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

            $validator = Validator::make(
                $data,
                ["title" => "required|string"],
                ["title.required" => "Judul harus diisi"]
            );
            if ($validator->fails()) {
                return response()->json([
                    "status" => "error",
                    "message" => $validator->errors()->first(),
                ], 400);
            }

            $data["seo"] = Str::slug($data["title"]);

            MaGallery::create($data);
            return response()->json([
                "status" => "success",
                "message" =>  "Data berhasil dibuat"
            ]);
        } catch (\Exception $err) {
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

            $validator = Validator::make(
                $data,
                [
                    "id" => "required|integer",
                    "title" => "required|string",
                ],
                [
                    "id.required" => "Data ID harus diisi",
                    "id.integer" => "Type ID tidak sesuai",
                    "title.required" => "Judul harus diisi"
                ]
            );
            if ($validator->fails()) {
                return response()->json([
                    "status" => "error",
                    "message" => $validator->errors()->first(),
                ], 400);
            }


            $gallery = MaGallery::find($data['id']);
            if (!$gallery) {
                return response()->json([
                    "status" => "error",
                    "message" => "Data tidak ditemukan"
                ], 404);
            }

            $data["seo"] = Str::slug($data["title"]);

            $gallery->update($data);
            return response()->json([
                "status" => "success",
                "message" =>  "Data berhasil diperbarui"
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
            $gallery = MaGallery::find($id);
            if (!$gallery) {
                return response()->json([
                    "status" => "error",
                    "message" => "Data tidak ditemukan"
                ], 404);
            }
            $gallery->delete();
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
}
