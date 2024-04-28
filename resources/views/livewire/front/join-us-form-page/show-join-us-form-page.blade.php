<div>

    @section('title', __('product_form.product_form'))

    {{-- $AboutUs --}}
    @component('components.breadcumb', [
        'image_url' => asset('images/page-title-bg.png'),
        'upper_title' => __('product_form.product_form'),
        'title' => __('product_form.product_form'),
    ])
    @endcomponent


    <section class="contact-details">
        <div class="container ">
            <div class="row" style="justify-content: center;">
                <div class="col-xl-7 col-lg-6">
                    <div class="sec-title">
                        <span class="sub-title">@lang('product_form.get_our_services')</span>
                        <h2>@lang('product_form.product_form')</h2>
                    </div>

                    {{-- <form wire:submit.prevent="save" id="contact_form" name="contact_form" enctype="multipart/form-data"> --}}
                    <form action="{{ route('save_product_form') }}" method="POST" id="contact_form" name="contact_form"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mb-3">
                                <select class="form-control" name="product_id" id="product_id" required>
                                    <option value="0">@lang('product_form.please_choose_product')</option>
                                    @foreach ($joinUsPositions as $joinUsPosition)
                                        <option value="{{ $joinUsPosition->id }}"
                                            @if ($product_slug == $product->slug || old('product_id') == $product->id) selected @endif>{{ $product->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div>
                                    @error('product_id')
                                        <span style="color: red;font-size: 14px;" class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <input value="{{ old('name') }}" name="name" class="form-control"
                                        type="text" required placeholder="@lang('product_form.name')">
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
                                        placeholder="@lang('product_form.email')">
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
                                        type="text" required placeholder="@lang('product_form.phone')">
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
                            <textarea name="message" class="form-control required" rows="7" required placeholder="@lang('product_form.message')">{{ old('message') }}</textarea>
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
                                data-loading-text="@lang('product_form.sending')">

                                <span class="btn-title" wire:loading wire:target="file">@lang('product_form.uploading_file')</span>
                                <span class="btn-title" wire:loading.remove>@lang('product_form.send')</span>
                                <span class="btn-title" wire:loading wire:target="save()">@lang('product_form.sending')</span>

                            </button>

                            <button type="reset" class="theme-btn btn-style-one bg-theme-color5"><span
                                    class="btn-title">@lang('product_form.clear_form')</span></button>
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
