<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('sub-title') | {{ trans('panel.site_title') }}</title>

    <!-- Favicon -->
    <link rel="icon" href="../assets/img/logo.jpg" >
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- css -->
    <link href="{{ asset('/admin/vendor/nucleo/css/nucleo.css') }}" rel="stylesheet" />
    <link href="{{ asset('/admin/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/admin/css/argon.css?v=1.2.0') }}" type="text/css" rel="stylesheet" />
    
   

    <link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet" />
    
    <!-- datatables -->
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css" rel="stylesheet" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />

    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet" />

    
    @yield('stylesheets')
    @stack('page_css')

    <style>
    
    .select2-container--default .select2-selection--single {
    background-color: #fff;
    border-radius: 4px;
    height: auto;
    }
    .modal-backdrop
    {
        opacity:0.5 !important;
    }
    .select2 {
        border: 1px solid #111;
        border-radius: 4px;
        color: #111;
       
    }
    .form-control{
        border: 1px solid #111;
        color: #111;
    }
    .receipt-body{
        overflow: auto;
        max-height: 270px;
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

 
        
    
  
  
    </style>
</head>
    <body class="bg-default">
        <!-- sidebar -->
        @yield('sidebar')

            <div class="main-content" id="panel">
                <!-- Topnav -->
                    @yield('navbar')
                    <!-- Header -->
                    <!-- Header -->
                    <!-- Page content -->
                    @yield('content')
                    @yield('footer')
                    @if (Auth::user())
                    @php(
                        [
                        $notis = App\Models\Notification::where('user_id', Auth::user()->id ?? ''  )->where('isRead', 0)->count(),
                        $allnotis =  App\Models\Notification::where('user_id', Auth::user()->id ?? ''  )->orderBy('isRead', 'asc')->latest()->get()
                        ]
                    )

                    <div id="notification_bell" class="btn btn btn-round" style="border-radius: 25px;">
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
                    
        
            </div>

            <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
             </form>
        
        <!-- Argon Scripts -->
      
        <script src="{{ asset('/admin/vendor/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('/admin/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('/admin/vendor/js-cookie/js.cookie.js') }}"></script>
        <script src="{{ asset('/admin/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
        <script src="{{ asset('/admin/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
        <script src="{{ asset('/admin/js/argon.js?v=1.2.0') }}"></script>

        

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
        
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

        
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

        <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://unpkg.com/@coreui/coreui@2.1.16/dist/js/coreui.min.js"></script>
       
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>

        



        <script>
  $(function() {
        let copyButtonTrans = 'COPY'
        let csvButtonTrans = 'CSV'
        let excelButtonTrans = 'EXCEL'
        let pdfButtonTrans = 'PDF'
        let printButtonTrans = 'PRINT'
        let colvisButtonTrans = 'VIEW'

        let languages = {
        'en': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/English.json'
        };

        $.extend(true, $.fn.dataTable.Buttons.defaults.dom.button, { className: 'btn btn-sm mt-1 btn-default ' })
        $.extend(true, $.fn.dataTable.defaults, {
        language: {
            url: languages['{{ app()->getLocale() }}']
        },
       
        order: [],
        scrollX: true,
        pageLength: 100,
        dom: 'lBfrtip<"actions">',
        buttons: [
        
            {
            extend: 'excel',
            className: 'btn-default btn-sm mt-1 mb-1',
            text: excelButtonTrans,
            exportOptions: {
                columns: ':visible'
            }
            },
            {
            extend: 'pdf',
            className: 'btn-default btn-sm mt-1 mb-1',
            text: pdfButtonTrans,
            exportOptions: {
                columns: ':visible'
            }
            },
            
            {
            extend: 'colvis',
            className: 'btn-default btn-sm mt-1 mb-1',
            text: colvisButtonTrans,
            exportOptions: {
                columns: ':visible'
            }
            
            }
        ]
        });

        $.fn.dataTable.ext.classes.sPageButton = '';
        });

    </script>

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
