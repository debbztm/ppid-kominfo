@extends('layouts.dashboard')
@section('title', $title)
@section('content')
    <div class="row mb-5">
        <div class="col-md-12" id="boxTable">
            <div class="card">
                <div class="card-header">
                    <div class="card-header-left">
                        <h5 class="text-uppercase title">Link Terkait</h5>
                    </div>
                    <div class="card-header-right">
                        <button class="btn btn-mini btn-info mr-1" onclick="return refreshData();">Refresh</button>
                        <button class="btn btn-mini btn-primary" onclick="return addData();">Tambah</button>
                    </div>
                </div>
                <div class="card-block">
                    <div class="table-responsive mt-3">
                        <table class="table table-striped table-bordered nowrap dataTable" id="linkTable">
                            <thead>
                                <tr>
                                    <th class="all">#</th>
                                    <th class="all">Judul</th>
                                    <th class="all">Url Link</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="3" class="text-center"><small>Tidak Ada Data</small></td>
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
                        <h5>Tambah / Edit</h5>
                    </div>
                    <div class="card-header-right">
                        <button class="btn btn-sm btn-warning" onclick="return closeForm(this)" id="btnCloseForm">
                            <i class="ion-android-close"></i>
                        </button>
                    </div>
                </div>
                <div class="card-block">
                    <form>
                        <input class="form-control" id="id" type="hidden" name="id" />
                        <div class="form-group">
                            <label for="title">Judul</label>
                            <input class="form-control" id="title" type="text" name="title"
                                placeholder="judul link" required />
                        </div>
                        <div class="form-group">
                            <label for="url">Url Link</label>
                            <input class="form-control" id="url" type="text" name="url"
                                placeholder="masukan link" required />
                            <small class="text-danger">contoh: www.jatengprov.go.id</small>
                        </div>
                        <div class="form-group">
                            <label for="image">Upload Gambar</label>
                            <input class="form-control" id="image" type="file" name="image"
                                placeholder="upload gambar" required />
                            <span class="text-danger">Max ukuran 200KB </span>
                        </div>
                        <div class="form-group" id="image-preview">

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
            const url = "/api/admin/link/datatable";
            dTable = $('#linkTable').DataTable({
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
                    width: "100px",
                }, {
                    data: 'title',
                }, {
                    data: 'url'
                }],
                pageLength: 10,
            });
        }

        function refreshData() {
            dTable.ajax.reload(null, false);
            $("#image-preview").empty();
        }

        function addData() {
            $("#formEditable").attr('data-action', 'add').fadeIn(200);
            $("#boxTable").removeClass("col-md-12").addClass("col-md-8");
            $("#title").focus();
            $("#image").attr("required", true);
            $("#image-preview").empty();
        }

        function closeForm() {
            $("#image-preview").empty();
            $("#formEditable").slideUp(200, function() {
                $("#boxTable").removeClass("col-md-8").addClass("col-md-12");
                $("#reset").click();
                $("#image").attr("required", true);
            })
        }

        function getData(id) {
            $.ajax({
                url: `/api/admin/link/${id}/detail`,
                method: "GET",
                dataType: "json",
                success: function(response) {
                    $("#image-preview").empty();
                    $("#formEditable").attr("data-action", "update").fadeIn(200, function() {
                        let d = response.data;
                        $("#boxTable").removeClass("col-md-12").addClass("col-md-8");
                        $("#image").removeAttr("required");
                        $("#id").val(d.id);
                        $("#title").val(d.title);
                        $("#url").val(d.url);
                        $("#image-preview").append(d.image);
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

            let formData = new FormData()
            formData.append("id", parseInt($("#id").val()));
            formData.append("title", $("#title").val());
            formData.append("image", image);
            formData.append("url", $("#url").val());

            saveData(formData, $("#formEditable").attr("data-action"));
            return false;
        });

        function saveData(data, action) {
            $.ajax({
                url: action == "update" ? "/api/admin/link/update" : "/api/admin/link/create",
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
                    console.log('error :', err);
                    showMessage('danger', 'flaticon-error', 'Peringatan', err.message || err.responseJSON
                        ?.message);
                }
            })
        }

        function removeData(id) {
            let c = confirm("Anda yakin ingin menghapus data ini ?")
            if (c) {
                $.ajax({
                    url: '/api/admin/link',
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
