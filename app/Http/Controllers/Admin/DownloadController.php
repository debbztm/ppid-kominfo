<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MaDownload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class DownloadController extends Controller
{
    public function index()
    {
        $title = "Download";
        return view("pages.admin.download", compact("title"));
    }

    //FRONTEND
    public function homeDownload()
    {
        $title = "Download - Dinas Energi dan Sumber Daya Mineral Provinsi Jawa Tengah";
        $downloads = MaDownload::orderBy('id', 'desc')->get();
        return view('pages.front.download', compact('title', 'downloads'));
    }

    // HANDLER API
    public function datatable(Request $request)
    {

        $query = MaDownload::query();

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
            $action = " <div class='dropdown-primary dropdown open'>
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

        $total = MaDownload::count();
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
            $data = MaDownload::find($id);

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
                "title" => "required|string",
                "description" => "required|string",
                "file" => "required|max:30720|mimes:doc,docx,pdf,jpg,jpeg,gif,bmp,png,rar,zip,xlsx,csv,xls,pptx,ppt"
            ];

            $messages = [
                "title.required" => "Judul harus diisi",
                "description.required" => "Deskripsi harus diisi",
                "file.required" => "File harus diisi",
                "file.max" => "Ukuran file maximal 30MB",
                "file.mimes" => "Format file tidak valid"
            ];

            $validator = Validator::make($data, $rules, $messages);
            if ($validator->fails()) {
                return response()->json([
                    "status" => "error",
                    "message" => $validator->errors()->first(),
                ], 400);
            }

            $data['file'] = $request->file('file')->store('assets/download', 'public');

            MaDownload::create($data);
            return response()->json([
                "status" => "success",
                "message" =>  "Data berhasil dibuat"
            ]);
        } catch (\Exception $err) {
            if ($request->file("file")) {
                unlink(public_path("storage/assets/download/" . $request->file->hashName()));
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
                "description" => "required|string",
                "file" => "nullable"
            ];

            if ($request->file('file')) {
                $rules['file'] .= '|max:30720|mimes:doc,docx,pdf,jpg,jpeg,gif,bmp,png,rar,zip,xlsx,csv,xls,pptx,ppt';
            }

            $messages = [
                "id.required" => "Data ID harus diisi",
                "id.integer" => "Type ID tidak sesuai",
                "title.required" => "Judul harus diisi",
                "description.required" => "Deskripsi harus diisi",
                "file.max" => "Ukuran file maximal 30MB",
                "file.mimes" => "Format file tidak valid"
            ];

            $validator = Validator::make($data, $rules, $messages);
            if ($validator->fails()) {
                return response()->json([
                    "status" => "error",
                    "message" => $validator->errors()->first(),
                ], 400);
            }

            $download = MaDownload::find($data['id']);
            if (!$download) {
                return response()->json([
                    "status" => "error",
                    "message" => "Data tidak ditemukan"
                ], 404);
            }

            // delete undefined data file
            unset($data["file"]);
            if ($request->file("file")) {
                unlink(public_path("storage/" . $download->file));
                $data["file"] = $request->file("file")->store("assets/download", "public");
            }

            $download->update($data);
            return response()->json([
                "status" => "success",
                "message" => "Data berhasil diperbarui"
            ]);
        } catch (\Exception $err) {
            if ($request->file("file")) {
                unlink(public_path("storage/assets/download/" . $request->file->hashName()));
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
            $data = MaDownload::find($id);
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
