@extends('layouts.auth')
@section('title', $title)
@section('content')
    <div
        class="login-aside w-50 d-flex flex-column align-items-center justify-content-center text-center bg-secondary-gradient">
        <h1 class="title fw-bold text-white mb-3">Join Our Comunity</h1>
        <p class="subtitle text-white op-7">Ayo bergabung dengan komunitas kami untuk masa depan yang lebih baik</p>
    </div>
    <div class="login-aside w-50 d-flex align-items-center justify-content-center bg-white">
        <div class="container container-login container-transparent animated fadeIn">
            <form id="formLogin">
                <h3 class="text-center">Login untuk mengelola website</h3>
                <div class="login-form">
                    <div class="form-group">
                        <label for="username" class="placeholder"><b>Username</b></label>
                        <input id="username" name="username" type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password" class="placeholder"><b>Password</b></label>
                        <div class="position-relative">
                            <input id="password" name="password" type="password" class="form-control" required>
                            <div class="show-password">
                                <i class="icon-eye"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-action-d-flex mb-3">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="rememberme">
                            <label class="custom-control-label m-0" for="rememberme">Remember Me</label>
                        </div>
                        <button type="submit" class="btn btn-secondary col-md-5 float-right mt-3 mt-sm-0 fw-bold">
                            Log In
                        </button>
                    </div>
                    {{-- <div class="login-account">
                        <span class="msg">Belum punya akun ?</span>
                        <a href="#" id="show-signup" class="link">Register</a>
                    </div> --}}
                </div>
            </form>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $("#formLogin").submit(function(e) {
            e.preventDefault();

            let dataToSend = $(this).serialize();
            submitAuth(dataToSend, "login");
            return false;
        })

        $("#formRegister").submit(function(e) {
            e.preventDefault();

            const agree = $("#agree").prop('checked');
            let dataToSend = $(this).serialize();
            if (agree) {
                submitAuth(dataToSend, "register")
            } else {
                showMessage("danger", "flaticon-error", "Peringatan",
                    "Tolong lengkapi data persetujuan syarat dan ketentuan")
            }
            return false;
        })

        function submitAuth(data, type) {
            $.ajax({
                url: type == "login" ? "/api/auth/login" : "/api/auth/register",
                method: "POST",
                data: data,
                beforeSend: function() {
                    console.log("Loading...")
                },
                success: function(res) {
                    showMessage("success", "flaticon-alarm-1", "Sukses", res.message);
                    if (res.message == "Login Sukses") {
                        setTimeout(() => {
                            window.location.href = "{{ route('dashboard') }}"
                        }, 1500)
                    } else {
                        // setTimeout(() => {

                        //     location.reload();
                        // }, 1500)
                    }
                },
                error: function(err) {
                    console.log("error :", err)
                    showMessage("danger", "flaticon-error", "Peringatan", err.message || err.responseJSON
                        ?.message);
                }
            })
        }
    </script>
@endpush
