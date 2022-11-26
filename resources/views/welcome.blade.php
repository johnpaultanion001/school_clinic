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
            <h3  class="title text-white text-uppercase text-center">FEEDBACKS</h3>
        </div>
        @foreach($announcements as $announcement)
          <article class="view postcard light blue" view="{{  $announcement->id ?? '' }}">
              
             

              <div class="postcard__text t-dark">
                <h1 class="postcard__title blue">{{$announcement->title}}</h1>
                <div class="postcard__subtitle small">
                  <time datetime="2020-05-25 12:00:00">
                    <i class="fas fa-calendar-alt mr-2"></i> {{ $announcement->created_at->format('F d,Y h:i A') }} <i class="fas fa-user ml-2 mr-2"></i>{{  $announcement->user->name ?? '' }}
                  </time>
                </div>
                <div class="postcard__bar"></div>
                <div class="postcard__preview-txt">  {{\Illuminate\Support\Str::limit($announcement->body,150)}}
                </div>
            </div>
          </article>
        @endforeach
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