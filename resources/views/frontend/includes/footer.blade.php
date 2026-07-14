<!-- New Footer Section -->
<footer class="bg-main text-white py-4">
    <div class="container">
        <div class="row">
            <!-- Organization Details -->
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <h5 class="mb-3 border-bottom pb-2">संस्था विवरण</h5>
                <div class="d-flex mb-3 gap-2">
                    @if (isset(get_detail()->logo))
                        <img src="{{ asset('files/' . get_detail()->logo) }}" alt="Organization Logo" class="me-2"
                            style="width: 60px; height: 60px;">
                    @else
                        <img src="{{ asset('dist/img/logo/Government_Logo.png') }}" alt="Organization Logo"
                            class="me-2" style="width: 60px; height: 60px;">
                    @endif
                    <ul class="list-unstyled">
                        @if (!empty(get_detail()->palika_name))
                            <li class="fs-5 fw-bold mb-1">{{ get_detail()->palika_name }}</li>
                        @endif

                        @if (!empty(get_detail()->address))
                            <li class="mb-1"><strong>ठेगाना:</strong> {{ get_detail()->address }}</li>
                        @endif

                        @if (!empty(get_detail()->email))
                            <li class="mb-1"><strong>इमेल:</strong> {{ get_detail()->email }}</li>
                        @endif

                        @if (!empty(get_detail()->contact_no))
                            <li class="mb-1"><strong>फोन नम्बर:</strong> {{ get_detail()->contact_no }}</li>
                        @endif
                    </ul>
                </div>

            </div>

            <!-- Useful Links -->
            <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                <h5 class="mb-3 border-bottom pb-2">उपयोगी लिंकहरू</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="{{ route('home') }}" class="text-white text-decoration-none"><i
                                class="fas fa-angle-right me-2"></i>गृहपृष्ठ</a></li>
                    <li class="mb-2"><a href="{{ route('about.index') }}" class="text-white text-decoration-none"><i
                                class="fas fa-angle-right me-2"></i>हाम्रो बारेमा</a></li>
                    <li class="mb-2"><a href="{{ route('gallery.index') }}" class="text-white text-decoration-none"><i
                                class="fas fa-angle-right me-2"></i>ग्यालेरी</a></li>
                    <li class="mb-2"><a href="{{ route('training.index') }}"
                            class="text-white text-decoration-none"><i class="fas fa-angle-right me-2"></i>तालिमहरू</a>
                    </li>
                </ul>
            </div>


            <!-- Location Map -->
            <div class="col-lg-5 col-md-5 col-sm-12 mb-4">
                <h5 class="mb-3 border-bottom pb-2">हाम्रो स्थान</h5>
                <div class=" mb-2">
                    <iframe
                        src="https://www.openstreetmap.org/export/embed.html?bbox=83.6200%2C27.5850%2C83.6600%2C27.6250&layer=mapnik&marker=27.6058%2C83.6408"
                        style="border:1px solid black;width:100%; height: 250px;" allowfullscreen="" loading="lazy"></iframe>
                </div>
                <p class="small"><strong>सुनवाल नगरपालिका</strong>, {{ get_detail()->district->name ?? '' }}, नेपाल</p>
            </div>
        </div>

        <!-- Copyright -->
        <div class="row mt-3">
            <div class="col-12">
                <hr>
                <p class="text-center mb-0">© {{ date('Y') }} तालिम व्यवस्थापन प्रणाली। सर्वाधिकार सुरक्षित।</p>
            </div>
        </div>
    </div>
</footer>
