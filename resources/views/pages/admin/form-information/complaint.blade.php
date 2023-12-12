<div class="card">
    <div class="card-header">
        <div class="card-header-left">
            <h5 class="text-uppercase title">Daftar Pengaduan ASN</h5>
        </div>
        <div class="card-header-right">
            <button class="btn btn-mini btn-info mr-1" onclick="return refreshData('complaint');">Refresh</button>
        </div>
    </div>
    <div class="card-block">
        <div class="table-responsive mt-3">
            <table class="table table-striped table-bordered nowrap dataTable" id="complaintDataTable">
                <thead>
                    <tr>
                        <th class="all">#</th>
                        <th class="all">Nama Pelapor</th>
                        <th class="all">Phone</th>
                        <th class="all">Email</th>
                        <th class="all">Nama Terlapor</th>
                        <th class="all">Kejadian</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="6" class="text-center"><small>Tidak Ada Data</small></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>