<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MaPolling;
use Illuminate\Http\Request;

class PollingController extends Controller
{
    // FOR FRONTEND
    public function homePolling()
    {
        $title = "Jejak Pendapat - Dinas Energi dan Sumber Daya Mineral Provinsi Jawa Tengah";
        $titlePage = "Hasil Jejak Pendapat";
        $polling = MaPolling::first();
        return view("pages.front.polling", compact("title",'titlePage', "polling"));
    }

    //HANDLER API
    public function update(Request $request)
    {
        try {
            $data = $request->all();
            $polling = MaPolling::first();
            if (!$polling) {
                return response()->json([
                    "status" => "error",
                    "message" => "Data not found"
                ]);
            }

            $updatedData = array();
            if ($data['vote'] == "1") {
                $updatedData['vote1'] = $polling->vote1 + 1;
            } else if ($data['vote'] == "2") {
                $updatedData['vote2'] = $polling->vote2 + 1;
            } else if ($data['vote'] == "3") {
                $updatedData['vote3'] = $polling->vote3 + 1;
            } else if ($data['vote'] == "4") {
                $updatedData['vote4'] = $polling->vote4 + 1;
            }

            $polling->update($updatedData);
            return response()->json([
                "status" => "success",
                "message" => "Success create survey"
            ]);
        } catch (\Throwable $err) {
            return response()->json([
                "status" => "error",
                "message" => $err->getMessage(),
                "data" => $request->all()
            ], 500);
        }
    }
}
