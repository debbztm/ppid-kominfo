<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MaSetting;
use Illuminate\Http\Request;

class CountInformationController extends Controller
{
    public function index()
    {
        $title = "Jumlah Informasi";
        return view('pages.admin.count-information', compact("title"));
    }

    // HANDLER API
    public function getDetail()
    {
        try {
            $data = MaSetting::first();
            if (!$data) {
                return response()->json([
                    "status" => "error",
                    "message" => "Data jumlah informasi masih kosong"
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

    public function createAndUpdate(Request $request)
    {
        try {
            $data = $request->all();
            $setting = MaSetting::first();

            if ($setting) {
                $setting->update($data);
                return response()->json([
                    "status" => "success",
                    "message" => "Data berhasil diperbarui"
                ]);
            }

            // ceate
            MaSetting::create($data);

            return response()->json([
                "status" => "success",
                "message" => "Data berhasil disimpan"
            ]);
        } catch (\Exception $err) {
            return response()->json([
                "status" => "error",
                "message" => $err->getMessage()
            ], 500);
        }
    }
}
