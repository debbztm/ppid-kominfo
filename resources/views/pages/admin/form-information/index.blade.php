@extends('layouts.dashboard')
@section('title', $title)
@section('content')
    <div class="row mb-5">
        <div class="col-md-12" id="boxTable">
            <ul class="nav nav-tabs md-tabs" role="tablist">
                <li class="nav-item"><a class="nav-link active text-uppercase" id="tabRequest" data-toggle="tab" href="#request"
                        role="tab">Permohonan</a>
                    <div class="slide"></div>
                </li>
                <li class="nav-item"><a class="nav-link text-uppercase" id="tabObjection" data-toggle="tab"
                        href="#objection" role="tab">Keberatan</a>
                    <div class="slide"></div>
                </li>
                <li class="nav-item"><a class="nav-link text-uppercase" id="tabComplaint" data-toggle="tab"
                        href="#complaint" role="tab">Pengaduan</a>
                    <div class="slide"></div>
                </li>
                <li class="nav-item"><a class="nav-link text-uppercase" id="tabSatisfaction" data-toggle="tab"
                        href="#satisfaction" role="tab">Kepuasan</a>
                    <div class="slide"></div>
                </li>
            </ul>
            <div class="tab-content card-block" style="padding: 0px; padding-top: 1.25em">
                <div class="tab-pane active" id="request" role="tabpanel">
                    <center>
                        <h5>Loading ....</h5>
                    </center>
                </div>
                <div class="tab-pane" id="objection">
                    <center>
                        <h5>Loading ....</h5>
                    </center>
                </div>
                <div class="tab-pane" id="complaint">
                    <center>
                        <h5>Loading .... </h5>
                    </center>
                </div>
                <div class="tab-pane" id="satisfaction">
                    <center>
                        <h5>Loading .... </h5>
                    </center>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <strong id="info"></strong>
                    <br>
                    <small id="message"></small>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('js/plugin/datatables/datatables.min.js') }}"></script>
    <script>
        let reqTable = null;
        let objTable = null;
        let comTable = null;
        let satTable = null;


        $(function() {
            $("#request").load("/admin/form/request", function() {
                requestDataTable()
            })
            $("#objection").load("/admin/form/objection", function() {
                objectionDataTable()
            })
            $("#complaint").load("/admin/form/complaint", function() {
                complaintDataTable()
            })
            $("#satisfaction").load("/admin/form/satisfaction", function() {
                satisfactionDataTable()
            })

            $(".tab-pane").hide()
            $("#request").show()


            $("#tabRequest").click(function() {
                showTab("request")
                // requestDataTable()
            })

            $("#tabObjection").click(function() {
                showTab("objection")
            })

            $("#tabComplaint").click(function() {
                showTab("complaint")
            })

            $("#tabSatisfaction").click(function() {
                showTab("satisfaction")
            })
        })


        function showTab(tabName) {
            $(".tab-pane").hide();
            $('#' + tabName).show();
        }

        function getData(id) {
            $.ajax({
                url: `/api/admin/form/${id}/detail`,
                method: "GET",
                dataType: "json",
                success: function(res) {
                    let d = res.data
                    if(d.type == "request"){
                        showRequestModal(d)
                    }

                    if(d.type == "objection"){
                        showObjectionModal(d)
                    }

                    if(d.type == "complaint"){
                        complaintDataTable(d)
                    }

                    if(d.type == "satisfaction"){
                        showSatisfactionModal(d)
                    }
                    
                },
                error: function(err) {
                    console.log("error :", err);
                    showMessage("warning", "flaticon-error", "Peringatan", err.message || err.responseJSON
                        ?.message);
                }
            })
        }

        function showRequestModal(data){
            $("#exampleModal").modal('show');
        }

        function showObjectionModal(data){
            $("#exampleModal").modal('show');
        }

        function showComplaintModal(data){
            $("#exampleModal").modal('show');
        }

        function showSatisfactionModal(data){
            $("#exampleModal").modal('show');
        }

        function refreshData(tableName) {
            if (tableName == "request") {
                reqTable.ajax.reload(null, false);
            } else if (tableName == "objection") {
                objTable.ajax.reload(null, false);
            } else if (tableName == "complaint") {
                comTable.ajax.reload(null, false);
            } else if (tableName == "satisfaction") {
                satTable.ajax.reload(null, false);
            }
        }

        function requestDataTable() {
            const url = "/api/admin/form/request/datatable";
            reqTable = $("#requestDataTable").DataTable({
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
                    data: "name"
                }, {
                    data: "phone"
                }, {
                    data: "email"
                }, {
                    data: "information"
                }, {
                    data: "purpose"
                }],
                pageLength: 25,
            });
        }

        function objectionDataTable() {
            const url = "/api/admin/form/objection/datatable";
            objTable = $("#objectionDataTable").DataTable({
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
                    data: "name"
                }, {
                    data: "phone"
                }, {
                    data: "email"
                }, {
                    data: "information"
                }, {
                    data: "description"
                }],
                pageLength: 25,
            });
        }


        function complaintDataTable() {
            const url = "/api/admin/form/complaint/datatable";
            comTable = $("#complaintDataTable").DataTable({
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
                    data: "name"
                }, {
                    data: "phone"
                }, {
                    data: "email"
                }, {
                    data: "nameof_reported"
                }, {
                    data: "information"
                }],
                pageLength: 25,
            });
        }

        function satisfactionDataTable() {
            const url = "/api/admin/form/satisfaction/datatable";
            satTable = $("#satisfactiontDataTable").DataTable({
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
                    data: "name"
                }, {
                    data: "date"
                }, {
                    data: "email"
                }, {
                    data: "typeof_service"
                }],
                pageLength: 25,
            });
        }

        function removeData(id) {
            let c = confirm("Apakah anda yakin untuk menghapus data ini ?");
            if (c) {
                $.ajax({
                    url: "/api/admin/form",
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
