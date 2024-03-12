<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MaRunningTexts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RunningTextsController extends Controller
{
    public function index()
    {
        $title = "Running Text";
        return view("pages.admin.running-text", compact("title"));
    }

    // HANDLER API
    public function create(Request $request)
    {
        try {
            $data = $request->all();
            $rules = [
                "order" => "required|integer",
                "text" => "required|string",
            ];

            $messages = [
                "order.required" => "Urutan harus diisi",
                "text.required" => "Running Text harus diisi",
            ];

            $validator = Validator::make($data, $rules, $messages);
            if ($validator->fails()) {
                return response()->json([
                    "status" => "error",
                    "message" => $validator->errors()->first(),
                ], 400);
            }
            MaRunningTexts::create($data);
            //  echo "<pre>" . var_dump($request->image->hashName()) . "</pre>";

            return response()->json([
                "status" => "success",
                "message" => "Data running text berhasil disimpan"
            ]);
        } catch (\Exception $err) {
            return response()->json([
                "status" => "error",
                "message" => $err->getMessage()
            ], 500);
        }
    }

    public function getDetail($id)
    {
        try {
            $runningText = MaRunningTexts::find($id);

            if (!$runningText) {
                return response()->json([
                    "status" => "error",
                    "message" => "Data runing text tidak ditemukan",
                ], 404);
            }

            return response()->json([
                "status" => "success",
                "data" => $runningText
            ]);
        } catch (\Exception $err) {
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
                "order" => "required|integer",
                "text" => "required|string",
            ];

            $messages = [
                "id.required" => "Data ID harus diisi",
                "id.integer" => "Type ID tidak sesuai",
                "order.required" => "Urutan harus diisi",
                "text.required" => "Running text harus diisi",
            ];

            $validator = Validator::make($data, $rules, $messages);
            if ($validator->fails()) {
                return response()->json([
                    "status" => "error",
                    "message" => $validator->errors()->first(),
                ], 400);
            }
            $runningText = MaRunningTexts::find($data['id']);

            if (!$runningText) {
                return response()->json([
                    "status" => "error",
                    "message" => "Data Running Text tidak ditemukan"
                ], 404);
            }


            $runningText->update($data);
            return response()->json([
                "status" => "success",
                "message" => "Data Running Text berhasil diperbarui"
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
            $runningText = MaRunningTexts::find($id);
            if (!$runningText) {
                return response()->json([
                    "status" => "error",
                    "message" => "Data Running Text tidak ditemukan"
                ], 404);
            }

            $runningText->delete();
            return response()->json([
                "status" => "success",
                "message" => "Data Running Text berhasil dihapus"
            ]);
        } catch (\Exception $err) {
            return response()->json([
                "status" => "error",
                "message" => $err->getMessage()
            ], 500);
        }
    }
    public function dataTable(Request $request)
    {
        $query = MaRunningTexts::query();

        if ($request->query("search")) {
            $searchValue = $request->query("search")['value'];
            $query->where(function ($query) use ($searchValue) {
                $query->where('text', 'like', '%' . $searchValue . '%');
            });
        }

        $recordsFiltered = $query->count();

        $data = $query->orderBy('order', 'asc')
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

        $total = MaRunningTexts::count();
        return response()->json([
            'draw' => $request->query('draw'),
            'recordsFiltered' => $recordsFiltered,
            'recordsTotal' => $total,
            'data' => $output,
        ]);
    }

    public function homeRunningText(Request $request)
    {
        $data = MaRunningTexts::orderBy('order', 'asc')->get();
        return response()->json([
            "status" => "success",
            "data" => $data,
        ]);
    }
}
