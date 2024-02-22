<div>
    
    
        
		<section class="page-title" style="background-image: url({{ asset('front/images/background/page-title-bg.png') }});">
			<div class="auto-container">
				<div class="title-outer text-center">
					<h1 class="title">اتصل بنا</h1>
					<ul class="page-breadcrumb">
						<li><a href="{{ route('Home') }}">الرئيسية</a></li>
						<li>اتصل بنا</li>
					</ul>
				</div>
			</div>
		</section>


		<section class="contact-details">
			<div class="container ">
				<div class="row">
					<div class="col-xl-7 col-lg-6">
						<div class="sec-title">
							<span class="sub-title">ارسل لنا بريد الكتروني</span>
							<h2>لا تتردد في الكتابة</h2>
						</div>

						<form id="contact_form" name="contact_form" class action="#"
							method="post">
							<div class="row">
								<div class="col-sm-6">
									<div class="mb-3">
										<input name="form_name" class="form-control" type="text"
											placeholder="الاسم">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="mb-3">
										<input name="form_email" class="form-control required email" type="email"
											placeholder="الايميل">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div class="mb-3">
										<input name="form_subject" class="form-control required" type="text"
											placeholder="الموضوع">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="mb-3">
										<input name="form_phone" class="form-control" type="text"
											placeholder="رقم الهاتف">
									</div>
								</div>
							</div>
							<div class="mb-3">
								<textarea name="form_message" class="form-control required" rows="7"
									placeholder="الرسالة"></textarea>
							</div>
							<div class="mb-5">
								<input name="form_botcheck" class="form-control" type="hidden" value />
								<button type="submit" class="theme-btn btn-style-one"
									data-loading-text="جاري الإرسال"><span class="btn-title">إرسال</span></button>
								<button type="reset" class="theme-btn btn-style-one bg-theme-color5"><span
										class="btn-title">مسح النموذج</span></button>
							</div>
						</form>

					</div>

                    @if(isset($ContactUsContact))
                    
					<div class="col-xl-5 col-lg-6">
						<div class="contact-details__right">
							<div class="sec-title">
								<span class="sub-title">هل تحتاج إلى أي مساعدة؟</span>
								<h2>ابق على تواصل معنا</h2>
								<div class="text">
                                    أبجد هوز هو ببساطة النص الحر المتاحة
                                </div>
                                </div>
                                <ul class="list-unstyled contact-details__info">
                                @foreach ($ContactUsContact as $contact)

                                @if(isset($contact['contacts']))
                                @foreach($contact['contacts'] as $contact_data)

                                @if($contact_data['title'] && $contact_data['name'] && $contact_data['status'] == true  && $contact['btn_type'] == 'phone')
								<li>
									<div class="icon bg-theme-color2">
										<span class="lnr-icon-phone-plus"></span>
									</div>
									<div class="text">
										<a href="tel:{{ $contact_data['name'] }}">{{ $contact_data['title'] }}</a>
									</div>
								</li>
                                @elseif($contact_data['title'] && $contact_data['name'] && $contact_data['status'] == true && $contact['btn_type'] == 'email')
								<li>
									<div class="icon">
										<span class="lnr-icon-envelope1"></span>
									</div>
									<div class="text">
										<a
											href="mailTo:{{ $contact_data['name'] }}"><span
												class="__cf_email__">{{ $contact_data['title'] }}</span></a>
									</div>
								</li>

                                @elseif($contact_data['title'] && $contact_data['name'] && $contact_data['status'] == true && $contact['btn_type'] == 'text')
								<li>
									<div class="icon">
										<span class="lnr-icon-location"></span>
									</div>
									<div class="text">
										<h6>عنوان الشركة</h6>
										<span>{{ $contact_data['title'] }}</span>
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


		<section class="map-section">
			<iframe class="map w-100"
				src="{!! $ContactUsSetting_location_map !!}"></iframe>
		</section>


</div>
