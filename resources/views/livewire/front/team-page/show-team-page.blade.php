<div>
    @section('title', __('team.peaklinkTeam'))

    @component('components.breadcumb', [
        'image_url' => asset('images/page-title-bg.png'),
        'upper_title' => __('team.OurTeam'),
        'title' => __('team.team'),
    ])
    @endcomponent
    <section class="team-section position-relative pt-120 pb-100 bg-light">
        <div class="auto-container">
            <div class="row">
                @php
                    $i = 0;
                @endphp
                @foreach ($teams as $team)
                    <div class="team-block col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="{{ $i * 100 }}ms">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image">
                                    <a
                                        @if ($team->detail) href="{{ route('teamDetail', $team->id) }}" @endif>
                                        <x-curator-glider :media="$team->image" :alt="$team->name" />
                                    </a>
                                </figure>

                                <ul class="social-links">
                                    @foreach ($team->socials as $social)
                                        <li><a href="{{ $social['url'] }}"><i class="{{ $social['icon'] }}"></i></a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="content-box">
                                <h4 class="title"><a
                                        @if ($team->detail) href="{{ route('teamDetail', $team->id) }}" @endif>{{ $team->name }}</a>
                                </h4>
                                <span>{{ $team->position }}</span>
                            </div>
                        </div>
                    </div>
                    @php
                        $i++;
                    @endphp
                @endforeach

            </div>
        </div>
    </section>
</div>
