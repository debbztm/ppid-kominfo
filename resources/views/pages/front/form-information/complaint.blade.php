@extends('layouts.app')
@section('title', $title)
@push('styles')
    <style>
        .input-reset {
            background-color: rgb(232, 168, 40) !important;
        }

        .input-reset:hover {
            background-color: transparent !important;
            border-color: rgb(232, 168, 40) !important;
        }
    </style>
@endpush
@section('content')
    <section class="mt-100 mb-100 contact-us">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div style="padding: 30px; border: 1px solid #929292; border-radius:8px;">

                        <h4 class="black text-center">
                            <span class="text-extra-bold">
                                Formulir Pengaduan ASN
                            </span>
                        </h4>
                        <h4 class="text-center mt-10">
                            <span class="text-muted">
                                Dinas Energi dan Sumber Daya Mineral Provinsi Jawa Tengah
                            </span>
                        </h4>
                        <div class="card-body">
                            <form id="request" class="mt-20 checkout-form">
                                <div class="row">
                                    <div class="form-group col-md-4 mt-30">
                                        <label for="name">Nama Pelapor *</label>
                                        <input id="name" type="text" name="name" class="form-control mt-10"
                                            placeholder="nama pelapor" required>
                                    </div>
                                    <div class="form-group col-md-4 mt-30">
                                        <label for="phone">No Telpon Pelapor *</label>
                                        <input id="phone" type="text" name="phone" class="form-control mt-10"
                                            placeholder="no telpon pelapor" required>
                                    </div>
                                    <div class="form-group col-md-4 mt-30">
                                        <label for="email">Email Pelapor *</label>
                                        <input id="email" type="email" name="email" class="form-control mt-10"
                                            placeholder="email pelapor" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-8 mt-30">
                                        <label for="address">Alamat Pelapor *</label>
                                        <input id="address" type="text" name="address" class="form-control mt-10"
                                            placeholder="alamat pelapor" required>
                                    </div>
                                    <div class="form-group col-md-4 mt-30">
                                        <label for="image">Identitas Pelapor *</label>
                                        <input id="image" type="file" name="image" class="form-control mt-10"
                                            placeholder="identitas pelapor" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 mt-30">
                                        <label for="nameof_reported">Nama Terlapor *</label>
                                        <input id="nameof_reported" type="text" name="nameof_reported"
                                            class="form-control mt-10" placeholder="nama terlapor" required>
                                    </div>
                                    <div class="form-check col-md-6 mt-30">
                                        <label for="witness">Ada Saksi *</label>
                                        <div class="text-muted mt-10">
                                            <input type="radio" name="witness" id="witness"
                                                class="form-check-input mt-10" value="Y" required>
                                            Ada
                                        </div>
                                        <div class="text-muted">
                                            <input type="radio" name="witness" id="witness"
                                                class="form-check-input mt-10" value="N" required>
                                            Tidak Ada
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 mt-30">
                                        <label for="reported_identity">Identitas Terlapor *</label>
                                        <textarea id="reported_identity" rows="5" name="reported_identity" class="form-control mt-10"
                                            placeholder="Sebutkan ciri fisik terlapor yang spesifik bila memungkinkan"required></textarea>
                                    </div>
                                    <div class="form-group col-md-6 mt-30">
                                        <label for="information">Kejadian/Kesaksian *</label>
                                        <textarea id="information" rows="5" name="information" class="form-control mt-10"
                                            placeholder="Sebutkan peristiwa, waktu terjadinya, dan lokasi kejadian serta nama saksi"required></textarea>
                                    </div>
                                </div>

                                <div class="mt-50 submit text-right ">
                                    <input type="reset" id="reset"
                                        class="martel text-extra-bold text-uppercase fz-14 input-reset" value="Reset">
                                    <input type="submit" class="martel text-extra-bold text-uppercase fz-14"
                                        value="Kirim">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
@push('scripts')
    <script>
        $("#request").submit(function(e) {
            e.preventDefault()
            let formData = new FormData();
            formData.append("name", $("#name").val());
            formData.append("phone", $("#phone").val());
            formData.append("address", $("#address").val());
            formData.append("email", $("#email").val());
            formData.append("image", document.getElementById("image").files[0]);
            formData.append("nameof_reported", $("#nameof_reported").val());
            formData.append("witness", $("input[name='witness']:checked").val());
            formData.append("reported_identity", $("#reported_identity").val());
            formData.append("information", $("#information").val());
            formData.append("type", "complaint")

            saveData(formData)


            return false;
        })

        function saveData(data) {
            $.ajax({
                url: "/api/form-information",
                contentType: false,
                processData: false,
                method: "POST",
                data: data,
                beforeSend: function() {
                    console.log("Loading...")
                },
                success: function(res) {
                    $("#reset").click();
                    Swal.fire({
                        title: 'Selamat',
                        text: res.message,
                        icon: 'success',
                        confirmButtonText: 'Tutup'
                    });
                },
                error: function(err) {
                    console.log("error :", err);
                    Swal.fire({
                        title: 'Peringatan',
                        text: err.message || err.responseJSON
                            ?.message,
                        icon: 'error',
                        confirmButtonText: 'Tutup'
                    });
                }
            })
        }
    </script>
@endpush
