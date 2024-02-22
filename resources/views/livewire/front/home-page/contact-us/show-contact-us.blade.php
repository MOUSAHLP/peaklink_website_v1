<div>

    @if(isset($ContactUsContact))


    <section class="contact-section mb-lg-120">
        <div class="auto-container">
            <div class="outer-box">
                <div class="row">

                    <div class="content-column col-lg-6">
                        <div class="inner-column">
                            <div class="sec-title light">
                                <h2>دعونا نعمل معًا من أجل عمل عظيم</h2>
                                <div class="text">لكن لا بد أن أوضح لك أن كل هذه الأفكار المغلوطة حول استنكار النشوة
                                    وتمجيد الألم نشأت بالفعل، وسأعرض لك التفاصيل لتكتشف حقيقة وأساس تلك السعادة
                                    البشرية، فلا أحد يرفض أو يكره أو يتجنب الشعور بالس</div>
                            </div>
                            <div class="row">


                                @if(isset($ContactUsContact->contacts))
                                @foreach ($ContactUsContact->contacts as $contact)

                                @if(isset($contact['contacts']))
                                @foreach($contact['contacts'] as $contact_data)

                                @if($contact_data['title'] && $contact_data['name'] && $contact_data['status'] == true
                                && $contact['btn_type'] == 'phone')
                                <div class="contact-block col-sm-6">
                                    <div class="inner-box">
                                        <div class="icon-box"> <i class="flaticon-call-3"></i> </div>
                                        <div class="content-box"> <span>هاتف</span>
                                            <h6 class="title"> <a href="tel:{{ $contact_data['name'] }}" target="_blank"
                                                    rel="noopener noreferrer">{{ $contact_data['title'] }}</a></h6>
                                        </div>
                                    </div>
                                </div>
                                @elseif($contact_data['title'] && $contact_data['name'] && $contact_data['status'] ==
                                true && $contact['btn_type'] == 'email')
                                <div class="contact-block col-sm-6">
                                    <div class="inner-box">
                                        <div class="icon-box"> <i class="flaticon-envelope"></i> </div>
                                        <div class="content-box"> <span>بريد إلكتروني</span>
                                            <h6 class="title"> <a href="{{ $contact_data['name'] }}" target="_blank"
                                                    rel="noopener noreferrer">{{ $contact_data['title'] }}</a></h6>
                                        </div>
                                    </div>
                                </div>
                                @elseif($contact_data['title'] && $contact_data['name'] && $contact_data['status'] ==
                                true && $contact['btn_type'] == 'text')
                                <div class="contact-block col-sm-6">
                                    <div class="inner-box">
                                        <div class="icon-box"> <i class="flaticon-worldwide"></i> </div>
                                        <div class="content-box"> <span>موقع إلكتروني</span>
                                            <h6 class="title">{{ $contact_data['title'] }}</h6>
                                        </div>
                                    </div>
                                </div>

                                @elseif($contact_data['title'] && $contact_data['name'] && $contact_data['status'] ==
                                true && $contact['btn_type'] == 'url')
                                <div class="contact-block col-sm-6">
                                    <div class="inner-box">
                                        <div class="icon-box"> <i class="flaticon-map-locator"></i> </div>
                                        <div class="content-box"> <span>موقع</span>
                                            <h6 class="title"> <a href="{{ $contact_data['name'] }}" target="_blank"
                                                    rel="noopener noreferrer">{{ $contact_data['title'] }}</a></h6>
                                        </div>
                                    </div>
                                </div>
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
                            <h4 class="title">ابقى على تواصل</h4>
                            <form   id="contact-forms">
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <div class="input-outer">
                                            <input type="email" name="Email" placeholder="بريدك الالكتروني" required>
                                            <span class="icon fa fa-user"></span>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <div class="input-outer">
                                            <input type="text" name="Phone" placeholder="رقم التليفون" required>
                                            <span class="icon fa fa-envelope"></span>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <div class="input-outer">
                                            <input type="text" name="Phone" placeholder="رقم التليفون" required>
                                            <span class="icon fa fa-phone"></span>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <div class="input-outer">
                                            <textarea name="message" placeholder="رسالة" required></textarea>
                                            <span class="icon fa fa-paper-plane"></span>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <button class="theme-btn" type="submit" name="submit-form"><span
                                                class="btn-title">أرسل رسالتك</span><i
                                                class="far fa-arrow-left-long btn-icon me-1"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @endif
</div>