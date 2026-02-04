@php
    $aboutData = $about ?? \App\Models\AboutUs::query()->first();
    $subtitle = optional($aboutData)->subtitle ?? 'Subtítulo';
    $title = optional($aboutData)->title ?? 'Título';
    $description = optional($aboutData)->description ?? '<p>Descrição.</p>';
    $photo = optional($aboutData)->photo;
@endphp

<!-- Why Choose Start -->
<section class="why-choose">
    <div class="container" style="margin-top: 80px;">
        <div class="row">
            <div class="col-lg-5 wow fadeInLeft animated" data-wow-delay="200ms">
                <div class="about-one__content">
                    <!-- about content start-->
                    <div class="section-title">
                        <h5 class="section-title__tagline section-title__tagline--has-dots">
                            {{ $subtitle }}
                        </h5>
                        <h2 class="section-title__title">{{ $title }}</h2>
                    </div><!-- section-title -->
                    <div class="about-one__content__text-one mb-2">
                        {!! $description !!}
                    </div>
                </div><!-- about content end-->
            </div>
            <div class="col-lg-7">
                <div class="why-choose__image">
                    <div class="why-choose__image__shape wow fadeIn animated" data-wow-delay="200ms">
                        <img src="assets/images/resources/why-choose-1-1.png" alt="ogency">
                    </div>
                    <div class="why-choose__image__author wow fadeInRight animated" data-wow-delay="300ms">
                        <img src="{{ $photo ? asset($photo) : asset('assets/images/resources/marcusm.jpg') }}"
                            alt="Sobre nós">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Why Choose End -->
