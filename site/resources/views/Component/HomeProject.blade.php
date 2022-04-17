<!-- ======= Project Section ======= -->
    <section id="project" class="testimonials">
      <div class="container" data-aos="fade-up">
        <div class="section-title pb-0 mb-0">
          <h2>প্রজেক্ট</h2>
          <p>আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরও যে সকল কোর্স আমি প্রদান করি</p>
        </div><br>

        <div class="swiper-pagination"></div>

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">
            @foreach($projectSelect as $valu)
            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                 <img src="{{$valu->project_img}}" alt="">
                  <h3>{{$valu->project_name}}</h3>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                      {{$valu->project_des}}
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p><br>
                  <a href="{{$valu->project_link}}" target="_blank" class="btn btn-danger mt-5">বিস্তারিত</a>
                </div>
              </div>
            </div><!-- End testimonial item -->
            @endforeach
          </div>

        </div>
      </div>
    </section><!-- End Project Section -->