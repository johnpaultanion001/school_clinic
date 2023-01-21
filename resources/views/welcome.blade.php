@extends('../layouts.site')
@section('sub-title','HOME')

@section('navbar')
    @include('../partials.site.navbar')
@endsection

@section('content')
<div class="main main-raised"> 

    <div class="section section-about" id="about">
      <div class="container row">
        <div class="col-6">
          <img src="{{ asset('/assets/img/bg.jpg') }}" width="100%" alt="bg">
        </div>
        <div class="col-6 mx-auto text-center text-white font-weight-bold">
          <br><br><br><br>
          <h3> LOGO</h3> <br>
          <h3> {{ trans('panel.site_title') }}</h3>
        </div>
      </div>
    </div>
    
    <div class="section section-news" id="news">
      
      <div class="container">
        <div class="title">
            <h3  class="title text-white text-uppercase text-center">Frequently Asked Questions</h3>
        </div>
     
        <div class="accordion" id="accordionExample">
            <div class="card">
              <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                  <button class="btn btn-link text-dark h6" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Collapsible Group Item #1
                  </button>
                </h2>
              </div>

              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                  <button class="btn btn-link text-dark collapsed h6" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Collapsible Group Item #2
                  </button>
                </h2>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingThree">
                <h2 class="mb-0">
                  <button class="btn btn-link text-dark collapsed h6" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Collapsible Group Item #3
                  </button>
                </h2>
              </div>
              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
              </div>
            </div>
        </div>
        <div class="title">
            <h3  class="title text-white text-uppercase text-center">FEEDBACKS</h3>
        </div>
        <div class="row">
          @foreach($feeedbacks as $feeedback)
          <div class="col-sm-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">{{$feeedback->user->name ?? ''}}</h5>
                <p class="card-text">{{$feeedback->feedback ?? ''}}</p>
                @for($x = 1; $x <= $feeedback->stars; $x++)
                ⭐
                @endfor
              </div>
            </div>
          </div>
          @endforeach
          
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
                                      <h6 class="font-weight-bold text-white">Address:	</h6>
                                  </div>
                                  <div class="col-md-6">
                                      <p class="text-white font-weight-light">Test test</p>
                                  </div>
                                  <div class="col-md-6">
                                      <h6 class="font-weight-bold text-white">Telephone Numbers:</h6>
                                  </div>
                                  <div class="col-md-6">
                                      <p class=" font-weight-light text-white">(02) 8651-2253</p>
                                  </div>
                                  <div class="col-md-6">
                                      <h6 class="font-weight-bold text-white">FACEBOOK PAGE:</h6>
                                  </div>
                                  <div class="col-md-6">
                                      <p class=" font-weight-light text-white">test test</p>
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

    $(document).on('click', '.view', function(){
      $('#viewModal').modal('show');
      $('.link_website').hide();
      var id = $(this).attr('view');
      
      $.ajax({
        url :"/view/"+id,
        dataType:"json",
        beforeSend:function(){
           $(".modal-title").text('Loading...');
        },
        success:function(data){
            $(".modal-title").text('View News');
            $.each(data.result, function(key,value){
                if(key == $('#'+key).attr('id')){
                    $('#'+key).text(value)
                }
                if(key == 'link_website'){
                  if(value == null){
                    $('.link_website').hide();
                  }else{
                    $('.link_website').show();
                    $('#link_websites').prop('href' , value);
                  }
                }
                if(key == 'image'){
                  $('#image_ann').prop("src", '/assets/img/announcements/'+ value);
                }
            })
        }
    })

    });
  

</script>
@endsection