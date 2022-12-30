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
      <div class="card">
        <div class="card-body mx-auto">
            <div class="row">
              <div class="col-lg-8">
                  <div style="width: 400px;" id="reader"></div>
              </div>
              
            </div>
            <h4 id="text_warning" class="text-center"></h4>
        </div>
      </div>
      <div class="card">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0 text-uppercase" id="titletable">Patient Detail</h3>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush datatable-events display" cellspacing="0" width="100%">
            <thead class="thead-light">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Role</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Contact Number</th>
                <th scope="col">Address</th>
                <th scope="col">Grade / Section</th>
                <th scope="col">LRN</th>
                <th scope="col">Register At</th>
              </tr>
            </thead>
            <tbody class="text-uppercase font-weight-bold" id="tbl_detail">
                 <tr>
                    <td>
                      NO DATA FOUND 
                    </td>
                  </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="card">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0 text-uppercase" id="titletable">All Appointment</h3>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush datatable-events display" cellspacing="0" width="100%">
            <thead class="thead-light">
              <tr>
                <th scope="col">Appointment ID</th>
                <th scope="col">Ref Number</th>
                <th scope="col">Appointment Date & Time</th>
                <th scope="col">Status</th>
                <th scope="col">Admin Comment</th>
                <th scope="col">Created At</th>
                <th scope="col">Date COMPLETED</th>

              </tr>
            </thead>
            <tbody class="text-uppercase font-weight-bold" id="tbl_appointment">
                 <tr>
                    <td>
                      NO DATA FOUND 
                    </td>
                  </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="col-md-12" id="loadgraph">

      </div>
    
    </div>
  </div>
</div>


    @section('footer')
        @include('../partials.admin.footer')
    @endsection
@endsection


@section('script')
<script src="{{ asset('/assets/js/qr_code_scanner.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script> 
var qr_code = null;
    $(function () {
      $('#btn_requesting').click();
    });

    function loadgraph(qr_code){
        $.ajax({
            url: "/admin/qr/assesement/"+qr_code, 
            type: "get",
            dataType: "HTMl",
            beforeSend: function() {
            
            },
            success: function(response){
                $("#loadgraph").html(response);
            }	
              
        })
    }

    function onScanSuccess(qrCodeMessage) {
      $('#qr_result').val(qrCodeMessage)
      qr_code = qrCodeMessage;

      $.ajax({
        url :"/admin/qr/"+qr_code,
        method:"GET",
        dataType:"json",
        data: {
            _token: '{!! csrf_token() !!}',
        },
        beforeSend:function(){

        },
        success:function(data){
            console.log(data.graph_data);
            console.log(data.appointments);
            $('#text_warning').text(data.message);
            $('#text_warning').addClass('text-success');

            var user = "";
            $.each(data.user, function(key,value){
                user += `
                    <tr>
                        <td>
                        `+value.id+`
                        </td>
                        <td>
                        `+value.role+`
                        </td>
                        <td>
                        `+value.name+`
                        </td>
                        <td>
                        `+value.email+`
                        </td>
                        <td>
                        `+value.contact_number+`
                        </td>
                        <td>
                        `+value.address+`
                        </td>
                        <td>
                        `+value.grade_student+`
                        </td>
                        <td>
                        `+value.lrn+`
                        </td>
                        <td>
                        `+value.register_at+`
                        </td>
                    </tr>
                    `; 
            })
            $('#tbl_detail').empty().append(user);

            var appointments = "";
            $.each(data.appointments, function(key,value){
                appointments += `
                    <tr>
                        <td>
                        `+value.id+`
                        </td>
                        <td>
                        `+value.ref_number+`
                        </td>
                        <td>
                        `+value.date_time+`
                        </td>
                        <td>
                        `+value.status+`
                        </td>
                        <td>
                        `+value.admin_comment+`
                        </td>
                        <td>
                        `+value.created_at+`
                        </td>
                        <td>
                        `+value.completed_at+`
                        </td>
                      
                    </tr>
                    `; 
            })

            $('#tbl_appointment').empty().append(appointments);
            loadgraph(qr_code);

        }
      });

    }
    function onScanError(errorMessage) {
      //handle scan error
    }
    var html5QrcodeScanner = new Html5QrcodeScanner(
    "reader", { fps: 10, qrbox: 250 });
    html5QrcodeScanner.render(onScanSuccess, onScanError);



</script>
@endsection





