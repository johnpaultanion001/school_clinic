@extends('../layouts.admin')
@section('sub-title','Dashboard')
@section('navbar')
    @include('../partials.admin.navbar')
@endsection
@section('sidebar')
    @include('../partials.admin.sidebar')
@endsection

@section('stylesheets')


@endsection


@section('content')

<div class="header bg-primary pb-6">
    <div class="container-fluid">
      
    </div>
</div>

<div class="container-fluid mt--6 table-load">
  <div class="row">
    <div class="col-xl-12">
      <div class="row">
           <div class="col-6">
                <div class="card text-center" style="background-color:  #f3bd04;">
                    <div class="card-block">
                        <h4 class="card-title text-white">APPOINTMENTS</h4>
                        <h2><i class="fa fa-calendar fa-3x text-white"></i></h2>
                    </div>
                    <div class="row mx-auto">
                        <div class="col-6">
                          <a href="/admin/appointment">
                            <div class="card card-block text-info  border-left-0 border-top-o border-bottom-0 bg-white btn" style="border: 1px solid #111;">
                                <h3 style="color: #111;">{{$pending}}</h3>
                                <span class="small text-uppercase font-weight-bold" style="color: #111;">PENDING</span>
                            </div>
                          </a>
                        </div>
                        <div class="col-6">
                            <a href="/admin/appointment">
                                <div class="card card-block text-info border-right-0 border-top-o border-bottom-0 bg-white btn" style="border: 1px solid #111;">
                                    <h3 style="color: #111;">{{$approved}}</h3>
                                    <span class="small text-uppercase font-weight-bold" style="color: #111;">APPROVED</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="/admin/appointment">
                                <div class="card card-block text-info border-left-0 border-top-o border-bottom-0 bg-white btn" style="border: 1px solid #111">
                                    <h3 style="color: #111;">{{$declined}}</h3>
                                    <span class="small text-uppercase font-weight-bold" style="color: #111;">DECLINED</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="/admin/appointment">
                                <div class="card card-block text-info  border-right-0 border-top-o border-bottom-0 bg-white btn" style="border: 1px solid #111">
                                    <h3 style="color: #111;">{{$follow}}</h3>
                                    <span class="small text-uppercase font-weight-bold" style="color: #111;">FOLLOW-UP</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="/admin/appointment">
                                <div class="card card-block text-info  border-right-0 border-top-o border-bottom-0 bg-white btn" style="border: 1px solid #111">
                                    <h3 style="color: #111;">{{$completed}}</h3>
                                    <span class="small text-uppercase font-weight-bold" style="color: #111;">COMPLETED</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="/admin/appointment">
                                <div class="card card-block text-info  border-right-0 border-top-o border-bottom-0 bg-white btn" style="border: 1px solid #111">
                                    <h3 style="color: #111;">{{$failed}}</h3>
                                    <span class="small text-uppercase font-weight-bold" style="color: #111;">FAILED</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card text-center" style="background-color:  #f3bd04;">
                    
                        <div class="card-block">
                            <h4 class="card-title text-white">PATIENTS</h4>
                            <h2><i class="fas fa-users fa-3x text-white"></i></h2>
                        </div>
                        
                        <div class="row m-2">
                            <div class="col-12">
                                <a href="/admin/patient_list">
                                    <div class="card card-block text-info  border-left-0 border-top-o border-bottom-0 bg-white btn" style="border: 1px solid #111;">
                                        <h3 style="color: #111;">{{$patients}}</h3>
                                        <span class="small text-uppercase font-weight-bold" style="color: #111;">PATIENTS TOTAL</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                </div>
            </div>
            
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-0" style="background-color:  #f3bd04;">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0 text-uppercase text-white" id="titletable">APPOINTMENT FOR TODAY</h3>
                            </div>
                            
                        </div>
                    </div>
                    <div class="table-responsive mt-2">
                        <table class="table align-items-center table-flush datatable-table display" cellspacing="0" width="100%">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Patient ID</th>
                                    <th scope="col">Full Name</th>
                                    <th scope="col">Symptoms</th>
                                </tr>
                            </thead>
                            <tbody class="text-uppercase font-weight-bold">
                                @foreach($appointment_for_now as $apps)
                                <tr>
                                    <td>{{$apps->id}}</td>
                                    <td>{{$apps->user->name ?? ''}}</td>
                                    <td>{{$apps->symptoms ?? ''}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-0" style="background-color:  #f3bd04;">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0 text-uppercase text-white" id="titletable">All Feedback</h3>
                            </div>
                            
                        </div>
                    </div>
                    <div class="table-responsive mt-2">
                        <table class="table align-items-center table-flush datatable-table display" cellspacing="0" width="100%">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Patient Name</th>
                                    <th scope="col">Feedback</th>
                                    <th scope="col">Rate</th>
                                </tr>
                            </thead>
                            <tbody class="text-uppercase font-weight-bold">
                                @foreach($feedbacks as $feed)
                                <tr>
                                    <td>{{$feed->user->name}}</td>
                                    <td>{{$feed->feedback ?? ''}}</td>
                                    <td>
                                         @for($x = 1; $x <= $feed->stars; $x++)
                                            ⭐
                                        @endfor
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
<div class="card shadow">
      <div
          class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h2 class="m-0 font-weight-bold text-primary">Assestment</h2>
          
      </div>
      <div class="card-body row">
        <div class="col-md-4">
            Category A <br>
            - Jan <br>
            - Mar <br>
            - May <br>
            - June <br>
        </div>
        <div class="col-md-4">
            Category B <br>
            - Feb <br>
            - April <br>
            - July <br>
            - Aug <br>
        </div>
        <div class="col-md-4">
            Category C <br>
            - Sept <br>
            - Oct <br>
            - Nov <br>
            - Dec <br>
        </div>

        <div class="col-md-12 mt-5">
            Category A <br>
            * Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.  <br>
            
        </div>
        <div class="col-md-12 mt-5">
            Category B <br>
            * Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.  <br>
            
        </div>
        <div class="col-md-12 mt-5">
            Category C <br>
            * Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.  <br>
            
        </div>
    </div>
   
</div>


          
        </div>
    </div>
  </div>
</div>

    @section('footer')
        @include('../partials.admin.footer')
    @endsection
@endsection


@section('script')
<script> 
 $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

  $.extend(true, $.fn.dataTable.defaults, {
    sale: [[ 1, 'desc' ]],
    pageLength: 100,
  });

  $('.datatable-table:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
  });
</script>
@endsection




