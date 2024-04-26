<div>

    @section('title', __('home/contact_us.contact_us'))

    {{-- $AboutUs --}}
    @component('components.breadcumb', [
        'image_url' => asset('images/page-title-bg.png'),
        'upper_title' => __('home/contact_us.contact_us'),
        'title' => __('home/contact_us.call_us'),
    ])
    @endcomponent


    <section class="contact-details">
        <div class="container ">
            <div class="row">
                <div class="col-xl-7 col-lg-6">
                    <div class="sec-title">
                        <span class="sub-title">@lang('home/contact_us.send_us_email')</span>
                        <h2>@lang('home/contact_us.dont_hesitate')</h2>
                    </div>

                    {{-- <form wire:submit.prevent="save" id="contact_form" name="contact_form" enctype="multipart/form-data"> --}}
                    <form action="{{ route('save_contact_us_form') }}" method="POST" id="contact_form" name="contact_form"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <input value="{{ old('name') }}" name="name" class="form-control"
                                        type="text" required placeholder="@lang('home/contact_us.name')">
                                    <div>
                                        @error('name')
                                            <span style="color: red;font-size: 14px;"
                                                class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <input value="{{ old('email') }}" name="email"
                                        class="form-control required email" type="email" required
                                        placeholder="@lang('home/contact_us.email')">
                                    <div>
                                        @error('email')
                                            <span style="color: red;font-size: 14px;"
                                                class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    {{-- input --}}
                                    <input name="file" type="file" class="form-control">
                                    <div>
                                        @error('file')
                                            <span style="color: red;font-size: 14px;"
                                                class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <input value="{{ old('phone') }}" name="phone" class="form-control"
                                        type="text" required placeholder="@lang('home/contact_us.phone')">
                                    <div>
                                        @error('phone')
                                            <span style="color: red;font-size: 14px;"
                                                class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <textarea name="message" class="form-control required" rows="7" required placeholder="@lang('home/contact_us.message')">{{ old('message') }}</textarea>
                            <div>
                                @error('message')
                                    <span style="color: red;font-size: 14px;" class="error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- Google Recaptcha Widget-->
                        <div class="form-group mt-3">

                            {!! NoCaptcha::renderJs() !!}
                            {!! NoCaptcha::display() !!}
                        </div>
                        <div class="mb-5">
                            <input name="botcheck" class="form-control" type="hidden" value />

                            <div>
                                @if (session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session('message') }}
                                    </div>
                                @endif
                            </div>

                            <button wire:loading.attr="disabled" type="submit" class="theme-btn btn-style-one"
                                data-loading-text="@lang('home/contact_us.sending')">

                                <span class="btn-title" wire:loading wire:target="file">@lang('home/contact_us.uploading_file')</span>
                                <span class="btn-title" wire:loading.remove>@lang('home/contact_us.send')</span>
                                <span class="btn-title" wire:loading wire:target="save()">@lang('home/contact_us.sending')</span>

                            </button>

                            <button type="reset" class="theme-btn btn-style-one bg-theme-color5"><span
                                    class="btn-title">@lang('home/contact_us.clear_form')</span></button>
                        </div>
                    </form>

                </div>

                @if (isset($ContactUsContact))

                    <div class="col-xl-5 col-lg-6">
                        <div class="contact-details__right">
                            <div class="sec-title">
                                <span class="sub-title">@lang('home/contact_us.need_any_help')</span>
                                <h2>@lang('home/contact_us.keep_in_contact')</h2>
                                <div class="text">
                                    @lang('home/contact_us.section_desc')
                                </div>
                            </div>
                            <ul class="list-unstyled contact-details__info">
                                @foreach ($ContactUsContact as $contact)
                                    @if (isset($contact['contacts']))
                                        @foreach ($contact['contacts'] as $contact_data)
                                            @if (
                                                $contact_data['title'] &&
                                                    $contact_data['value'] &&
                                                    $contact_data['status'] == true &&
                                                    $contact['btn_type'] == 'phone')
                                                <li>
                                                    <div class="icon bg-theme-color2">
                                                        <span class="lnr-icon-phone-plus"></span>
                                                    </div>
                                                    <div class="text">
                                                        <a
                                                            href="tel:{{ $contact_data['value'] }}">{{ $contact_data['title'] }}</a>
                                                    </div>
                                                </li>
                                            @elseif(
                                                $contact_data['title'] &&
                                                    $contact_data['value'] &&
                                                    $contact_data['status'] == true &&
                                                    $contact['btn_type'] == 'email')
                                                <li>
                                                    <div class="icon">
                                                        <span class="lnr-icon-envelope1"></span>
                                                    </div>
                                                    <div class="text">
                                                        <a href="mailTo:{{ $contact_data['value'] }}"><span
                                                                class="__cf_email__">{{ $contact_data['title'] }}</span></a>
                                                    </div>
                                                </li>
                                            @elseif(
                                                $contact_data['title'] &&
                                                    $contact_data['value'] &&
                                                    $contact_data['status'] == true &&
                                                    $contact['btn_type'] == 'text')
                                                <li>
                                                    <div class="icon">
                                                        <span class="lnr-icon-location"></span>
                                                    </div>
                                                    <div class="text">
                                                        <h6>{{ $contact_data['title'] }}</h6>
                                                        <span>{{ $contact_data['value'] }}</span>
                                                    </div>
                                                </li>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>


    {{-- <section class="map-section">
        <iframe class="map w-100" src="{!! $ContactUsSetting_location_map !!}"></iframe>
    </section> --}}


</div>
