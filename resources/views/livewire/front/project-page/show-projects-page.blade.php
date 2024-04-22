<div>

    @section('title', __('projects.PeaklinkProjects'))

    @component('components.breadcumb', [
        'image_url' => asset('images/page-title-bg.png'),
        'upper_title' => __('projects.projects'),
        'title' => __('projects.projects'),
    ])
    @endcomponent

    @if (isset($projects) && $projects->count() > 0)

        <section class="project-section-two featured-products">

            <div class="auto-container">
                <div class="mixitup-gallery">

                    <div class="filters clearfix">
                        <ul class="filter-tabs filter-btns clearfix">
                            <li class="active filter" data-role="button" data-filter="all">All</li>
                            @foreach ($categories as $category)
                                <li class="filter" data-role="button" data-filter=".category-{{ $category->id }}">
                                    {{ $category->title }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="filter-list row">

                        @foreach ($projects as $project)
                            <div
                                class="project-block-two col-lg-6 col-md-6 filtered all mix category-{{ $project->categories->id }}">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <figure class="image overlay-anim"><a
                                                href="{{ route('ProjectDetail', $project->id) }}" tabindex="-1">
                                                <x-curator-glider :media="$project->image" :alt="$project->title" />
                                            </a></figure>
                                        <div class="content-box">
                                            <span>{{ $project->categories->title }}</span>
                                            <h4 class="title"><a href="{{ route('ProjectDetail', $project->id) }}"
                                                    title>{{ $project->title }}</a>
                                            </h4>
                                            <a href="{{ route('ProjectDetail', $project->id) }}" class="btn">
                                                <img src="{{ asset('front/images/resource/arrow-btn.png') }}"
                                                    alt="$project->title">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </section>
    @endif
</div>
