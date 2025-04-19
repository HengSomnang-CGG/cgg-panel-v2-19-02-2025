@extends('layouts.auth.app')

<main class="main-content mt-0 ps">
    <section>
        <div class="page-header min-vh-100 ">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                        <div class="card card-plain">
                            <div class="card-header pb-0 text-left bg-transparent d-flex justify-content-center">
                                <img loading="lazy" src="https://clickdrive.tech/storage/cgg/smart-internet.png" alt="" class=" img-fluid mx-auto" style="object-fit: cover; width: 341px; height: 152px;">
                            </div>
                            <div class="card-body">
                                <form role="form" method="POST" action="{{ route('gate.users') }}">
                                    @csrf
                                        @include('sweetalert::alert')
                                    <label>Email</label>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="name" id="name"
                                            placeholder="Username"  aria-label="Name"
                                            aria-describedby="email-addon">
                                    </div>
                                    <label>Password</label>
                                    <div class="mb-3">
                                        <input type="password" class="form-control" name="password" id="password"
                                            placeholder="Password"  aria-label="Password"
                                            aria-describedby="password-addon">
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">LOGIN</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                            <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6"
                                style="background-image:url('../assets/img/curved-images/curved6.jpg')"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
