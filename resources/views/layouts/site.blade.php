<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" href="{{ asset('/assets/img/logo.jpg') }}" > 
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
 
    <title>@yield('sub-title') | {{ trans('panel.site_title') }}</title>
 
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="{{ asset('/assets/css/material-kit.css?v=2.0.7') }}" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

  <link href="{{ asset('/assets/demo/demo.css') }}" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet" />

  <!-- datatables -->
  <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css" rel="stylesheet" />

  <style>

    .select2-container--default .select2-selection--single {
    background-color: #fff;
    border-radius: 4px;
    height: auto;
    }
    .select2 {
        border: 1px solid #111;
        border-radius: 4px;
        color: #111;
       
    }
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    /* Firefox */
    input[type=number] {
      -moz-appearance: textfield;
    }

    .form-control[readonly] {
      background-color: white;
    }
    .counter.counter-lg {
      top: 1px !important;
      font-weight: bold;
      position: absolute;
    }
    #notification_bell{
      position: fixed;
      bottom: 0;
      right: 0;
      margin-right: 40px;
      margin-bottom: 10px; 
      z-index: 9999;
      background: #C0C0C0;
    }
    .dropdown_list{
      position: fixed;
      bottom: 0;
      right: 0;
      margin-right: 5px;
      margin-bottom: 65px; 
      z-index: 9999;
    }
    #click_notif{
      border-top: solid 1px #c0c0c0;
      cursor: pointer;
    }
    #click_notif:hover{
      background-color: #8E0E00 !important;
      color: white;
    }
    input[type="search"] {
        border: solid 1px black;
    }
    .star {
    visibility:hidden;
    font-size:30px;
    cursor:pointer;
    }
    .star:after {
      content: "\2605";
      position: absolute;
      visibility:visible;
    }
    .star:checked:after {
      content: "\2606";
      position: absolute;
    }
    #notification_bell{
      position: fixed;
      bottom: 0;
      right: 0;
      margin-right: 40px;
      margin-bottom: 10px; 
      z-index: 9999;
      background: #C0C0C0;
    }
    .dropdown_list{
      position: fixed;
      bottom: 0;
      right: 0;
      margin-right: 5px;
      margin-bottom: 65px; 
      z-index: 9999;
    }
    #click_notif{
      border-top: solid 1px #c0c0c0;
      cursor: pointer;
    }
    #click_notif:hover{
      background-color: #8E0E00 !important;
      color: white;
    }
  </style>
</head>

<body class="profile-page sidebar-collapse">
  @yield('navbar')
 
  @yield('content')

  @yield('footer')
  @if (Auth::user())
  @php(
          [
            $notis = App\Models\Notification::where('user_id', Auth::user()->id ?? ''  )->where('isRead', 0)->count(),
            $allnotis =  App\Models\Notification::where('user_id', Auth::user()->id ?? ''  )->orderBy('isRead', 'asc')->latest()->get()
          ]
        )

  <div id="notification_bell" class="btn btn btn-round">
      <i class="fas fa-bell fa-2x" style="color: #f3bd04;"></i>
      <span class="counter counter-lg ">
        

          @if($notis > 0)
            <i class="fas fa-circle text-warning"></i>
          @else

          @endif
      </span> 
  </div>

  <div class="card dropdown_list" style="max-width: 400px; max-height: 200px; overflow-x: scroll; overflow-y: scroll;">

      <ul class="list-group list-group-flush">
              @if(count($allnotis) > 0)
                @foreach($allnotis as $an)
                  <li id="click_notif" click_notif="{{$an->id}}" class="list-group-item">
                    <i class="fas fa-bell {{ $an->isRead == 0 ? 'text-success' : '' }}"></i> <br>
                    {{$an->status}}
                  </li>  
                @endforeach
              @else
                <li class="list-group-item">No Notification</li>
              @endif
        </ul>
  
  </div>
  @endif

  <!--   Core JS Files   -->
  


  <script src="{{ asset('/assets/js/core/jquery.min.js') }}"></script>
  <script src="{{ asset('/assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('/assets/js/core/bootstrap-material-design.min.js') }}"></script>
  <script src="{{ asset('/assets/js/plugins/moment.min.js') }}"></script>
  <script src="{{ asset('/assets/js/plugins/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>


  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="{{ asset('/assets/js/plugins/nouislider.min.js') }}"></script>
  <!--  Google Maps Plugin    -->
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('/assets/js/material-kit.js?v=2.0.7') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>


  <script src="{{ asset('/assets/js/main.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>

  <!-- datatables -->
  <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
  <script src="//cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
  <script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.colVis.min.js"></script>
  <script src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>
  <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
  <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
  
  <script>

    var itemInStock = false;

    $(document).ready(function () {
      $('.dropdown_list').hide();
    });

    $("#notification_bell").click(function(){
        changeStatus();
      });

    function changeStatus(){
        if( itemInStock === false){
          $('.dropdown_list').show();
          itemInStock = true;
           
        } else{
          $('.dropdown_list').hide();
          itemInStock = false;
        }
    }


    $(document).on('click', '#click_notif', function(){
        var id = $(this).attr('click_notif');
        $.ajax({
                url:"../patient/notification/"+id,
                method:'PUT',
                data: {
                    _token: '{!! csrf_token() !!}',
                },
                dataType:"json",
                beforeSend:function(){
                },
                
                success:function(data){
                  location.href = data.success;
                }
            })

    });
  </script>

  @yield('script')
</body>

</html>