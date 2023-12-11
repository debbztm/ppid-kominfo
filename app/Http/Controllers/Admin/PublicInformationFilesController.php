<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PublicInformationFile;
use App\Models\PublicInformationNew;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PublicInformationFilesController extends Controller
{
    public function index()
    {
        $title = "File Berita Publik Informasi";
        return view("pages.admin.public-information.file", compact("title"));
    }

    // HANDLER API
    public function dataTable(Request $request, $public_information_news_id)
    {
        $isInformationfileExist = PublicInformationNew::find($public_information_news_id);
        if (!$isInformationfileExist) {
            return response()->json([
                "status" => "error",
                "message" => "Data Berita Informasi Publik",
            ], 404);
        }

        $query = PublicInformationFile::query();

        if ($request->query("search")) {
            $searchValue = $request->query("search")['value'];
            $query->where(function ($query) use ($searchValue) {
                $query->where('title', 'like', '%' . $searchValue . '%');
            });
        }
        $query->where("public_information_news_id", $public_information_news_id);
        $recordsFiltered = $query->count();

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
                                <a class='dropdown-item' onclick='return removeData(\"{$item->id}\");' href='javascript:void(0)' title='Hapus'>Hapus</a>
                            </div>
                        </div>";
            $item['action'] = $action;
            return $item;
        });

        $total = PublicInformationFile::where("public_information_news_id", $public_information_news_id)->count();
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
            $data = PublicInformationFile::find($id);

            if (!$data) {
                return response()->json([
                    "status" => "error",
                    "message" => "Data tidak ditemukan",
                ], 404);
            }

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

    public function create(Request $request)
    {
        try {
            $data = $request->all();
            $rules = [
                "public_information_news_id" => "required|integer",
                "title" => "required|string",
                "description" => "required|string",
                "file" => "required|max:51200|mimes:doc,docx,pdf,png,xls,xlsx"
            ];

            $message = [
                "public_information_news_id.required" => "ID publik informasi berita harus diisi",
                "public_information_news_id.integer" => "Type ID publik informasi berita  tidak valid",
                "title.required" => "Judul file harus diisi",
                "description.required" => "Deksripsi harus diisi",
                "file.required" => "File harus diisi",
                "file.max" => "Ukuran file maximal 50MB",
                "file.mimes" => "Format file harus doc/docx/pdf/png/xls/xlsx"
            ];
            $validator = Validator::make($data, $rules, $message);

            if ($validator->fails()) {
                return response()->json([
                    "status" => "error",
                    "message" => $validator->errors()->first(),
                ], 400);
            }

            $pinw = PublicInformationNew::find($data['public_information_news_id']);
            if (!$pinw) {
                return response()->json([
                    "status" => "error",
                    "message" => "Data Berita Informasi Publik tidak ditemukan"
                ], 404);
            }

            $data["file"] = $request->file("file")->store("assets/pif", "public");
            PublicInformationFile::create($data);
            return response()->json([
                "status" => "success",
                "message" => "Data berhasil dibuat"
            ]);
        } catch (\Exception $err) {
            if ($request->file("file")) {
                unlink(public_path("storage/assets/pif/" . $request->file->hashName()));
            }
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
                "public_information_news_id" => "required|integer",
                "title" => "required|string",
                "description" => "required|string",
                "file" => "nullable"
            ];

            if ($request->file("file")) {
                $rules["file"] .= "|max:5120|mimes:doc,docx,pdf,png,xls,xlsx";
            }

            $message = [
                "id.required" => "Data ID harus diisi",
                "id.integer" => "Type ID tidak sesuai",
                "public_information_news_id.required" => "ID Regulasi harus diisi",
                "public_information_news_id.integer" => "Type ID Regulasi tidak valid",
                "title.required" => "Judul file harus diisi",
                "description.required" => "Deksripsi harus diisi",
                "file.max" => "Ukuran file maximal 50MB",
                "file.mimes" => "Format file harus doc/docx/pdf/png/xls/xlsx"
            ];
            $validator = Validator::make($data, $rules, $message);

            if ($validator->fails()) {
                return response()->json([
                    "status" => "error",
                    "message" => $validator->errors()->first(),
                ], 400);
            }

            $pinw = PublicInformationNew::find($data['public_information_news_id']);
            if (!$pinw) {
                return response()->json([
                    "status" => "error",
                    "message" => "Data Berita Informasi Publik tidak ditemukan"
                ], 404);
            }

            $pif = PublicInformationFile::find($data["id"]);
            if (!$pif) {
                return response()->json([
                    "status" => "error",
                    "message" => "Data tidak ditemukan"
                ], 404);
            }

            unset($data["file"]);
            if ($request->file("file")) {
                unlink(public_path("storage/" . $pif->file));
                $data["file"] = $request->file("file")->store("assets/pif", "public");
            }

            $pif->update($data);
            return response()->json([
                "status" => "success",
                "message" => "Data berhasil diperbarui"
            ]);
        } catch (\Exception $err) {
            if ($request->file("file")) {
                unlink(public_path("storage/assets/pif/" . $request->file->hashName()));
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
            $data = PublicInformationFile::find($id);
            if (!$data) {
                return response()->json([
                    "status" => "error",
                    "message" => "Data tidak ditemukan"
                ], 404);
            }
            unlink(public_path('storage/' . $data->file));
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
