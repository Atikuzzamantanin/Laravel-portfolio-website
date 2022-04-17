
<style>
  .services .icon-box h4{color:red;}
</style>
  <!-- ======= Services Section ======= -->
    <section id="service" class="services section-bg ">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>সার্ভিস সমুহ</h2>
          <p>আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরও যে সকল সার্ভিস আমি প্রদান করি</p>
        </div>

        <div class="row">
          @foreach($service as $valu)
          <div class="col-md-4">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <i class="icon-box">
                <img  class="serImg" src="{{$valu->service_img}}" alt="">
              </i>
              
              <h4>{{$valu->service_name}}</h4>
              <p>{{$valu->service_dec}}</p>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section><!-- End Services Section -->