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
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Permohonan</label>
                                        <input type="number" class="form-control" id="application" name="application"
                                            placeholder="jumlah permohonan">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Dikabulkan</label>
                                        <input type="number" class="form-control" id="granted" name="granted"
                                            placeholder="jumlah dikabulkan">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Ditolak</label>
                                        <input type="number" class="form-control" id="rejected" name="rejected"
                                            placeholder="jumlah ditolak">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Keberatan</label>
                                        <input type="number" class="form-control" id="objected" name="objected"
                                            placeholder="jumlah kebratan">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>IKM</label>
                                        <input type="number" class="form-control" id="ikm" name="ikm"
                                            placeholder="jumlah ikm">
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
            formData.append("application", $("#application").val());
            formData.append("granted", $("#granted").val());
            formData.append("rejected", $("#rejected").val());
            formData.append("objected", $("#objected").val());
            formData.append("ikm", $("#ikm").val());

            createAndUpdate(formData);
            return false;
        });

        function getData() {
            $.ajax({
                url: "/api/admin/count-information/detail",
                dataType: "json",
                success: function(data) {
                    let d = data.data;
                    $("#id").val(d.id);
                    $("#application").val(d.application);
                    $("#granted").val(d.granted);
                    $("#rejected").val(d.rejected);
                    $("#objected").val(d.objected);
                    $("#ikm").val(d.ikm);

                },
                error: function(err) {
                    console.log("error :", err)
                }

            })
        }

        function createAndUpdate(data) {
            $.ajax({
                url: "/api/admin/count-information/create-update",
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
