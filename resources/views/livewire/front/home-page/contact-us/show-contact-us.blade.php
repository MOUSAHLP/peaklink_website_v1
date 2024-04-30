    <div>

        @if (isset($ContactUsContact))


            <section style="z-index: 20" class="contact-section">
                <div class="auto-container">
                    <div class="outer-box">
                        <div class="row">

                            <div class="content-column col-lg-6">
                                <div class="inner-column">
                                    <div class="sec-title light">
                                        <h2> @lang('home/contact_us.section_title') </h2>
                                        <div class="text">
                                            @lang('home/contact_us.section_desc')
                                        </div>
                                    </div>
                                    <div class="row">

                                        @if (isset($ContactUsContact->contacts))
                                            @foreach ($ContactUsContact->contacts as $contact)
                                                @if (isset($contact['contacts']))
                                                    @foreach ($contact['contacts'] as $contact_data)
                                                        @if ($contact_data['title'] && $contact_data['value'] && $contact_data['status'] == true)
                                                            <a class="contact-block col-sm-6" {{-- href  --}}
                                                                @if ($contact['btn_type'] == 'email') href="mailto:{{ $contact_data['value'] }}"
                                                                @elseif($contact['btn_type'] == 'phone') href="tel:{{ $contact_data['value'] }}"
                                                                @elseif($contact['btn_type'] == 'url') href="{{ $contact_data['value'] }}" @endif
                                                                target="_blank" rel="noopener noreferrer">
                                                                <div class="contact-block col-sm-6"
                                                                    style="width: 100%;">
                                                                    <div class="inner-box">
                                                                        <div class="icon-box">

                                                                            {{-- icon  --}}
                                                                            @if ($contact['btn_type'] == 'email')
                                                                                <i class="flaticon-envelope"></i>
                                                                            @elseif($contact['btn_type'] == 'phone')
                                                                                <i class="flaticon-call-3"></i>
                                                                            @elseif($contact['btn_type'] == 'url')
                                                                                <i class="flaticon-map-locator"></i>
                                                                            @elseif($contact['btn_type'] == 'text')
                                                                                <i class="flaticon-worldwide"></i>
                                                                            @endif

                                                                        </div>
                                                                        <div class="content-box"> <span>

                                                                                {{-- text  --}}
                                                                                @if ($contact['btn_type'] == 'email')
                                                                                    @lang('home/contact_us.email')
                                                                                @elseif($contact['btn_type'] == 'phone')
                                                                                    @lang('home/contact_us.phone')
                                                                                @elseif($contact['btn_type'] == 'url')
                                                                                    @lang('home/contact_us.url')
                                                                                @elseif($contact['btn_type'] == 'text')
                                                                                    @lang('home/contact_us.text')
                                                                                @endif

                                                                            </span>
                                                                            <h6 class="title">
                                                                                {{ $contact_data['title'] }}
                                                                                {{-- <a href="{{ $contact_data['value'] }}"
                                                                        target="_blank"
                                                                        rel="noopener noreferrer">{{ $contact_data['title'] }}</a> --}}
                                                                            </h6>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        @endif

                                    </div>
                                </div>
                            </div>

                            <div class="form-column col-lg-6">
                                <div class="inner-column">
                                    <h4 class="title">
                                        @lang('home/contact_us.get_in_touch')
                                    </h4>
                                    <form action="{{ route('save_contact_us_form') }}" method="POST" id="contact_form"
                                        name="contact_form" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="form-group col-sm-6 col-lg-12">
                                                <div class="input-outer">
                                                    <input type="text" name="name" value="{{ old('name') }}"
                                                        placeholder="@lang('home/contact_us.name')" required>
                                                    <span class="icon fa fa-user"></span>
                                                </div>
                                                <div>
                                                    @error('name')
                                                        <span style="color: red;font-size: 14px;"
                                                            class="error">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-6 col-lg-12">
                                                <div class="input-outer">
                                                    <input type="email" name="email" value="{{ old('email') }}"
                                                        placeholder="@lang('home/contact_us.email')" required>
                                                    <span class="icon fa fa-envelope"></span>
                                                    <div>
                                                        @error('email')
                                                            <span style="color: red;font-size: 14px;"
                                                                class="error">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-6 col-lg-12">
                                                <div class="input-outer">
                                                    <input type="text" name="phone" value="{{ old('phone') }}"
                                                        placeholder="@lang('home/contact_us.phone')" required>
                                                    <span class="icon fa fa-phone"></span>
                                                    <div>
                                                        @error('phone')
                                                            <span style="color: red;font-size: 14px;"
                                                                class="error">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-6 col-lg-12">
                                                <div class="input-outer">
                                                    <input type="file" name="file"
                                                        placeholder="@lang('home/contact_us.file')">
                                                    <span class="icon fa fa-file"></span>
                                                    <div>
                                                        @error('file')
                                                            <span style="color: red;font-size: 14px;"
                                                                class="error">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-12">
                                                <div class="input-outer">
                                                    <textarea name="message" placeholder="@lang('home/contact_us.message')" required>{{ old('message') }}</textarea>
                                                    <span class="icon fa fa-paper-plane"></span>
                                                    <div>
                                                        @error('message')
                                                            <span style="color: red;font-size: 14px;"
                                                                class="error">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Google Recaptcha Widget-->
                                            <div class="form-group mt-3">

                                                {!! NoCaptcha::renderJs() !!}
                                                {!! NoCaptcha::display() !!}
                                            </div>
                                            @if (session()->has('message'))
                                                <div class="alert alert-success">
                                                    {{ session('message') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="form-group col-sm-6 col-lg-12">
                                            <button class="theme-btn" type="submit" name="submit-form"><span
                                                    class="btn-title">@lang('home/contact_us.send_your_message')</span><i
                                                    class="far fa-arrow-left-long btn-icon me-1"></i></button>
                                        </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        @endif
    </div>
