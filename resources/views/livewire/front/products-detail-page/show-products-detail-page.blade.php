<div>
    @section('title', $product->name)
    @section('meta_title', $product->meta_title)
    @section('meta_description', $product->meta_description)
    @if ($product->meta_keywords)
        @section('meta_keywords', implode(',', $product->meta_keywords))
    @endif

    @if ($product->meta_image)
        @section('meta_image', $product->metaImage->url)
    @endif

    @component('components.breadcumb', [
        'image_url' => asset('images/page-title-bg.png'),
        'upper_title' => $product->name,
        'title' => __('products.products'),
    ])
    @endcomponent
    <section class="product-details">
        <div class="container pb-70">
            <div class="row">
                <div class="col-lg-6 col-xl-6">
                    <div class="bxslider">
                        <div class="slider-content">
                            <figure class="image-box">
                                <x-curator-glider :media="$product->image" :alt="$product->name" />
                                </a>
                            </figure>
                            <div class="slider-pager">
                                <ul class="thumb-box tags">
                                    @foreach ($product->tags()->get() as $tag)
                                        <li> {{ $tag->name }} </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-6 product-info">
                    <div class="product-details__top">
                        <h3 class="product-details__title">{{ $product->name }} </h3>
                    </div>
                    <div class="product-details__reveiw">
                        <span>{{ $product->category->name }}</span>
                    </div>
                    <div class="product-details__content">
                        <p class="product-details__content-text1">
                            {!! $product->short_description !!}
                        </p>

                    </div>

                    <div class="product-details__buttons">
                        <div class="product-details__buttons-1">
                            <a href="{{ route('contactUs') }}" class="theme-btn btn-style-one">@lang('products.buyNow')</a>
                        </div>
                        @if ($product->demo_url)
                            <div class="product-details__buttons-2">
                                <a href=" {{ $product->demo_url }}"
                                    class="theme-btn btn-style-one">@lang('products.liveUrl')</a>
                            </div>
                        @endif

                    </div>

                    <div class="product-details__social">
                        <div class="title mt-10">
                            <h3> @lang('products.exploreOurProduct')</h3>
                        </div>
                        <ul class="social-icon-one product-share">
                            @foreach ($product->socials as $social)
                                <li>
                                    <a href="{{ $social['url'] }}">
                                        @svg($social['icon'], ['style' => 'width:20px;height:20px;'])
                                    </a>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="product-description">
        <div class="container pt-0 pb-90">
            <div class="product-discription">
                <div class="tabs-box">
                    <div class="tab-btn-box text-center">
                        <ul class="tab-btns tab-buttons clearfix">
                            <li class="tab-btn active-btn" data-tab="#tab-1"> @lang('products.Description')</li>
                            <li class="tab-btn" data-tab="#tab-2"> @lang('products.RelatedProducts')</li>
                        </ul>
                    </div>
                    <div class="tabs-content">
                        <div class="tab active-tab" id="tab-1">
                            <div class="text">
                                <p class="product-description__text1">
                                    {!! $product->long_description !!}
                                </p>
                            </div>
                        </div>
                        <div class="tab" id="tab-2">
                            <div class="related-product">
                                <div class="container pt-0 pb-0">
                                    <div class="row clearfix">
                                        <div class="col">
                                            <div class="mixitup-gallery">
                                                <div class="filter-list row">
                                                    @foreach ($related_products as $related_product)
                                                        <div
                                                            class="product-block all mix dairy pantry meat vagetables col-lg-3 col-md-6 col-sm-12">
                                                            <div class="inner-box">
                                                                <div class="image">
                                                                    <a
                                                                        href="{{ route('ProductsDetail', $related_product->slug) }}">
                                                                        <x-curator-glider :media="$related_product->image"
                                                                            :alt="$related_product->name" />
                                                                    </a>
                                                                </div>
                                                                <div class="content">
                                                                    <h4><a
                                                                            href="{{ route('ProductsDetail', $related_product->slug) }}">{{ $related_product->name }}</a>
                                                                    </h4>
                                                                    <span
                                                                        class="price">{{ $related_product->category->name }}</span>
                                                                </div>
                                                                <div class="icon-box">

                                                                    <a href="{{ route('contactUs') }}"
                                                                        class="ui-btn add-to-cart"><i
                                                                            class="fa fa-shopping-cart"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</div>
