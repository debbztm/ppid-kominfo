<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CustomTemplate;
use Illuminate\Http\Request;

class CustomTemplateController extends Controller
{
    // API
    public function saveUpdateData(Request $request)
    {
        $data = $request->all();
        $existCustomData = CustomTemplate::find(1);
        if (!$existCustomData) {
            CustomTemplate::create($data);
            return response()->json([
                "status" => 200,
                "message" => "Warna template berhasil diubah"
            ]);
        }

        $existCustomData->update($data);
        return response()->json([
            "status" => 200,
            "message" => "Warna template berhasil diubah"
        ]);
    }
}
