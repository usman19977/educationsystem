<footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-6 col-lg-4">
                <div class="ftco-footer-widget mb-5">
                    <h2 class="ftco-heading-2">Have a Questions?</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon icon-map-marker"></span><span class="text">Karachi | Pakistan</span>
                            </li>
                            <li><a href="tel:923002490636"><span class="icon icon-phone"></span><span
                                        class="text">+923002490636</span></a></li>
                            <li><a href="mailto:info@bsek.com"><span class="icon icon-envelope"></span><span
                                        class="text">info@bsek.com</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-2 col-lg-2">
                <div class="ftco-footer-widget mb-5 ml-md-4">
                    <h2 class="ftco-heading-2">Quick</h2>
                    <ul class="list-unstyled">
                        <li><a href="/"><span class="ion-ios-arrow-round-forward mr-2"></span>Home</a></li>
                        <li><a href="/about"><span class="ion-ios-arrow-round-forward mr-2"></span>About</a></li>
                        <li><a href="/affiliatedschools"><span
                                    class="ion-ios-arrow-round-forward mr-2"></span>Schools</a></li>
                        <li><a href="/downloads"><span class="ion-ios-arrow-round-forward mr-2"></span>Downloads</a>
                        </li>
                        <li><a href="/pressrelease"><span class="ion-ios-arrow-round-forward mr-2"></span>Press
                                Release</a></li>
                        <li><a href="/tenders"><span class="ion-ios-arrow-round-forward mr-2"></span>Tenders</a></li>



                    </ul>
                </div>
            </div>
            <div class="col-md-2 col-lg-2">
                <div class="ftco-footer-widget mb-5 ml-md-4">
                    <h2 class="ftco-heading-2">Links</h2>
                    <ul class="list-unstyled">

                        <li><a href="/corrections"><span class="ion-ios-arrow-round-forward mr-2"></span>Corrections</a>
                        </li>
                        <li><a href="/scholarship"><span class="ion-ios-arrow-round-forward mr-2"></span>Scholarship</a>
                        </li>
                        <li><a href="/fee"><span class="ion-ios-arrow-round-forward mr-2"></span>Fee Structure</a></li>
                        <li><a href="/studentadmission"><span
                                    class="ion-ios-arrow-round-forward mr-2"></span>Admission</a></li>
                        <li><a href="/contact"><span class="ion-ios-arrow-round-forward mr-2"></span>Contact</a></li>



                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="ftco-footer-widget mb-5">
                    <h2 class="ftco-heading-2">Subscribe Us!</h2>
                    @if ($message = Session::get('successSubscribe'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    <form action="{{ route('subscribe.store') }}" method="POST" class="subscribe-form">
                        @csrf
                        <div class="form-group">
                            <input type="email" name="email" class="form-control mb-2 text-center"
                                placeholder="Enter email address" required>
                            @if ($errors->has('email'))
                                <div class="danger">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                            <input type="submit" value="Subscribe" class="form-control submit px-3">
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">

                <p>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>
                        document.write(new Date().getFullYear());

                    </script> All rights reserved | BSEK System</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </div>
    </div>
</footer>
