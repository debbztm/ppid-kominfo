@extends('layouts.dashboard')
@section('title', $title)
@section('content')
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
                        <div class="form-group">
                            <label for="description">Dekripsi</label>
                            <div id="summernote" name="description"></div>
                        </div>
                        <div class="form-group" id="image-preview">

                        </div>
                        <div class="form-group">
                            <label for="image">Upload Gambar</label>
                            <input class="form-control" id="image" type="file" name="image"
                                placeholder="upload gambar" />
                            <span class="text-danger">Max ukuran 1MB. (giv,svg,jpeg,png,jpg)</span>
                        </div>
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

        $(function() {
            getData()
        })

        function getData() {
            $.ajax({
                url: `/api/admin/hall-profile/detail`,
                method: 'GET',
                dataType: "JSON",
                success: function(res) {
                    let d = res.data
                    $("#image-preview").empty();
                    $("#id").val(d.id);
                    $("#summernote").summernote('code', d.profile);
                    $("#image-preview").append(d.image);
                },
                error: function(err) {
                    console.log('error:', err)
                }
            })
        }


        $("#formOption").submit(function(e) {
            e.preventDefault()
            let image = document.getElementById("image").files[0];

            let formData = new FormData();
            formData.append("id", parseInt($("#id").val()));
            formData.append("profile", $("#summernote").summernote('code'));
            formData.append("image", image);
            createAndUpdate(formData);
            return false;
        });

        function createAndUpdate(data) {
            $.ajax({
                url: "/api/admin/hall-profile/update-profile",
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
