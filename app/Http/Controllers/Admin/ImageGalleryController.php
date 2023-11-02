<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MaGallery;
use App\Models\MaImageGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ImageGalleryController extends Controller
{
    public function index()
    {
        $title = "Image Gallery";
        return view("pages.admin.image-gallery", compact("title"));
    }

    // HANDLER API
    public function list($gallery_id)
    {
        try {
            $gallery = MaGallery::with('maImageGalleries')->find($gallery_id);

            if (!$gallery) {
                return response()->json([
                    "status" => "error",
                    "message" => "Data Galeri tidak ditemukan"
                ], 404);
            }
            $dataGalleries = $gallery->maImageGalleries;
            $data = $dataGalleries->map(function ($image) {
                $item['image'] = "<div class='col col-md-3 col-sm-6 col-12 col-sm-6 col-12'>
                                    <div class='image-wrapper mb-3 border' style='padding:5px!important;'>
                                        <img src='" . Storage::url($image->image) . "'
                                            alt='Gambar 1' class='img-fluid'>
                                        <button class='btn delete-button' onclick='return removeData(\"$image->id\")' href='javascript:void(0);'>
                                            <i class='fas fa-trash ml-1'></i>
                                        </button>
                                    </div>
                                </div>";
                return $item;
            });

            return response()->json([
                "status" => "success",
                "data" => $data,
                "title" => $gallery->title
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
            $validator = Validator::make($data, [
                "ma_gallery_id" => "required|integer",
                "image" => "required|image|max:1024|mimes:giv,svg,jpeg,png,jpg"
            ], [
                "ma_gallery_id.required" => "ID Galeri harus diisi",
                "ma_gallery_id.integer" => "Type ID Galeri tidak valid",
                "image.required" => "Gambar harus diisi",
                "image.image" => "Gambar yang di upload tidak valid",
                "image.max" => "Ukuran gambar maximal 1MB",
                "image.mimes" => "Format gambar harus giv/svg/jpeg/png/jpg"
            ]);
            if ($validator->fails()) {
                return response()->json([
                    "status" => "error",
                    "message" => $validator->errors()->first(),
                ], 400);
            }

            $gallery = MaGallery::find($data['ma_gallery_id']);
            if (!$gallery) {
                return response()->json([
                    "status" => "error",
                    "message" => "Data Galeri tidak ditemukan"
                ], 404);
            }

            $data["image"] = $request->file("image")->store("assets/imagegallery", "public");
            MaImageGallery::create($data);
            return response()->json([
                "status" => "success",
                "message" =>  "Data berhasil dibuat"
            ]);
        } catch (\Exception $err) {
            if ($request->file("image")) {
                unlink(public_path("storage/assets/imagegallery/" . $request->image->hashName()));
            }
            return response()->json([
                "status" => "error",
                "message" => $err->getMessage()
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
            $data = MaImageGallery::find($id);
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
}
