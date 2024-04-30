<div>

    @section('title', 'peaklink-' . $project->title)
    @section('meta_title', $project->meta_title)
    @section('meta_description', $project->meta_description)
    @if ($project->meta_keywords)
        @section('meta_keywords', implode(',', $project->meta_keywords))
    @endif

    @if ($project->meta_image)
        @section('meta_image', $project->metaImage->url)
    @endif

    @component('components.breadcumb', [
        'image_url' => asset('images/page-title-bg.png'),
        'upper_title' => $project->title,
        'title' => __('projects.projects'),
    ])
    @endcomponent

    <section class="project-details">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="project-details__top">
                        <div class="project-details__img">
                            <x-curator-glider :media="$project->image" :alt="$project->title" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="project-details__content-right">
                        <div class="project-details__details-box pb-25">
                            <div class="row" style="justify-content: center;">
                                <div class="col-6 col-md-3" style="text-align: center;">
                                    <p class="project-details__client"> {{ __('projects.Date') }}</p>
                                    <h4 class="project-details__name">{{ $project->date }}</h4>
                                </div>
                                <div class="col-6 col-md-3" style="text-align: center;">
                                    <p class="project-details__client"> {{ __('projects.Client') }}</p>
                                    <h4 class="project-details__name">{{ $project->client_name }}</h4>
                                </div>
                                @if ($project->website)
                                    <div class="col-6 col-md-3" style="text-align: center;">
                                        <p class="project-details__client"> {{ __('projects.Website') }}</p>
                                        <a href="{{ $project->website }}">
                                            <h4 class="project-details__name">{{ $project->website }}</h4>
                                        </a>

                                    </div>
                                @endif

                                @if ($project->location)
                                    <div class="col-6 col-md-3" style="text-align: center;">
                                        <p class="project-details__client"> {{ __('projects.Location') }}</p>
                                        <h4 class="project-details__name">{{ $project->location }}</h4>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="project-details__content">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="project-details__content-left">
                            {!! $project->description !!}

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="project-details__pagination-box">
                        <ul class="project-details__pagination list-unstyled clearfix" style="direction: ltr;">
                            <li class="{{ app()->getLocale() == 'ar' ? 'previous' : 'next' }}">
                                <div class="icon"> <a href="{{ route('ProjectDetail', $prev_project) }}"
                                        aria-label="Previous"><i class="lnr lnr-icon-arrow-left"></i></a> </div>
                                <div class="content"> {{ __('projects.Previous') }}</div>
                            </li>

                            <li class="{{ app()->getLocale() == 'ar' ? 'next' : 'previous' }}">
                                <div class="content"> {{ __('projects.Next') }}</div>
                                <div class="icon"> <a href="{{ route('ProjectDetail', $next_project) }}"
                                        aria-label="Previous"><i class="lnr lnr-icon-arrow-right"></i></a> </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="project-section">
        <div class="auto-container">
            <div class="sec-title">
                <h2> {{ __('projects.Recently') }} <br> {{ __('projects.CompletedProjects') }}</h2>
                <div class="text"> {{ __('projects.CompletedProjectsBody') }} </div>
            </div>
            <div class="slider-btn">
                <button class="prev-btn"><span><i class="flaticon-arrow-pointing-to-right"></i></span></button>
                <button class="next-btn"><span><i class="flaticon-arrow-pointing-to-right"></i></span></button>
            </div>
        </div>
        <div class="row project-slider" style="direction: ltr">

            @foreach ($projects as $project)
                <div class="project-block col-lg-3 col-md-6">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image overlay-anim"><a href="{{ route('ProjectDetail', $project->id) }}">
                                    <x-curator-glider :media="$project->image" :alt="$project->title" /></a></figure>
                            <figure class="image-2"><a href="{{ route('ProjectDetail', $project->id) }}">
                                    <x-curator-glider :media="$project->image" :alt="$project->title" /></a></figure>
                        </div>
                        <div class="content-box">
                            <span>{{ $project->categories->title }}</span>
                            <h6 class="title"><a
                                    href="{{ route('ProjectDetail', $project->id) }}">{{ $project->title }}</a></h6>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </section>

</div>
