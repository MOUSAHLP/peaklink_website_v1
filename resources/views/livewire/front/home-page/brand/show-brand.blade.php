<div>
   

    @if(isset($brands) &&  $brands->count() > 0)
        
    <section class="clients-section">
        <div class="auto-container">

            <ul class="clients-carousel-rtl">
                @foreach($brands as $brand)
                    
                <li class="client-block-two"> <a href="{{ $brand->slug }}"><img src="{{ asset('storage/'.$brand->logo) }}" alt></a> </li>

                @endforeach
            </ul>
        </div>
    </section>
    @endif


</div>
