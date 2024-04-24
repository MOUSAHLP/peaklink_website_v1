<div>
    @section('title', __('products.PeaklinkProducts'))

    @component('components.breadcumb', [
        'image_url' => asset('images/page-title-bg.png'),
        'upper_title' => __('posts.posts'),
        'title' => __('posts.posts'),
    ])
    @endcomponent

    <section class="featured-products">
        <div class="auto-container">

            <div class="mixitup-gallery">

                <div class="filters clearfix">
                    <ul class="filter-tabs filter-btns clearfix">
                        <li class="active filter" data-role="button" data-filter="all">All</li>
                        @foreach ($categories as $category)
                            <li class="filter" data-role="button" data-filter=".category-{{ $category->id }}">
                                {{ $category->name }}</li>
                        @endforeach

                    </ul>
                </div>
                <div class="filter-list row">

                    @foreach ($products as $product)
                        <div
                            class="product-block all mix category-{{ $product->category->id }} col-lg-3 col-md-6 col-sm-12">
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
            </div>
        </div>
    </section>
</div>
