<footer class="mt-auto position-relative" style="background: #1976D2;">
    <div class="container py-5 px-3 px-md-2 position-relative" style="z-index: 1;">
        <div class="row g-4 align-items-start justify-content-center">
            <!-- Contacts -->
            <div class="col-12 col-md-5 mb-4 mb-md-0">
                <h2 class="fw-bold mb-3 text-white" style="font-size: 1.5rem;">Contacts</h2>
                <ul class="list-unstyled mb-0" style="font-size: 1rem;">
                    <li class="mb-2 d-flex align-items-center gap-2">
                        <i class="bi bi-telephone-fill fs-5 text-info"></i>
                        <span class="text-white">+62 81234 332 110</span>
                    </li>
                    <li class="mb-2 d-flex align-items-center gap-2">
                        <i class="bi bi-geo-alt-fill fs-5 text-info"></i>
                        <span class="text-white">Puri Widya Kencana K3 Citraland, Surabaya</span>
                    </li>
                    <li class="mb-2 d-flex align-items-center gap-2">
                        <i class="bi bi-envelope-fill fs-5 text-info"></i>
                        <span class="text-white">hello@cotha.id</span>
                    </li>
                </ul>
            </div>
            <!-- Divider for desktop -->
            <div class="d-none d-md-block col-md-1 px-0">
                <div style="width:2px; height:100%; background:#4fc3f7; border-radius:1px; margin:auto; opacity:0.5;"></div>
            </div>
            <!-- Quick Links -->
            <div class="col-12 col-md-5">
                <h2 class="fw-bold mb-3 text-white" style="font-size: 1.5rem;">Quick Links</h2>
                <ul class="list-unstyled mb-0" style="font-size: 1rem;">
                    <li class="mb-2 d-flex align-items-center gap-2">
                        <i class="bi bi-star-fill fs-5 text-info"></i>
                        <a href="{{ url('/') }}" class="text-decoration-none text-white">Home</a>
                    </li>
                    <li class="mb-2 d-flex align-items-center gap-2">
                        <i class="bi bi-instagram fs-5 text-info"></i>
                        <a href="https://instagram.com/cotha_id" target="_blank" class="text-decoration-none text-white">Instagram Cotha</a>
                    </li>
                    <li class="mb-2 d-flex align-items-center gap-2">
                        <i class="bi bi-send-fill fs-5 text-info"></i>
                        <a href="{{ route('registertrial') }}" class="text-decoration-none text-white">Register Trial Class</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Divider for mobile -->
        <div class="row d-md-none mt-4">
            <div class="col-12">
                <div style="height:2px; width:100%; background:#4fc3f7; border-radius:1px; opacity:0.5;"></div>
            </div>
        </div>
    </div>
</footer>