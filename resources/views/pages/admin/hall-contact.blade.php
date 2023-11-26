@extends('layouts.dashboard')
@section('title', $title)
@section('content')
    <div class="row mb-5">
        <div class="col-md-12" id="boxTable">
            <div class="card card-with-nav">
                <div class="card-header">
                    <div class="card-header-left my-3">
                        <h5 class="text-uppercase title">Jumlah Informasi</h5>
                    </div>
                </div>
                <div class="card-body">
                    <form id="formCountInformation">
                        <input type="hidden" name="id" id="id">
                        <div class="tab-pane active" id="countinformation" (role="tabpanel")>
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <div class="form-group form-group-default">
                                        <label>Telpon</label>
                                        <input type="text" class="form-control" id="phone" name="phone"
                                            placeholder="telpon" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-group-default">
                                        <label>Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="email" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-group-default">
                                        <label>WhatsApp</label>
                                        <input type="text" class="form-control" id="whatsapp" name="whatsapp"
                                            placeholder="whatsapp" required>
                                    </div>
                                </div>
                            </div>
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
    <script>
        $(function() {
            getData()
        })

        $("#formCountInformation").submit(function(e) {
            e.preventDefault()

            let formData = new FormData();
            formData.append("id", parseInt($("#id").val()));
            formData.append("phone", $("#phone").val());
            formData.append("email", $("#email").val());
            formData.append("whatsapp", $("#whatsapp").val());

            createAndUpdate(formData);
            return false;
        });

        function getData() {
            $.ajax({
                url: "/api/admin/hall-profile/detail",
                dataType: "json",
                success: function(data) {
                    let d = data.data;
                    $("#id").val(d.id);
                    $("#phone").val(d.phone);
                    $("#email").val(d.email);
                    $("#whatsapp").val(d.whatsapp);
                },
                error: function(err) {
                    console.log("error :", err)
                }

            })
        }

        function createAndUpdate(data) {
            $.ajax({
                url: "/api/admin/hall-profile/update-contact",
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
