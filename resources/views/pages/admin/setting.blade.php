@extends('layouts.dashboard')
@section('title', $title)
@push('styles')
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
            <div class="card card-with-nav">
                <div class="card-header">
                    <div class="card-header-left my-3">
                        <h5 class="text-uppercase title">Setting</h5>
                    </div>
                    <div class="row row-nav-line">
                        <ul class="nav nav-tabs nav-line nav-color-secondary w-100 pl-3" role="tablist">
                            <li class="nav-item submenu">
                                <a class="nav-link active" data-toggle="tab" href="#webinfo" role="tab" id="tabInfo"
                                    aria-selected="false">Info Website</a>
                            </li>
                            <li class="nav-item submenu">
                                <a class="nav-link show" data-toggle="tab" href="#profile" role="tab" id="tabProfile"
                                    aria-selected="true">Profile</a>
                            </li>
                            <li class="nav-item submenu">
                                <a class="nav-link" data-toggle="tab" href="#sosmed" role="tab" id="tabSosmed"
                                    aria-selected="false">Sosial Media</a>
                            </li>
                            <li class="nav-item submenu">
                                <a class="nav-link" data-toggle="tab" href="#image" role="tab" id="tabImage"
                                    aria-selected="false">Image</a>
                            </li>
                            <li class="nav-item submenu">
                                <a class="nav-link" data-toggle="tab" href="#maps" role="tab" id="tabMaps"
                                    aria-selected="false">Maps</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <form id="formSetting" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id">
                        <div class="tab-pane active" id="webinfo" (role="tabpanel")>

                        </div>
                        <div class="tab-pane" id="profile">

                        </div>
                        <div class="tab-pane" id="sosmed">

                        </div>
                        <div class="tab-pane" id="image">

                        </div>
                        <div class="tab-pane" id="maps">

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
    <script src="{{ asset('js/plugin/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('js/plugin/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('js/plugin/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $(function() {
            $("#webinfo").load("/admin/setting/webinfo", function() {
                initializeTagsInput();
                getData();
            })
            $("#profile").load("/admin/setting/profile", function() {
                $('#summernote').summernote({
                    placeholder: 'masukkan deskripsi profile',
                    fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New'],
                    tabsize: 2,
                    height: 300
                });
            })
            $("#sosmed").load("/admin/setting/sosmed")
            $("#image").load("/admin/setting/image")
            $("#maps").load("/admin/setting/maps")

            $(".tab-pane").hide()
            $("#webinfo").show()

            $("#tabInfo").click(function() {
                showTab("webinfo")
            })

            $("#tabProfile").click(function() {
                showTab("profile")
            })

            $("#tabSosmed").click(function() {
                showTab("sosmed")
            })

            $("#tabImage").click(function() {
                showTab("image")
            })

            $("#tabMaps").click(function() {
                showTab("maps")
            })
        })

        $("#formSetting").submit(function(e) {
            e.preventDefault()
            let web_logo = document.getElementById("web_logo").files[0];

            let formData = new FormData();
            formData.append("id", parseInt($("#id").val()));
            formData.append("web_name", $("#web_name").val());
            formData.append("web_phone", $("#web_phone").val());
            formData.append("web_description", $("#web_description").val());
            formData.append("web_email", $("#web_email").val());
            formData.append("web_address", $("#web_address").val());
            formData.append("is_online", $("#is_online").val());
            formData.append("web_tag", $("#web_tag").val());
            formData.append("about", $("#summernote").summernote('code'));
            formData.append("facebook", $("#facebook").val());
            formData.append("twitter", $("#twitter").val());
            formData.append("instagram", $("#instagram").val());
            formData.append("youtube", $("#youtube").val());
            formData.append("web_logo", web_logo);
            formData.append("maps_location", $("#maps_location").val());

            if ($("#id").val()) {
                formData.append("action", "update");
            } else {
                formData.append("action", "create");
            }

            // formData.forEach(function(value, key) {
            //     console.log(key + ": " + value);
            // });

            createAndUpdate(formData);
            return false;
        });

        function showTab(tabName) {
            $(".tab-pane").hide();
            $('#' + tabName).show();
        }

        function initializeTagsInput() {
            $('#web_tag').tagsinput({
                trimValue: true, // memotong spasi dari tag
                allowDuplicates: false // tidak mengizinkan duplikat tag
            });
        }

        function getData() {
            $.ajax({
                url: "/api/admin/setting/detail",
                dataType: "json",
                success: function(data) {
                    $("#web_tag").tagsinput("removeAll");
                    let d = data.data;
                    $("#id").val(d.id);
                    $("#web_name").val(d.web_name);
                    $("#web_phone").val(d.web_phone);
                    $("#web_description").val(d.web_description);
                    $("#web_email").val(d.web_email);
                    $("#web_address").val(d.web_address);
                    $("#is_online").val(d.is_online);
                    $("#web_tag").tagsinput("add", d.web_tag);
                    $("#summernote").summernote('code', d.about);
                    $("#facebook").val(d.facebook);
                    $("#twitter").val(d.twitter);
                    $("#instagram").val(d.instagram);
                    $("#youtube").val(d.youtube);
                    $("#maps_location").val(d.maps_location);
                    if (d.maps_location && d.maps_preview) {
                        $("#maps_preview").empty().append(d.maps_preview);
                    }

                    if (d.web_logo && d.image_preview) {
                        $("#image_preview").empty().append(d.image_preview);
                    }
                },
                error: function(err) {
                    console.log("error :", err)
                }

            })
        }

        function createAndUpdate(data) {
            $.ajax({
                url: "/api/admin/setting/create-update",
                contentType: false,
                processData: false,
                method: "POST",
                data: data,
                beforeSend: function() {
                    console.log("Loading...")
                },
                success: function(res) {
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
