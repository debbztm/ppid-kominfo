@extends('layouts.dashboard')
@section('title', $title)
@push('styles')
    <style>
        .image-wrapper {
            position: relative !important;
            max-width: 300px;
            height: 300px;
        }

        .image-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .delete-button {
            position: absolute;
            top: 10px;
            right: 10px;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #767676;
            box-sizing: border-box;
        }

        .delete-button i {
            color: white;
        }
    </style>
@endpush
@section('content')
    <div class="row mb-5">
        <div class="col-md-12" id="boxTable">
            <div class="card">
                <div class="card-header">
                    <div class="card-header-left">
                        <h5 class="text-uppercase title">Infografis</h5>
                    </div>
                    <div class="card-header-right">
                        <button class="btn btn-mini btn-info mr-1" onclick="return refreshData();">Refresh</button>
                        <button class="btn btn-mini btn-primary" onclick="return addData();">Tambah Data</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row" id="imageGallery">

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12" style="display: none" data-action="update" id="formEditable">
            <div class="card">
                <div class="card-header">
                    <div class="card-header-left">
                        <h5>Tambah</h5>
                    </div>
                    <div class="card-header-right">
                        <button class="btn btn-sm btn-warning" onclick="return closeForm(this)" id="btnCloseForm">
                            <i class="ion-android-close"></i>
                        </button>
                    </div>
                </div>
                <div class="card-block">
                    <form>
                        <div class="form-group">
                            <label for="image">Gambar</label>
                            <input class="form-control" id="image" type="file" name="image"
                                placeholder="upload gambar" required />
                            <small class="text-danger">Max ukuran 1MB</small>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-sm btn-primary" type="submit" id="submit">
                                <i class="ti-save"></i><span>Simpan</span>
                            </button>
                            <button class="btn btn-sm btn-default" id="reset" type="reset"
                                style="margin-left : 10px;"><span>Reset</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('js/plugin/datatables/datatables.min.js') }}"></script>
    <script>
        let dTable = null;

        $(function() {
            dataList();
        })

        function refreshData() {
            dataList();
        }

        function dataList() {
            $.ajax({
                url: "/api/admin/infographic/list",
                header: {
                    "Content-Type": "application/json",
                },
                method: "GET",
                success: function(res) {
                    $("#imageGallery").empty();
                    $.each(res.data, function(index, item) {
                        console.log("data :", item.image)
                        $("#imageGallery").append(item.image);
                    });
                },
                error: function(err) {
                    console.log("error :", err);
                    showMessage("warning", "flaticon-danger", "Peringatan", err.message || err.responseJSON
                        ?.message);
                    $("#imageGallery").empty();
                }

            })
        }


        function addData() {
            $("#formEditable").attr('data-action', 'add').fadeIn(200);
            $("#boxTable").removeClass("col-md-12").addClass("col-md-8");
        }

        function closeForm() {
            $("#formEditable").slideUp(200, function() {
                $("#boxTable").removeClass("col-md-8").addClass("col-md-12");
                $("#reset").click();
            })
        }



        $("#formEditable form").submit(function(e) {
            e.preventDefault();
            let formData = new FormData();
            formData.append("image", document.getElementById("image").files[0]);
            saveData(formData);
            return false;
        });


        function saveData(data, action) {
            $.ajax({
                url: "/api/admin/infographic/create",
                contentType: false,
                processData: false,
                method: "POST",
                data: data,
                beforeSend: function() {
                    console.log("Loading...")
                },
                success: function(res) {
                    closeForm();
                    showMessage("success", "flaticon-alarm-1", "Sukses", res.message);
                    refreshData();
                },
                error: function(err) {
                    console.log("error :", err);
                    showMessage("danger", "flaticon-error", "Peringatan", err.message || err.responseJSON
                        ?.message);
                }
            })
        }

        function removeData(id) {
            let c = confirm("Apakah anda yakin untuk menghapus data ini ?");
            if (c) {
                $.ajax({
                    url: "/api/admin/infographic",
                    method: "DELETE",
                    data: {
                        id: id
                    },
                    beforeSend: function() {
                        console.log("Loading...")
                    },
                    success: function(res) {
                        refreshData();
                        showMessage("success", "flaticon-alarm-1", "Sukses", res.message);
                    },
                    error: function(err) {
                        console.log("error :", err);
                        showMessage("danger", "flaticon-error", "Peringatan", err.message || err.responseJSON
                            ?.message);
                    }
                })
            }
        }
    </script>
@endpush
