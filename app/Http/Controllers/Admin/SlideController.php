<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MaSlide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SlideController extends Controller
{
    public function index()
    {
        $title = "Slide";
        return view("pages.admin.slide", compact("title"));
    }

    public function create(Request $request)
    {
        try {
            $data = $request->all();
            $data['image'] = $request->file('image')->store('assets/slide', 'public');
            MaSlide::create($data);
            //  echo "<pre>" . var_dump($request->image->hashName()) . "</pre>";

            return response()->json([
                "status" => "success",
                "message" => "Data slide berhasil disimpan"
            ]);
        } catch (\Exception $err) {
            if ($request->file('image')) {
                unlink(public_path('storage/assets/slide/' . $request->image->hashName()));
            }
            return response()->json([
                "status" => "error",
                "message" => $err->getMessage()
            ], 500);
        }
    }

    public function getDetail($id)
    {
        try {
            $slide = MaSlide::findOrFail($id);
            return response()->json([
                "status" => "success",
                "data" => $slide
            ]);
        } catch (\Exception $err) {
            return response()->json([
                "status" => "error",
                "message" => "Data tidak ditemukan"
            ], 404);
        }
    }

    public function update(Request $request)
    {
        try {
            $data = $request->all();
            $slide = MaSlide::find($data['id']);


            if (!$slide) {
                return response()->json([
                    "status" => "error",
                    "message" => "Data slide tidak ditemukan"
                ], 404);
            }

            // delete undefined data image
            unset($data["image"]);
            if ($request->file('image')) {
                unlink(public_path('storage/' . $slide->image));
                $data['image'] = $request->file('image')->store('assets/slide', 'public');
            }

            $slide->update($data);
            return response()->json([
                "status" => "success",
                "message" => "Data slide berhasil diperbarui"
            ]);
        } catch (\Exception $err) {
            if ($request->file('image')) {
                unlink(public_path('storage/assets/slide/' . $request->image->hashName()));
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
            $id = $request->id;
            $slide = MaSlide::find($id);
            if (!$slide) {
                return response()->json([
                    "status" => "error",
                    "message" => "Data slide tidak ditemukan"
                ], 404);
            }

            unlink(public_path('storage/' . $slide->image));
            $slide->delete();
            return response()->json([
                "status" => "success",
                "message" => "Data slide berhasil dihapus"
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
        $query = MaSlide::query();

        if ($request->query("search")) {
            $searchValue = $request->query("search")['value'];
            $query->where(function ($query) use ($searchValue) {
                $query->where('title', 'like', '%' . $searchValue . '%');
            });
        }

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
                                <a class='dropdown-item' onclick='return removeData(\"{$item->id}\");' href='javascript:void(0)' title='Remove'>Hapus</a>
                            </div>
                        </div>";

            $is_publish = $item->is_publish == 'Y' ? '
                <div class="text-center">
                    <span class="label-switch">Publish</span>
                </div>
                <div class="input-row">
                    <div class="toggle_status on">
                        <input type="checkbox" onclick="return updateStatus(\'' . $item->id . '\', \'Draft\');" />
                        <span class="slider"></span>
                    </div>
                </div>' :
                '
                <div class="text-center">
                    <span class="label-switch">Draft</span>
                </div>
                <div class="input-row">
                    <div class="toggle_status off">
                        <input type="checkbox" onclick="return updateStatus(\'' . $item->id . '\', \'Publish\');" />
                        <span class="slider"></span>
                    </div>
                </div>';
            $image = '<div class="thumbnail">
                        <div class="thumb">
                            <img src="' . Storage::url($item->image) . '" alt="" width="300px" height="300px" 
                            class="img-fluid img-thumbnail" alt="' . $item->title . '">
                        </div>
                    </div>';
            $item['action'] = $action;
            $item['is_publish'] = $is_publish;
            $item['image'] = $image;
            return $item;
        });

        $total = MaSlide::count();
        return response()->json([
            'draw' => $request->query('draw'),
            'recordsFiltered' => $total,
            'recordsTotal' => $total,
            'data' => $output,
        ]);
    }
}
