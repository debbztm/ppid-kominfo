<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MaContact;
use App\Models\MaSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index()
    {
        $title = "Hubungi Kami";
        return view('pages.admin.contact-us', compact('title'));
    }

    public function create(Request $request)
    {
        try {
            $data = $request->all();
            $rules = [
                "name" => "required|string",
                "email" => "required|string",
                "phone" => "required|string",
                "message" => "required|string",
            ];

            $messages = [
                "name.required" => "Nama harus diisi",
                "email.required" => "Email harus diisi",
                "phone.required" => "Phone harus diisi",
                "message.required" => "Pesan harus diisi",
            ];

            $validator = Validator::make($data, $rules, $messages);
            if ($validator->fails()) {
                return redirect()->route('home-contact');
            }
            $data['ip_address'] = $_SERVER['REMOTE_ADDR'];
            $data['access_from'] = $_SERVER['HTTP_USER_AGENT'];

            MaContact::create($data);
            return redirect()->route('home-contact');
        } catch (\Exception $err) {
            return redirect()->route('home-contact');
        }
    }

    // FRONT END
    public function homeContact()
    {
        $title = "Hubungi Kami - Dinas Energi dan Sumber Daya Mineral Provinsi Jawa Tengah";
        $setting = MaSetting::first();
        return view('pages.front.contact', compact('title', 'setting'));
    }

    //HANDLER API
    public function dataTable(Request $request)
    {
        $query = MaContact::query();

        if ($request->query("search")) {
            $searchValue = $request->query("search")["value"];
            $query->where("name", "like", "%" . $searchValue . "%");
        }

        $recordsFiltered = $query->count();

        $data = $query->orderBy("id", "desc")
            ->skip($request->query("start"))
            ->limit($request->query("length"))
            ->get();

        $output = $data->map(function ($item) {
            $action = "<div class='dropdown-primary dropdown open'>
                                <button class='btn btn-sm btn-primary dropdown-toggle waves-effect waves-light' id='dropdown-{$item->id}' data-toggle='dropdown' aria-haspopup='true' aria-expanded='true'>
                                    Aksi
                                </button>
                                <div class='dropdown-menu' aria-labelledby='dropdown-{$item->id}' data-dropdown-out='fadeOut'>
                                    <a class='dropdown-item' onclick='return getData(\"{$item->id}\");' href='javascript:void(0);' title='Lihat'>Lihat</a>
                                    <a class='dropdown-item' onclick='return removeData(\"{$item->id}\");' href='javascript:void(0)' title='Hapus'>Hapus</a>
                                </div>
                            </div>";
            $item["action"] = $action;
            return $item;
        });

        $total = MaContact::count();
        return response()->json([
            "draw" => $request->query("draw"),
            "recordsFiltered" => $recordsFiltered,
            "recordsTotal" => $total,
            "data" => $output
        ]);
    }

    public function getDetail($id)
    {
        try {
            $data = MaContact::find($id);

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
            $contact = MaContact::find($id);
            if (!$contact) {
                return response()->json([
                    "status" => "error",
                    "message" => "Data tidak ditemukan"
                ], 404);
            }

            $contact->delete();
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
