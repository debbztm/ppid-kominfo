<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FormInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

use function PHPSTORM_META\map;

class FormInformationController extends Controller
{
    public function index()
    {
        $title = "Form Information";
        return view("pages.admin.form-information.index", compact('title'));
    }

    public function request()
    {
        return view("pages.admin.form-information.request");
    }

    public function objection()
    {
        return view("pages.admin.form-information.objection");
    }

    public function complaint()
    {
        return view("pages.admin.form-information.complaint");
    }

    public function satisfaction()
    {
        return view("pages.admin.form-information.satisfaction");
    }


    // HOME PAGE
    public function homeRequest()
    {
        $title = "Formulir Permohonan - Dinas Energi dan Sumber Daya Mineral Provinsi Jawa Tengah";
        return view("pages.front.form-information.request", compact("title"));
    }

    public function homeObjection()
    {
        $title = "Formulir Keberatan - Dinas Energi dan Sumber Daya Mineral Provinsi Jawa Tengah";
        return view("pages.front.form-information.objection", compact("title"));
    }

    public function homeComplaint()
    {
        $title = "Formulir Pengaduan - Dinas Energi dan Sumber Daya Mineral Provinsi Jawa Tengah";
        return view("pages.front.form-information.complaint", compact("title"));
    }

    public function homeSatisfaction()
    {
        $title = "Formulir Index Kepuasan - Dinas Energi dan Sumber Daya Mineral Provinsi Jawa Tengah";
        return view("pages.front.form-information.satisfaction", compact("title"));
    }

    // HANDLER API
    public function dataTable(Request $request, $type)
    {
        $query = FormInformation::query();

        if ($request->query("search")) {
            $searchValue = $request->query("search")['value'];
            $query->where(function ($query) use ($searchValue) {
                $query->where('name', 'like', '%' . $searchValue . '%')
                    ->orWhere("information", "like", "%" . $searchValue . "%");
            });
        }

        $query->where("type", $type);

        $recordsFiltered = $query->count();

        $data = $query->orderBy('id', 'desc')
            ->skip($request->query('start'))
            ->limit($request->query('length'))
            ->get();

        $output = $data->map(function ($item) use ($type) {
            $action = "<div class='dropdown-primary dropdown open'>
                                <button class='btn btn-sm btn-primary dropdown-toggle waves-effect waves-light' id='dropdown-{$item->id}' data-toggle='dropdown' aria-haspopup='true' aria-expanded='true'>
                                    Aksi
                                </button>
                                <div class='dropdown-menu' aria-labelledby='dropdown-{$item->id}' data-dropdown-out='fadeOut'>
                                    <a class='dropdown-item' onclick='return getData(\"{$item->id}\");' href='javascript:void(0);' title='Lihat'>Lihat</a>
                                    <a class='dropdown-item' onclick='return removeData(\"{$item->id}\", \"{$type}\");' href='javascript:void(0)' title='Hapus'>Hapus</a>
                                </div>
                            </div>";
            $item["action"] = $action;
            $item["information"] = "<p>
                                        " . Str::limit(strip_tags($item->information), 50) . "
                                    </p>";
            $item["purpose"] = "<p>
                                    " . Str::limit(strip_tags($item->purpose), 50) . "
                                </p>";
            $item["description"] = "<p>
                                        " . Str::limit(strip_tags($item->description), 50) . "
                                    </p>";
            return $item;
        });

        $total = FormInformation::where("type", $type)->count();
        return response()->json([
            'draw' => $request->query('draw'),
            'recordsFiltered' => $recordsFiltered,
            'recordsTotal' => $total,
            'data' => $output,
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
                "type" => "required|in:request,objection,complaint,satisfaction"
            ];

            $messages = [
                "name.required" => "Nama harus diisi",
                "phone.required" => "No Telpon harus diisi",
                "email.required" => "Email harus diisi",
                "type.required" => "Tipe Informasi harus diisi",
                "type.in" => "Tipe Informasi tidak valid",
            ];

            if ($data['type'] == "request") {
                $addRules = [
                    "job" => "required|string",
                    "address" => "required|string",
                    "image" => "required|image|max:5120|mimes:giv,svg,jpeg,png,jpg",
                    "information" => "required|string",
                    "purpose" => "required|string",
                    "howtoget_information" => "required|string",
                    "howtocopy_information" => "required|string",
                ];
                $addMessages = [
                    "job.required" => "Pekerjaan harus diisi",
                    "address.required" => "Alamat harus diisi",
                    "image.required" => "Identitas harus diisi",
                    "image.image" => "Identitas yang di upload tidak valid. Identitas harus berupa gambar",
                    "image.max" => "Ukuran gambar maximal 5MB",
                    "image.mimes" => "Format gambar harus giv/svg/jpeg/png/jpg",
                    "information.required" => "Informasi yang dibutuhkan harus diisi",
                    "purpose.required" => "Tujuan memperoleh informasi harus diisi",
                    "howtoget_information.required" => "Cara memperolah informasi harus diisi",
                    "howtocopy_information.required" => "Cara mendapatkan salinan informasi harus diisi"
                ];

                $rules = array_merge($rules, $addRules);
                $messages = array_merge($messages, $addMessages);
            } else if ($data['type'] == "objection") {
                $addRules = [
                    "job" => "required|string",
                    "address" => "required|string",
                    "image" => "required|image|max:5120|mimes:giv,svg,jpeg,png,jpg",
                    "information" => "required|string",
                    "description" => "required|string",
                    "reason" => "required|string",
                ];
                $addMessages = [
                    "job.required" => "Pekerjaan harus diisi",
                    "address.required" => "Alamat harus diisi",
                    "image.required" => "Identitas harus diisi",
                    "image.image" => "Identitas yang di upload tidak valid. Identitas harus berupa gambar",
                    "image.max" => "Ukuran gambar maximal 5MB",
                    "image.mimes" => "Format gambar harus giv/svg/jpeg/png/jpg",
                    "information.required" => "Informasi yang diminta harus diisi",
                    "description.required" => "Tambahan keterangan atas keberatan harus diisi",
                    "reason.required" => "Alasan keberatan harus diisi",
                ];

                $rules = array_merge($rules, $addRules);
                $messages = array_merge($messages, $addMessages);
            } else if ($data["type"] == "complaint") {
                $addRules = [
                    "address" => "required|string",
                    "image" => "required|image|max:5120|mimes:giv,svg,jpeg,png,jpg",
                    "nameof_reported" => "required|string",
                    "information" => "required|string",
                    "reported_identity" => "required|string",
                    "witness" => "required|string|in:Y,N",
                ];
                $addMessages = [
                    "address.required" => "Alamat harus diisi",
                    "image.required" => "Identitas harus diisi",
                    "image.image" => "Identitas yang di upload tidak valid. Identitas harus berupa gambar",
                    "image.max" => "Ukuran gambar maximal 5MB",
                    "image.mimes" => "Format gambar harus giv/svg/jpeg/png/jpg",
                    "nameof_reported.required" => "Nama terlapor harus diisi",
                    "information.required" => "Kejadian / Kesaksian harus diisi",
                    "reqported_identity.required" => "Identidas terlapor harus diisi",
                    "witness.required" => "Saksian harus diisi",
                    "witness.in" => "Saksian tidak valid"
                ];

                $rules = array_merge($rules, $addRules);
                $messages = array_merge($messages, $addMessages);
            } else if ($data["type"] == "satisfaction") {
                $addRules = [
                    "date" => "required",
                    "job" => "required|string",
                    "address" => "required|string",
                    "typeof_service" => "required|string",
                    "suggestion" => "required|string",
                ];
                $addMessages = [
                    "date.required" => "Tanggal harus diisi",
                    "job.required" => "Pekerjaan harus diisi",
                    "address.required" => "Alamat harus diisi",
                    "typeof_service" => "Jenis pelayanan harus diisi",
                    "suggestion.required" => "Saran harus diisi",
                ];

                $rules = array_merge($rules, $addRules);
                $messages = array_merge($messages, $addMessages);
            }

            $validator = Validator::make($data, $rules, $messages);
            if ($validator->fails()) {
                return response()->json([
                    "status" => "error",
                    "message" => $validator->errors()->first(),
                ], 400);
            }

            if ($request->file('image')) {
                $data['image'] = $request->file('image')->store('assets/forminfo', 'public');
            }

            FormInformation::create($data);
            return response()->json([
                "status" => "success",
                "message" => "Formulir berhasil dikirim",
                "rules" => $rules,
                "type" => $data['type']
            ]);
        } catch (\Throwable $err) {
            if ($request->file("image")) {
                unlink(public_path("storage/assets/forminfo/" . $request->image->hashName()));
            }
            return response()->json([
                "status" => "error",
                "message" => $err->getMessage(),
            ], 500);
        }
    }

    public function getDetail(Request $request, $id)
    {
        try {
            $data = FormInformation::find($id);
            if (!$data) {
                return response()->json([
                    "status" => "error",
                    "message" => "Data setting masih kosong"
                ], 404);
            }

            if ($data->image) {
                $data["image"] = Storage::url($data->image);
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
            $data = FormInformation::find($id);
            if (!$data) {
                return response()->json([
                    "status" => "error",
                    "message" => "Data tidak ditemukan"
                ], 404);
            }
            if ($data->image) {
                unlink(public_path('storage/' . $data->image));
            }
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
