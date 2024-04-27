<div>

    @if (isset($products) & ($products->count() > 0))

        <section class="project-section home">
            <div class="auto-container">
                <div class="sec-title">
                    <h2>@lang('home/products.ourProducts')</h2>
                    <div class="text">
                        @lang('home/products.products_desc')
                    </div>

                </div>

                <div class="slider-btn">
                    <button class="next-btn"><span><i class="fa-regular fa-arrow-right-long btn-icon"></i></span></button>
                    <button class="prev-btn"><span><i class="fa-regular fa-arrow-right-long btn-icon"></i></span></button>


                </div>
            </div>
            <div class="row product-slider{{ app()->getlocale() == 'ar' ? '-rtl' : '' }}">

                @foreach ($products as $product)
                    <div class="product-block col-lg-3 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="image">
                                <a href="{{ route('ProductsDetail', $product->slug) }}">
                                    <x-curator-glider :media="$product->image" :alt="$product->name" />
                            </div>
                            <div class="content">
                                <h4>
                                    <a href="{{ route('ProductsDetail', $product->slug) }}">{{ $product->name }}</a>
                                </h4>
                                <span class="price">{{ $product->category->name }}</span>
                            </div>
                            <div class="icon-box">
                                <a href="{{ route('contactUs') }}" class="ui-btn add-to-cart"><i
                                        class="fa fa-shopping-cart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <a href="{{ route('Products') }}" class="theme-btn more">@lang('more')</a>
        </section>
    @endif
</div>
