<div>
    @section('title', 'peaklink ' . $team->name)

    <section class="team-details">
        <div class></div>
        <div class="container pb-100">
            <div class="team-details__top pb-70">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="team-details__top-left">
                            <div class="team-details__top-img">
                                <x-curator-glider :media="$team->detail->image" :alt="$team->name" />
                                <div class="team-details__big-text"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="team-details__top-right">
                            <div class="team-details__top-content">
                                <h3 class="team-details__top-name">{{ $team->name }}</h3>
                                <p class="team-details__top-title">{{ $team->position }}</p>
                                <p class="team-details__top-text-1">{!! $team->detail->description !!}</p>
                                <div class="team-details-contact mb-30">
                                    <h5 class="mb-0"> @lang('team.email')</h5>
                                    <div class><span><a href="mailto:{{ $team->detail->email }}"
                                                class="__cf_email__">{{ $team->detail->email }}</a></span>
                                    </div>
                                </div>
                                <div class="team-details-contact mb-30">
                                    <h5 class="mb-0"> @lang('team.phone')</h5>
                                    <div class><span>{{ $team->detail->phone }}</span></div>
                                </div>
                                @if ($team->detail->website)
                                    <div class="team-details-contact">
                                        <h5 class="mb-0">@lang('team.webAddress')</h5>
                                        <div class><span>{{ $team->detail->website }}</span></div>
                                    </div>
                                @endif
                                <div class="team-details__social">
                                    @foreach ($team->socials as $social)
                                        <li><a href="{{ $social['url'] }}"><i class="{{ $social['icon'] }}"></i></a>
                                        </li>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="team-details__bottom pt-100">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="team-details__bottom-left">
                            <h4 class="team-details__bottom-left-title">{{ $team->detail->skills_title }}</h4>
                            <p class="team-details__bottom-left-text">
                                {!! $team->detail->skills_description !!}
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="team-details__bottom-right">
                            <div class="team-details__progress">
                                @if ($team->detail->skills)
                                    @foreach ($team->detail->skills as $skills)
                                        <div class="team-details__progress-single">
                                            <h4 class="team-details__progress-title">{{ $skills['title'] }}</h4>
                                            <div class="bar">
                                                <div class="bar-inner count-bar"
                                                    data-percent="{{ $skills['progress'] }}%">
                                                    <div class="count-text">{{ $skills['progress'] }}%</div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
