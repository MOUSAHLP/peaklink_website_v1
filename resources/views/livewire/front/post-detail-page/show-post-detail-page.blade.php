<div>
    @section('title', $post->title)
    @section('meta_title', $post->meta_title)
    @section('meta_description', $post->meta_description)
    @if ($post->meta_keywords)
        @section('meta_keywords', implode(',', $post->meta_keywords))
    @endif

    @if ($post->meta_image)
        @section('meta_image', $post->metaImage->url)
    @endif
    <article class="blog-details">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="blog-details__left">
                        <div class="blog-details__img">
                            <img src="{{ asset('storage/' . $post->image) }}" alt>
                            <div class="blog-details__date">
                                <span class="day">{{ $post->created_at->format('d') }}</span>
                                <span class="month">{{ $post->created_at->format('M') }}</span>
                            </div>
                        </div>
                        <div class="blog-details__content">
                            <ul class="list-unstyled blog-details__meta">
                                <li><a><i class="fas fa-user-circle"></i>
                                        {{ $post->users->name }} </a> </li>
                                <li><a>
                                        @svg('heroicon-c-clock', ['style' => 'width:15px;color: var(--theme-color1);margin: 0px 0px 5px;'])
                                        {{ $post->created_at->format('Y-m-d') }}
                                    </a>
                                </li>
                            </ul>
                            {!! $post->content !!}

                        </div>
                        <div class="blog-details__bottom">
                            <p class="blog-details__tags"> <span>@lang('posts.Tags')</span>
                                @foreach ($post->tags()->get() as $tag)
                                    @if ($tag->name != null)
                                        <a> {{ $tag->name }}</a>
                                    @endif
                                @endforeach
                            </p>
                            <div class="blog-details__social-list">
                                @foreach ($post->socials as $social)
                                    <a href="{{ $social['url'] }}">
                                        @svg($social['icon'])
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="sidebar">
                        <div class="sidebar__single sidebar__post">
                            <h3 class="sidebar__title"> @lang('posts.LatestPosts')</h3>
                            <ul class="sidebar__post-list list-unstyled">
                                @foreach ($latest_posts as $latest_post)
                                    <a href="{{ route('PostDetail', $latest_post->slug) }}">
                                        <li>
                                            <div class="sidebar__post-image">
                                                <img src="{{ asset('storage/' . $latest_post->image) }}" alt>
                                            </div>
                                            <div class="sidebar__post-content">
                                                <h3> <span class="sidebar__post-content-meta">
                                                        <i class="fas fa-user-circle"></i>
                                                        {{ $latest_post->users->name }}</span>
                                                    <a
                                                        href="{{ route('PostDetail', $latest_post->slug) }}">{{ $latest_post->title }}</a>
                                                </h3>
                                            </div>
                                        </li>
                                    </a>
                                @endforeach

                            </ul>
                        </div>
                        <div class="sidebar__single sidebar__category">
                            <h3 class="sidebar__title"> @lang('posts.Categories')</h3>
                            <ul class="sidebar__category-list list-unstyled">
                                @foreach ($categories as $category)
                                    @if ($category->name != null)
                                        <li>
                                            <a href="{{ route('ShowPostCategory', $category->slug) }}">{{ $category->name }}
                                                <span class="icon-right-arrow"></span>
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
</div>
