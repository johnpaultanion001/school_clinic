@extends('../layouts.site')
@section('sub-title','HOME')

@section('navbar')
    @include('../partials.site.navbar')
@endsection

@section('content')
<div class="main main-raised"> 

    

    <div class="section section-about" id="about">
      <div class="container tim-container">
        <!--     	        typography -->
        <div id="typography" class="cd-section">
          <div class="title">
            <h3 class=" title text-white text-uppercase text-center">ABOUT {{ trans('panel.site_title') }} </h3>
          </div>
          <br>
          <div class="row">
          
          
        <div class="container">
        <div class="row">
          <div class="col-md-6">
              <div class="title">
                  <h3 class="font-weight-bold text-white">Vision:</h3>
              </div>
                <div class="blockquote undefined text-white pt-2">
                  <p>
                      A community in which all people achieve their full potential for health and well-being across the lifespan. We work to be trusted by patients, a valued partner in the community, and creators of positive change.
                  </p>
                </div>
            
          </div>
          <div class="col-md-6">
            <div class="title">
                <h3 class="font-weight-bold text-white">Mission:</h3>
            </div>
                <div class="blockquote undefined text-white pt-2">
                  <p>
                      To deliver patient-centered treatment that is of the highest quality, service, and accessibility.
                  </p>
                </div>
            
          </div>
        </div>
      </div>
   
      <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <div class="title">
                      <h3 class="text-center font-weight-bold text-white text-uppercase">BRIEF HISTORY OF {{ trans('panel.site_title') }}</h3>
                  </div>
                  <br>
                    <p class="text-white text-center" style="font-size: 17px;">
                        For the previous few decades since its founding, the province of Rizal has not felt the necessity for its own hospital. The towns' closeness to Manila was the primary reason that such a need was never perceived. The construction of the Rizal Provincial Hospital began in 1939 and was made possible in 1941 by virtue of Congressional Act 3114, which was later amended by Act 3168, thanks to the initiative and tireless efforts of the late congressman and then Provincial Governor of Rizal, Honorable Eulogio Rodriguez Sr. In the same year, it released its site to the general public with a small team of dedicated employees. The head of the Bureau of Hospitals, currently known as the Bureau of Medical Service, supervises and directs it, with the chief of the Hospital acting as his authorized agent.

                    </p>
                </div>
               
               
              </div>
            </div>
        
          
          </div>
        </div>
     
     
        
      </div>
    </div>

    <div class="section section-news" id="news">
      <div class="container">
        <div class="title">
            <h3  class="title text-white text-uppercase text-center">Hospital News</h3>
        </div>
        
      </div>
    </div>



    <div class="section section-contacts" id="contact">
          <div class="container">
              <h3 class="text-center title text-white">Contact Us</h3>
                <div id="navigation-pills">
                  <div class="row">
                    <div class="col-md-12">
                      
                     
                      <div class="tab-content tab-space">
                        
                      <div class="tab-pane active" id="brgy_directory">
                          <hr class="my-1 bg-white">  
                            <div class="title text-left">
                              <div class="row">
                                  <div class="col-md-6">
                                      <h6 class="font-weight-bold text-white">Hospital Hall Address:	</h6>
                                  </div>
                                  <div class="col-md-6">
                                      <p class="text-white font-weight-light">Barangay San Isidro Angono, Rizal</p>
                                  </div>
                                  <div class="col-md-6">
                                      <h6 class="font-weight-bold text-white">Hospital Telephone Numbers:</h6>
                                  </div>
                                  <div class="col-md-6">
                                      <p class=" font-weight-light text-white">(02) 8651-2253</p>
                                  </div>
                                  <div class="col-md-6">
                                      <h6 class="font-weight-bold text-white">HOSPITAL FACEBOOK PAGE:</h6>
                                  </div>
                                  <div class="col-md-6">
                                      <p class=" font-weight-light text-white">RPHS - Angono</p>
                                  </div>
                                  
                              </div>
                            </div>
                          <hr class="my-1 bg-white">
                        </div>
                        
                          
                          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
        </div>
       
  </div>
 
@endsection


@section('footer')
    @include('../partials.site.footer')
@endsection


@section('script')
<script> 
 $(document).ready(function() {
      //init DateTimePickers
      materialKit.initFormExtendedDatetimepickers();

      // Sliders Init
      materialKit.initSliders();
    });


    function scrollToAbout() {
      if ($('.section-about').length != 0) {
        $("html, body").animate({
          scrollTop: $('.section-about').offset().top
        }, 1000);
      }
    }

    function scrollToContact() {
      if ($('.section-contacts').length != 0) {
        $("html, body").animate({
          scrollTop: $('.section-contacts').offset().top
        }, 1000);
      }
    }

    function scrollToNews() {
      if ($('.section-news').length != 0) {
        $("html, body").animate({
          scrollTop: $('.section-news').offset().top
        }, 1000);
      }
    }

  

</script>
@endsection