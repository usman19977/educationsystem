<div class="bg-top navbar-light">
    <div class="container">
        <div class="row no-gutters d-flex align-items-center align-items-stretch">
            <div class="col-md-4 d-flex align-items-center py-4">
                <a class="navbar-brand" href="/">Education <span>System</span></a>
            </div>
            <div class="col-lg-8 d-block">
                <div class="row d-flex">
                    <div class="col-md d-flex topper align-items-center align-items-stretch py-md-4">
                        <div class="icon d-flex justify-content-center align-items-center"><span
                                class="icon-paper-plane"></span></div>
                        <div class="text">
                            <span>Email</span>
                            <a href="mailto:info@educationsystem.com"><span>info@educationsystem.com</span></a>
                        </div>
                    </div>
                    <div class="col-md d-flex topper align-items-center align-items-stretch py-md-4">
                        <div class="icon d-flex justify-content-center align-items-center"><span
                                class="icon-phone2"></span></div>
                        <div class="text">
                            <span>Call Us:</span>
                            <a href="tel:923002490636"> <span>+923002490636</span></a>
                        </div>
                    </div>
                    <div class="col-md topper d-flex align-items-center justify-content-end">
                        @if (Auth::check())
                            <p class="mb-0">
                                <a href="/dashboard"
                                    class="btn py-2 px-3 btn-success d-flex align-items-center justify-content-center">
                                    <span>Dashboard</span>
                                </a>

                            </p>
                            <p class="mb-0">
                            <form method="POST" action="/logout">
                                @csrf
                                <button type="submit"
                                    class="btn py-2 px-3 btn-primary d-flex align-items-center justify-content-center">
                                    <span>Logout</span>
                                </button>
                            </form>

                            </p>
                        @else
                            <p class="mb-0">
                                <a href="{{ route('register') }}"
                                    class="btn py-2 px-3 btn-success d-flex align-items-center justify-content-center">
                                    <span>Apply now</span>
                                </a>

                            </p>
                            <p class="mb-0">
                                <a href="/login"
                                    class="btn py-2 px-3 btn-primary d-flex align-items-center justify-content-center">
                                    <span>Login</span>
                                </a>

                            </p>
                        @endif

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container d-flex align-items-center px-4">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item "><a href="/" class="nav-link pl-0">Home</a></li>
                <li class="nav-item"><a href="/about" class="nav-link">About</a></li>
                <li class="nav-item"><a href="/affiliatedschools" class="nav-link">Schools</a></li>
                <li class="nav-item"><a href="/downloads" class="nav-link">Downloads</a></li>
                <li class="nav-item"><a href="/pressrelease" class="nav-link">Release</a></li>
                <li class="nav-item"><a href="/tenders" class="nav-link">Tenders</a></li>
                <li class="nav-item"><a href="/corrections" class="nav-link">Corrections</a></li>
                <li class="nav-item"><a href="/scholarship" class="nav-link">Scholarship</a></li>
                <li class="nav-item"><a href="/fee" class="nav-link">Fee Structure</a></li>
                <li class="nav-item"><a href="/studentadmission" class="nav-link">Admission</a></li>
                <li class="nav-item"><a href="/contact" class="nav-link">Contact</a></li>

        </div>
    </div>
</nav>
