@extends('layouts.dashboard')
@section('title', $title)
@push('styles')
    <script src="https://unpkg.com/feather-icons"></script>
    <style>
        .input-row {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-evenly;
            padding: 5px;
        }

        .toggle_status {
            position: relative;
            width: 60px;
            height: 34px;
            display: inline-block;
        }

        .toggle_status .slider {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            transition: 0.4s;
            border-radius: 34px;
        }

        .toggle_status .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: 0.4s;
            border-radius: 50%;
            box-shadow: 0px 0px 5px 2px rgba(0, 0, 0, 0.05);
        }

        .toggle_status .slider {
            background-color: #e3eefa;
        }

        .toggle_status.on .slider {
            background-color: #4287f5;
        }

        .toggle_status.on .slider:before {
            transform: translateX(26px);
            box-shadow: 0px 0px 5px 2px rgba(0, 0, 0, 0.2);
        }


        .toggle_status input {
            height: 100%;
            width: 100%;
            opacity: 0;
            position: absolute;
            z-index: 100;
            cursor: pointer;
            vertical-align: middle;
        }
    </style>
@endpush

@section('content')
    <div class="row mb-5">
        <div class="col-md-12" id="boxTable">
            <div class="card">
                <div class="card-header">
                    <div class="card-header-left">
                        <h5 class="text-uppercase title">Slide</h5>
                        <span>Daftar Image Slide</span>

                    </div>
                    <div class="card-header-right"><button class="btn btn-mini btn-info mr-1"
                            onclick="return refreshData();">Refresh</button><button class="btn btn-mini btn-primary"
                            onclick="return addData();">Tambah Slide</button></div>
                </div>
                <div class="card-block">
                    <div class="table-responsive mt-3">
                        <table class="table table-striped table-bordered nowrap dataTable" id="slideTable">
                            <thead>
                                <tr>
                                    <th class="all">#</th>
                                    <th class="all">Nama Slide</th>
                                    <th class="all">Gambar</th>
                                    <th class="all">Urutan</th>
                                    <th class="all">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="4" class="text-center"><small>Tidak Ada Data</small></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12" style="display: none" data-action="update" id="formEditable">
            <div class="card">
                <div class="card-header">
                    <div class="card-header-left">
                        <h5>Tambah / Edit Slide</h5>
                    </div>
                    <div class="card-header-right">
                        <button class="btn btn-sm btn-warning" onclick="return closeForm(this)" id="btnCloseForm">
                            <i class="ion-android-close"></i>
                        </button>
                    </div>
                </div>
                <div class="card-block">
                    <form>
                        <input class="form-control" id="id" type="hidden" name="id" required />
                        <div class="form-group">
                            <label for="title">Judul</label>
                            <input class="form-control" id="title" type="text" name="title" placeholder="judul"
                                required />
                        </div>
                        <div class="form-group">
                            <label for="order">Urutan</label>
                            <input class="form-control" id="order" type="number" name="order" placeholder="urutan"
                                required />
                        </div>
                        <div class="form-group">
                            <label for="title">Link</label>
                            <input class="form-control" id="link" type="text" name="link" placeholder="link" />
                        </div>
                        <div class="form-group">
                            <label for="image">Gambar</label>
                            <input class="form-control" id="image" type="file" name="image"
                                placeholder="upload gambar" required />
                        </div>
                        <div class="form-group">
                            <label for="is_publish">Status</label>
                            <select class="form-control" id="is_publish" name="is_publish" required>
                                <option value="Y">Publish</option>
                                <option value="N">Draft</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-sm btn-primary" type="submit">
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
            dataTable();
        });

        function dataTable() {
            const url = "/api/admin/slide/datatable";
            dTable = $('#slideTable').DataTable({
                searching: true,
                ordering: true,
                lengthChange: true,
                responsive: true,
                processing: true,
                serverSide: true,
                searchDelay: 1000,
                paging: true,
                lengthMenu: [5, 10, 25, 50, 100],
                ajax: url,
                columns: [{
                    data: 'action',
                }, {
                    data: 'title',
                },{
                    data: 'image',
                }, {
                    data: 'order',
                }, {
                    data: 'is_publish'
                }],
                pageLength: 10,
            });
        }

        function refreshData() {
            dTable.ajax.reload(null, false);
        }

        function addData() {
            $("#formEditable").attr('data-action', 'add').fadeIn(200);
            $("#boxTable").removeClass("col-md-12").addClass("col-md-8");
            $("#title").focus();
        }

        function closeForm() {
            $("#formEditable").slideUp(200, function() {
                $("#boxTable").removeClass("col-md-8").addClass("col-md-12");
                $("#reset").click();
            })
        }

        function getData(id) {
            $.ajax({
                url: `/api/admin/slide/${id}/detail`,
                method: "GET",
                dataType: "json",
                success: function(response) {
                    $("#formEditable").attr("data-action", "update").fadeIn(200, function() {
                        $(this).attr('data-action', 'update');
                        $("#boxTable").removeClass("col-md-12").addClass("col-md-8");
                        let d = response.data;
                        $("#image").removeAttr("required");
                        $("#id").val(d.id);
                        $("#title").val(d.title);
                        $("#order").val(d.order);
                        $("#link").val(d.link);
                        $("#is_publish").val(d.is_publish);
                    })
                },
                error: function(err) {
                    console.log("error :", err);
                    showMessage("warning", "flaticon-error", "Peringatan", err.message || err.responseJSON
                        ?.message);
                }
            })
        }

        $("#formEditable form").submit(function(e) {
            e.preventDefault();
            let image = document.getElementById("image").files[0];

            let dataToSend = new FormData()
            dataToSend.append("id", $("#id").val());
            dataToSend.append("title", $("#title").val());
            dataToSend.append("order", $("#order").val());
            dataToSend.append("image", image);
            dataToSend.append("link", $("#link").val());
            dataToSend.append("is_publish", $("#is_publish").val());

            // dataToSend.forEach(function(value, key) {
            //     console.log(key + ": " + value);
            // });
            saveData(dataToSend, $("#formEditable").attr("data-action"));
            return false;
        });

        function updateStatus(id, status) {
            let c = confirm(`Anda yakin ingin mengubah status ke ${status} ?`)
            if (c) {
                let dataToSend = new FormData();
                dataToSend.append("is_publish", status == "Draft" ? "N" : "Y");
                dataToSend.append("id", id);
                saveData(dataToSend, "update");
            }
        }

        function saveData(data, action) {
            $.ajax({
                url: action == "update" ? "/api/admin/slide/update" : "/api/admin/slide/create",
                contentType: false,
                processData: false,
                method: "POST",
                data: data,
                beforeSend: function() {
                    console.log("Loadig...")
                },
                success: function(data) {
                    closeForm();
                    dTable.ajax.reload(null, false);
                    $("#image").attr("required", true);
                    showMessage('success', 'flaticon-alarm-1', 'Sukses', data.message);
                },
                error: function(err) {
                    console.log('error', err);
                    showMessage('danger', 'flaticon-error', 'Peringatan', err.message || err.responseJSON
                        ?.message);
                }
            })
        }

        function removeData(id) {
            let c = confirm("Anda yakin ingin menghapus data ini ?")
            if(c){
                $.ajax({
                    url: '/api/admin/slide',
                    data: {
                        id: id,
                    },
                    method: "DELETE",
                    beforeSend: function() {
                        console.log("Loading...")
                    },
                    success: function(data) {
                        dTable.ajax.reload(null, false);
                        showMessage("success", "flaticon-alarm-1", "Sukses", data.message);
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
