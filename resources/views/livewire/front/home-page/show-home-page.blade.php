<div>

    <div x-intersect.half="$wire.a(1)"></div>
    {{-- Slider Section  --}}
    <livewire:front.home-page.slider.show-slider />


    {{-- Services Section  --}}
    <livewire:front.home-page.services.show-services />

    {{-- About Section  --}}
    <livewire:front.home-page.about.show-about-us />

    @if ($render >= 1)
        <div x-intersect.half="$wire.a(2)"></div>

        {{-- products  Section  --}}
        <livewire:front.home-page.products.show-products />

        {{-- FlowWork Section  --}}
        <livewire:front.home-page.flowwork.show-flowwork />
    @endif
    <div x-intersect.half="$wire.a(1)"></div>

    @if ($render >= 2)
        <div x-intersect.half="$wire.a(3)"></div>
        {{-- Call Action Section  --}}
        <livewire:front.home-page.callaction.show-call-action />

        {{-- Our review Clients Section  --}}
        <livewire:front.home-page.ourreviewclient.show-our-review-client />

        {{-- choose-us-section Section  --}}
        <livewire:front.home-page.chooseussection.show-choose-us-section />
    @endif
    <div x-intersect.half="$wire.a(2)"></div>

    {{-- pricing Section  --}}
    {{-- <livewire:front.home-page.pricing.show-pricing/> --}}

    @if ($render >= 3)
        <div x-intersect.half="$wire.a(4)"></div>
        {{-- Projects Section  --}}
        <livewire:front.home-page.project.show-project />

        {{-- Contact us  Section  --}}
        <livewire:front.home-page.contactus.show-contact-us />

        {{-- post  Section  --}}
        <livewire:front.home-page.post.show-post />
    @endif
    <div x-intersect.half="$wire.a(3)"></div>

    @if ($render >= 4)
        {{-- faqs  Section  --}}
        <livewire:front.home-page.faqs.show-faq />

        {{-- Brands  Section  --}}
        <livewire:front.home-page.brand.show-brand />

        {{-- contact-us-bannder  Section  --}}
        <livewire:front.home-page.contacontusbanneder.show-contact-us-bannder />
    @endif
    <div x-intersect.full="$wire.a(4)"></div>
</div>
