<div>
    @section('title', __('posts.peaklinkPosts'))

    @component('components.breadcumb', [
        'image_url' => asset('images/page-title-bg.png'),
        'upper_title' => __('posts.posts'),
        'title' => __('posts.posts'),
    ])
    @endcomponent
    <section class="news-section pt-120 pb-90  featured-products">
        <div class="auto-container">
            <div class="mixitup-gallery">
                <div class="filters clearfix">
                    <ul class="filter-tabs filter-btns clearfix">
                        <li class="active filter" data-role="button" data-filter="all"> @lang('home/posts.all')</li>
                        @foreach ($categories as $category)
                            <li class="filter" data-role="button" data-filter=".category-{{ $category->id }}">
                                {{ $category->name }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="filter-list row">
                    @foreach ($posts as $post)
                        <div class="news-block col-lg-4 col-md-6 all mix category-{{ $post->categories->id }}">
                            <div class="inner-box">
                                <a href="{{ route('PostDetail', $post->slug) }}">
                                    <div class="image-box">
                                        <figure class="image">
                                            <img src="{{ asset('storage/' . $post->image) }}" alt>
                                        </figure>
                                    </div>
                                </a>
                                <div class="content-box">
                                    <ul class="post">
                                        <li>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                viewBox="0 0 14 14" fill="none">
                                                <path opacity="0.8"
                                                    d="M4.9 0V1.4H9.1V0H10.5V1.4H13.3C13.6866 1.4 14 1.7134 14 2.1V13.3C14 13.6866 13.6866 14 13.3 14H0.7C0.313404 14 0 13.6866 0 13.3V2.1C0 1.7134 0.313404 1.4 0.7 1.4H3.5V0H4.9ZM12.6 7H1.4V12.6H12.6V7ZM3.5 2.8H1.4V5.6H12.6V2.8H10.5V4.2H9.1V2.8H4.9V4.2H3.5V2.8Z"
                                                    fill="#F94A29" />
                                            </svg>{{ $post->created_at->diffForHumans() }}
                                        </li>
                                        <li>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="14"
                                                viewBox="0 0 10 14" fill="none">
                                                <path opacity="0.8"
                                                    d="M0.625 0H9.375C9.72019 0 10 0.303636 10 0.678183V13.6608C10 13.8481 9.86006 14 9.6875 14C9.62881 14 9.57125 13.982 9.5215 13.9481L5 10.8722L0.478494 13.9481C0.332269 14.0476 0.139412 13.9997 0.0477311 13.841C0.0165436 13.787 0 13.7246 0 13.6608V0.678183C0 0.303636 0.279825 0 0.625 0ZM8.75 1.35637H1.25V11.8224L5 9.27123L8.75 11.8224V1.35637Z"
                                                    fill="#F94A29" />
                                            </svg>{{ $post->categories->name }}
                                        </li>
                                    </ul>
                                    <h6 class="title"><a href="{{ route('PostDetail', $post->slug) }}">
                                            {{ $post->title }}
                                        </a></h6>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</div>
