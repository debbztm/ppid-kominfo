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
                                Formulir Permohonan Informasi Publik
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
                                        <label for="name">Nama *</label>
                                        <input id="name" type="text" name="name" class="form-control mt-10"
                                            placeholder="nama" required>
                                    </div>
                                    <div class="form-group col-md-4 mt-30">
                                        <label for="phone">No Telpon / HP *</label>
                                        <input id="phone" type="text" name="phone" class="form-control mt-10"
                                            placeholder="no telpon / hp" required>
                                    </div>
                                    <div class="form-group col-md-4 mt-30">
                                        <label for="job">Pekerjaan *</label>
                                        <input id="job" type="text" name="job" class="form-control mt-10"
                                            placeholder="pekerjaan" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4 mt-30">
                                        <label for="address">Alamat *</label>
                                        <input id="address" type="text" name="address" class="form-control mt-10"
                                            placeholder="alamat" required>
                                    </div>
                                    <div class="form-group col-md-4 mt-30">
                                        <label for="email">Email *</label>
                                        <input id="email" type="email" name="email" class="form-control mt-10"
                                            placeholder="email" required>
                                    </div>
                                    <div class="form-group col-md-4 mt-30">
                                        <label for="image">Identitas Pemohon *</label>
                                        <input id="image" type="file" name="image" class="form-control mt-10"
                                            placeholder="identitas" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 mt-30">
                                        <label for="information">Informasi Yang Dibutuhkan *</label>
                                        <textarea id="information" rows="5" name="information" class="form-control mt-10" placeholder=""required></textarea>
                                    </div>
                                    <div class="form-group col-md-6 mt-30">
                                        <label for="purpose">Tujuan Memperoleh Informasi *</label>
                                        <textarea id="purpose" rows="5" name="purpose" class="form-control mt-10" placeholder=""required></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-check col-md-6 mt-30">
                                        <label for="howtoget_information">Cara Memperoleh Informasi *</label>
                                        <div class="text-muted mt-10">
                                            <input type="radio" name="howtoget_information" id="howtoget_information"
                                                class="form-check-input mt-10" value="Melihat/Membaca/Mendengarkan/Mencatat"
                                                required>
                                            Melihat/Membaca/Mendengarkan/Mencatat
                                        </div>
                                        <div class="text-muted">
                                            <input type="radio" name="howtoget_information" id="howtoget_information"
                                                class="form-check-input mt-10"
                                                value="Mendapatkan salinan informasi hardcopy / softcopy" required>
                                            Mendapatkan
                                            salinan
                                            informasi hardcopy / softcopy
                                        </div>
                                    </div>
                                    <div class="form-check col-md-6 mt-30">
                                        <label for="howtocopy_information">Cara Mendapatkan Salinan Informasi</label>
                                        <div class="text-muted mt-10">
                                            <input type="radio" name="howtocopy_information" id="howtocopy_information"
                                                class="form-check-input mt-10" value="Mengambil langsung" required>
                                            Mengambil langsung
                                        </div>
                                        <div class="text-muted">
                                            <input type="radio" name="howtocopy_information" id="howtocopy_information"
                                                class="form-check-input mt-10" value="E-mail" required> E-mail
                                        </div>

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
            formData.append("job", $("#job").val());
            formData.append("address", $("#address").val());
            formData.append("email", $("#email").val());
            formData.append("image", document.getElementById("image").files[0]);
            formData.append("information", $("#information").val());
            formData.append("purpose", $("#purpose").val());
            formData.append("howtoget_information", $("input[name='howtoget_information']:checked").val());
            formData.append("howtocopy_information", $("input[name='howtocopy_information']:checked").val());
            formData.append("type", "request")

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
