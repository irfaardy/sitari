@extends('layouts.master_landing')

@section('content')
      

    <section class="miri-ui-kit-section mt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-8 d-flex flex-column justify-content-center">
                    {{-- <h6 class="text-warning mb-3">About us</h5> --}}
                        <h2 class="h1 font-weight-semibold mb-4">Tentang Sanggar Tari Ayunindya's.
                        </h2>
                        <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        {{-- <p><button class="btn btn-primary">Learn more</button></p> --}}
                </div>
                <div class="col-md-4 text-right"><img src="{{asset('assets/landing/images/about.png')}}" alt="About" class="img-fluid"></div>
            </div> 
            <div class="row">
                
                <div class="col-md-4 text-right"><img src="{{asset('assets/landing/images/sejarah.jpg')}}" alt="About" class="img-fluid"></div>
                <div class="col-md-8 d-flex flex-column justify-content-center">
                    {{-- <h6 class="text-warning mb-3">About us</h5> --}}
                        <h2 class="h1 font-weight-semibold mb-4">Sejarah Sanggar Tari Ayunindya's.
                        </h2>
                        <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        {{-- <p><button class="btn btn-primary">Learn more</button></p> --}}
            </div>
            </div>
        </div>
    </section>
    
    <section id="galery" class="miri-ui-kit-section pricing-section mt-4">
     
       <div class="row justify-content-center">
        <div class="col-md-8 d-flex flex-column justify-content-center">
             <h2 class="h1 font-weight-semibold mb-4">Gallery Sanggar Tari Ayunindya's.
                        </h2>
        </div>
    <div class="col-md-8">
        <div class="row">
            <a href="https://unsplash.it/1200/768.jpg?image=251" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-4">
                <img src="https://unsplash.it/600.jpg?image=251" class="img-fluid">
            </a>
            <a href="https://unsplash.it/1200/768.jpg?image=252" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-4">
                <img src="https://unsplash.it/600.jpg?image=252" class="img-fluid">
            </a>
            <a href="https://unsplash.it/1200/768.jpg?image=253" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-4">
                <img src="https://unsplash.it/600.jpg?image=253" class="img-fluid">
            </a>
        </div>
        <div class="row">
            <a href="https://unsplash.it/1200/768.jpg?image=254" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-4">
                <img src="https://unsplash.it/600.jpg?image=254" class="img-fluid">
            </a>
            <a href="https://unsplash.it/1200/768.jpg?image=255" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-4">
                <img src="https://unsplash.it/600.jpg?image=255" class="img-fluid">
            </a>
            <a href="https://unsplash.it/1200/768.jpg?image=256" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-4">
                <img src="https://unsplash.it/600.jpg?image=256" class="img-fluid">
            </a>
        </div>
    </div>
</div>
    </section>
    
@endsection
@section('javascript')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js" integrity="sha512-Y2IiVZeaBwXG1wSV7f13plqlmFOx8MdjuHyYFVoYzhyRr3nH/NMDjTBSswijzADdNzMyWNetbLMfOpIPl6Cv9g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>

    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox();
            });
</script>
@endsection