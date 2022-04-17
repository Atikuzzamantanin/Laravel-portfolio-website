 <!-- ======= Course Section ======= -->
    <section id="course" class="portfolio">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>কোর্স সমুহ</h2>
          <p>আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরও যে সকল কোর্স আমি প্রদান করি</p>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

         
          @foreach($coursedata as $courval)
          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img class="courseImg" src="{{$courval->course_img}}" class="img-fluid" alt="">
              
              <div class="portfolio-info">
                <h4>{{$courval->course_name}}</h4>
                <p style="color:#52F80C;">{{$courval->course_des}}</p><br>

                <h5 class="card-text" style="color:#FFFFFF;">{{$courval->course_totalclass}}</h5><br>
                    <a target="_blank" href="{{$courval->course_link}}" class="btn btn-danger btn-sm">শুরু করুন</a>
                <div class="portfolio-links">
                  <a href="{{$courval->course_img}}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="{{$courval->course_name}}"><i class="bx bx-plus"></i></a>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>

      </div>
    </section><!-- End Course Section -->