@extends('layouts.dashboard')
@section('title', $title)
@push('styles')
    <link rel="stylesheet" href="{{ asset('/css/toggle-status.css') }}">
@endpush
@section('content')
    <div class="row mb-5">
        <div class="col-md-12" id="boxTable">
            <div class="card">
                <div class="card-header">
                    <div class="card-header-left">
                        <h5 class="text-uppercase title">File Regulasi</h5>
                    </div>
                    <div class="card-header-right">
                        <button class="btn btn-mini btn-warning mr-1" onclick="return back();">Kembali</button>
                        <button class="btn btn-mini btn-info mr-1" onclick="return refreshData();">Refresh</button>
                        <button class="btn btn-mini btn-primary" onclick="return addData();">Tambah Data</button>
                    </div>
                </div>
                <div class="card-block">
                    <div class="table-responsive mt-3">
                        <table class="table table-striped table-bordered nowrap dataTable" id="regulationFileTable">
                            <thead>
                                <tr>
                                    <th class="all">#</th>
                                    <th class="all">Judul</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="2" class="text-center"><small>Tidak Ada Data</small></td>
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
                        <h5>Tambah / Edit Data</h5>
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
                                placeholder="masukkan judul regulasi" required />
                        </div>
                        <div class="form-group">
                            <label for="description">Deskripsi File</label>
                            <textarea class="form-control" id="description" type="text" name="description" placeholder="masukkan deskripsi file"
                                required cols="30" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="file">File Regulasi</label>
                            <input class="form-control" id="file" type="file" name="file"
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
        let url = new URL(window.location.href);
        let path = url.pathname;
        let pathSegments = path.split('/');
        let regulation_id = pathSegments[pathSegments.length - 2];
        $(function() {
            dataTable(regulation_id);
        })

        function refreshData() {
            dTable.ajax.reload(null, false);
        }

        function back() {
            window.location.href = "{{ route('regulation') }}"
        }

        function dataTable(regulation_id) {
            const url = `/api/admin/regulation-file/${regulation_id}/datatable`;
            dTable = $("#regulationFileTable").DataTable({
                searching: true,
                orderng: true,
                lengthChange: true,
                responsive: true,
                processing: true,
                serverSide: true,
                searchDelay: 1000,
                paging: true,
                lengthMenu: [5, 10, 25, 50, 100],
                ajax: {
                    url,
                    error: function(err) {
                        console.log("error :", err);
                        showMessage("warning", "flaticon-error", "Peringatan", err.message || err.responseJSON
                            ?.message);
                    }
                },
                columns: [{
                    data: "action",
                    width: "100px"
                }, {
                    data: "title"
                }],
                pageLength: 10,
            });
        }

        function addData() {
            $("#formEditable").attr('data-action', 'add').fadeIn(200);
            $("#boxTable").removeClass("col-md-12").addClass("col-md-8");
            $("#title").focus();
            $("#file").attr("required", true);
        }

        function closeForm() {
            $("#formEditable").slideUp(200, function() {
                $("#boxTable").removeClass("col-md-8").addClass("col-md-12");
                $("#reset").click();
                $("#file").attr("required", true);
            })
        }

        function getData(id) {
            $.ajax({
                url: `/api/admin/regulation-file/${id}/detail`,
                method: "GET",
                dataType: "json",
                success: function(res) {
                    $("#formEditable").attr("data-action", "update").fadeIn(200, function() {
                        $("#boxTable").removeClass("col-md-12").addClass("col-md-8");
                        let d = res.data;
                        $("#id").val(d.id);
                        $("#title").val(d.title);
                        $("#description").val(d.description);
                        $("#file").removeAttr("required");
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
            let formData = new FormData();
            formData.append("id", parseInt($("#id").val()));
            formData.append("ma_regulation_id", regulation_id);
            formData.append("title", $("#title").val());
            formData.append("description", $("#description").val());
            formData.append("file", document.getElementById("file").files[0]);

            saveData(formData, $("#formEditable").attr("data-action"));
            return false;
        });

        function saveData(data, action) {
            $.ajax({
                url: action == "update" ? "/api/admin/regulation-file/update" : "/api/admin/regulation-file/create",
                contentType: false,
                processData: false,
                method: "POST",
                data: data,
                beforeSend: function() {
                    console.log("Loading...")
                },
                success: function(res) {
                    closeForm();
                    $("#image").attr("required", true);
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
                    url: "/api/admin/regulation-file",
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
