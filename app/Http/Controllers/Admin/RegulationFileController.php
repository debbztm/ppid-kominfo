<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MaRegulation;
use App\Models\MaRegulationFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegulationFileController extends Controller
{
    public function index()
    {
        $title = "File Regulasi";
        return view("pages.admin.regulation-file", compact("title"));
    }

    // HANDLER API
    public function dataTable(Request $request, $regulation_id)
    {
        $isRegulationExist = MaRegulation::find($regulation_id);
        if (!$isRegulationExist) {
            return response()->json([
                "status" => "error",
                "message" => "Data Regulasi tidak ditemukan",
            ], 404);
        }

        $query = MaRegulationFile::query();

        if ($request->query("search")) {
            $searchValue = $request->query("search")['value'];
            $query->where(function ($query) use ($searchValue) {
                $query->where('title', 'like', '%' . $searchValue . '%');
            });
        }

        $data = $query->where("ma_regulation_id", $regulation_id)->orderBy('created_at', 'desc')
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

        $total = MaRegulationFile::where("ma_regulation_id", $regulation_id)->count();
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
            $data = MaRegulationFile::find($id);

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
                "ma_regulation_id" => "required|integer",
                "title" => "required|string",
                "description" => "required|string",
                "file" => "required|max:5120|mimes:doc,docx,pdf,png,xls,xlsx"
            ];

            $message = [
                "ma_regulation_id.required" => "ID Regulasi harus diisi",
                "ma_regulation_id.integer" => "Type ID Regulasi tidak valid",
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

            $regulation = MaRegulation::find($data['ma_regulation_id']);
            if (!$regulation) {
                return response()->json([
                    "status" => "error",
                    "message" => "Data Regulasi tidak ditemukan"
                ], 404);
            }

            $data["file"] = $request->file("file")->store("assets/regulationfile", "public");
            MaRegulationFile::create($data);
            return response()->json([
                "status" => "success",
                "message" =>  "Data berhasil dibuat"
            ]);
        } catch (\Exception $err) {
            if ($request->file("file")) {
                unlink(public_path("storage/assets/regulationfile/" . $request->file->hashName()));
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
                "ma_regulation_id" => "required|integer",
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
                "ma_regulation_id.required" => "ID Regulasi harus diisi",
                "ma_regulation_id.integer" => "Type ID Regulasi tidak valid",
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

            $regulation = MaRegulation::find($data['ma_regulation_id']);
            if (!$regulation) {
                return response()->json([
                    "status" => "error",
                    "message" => "Data Regulasi tidak ditemukan"
                ], 404);
            }

            $regulationFile = MaRegulationFile::find($data["id"]);
            if (!$regulationFile) {
                return response()->json([
                    "status" => "error",
                    "message" => "Data tidak ditemukan"
                ], 404);
            }

            unset($data["file"]);
            if ($request->file("file")) {
                unlink(public_path("storage/" . $regulationFile->file));
                $data["file"] = $request->file("file")->store("assets/regulationfile", "public");
            }

            $regulationFile->update($data);
            return response()->json([
                "status" => "success",
                "message" =>  "Data berhasil diperbarui"
            ]);
        } catch (\Exception $err) {
            if ($request->file("file")) {
                unlink(public_path("storage/assets/regulationfile/" . $request->file->hashName()));
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
            $data = MaRegulationFile::find($id);
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
