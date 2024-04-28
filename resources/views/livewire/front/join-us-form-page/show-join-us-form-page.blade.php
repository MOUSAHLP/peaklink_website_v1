<div>

    @section('title', __('join_us.join_us_form'))

    {{-- $AboutUs --}}
    @component('components.breadcumb', [
        'image_url' => asset('images/page-title-bg.png'),
        'upper_title' => __('join_us.join_us_form'),
        'title' => __('join_us.join_us_form'),
    ])
    @endcomponent


    <section class="contact-details">
        <div class="container ">
            <div class="row" style="justify-content: center;">
                <div class="col-xl-7 col-lg-6">
                    <div class="sec-title">
                        <span class="sub-title">@lang('join_us.join_us_form')</span>
                        <h2>@lang('join_us.join_us_be_with_us')</h2>
                    </div>

                    {{-- <form wire:submit.prevent="save" id="contact_form" name="contact_form" enctype="multipart/form-data"> --}}
                    <form action="{{ route('save_join_us_form') }}" method="POST" id="contact_form" name="contact_form"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mb-3">
                                <input value="{{ old('full_name') }}" name="full_name" class="form-control"
                                    type="text" required placeholder="@lang('join_us.full_name')">
                                <div>
                                    @error('full_name')
                                        <span style="color: red;font-size: 14px;" class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <input value="{{ old('email') }}" name="email"
                                        class="form-control required email" type="email" required
                                        placeholder="@lang('join_us.email')">
                                    <div>
                                        @error('email')
                                            <span style="color: red;font-size: 14px;"
                                                class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <input value="{{ old('phone') }}" name="phone" class="form-control"
                                        type="text" required placeholder="@lang('join_us.phone')">
                                    <div>
                                        @error('phone')
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
                                    <select class="form-control" name="join_us_position_id" id="join_us_position_id"
                                        required>
                                        <option value="0">@lang('join_us.join_us_positions')</option>
                                        @foreach ($joinUsPositions as $joinUsPosition)
                                            <option value="{{ $joinUsPosition->id }}"
                                                @if (old('join_us_position_id') == $joinUsPosition->id) selected @endif>
                                                {{ $joinUsPosition->position }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div>
                                        @error('join_us_position_id')
                                            <span style="color: red;font-size: 14px;"
                                                class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
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
                        </div>
                        <div class="mb-3">
                            <textarea name="message" class="form-control required" rows="7" required placeholder="@lang('join_us.message')">{{ old('message') }}</textarea>
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
                                data-loading-text="@lang('join_us.sending')">

                                <span class="btn-title" wire:loading wire:target="file">@lang('join_us.uploading_file')</span>
                                <span class="btn-title" wire:loading.remove>@lang('join_us.send')</span>
                                <span class="btn-title" wire:loading wire:target="save()">@lang('join_us.sending')</span>

                            </button>

                            <button type="reset" class="theme-btn btn-style-one bg-theme-color5"><span
                                    class="btn-title">@lang('join_us.clear_form')</span></button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>


    {{-- <section class="map-section">
        <iframe class="map w-100" src="{!! $ContactUsSetting_location_map !!}"></iframe>
    </section> --}}


</div>
