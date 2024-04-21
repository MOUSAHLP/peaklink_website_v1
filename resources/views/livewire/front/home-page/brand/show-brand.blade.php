<div>


    @if (isset($brands) && $brands->count() > 0)

        <section class="clients-section">
            <div class="auto-container">

                <ul class="clients-carousel-rtl">
                    @foreach ($brands as $brand)
                        {{-- <li class="client-block-two"> <a href="{{ $brand->slug }}"><img
                                    src="{{ asset('storage/' . $brand->logo) }}" alt></a> </li> --}}
                        <li class="client-block-two">
                            <figure class="image overlay-anim">
                                <x-curator-glider :media="$brand->logo" :alt="$brand->slug" />
                            </figure>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>
    @endif


</div>
