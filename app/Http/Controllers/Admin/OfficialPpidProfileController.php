<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MaOfficialPpidProfile;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class OfficialPpidProfileController extends Controller
{
    public function index()
    {
        $title = "Pejabat PPID";
        return view("pages.admin.official-ppid", compact("title"));
    }

    // HANDLE API
    public function dataTable(Request $request)
    {
        $query = MaOfficialPpidProfile::query();

        if ($request->query("search")) {
            $searchValue = $request->query("search")["value"];
            $query->where(function ($query) use ($searchValue) {
                $query->where("title1", "like", "%" . $searchValue . "%")
                    ->orWhere("title2", "like", "%" . $searchValue . "%");
            });
        }

        $recordsFiltered = $query->count();

        $data = $query->orderBy("created_at", "desc")
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

            $image = '<div class="thumbnail">
                                <div class="thumb">
                                    <img src="' . Storage::url($item->image) . '" alt="" width="300px" height="300px" 
                                    class="img-fluid img-thumbnail" alt="' . $item->title1 . '">
                                </div>
                            </div>';
            $item['action'] = $action;
            $item['image'] = $image;
            return $item;
        });

        $total = MaOfficialPpidProfile::count();
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
            $data = MaOfficialPpidProfile::find($id);

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
        } catch (Exception $err) {
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
                "title1" => "required|string",
                "title2" => "required|string",
                "image" => "required|image|max:1024|mimes:giv,svg,jpeg,png,jpg"
            ];
            $messages = [
                "title1.required" => "Judul satu harus diisi",
                "title2.required" => "Judul dua harus diisi",
                "image.required" => "Gambar harus diisi",
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

            $data['image'] = $request->file('image')->store('assets/officialppidprofile', 'public');
            MaOfficialPpidProfile::create($data);
            return response()->json([
                "status" => "success",
                "message" =>  "Data berhasil dibuat"
            ]);
        } catch (Exception $err) {
            if ($request->file("image")) {
                unlink(public_path("storage/assets/officialppidprofile/" . $request->image->hashName()));
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
                "title1" => "required|string",
                "title2" => "required|string",
                "image" => "nullable"
            ];

            if ($request->file('image')) {
                $rules['image'] .= '|image|max:1024|mimes:giv,svg,jpeg,png,jpg';
            }

            $messages = [
                "id.required" => "Data ID harus diisi",
                "id.integer" => "Type ID tidak sesuai",
                "title1.required" => "Judul satu harus diisi",
                "title2.required" => "Judul dua harus diisi",
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

            $existing = MaOfficialPpidProfile::find($data['id']);
            if (!$existing) {
                return response()->json([
                    "status" => "error",
                    "message" => "Data tidak ditemukan"
                ], 404);
            }

            // delete undefined data image
            unset($data["image"]);
            if ($request->file("image")) {
                unlink(public_path("storage/" . $existing->image));
                $data["image"] = $request->file("image")->store("assets/officialppidprofile", "public");
            }

            $existing->update($data);
            return response()->json([
                "status" => "success",
                "message" =>  "Data berhasil diperbarui"
            ]);
        } catch (Exception $err) {
            if ($request->file("image")) {
                unlink(public_path("storage/assets/officialppidprofile/" . $request->image->hashName()));
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
            $data = MaOfficialPpidProfile::find($id);
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
        } catch (Exception $err) {
            return response()->json([
                "status" => "error",
                "message" => $err->getMessage()
            ], 500);
        }
    }
}
