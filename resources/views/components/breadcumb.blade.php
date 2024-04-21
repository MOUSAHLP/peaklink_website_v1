<div>
    <section dir="{{ str_replace('_', '-', app()->getLocale()) == 'ar' ? 'rtl' : 'ltr' }}" class="page-title"
        style="background-image: url({{ $image_url }});">
        <div class="auto-container">
            <div class="title-outer text-center">
                <h1 class="title">{{ $upper_title }}</h1>
                <ul class="page-breadcrumb">
                    @if (app()->getLocale() == 'ar')
                        <li>{{ $title }}</li>
                        <li><a href="{{ route('Home') }}">{{ __('about_us.Home') }}</a></li>
                    @else
                        <li><a href="{{ route('Home') }}">{{ __('about_us.Home') }}</a></li>
                        <li>{{ $title }}</li>
                    @endif
                </ul>
            </div>
        </div>
    </section>
</div>
