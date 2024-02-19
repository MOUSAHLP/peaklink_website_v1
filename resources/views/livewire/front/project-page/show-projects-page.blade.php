<div>
    

    @if(isset($projects) && $projects->count() > 0)
    <section class="page-title" style="background-image: url({{ asset('front/images/background/page-title-bg.png') }});">
        <div class="auto-container">
            <div class="title-outer text-center">
                <h1 class="title">المشاريع</h1>
                <ul class="page-breadcrumb">
                    <li><a href="index.html">الرئيسية</a></li>
                    <li>المشاريع</li>
                </ul>
            </div>
        </div>
    </section>


    <section class="project-section-two">
        <div class="auto-container">
            <div class="row">

                @foreach($projects as $project)
                    
                <div class="project-block-two col-lg-6 col-md-6 wow fadeInUp">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image overlay-anim"><a href="page-project-details.html"
                                    tabindex="-1">
                                    <x-curator-glider :media="$project->image" :alt="$project->title"/>
                                </a></figure>
                            <div class="content-box">
                                <span>{{ $project->categories->title }}</span>
                                <h4 class="title"><a href="page-project-details.html" title>{{ $project->title }}</a>
                                </h4>
                                <a href="page-project-details.html" class="btn">
                                        <img src="{{ asset('front/images/resource/arrow-btn.png') }}" alt="$project->title">    
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach

              
            </div>
        </div>
    </section>
        
@endif


</div>
