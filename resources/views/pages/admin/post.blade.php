@extends('layouts.dashboard')
@section('title', $title)
@push('styles')
    <link rel="stylesheet" href="{{ asset('/css/toggle-status.css') }}">
    <style>
        .bootstrap-tagsinput {
            min-width: 100%;
            min-height: 100px;
        }
    </style>
@endpush
@section('content')
    <div class="row mb-5">
        <div class="col-md-12" id="boxTable">
            <div class="card">
                <div class="card-header">
                    <div class="card-header-left">
                        <h5 class="text-uppercase title">Berita</h5>
                    </div>
                    <div class="card-header-right">
                        <button class="btn btn-mini btn-info mr-1" onclick="return refreshData();">Refresh</button>
                        <button class="btn btn-mini btn-primary" onclick="return addData();">Tambah Berita</button>
                    </div>
                </div>
                <div class="card-block">
                    <div class="table-responsive mt-3">
                        <table class="table table-striped table-bordered nowrap dataTable" id="newsTable">
                            <thead>
                                <tr>
                                    <th class="all">#</th>
                                    <th class="all">Judul</th>
                                    <th class="all">Status</th>
                                    <th class="all">Gambar</th>
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
        <div class="col-md-7 col-sm-12" style="display: none" data-action="update" id="formEditable">
            <div class="card">
                <div class="card-header">
                    <div class="card-header-left">
                        <h5>Tambah / Edit Berita</h5>
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
                                placeholder="masukkan judul" required />
                        </div>
                        <div class="form-group">
                            <label for="ma_hall_menu_id">Menu</label>
                            <select class="form-control form-control" id="ma_hall_menu_id" name="menu">
                                <option value="">Pilih Menu</option>
                                @foreach ($hall_menus as $menu)
                                    <option value="{{ $menu->id }}">{{ $menu->menu }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="link">Link</label>
                            <input class="form-control" id="link" type="text" name="link"
                                placeholder="masukkan link dengan format https://google.com..." required />
                        </div>
                        <div class="form-group">
                            <label for="phone">WhatsApp</label>
                            <input class="form-control" id="phone" type="text" name="phone"
                                placeholder="masukkan no whatsapp dengan format 628xxxxxxxxxx tanpa spasi atau tanda baca"
                                required />
                        </div>
                        <div class="form-group">
                            <label for="hall_id">Balai</label>
                            <select class="form-control form-control" id="hall_id" name="{{ $hall_id ? '' : 'hall_id' }}"
                                {{ $hall_id ? 'disabled' : '' }}>
                                <option value="">Pilih Balai</option>
                                @foreach ($halls as $hall)
                                    <option value="{{ $hall->id }}" {{ $hall->id == $hall_id ? 'selected' : '' }}>
                                        {{ $hall->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="is_publish">Status</label>
                            <select class="form-control form-control" id="is_publish" name="is_publish" required>
                                <option value = "">Pilih Status</option>
                                <option value="Y">Publish</option>
                                <option value="N">Draft</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="type">Tipe</label>
                            <select class="form-control form-control" id="type" name="type" required>
                                <option value="">Pilih Tipe</option>
                                <option value="1">Berita</option>
                                <option value="2">Balai</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tag_post">Tags</label>
                            <br>
                            <input type="text" id="tag_post" name="tag_post" class="form-control w-100 h-100"
                                data-role="tagsinput">
                        </div>
                        <div class="form-group">
                            <label for="image">Gambar</label>
                            <input class="form-control" id="image" type="file" name="image"
                                placeholder="upload gambar" required />
                            <small class="text-danger">Max ukuran 1MB</small>
                        </div>
                        <div class="form-group">
                            <label for="title">Dekripsi</label>
                            <div id="summernote" name="description"></div>
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
    <script src="{{ asset('js/plugin/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('js/plugin/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $('#summernote').summernote({
            placeholder: 'masukkan deskripsi',
            fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New'],
            tabsize: 2,
            height: 300
        });

        let dTable = null;

        $(function() {
            dataTable();
        })

        function dataTable() {
            const url = "/api/admin/news/datatable";
            dTable = $("#newsTable").DataTable({
                searching: true,
                orderng: true,
                lengthChange: true,
                responsive: true,
                processing: true,
                serverSide: true,
                searchDelay: 1000,
                paging: true,
                lengthMenu: [5, 10, 25, 50, 100],
                ajax: url,
                columns: [{
                    data: "action"
                }, {
                    data: "title"
                }, {
                    data: "is_publish"
                }, {
                    data: "image"
                }],
                pageLength: 10,
            });
        }

        function refreshData() {
            dTable.ajax.reload(null, false);
            $("#summernote").summernote('code', "");
            $("#tag_post").val("");
        }


        function addData() {
            $("#formEditable").attr('data-action', 'add').fadeIn(200);
            $("#boxTable").removeClass("col-md-12").addClass("col-md-5");
            $("#name").focus();
        }

        function closeForm() {
            $("#formEditable").slideUp(200, function() {
                $("#boxTable").removeClass("col-md-5").addClass("col-md-12");
                $("#reset").click();
                $("#tag_post").val("");
                $("#summernote").summernote('code', "");
            })
        }

        function getData(id) {
            $.ajax({
                url: `/api/admin/news/${id}/detail`,
                method: "GET",
                dataType: "json",
                success: function(res) {
                    $("#formEditable").attr("data-action", "update").fadeIn(200, function() {
                        $("#boxTable").removeClass("col-md-12").addClass("col-md-5");
                        let d = res.data;
                        $("#image").removeAttr("required");
                        $("#id").val(d.id);
                        $("#title").val(d.title);
                        $("#ma_hall_menu_id").val(d.ma_hall_menu_id);
                        $("#hall_id").val(d.hall_id);
                        $("#link").val(d.link);
                        $("#phone").val(d.phone);
                        $("#is_publish").val(d.is_publish);
                        $("#type").val(d.type);
                        $("#tag_post").val(d.tag_post);
                        $("#summernote").summernote('code', d.description);
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
            formData.append("title", $("#title").val());
            $("#ma_hall_menu_id").val() != "" && formData.append("ma_hall_menu_id", $("#ma_hall_menu_id").val());
            $("#hall_id").val() != "" && formData.append("hall_id", $("#hall_id").val());
            formData.append('link', $("#link").val());
            formData.append("phone", $("#phone").val());
            formData.append("description", $("#summernote").summernote('code'));
            formData.append("is_publish", $("#is_publish").val());
            formData.append("type", parseInt($("#type").val()));
            formData.append("tag_post", $("#tag_post").val());
            formData.append("image", document.getElementById("image").files[0]);

            // formData.forEach(function(value, key) {
            //     console.log(key + ": " + value);
            // });
            saveData(formData, $("#formEditable").attr("data-action"));
            return false;
        });

        function updateStatus(id, status) {
            let c = confirm(`Anda yakin ingin mengubah status ke ${status} ?`)
            if (c) {
                let dataToSend = new FormData();
                dataToSend.append("is_publish", status == "Draft" ? "N" : "Y");
                dataToSend.append("id", id);
                updateStatusData(dataToSend);
            }
        }

        function saveData(data, action) {
            $.ajax({
                url: action == "update" ? "/api/admin/news/update" : "/api/admin/news/create",
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
                    url: "/api/admin/news",
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

        function updateStatusData(data) {
            $.ajax({
                url: "/api/admin/news/update-status",
                contentType: false,
                processData: false,
                method: "POST",
                data: data,
                beforeSend: function() {
                    console.log("Loading...")
                },
                success: function(res) {
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
    </script>
@endpush
