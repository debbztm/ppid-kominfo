@extends('layouts.dashboard')
@section('title', $title)
@section('content')
    @php
        $routename = request()
            ->route()
            ->getName();
    @endphp
    <div class="row mb-5">
        <div class="col-md-12" id="boxTable">
            <div class="card card-with-nav">
                <div class="card-header">
                    <div class="card-header-left my-3">
                        <h5 class="text-uppercase title">{{ $title }}</h5>
                    </div>

                </div>
                <div class="card-body">
                    <form id="formOption" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="title" id="title">
                        <input type="hidden" name="type" id="type">
                        <div class="form-group">
                            <label for="description">Dekripsi</label>
                            <div id="summernote" name="description"></div>
                        </div>
                        @if ($routename == 'official' || $routename == 'organization')
                            <div class="form-group">
                                <label for="file">File</label>
                                <input class="form-control" id="file" type="file" name="file"
                                    placeholder="upload gambar" />
                                <small class="text-danger">JPG/PDF/DOC Max. 10 Mb</small>
                            </div>
                        @endif
                        <div class="text-right mt-3 mb-3">
                            <button class="btn btn-success" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('js/plugin/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $('#summernote').summernote({
            placeholder: 'masukkan deskripsi',
            fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New'],
            tabsize: 2,
            height: 300
        });

        let route = "{{ $routename }}"
        $(function() {
            getData()
        })

        function getData() {
            $.ajax({
                url: `/api/admin/profile/detail?type=${route}`,
                method: 'GET',
                dataType: "JSON",
                success: function(res) {
                    let d = res.data
                    $("#id").val(d.id);
                    $("#title").val(d.title);
                    $("#type").val(d.type);
                    $("#summernote").summernote('code', d.value);
                },
                error: function(err) {
                    console.log('error:', err)
                }
            })
        }


        $("#formOption").submit(function(e) {
            e.preventDefault()
            let title
            if (route == "profile") {
                title = "Profile"
            } else if (route == "history") {
                title = "Sejarah Dinas"
            } else if (route == "vision") {
                title = "Visi Misi"
            } else if (route == "tupoksi") {
                title = "Tupoksi"
            } else if (route == "organization") {
                title = "Organisasi"
            } else if (route == "official") {
                title = "Profile Pejabat"
            }
            let formData = new FormData();
            formData.append("id", parseInt($("#id").val()));
            formData.append("title", title);
            formData.append("value", $("#summernote").summernote('code'));
            formData.append("type", route);

            if (route == "organization" || route == "official") {
                let file = document.getElementById("file").files[0];
                formData.append("file", file);
            }

            if ($("#id").val()) {
                formData.append("action", "update");
            } else {
                formData.append("action", "create");
            }

            createAndUpdate(formData);
            return false;
        });

        function createAndUpdate(data) {
            $.ajax({
                url: "/api/admin/profile/create-update",
                contentType: false,
                processData: false,
                method: "POST",
                data: data,
                beforeSend: function() {
                    console.log("Loading...")
                },
                success: function(res) {
                    console.log("response :", res)
                    getData()
                    showMessage("success", "flaticon-alarm-1", "Sukses", res.message);
                },
                error: function(err) {
                    console.log("error :", err)
                    showMessage("danger", "flaticon-error", "Peringatan", err.message || err.responseJSON
                        ?.message)
                }
            })
        }
    </script>
@endpush
