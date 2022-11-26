@extends('../layouts.site')
@section('sub-title','Appointments')

@section('navbar')
    @include('../partials.site.navbar')
@endsection

@section('content')
<div class="main main-raised">
    <div class="profile-content">
      <div class="container">
        <div class="row">
          <div class="col-md-6 ml-auto mr-auto">
            <div class="profile">
              <br><br><br>
            
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12 text-center">
              <h2 class="text-center title text-white">Manage Appointments</h2>
          </div>
         
          <div class="col-md-12 text-right">
                <div class="dropdown">
                    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      APPOINTMENT
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item create_record" href="#" >MAKE APPOINTMENT</a>
                     
                      <a class="dropdown-item" id="btn_print_modal"  href="#">PRINT APPOINTMENT</a>
                    </div>
                </div>
          
          </div>

          <div class="col-md-12">
            <div class="row p-2">
              
                  @forelse($appointments as $appointment)
                    <div class="col-md-6">
                          <div class="card">
                            <div class="card-body">
                                <div class="row">
                                  <div class="col-sm-6 mt-4">
                                    <h6 class="card-subtitle mb-2 text-dark">Appointment ID:</h6>
                                    <p class="badge badge-dark">{{$appointment->ref_number}}</p>
                                  </div>
                                  <div class="col-sm-6 mt-4">
                                    @if($appointment->status == 'PENDING')
                                      <h6 class="card-subtitle mb-2 text-dark">STATUS:</h6>
                                      <p class="badge badge-warning">Pending</p><br>

                                    @elseif ($appointment->status == 'APPROVED')
                                      <h6 class="card-subtitle mb-2 text-dark">STATUS:</h6>
                                      <p class="badge badge-info">Approved</p>
                                    @elseif ($appointment->status == 'DECLINED')
                                      <h6 class="card-subtitle mb-2 text-dark">STATUS:</h6>
                                      <p class="badge badge-danger">Declined</p>
                                    @elseif ($appointment->status == 'FOLLOW-UP')
                                      <h6 class="card-subtitle mb-2 text-dark">STATUS:</h6>
                                      <p class="badge badge-primary text-right">FOLLOW-UP</p>
                                    @elseif ($appointment->status == 'COMPLETED')
                                      <h6 class="card-subtitle mb-2 text-dark">STATUS:</h6>
                                      <p class="badge badge-success">Completed</p>
                                    @elseif ($appointment->status == 'FAILED')
                                      <h6 class="card-subtitle mb-2 text-dark">STATUS:</h6>
                                      <p class="badge badge-danger">Failed</p>
                                    @elseif($appointment->status == 'CANCELED')
                                      <h6 class="card-subtitle mb-2 text-dark">STATUS:</h6>
                                      <p class="badge badge-danger">Canceled</p>
                                    @endif
                                  </div>
                                  <div class="col-sm-6 mt-4">
                                    <h6 class="card-subtitle mb-2 text-dark">Symtoms:</h6>
                                    <p>{{$appointment->symtoms ?? ''}}</p>
                                  </div>
                                  <div class="col-sm-6 mt-4">
                                    <h6 class="card-subtitle mb-2 text-dark">Appointment Date & Time:</h6>
                                    <p>{{ \Carbon\Carbon::parse($appointment->date)->isoFormat('MMM Do YYYY')}} at {{$appointment->time}}</p>
                                  </div>

                                  <div class="col-sm-6 mt-4">
                                    <h6 class="card-subtitle mb-2 text-dark">Be specify:</h6>
                                    <p>{{$appointment->note ?? ''}}</p>
                                  </div>

                                  <div class="col-sm-12 d-flex justify-content-between">
                                  @if($appointment->status == 'PENDING')
                                    <button type="button" name="edit" edit="{{  $appointment->id ?? '' }}"  class="edit btn btn-sm btn-primary">Edit Info.</button>
                                    <button type="button" name="cancel" cancel="{{  $appointment->id ?? '' }}"  class="cancel btn btn-sm btn-danger">Cancel</button>
                                  @elseif($appointment->status == 'CANCELED')

                                  @else
                                    <br>
                                      <h6 class="card-subtitle mb-2 text-muted">Admin Comment:</h6>
                                      <p class="card-text">{{$appointment->comment}}</p>
                                  @endif
                                      
                                  </div>
                                </div>
                            </div>
                        </div>
                      </div>
                  @empty
                  <div class="col-md-6">
                          <div class="card">
                            <div class="card-body">
                              <h5 class="card-title">No available data</h5>
                            </div>
                        </div>
                      </div>
                  @endforelse
              
            </div>
          </div>
          

        
          
         

        </div>
       </div>
      </div>
    </div>

  <form method="post" id="myForm" >
      @csrf
      <div class="modal fade" id="formModal" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="material-icons">clear</i>
              </button>
            </div>
            <div class="modal-body">
          
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="bmd-label-floating">Your Name</label>
                        <input type="text" class="form-control" value="{{Auth::user()->name}}" readonly>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="bmd-label-floating">Type of User</label>
                        <input type="text" class="form-control text-uppercase" value="{{Auth::user()->role}}" readonly>
                      </div>
                    </div>
                  </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Your Contact Number</label>
                          <input type="text" class="form-control" value="{{Auth::user()->contact_number}}" readonly>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Your Address</label>
                          <input type="text" class="form-control" value="{{Auth::user()->address}}" readonly>
                        </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                          <label class="label-control">Date <span class="text-danger">*</span></label>
                          
                          <input type="text" class="form-control date_picker" id="date" name="date"  autocomplete="off">

                          <span class="invalid-feedback" role="alert">
                                  <strong id="error-date"></strong>
                              </span>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                          <label class="label-control">Time <span class="text-danger">*</span></label>
                          <input type="text" class="form-control time_picker" id="time" name="time"  autocomplete="off">
                          <span class="invalid-feedback" role="alert">
                              <strong id="error-time"></strong>
                          </span>
                          </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="label-control">Symtoms <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" id="symtoms" name="symtoms"  autocomplete="off">
                          <span class="invalid-feedback" role="alert">
                              <strong id="error-symtoms"></strong>
                          </span>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="label-control">Be Specify</label>
                          <input type="text" class="form-control" id="note" name="note"  autocomplete="off">
                          <span class="invalid-feedback" role="alert">
                              <strong id="error-note"></strong>
                          </span>
                        </div>
                      </div>
                    </div>
                  <input type="hidden" name="action" id="action" value="Add" />
                  <input type="hidden" name="hidden_id" id="hidden_id" />
            </div>
            <div class="modal-footer d-flex justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
              <input type="submit" name="action_button" id="action_button" class="btn btn-primary" value="Save" />
            </div>
          </div>
        </div>
      </div>
  </form>

  <div class="modal fade" id="printModal" role="dialog">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5>PRINT APPOINTMENTS</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="material-icons">clear</i>
          </button>
        </div>
        <div class="modal-body">
        <div class="table-responsive">
          
          <table class="table align-items-center table-bordered display" id="table_print_appointments" cellspacing="0" width="100%">
            <thead class="thead-white text-uppercase font-weight-bold">
              <tr>
                
                <th>Service</th>
                <th>Ref #</th>
                <th>Date/Time</th>
                <th>Assigned Doctor</th>
                <th>Status</th>
                <th>Created At</th>
              
              </tr>
            </thead>
            <tbody class="text-uppercase font-weight-bold">
                @forelse($appointments as $appointment)
                <tr>
                  <td>
                    {{$appointment->service->name ?? ''}}
                  </td>
                  <td>
                    {{$appointment->ref_number ?? ''}}
                  </td>
                  <td>
                    {{ \Carbon\Carbon::parse($appointment->date ?? '')->isoFormat('MMM Do YYYY')}} at {{$appointment->time ?? ''}}
                  </td>
                  <td>
                    {{$appointment->doctor->name ?? ''}}
                  </td>
                  <td>
                    {{$appointment->status ?? ''}}
                  </td>
                  <td>
                    {{ $appointment->created_at->format('M j , Y h:i A') }}
                  </td>
                </tr>
                @empty
                <tr>
                  <td>
                  </td>
                  <td>
                  </td>
                  <td>
                    No available data
                  </td>
                  <td>
                  </td>
                  <td>
                  </td>
                </tr>
                @endforelse
            </tbody>
          
          </table>
        </div>
        </div>
        <div class="modal-footer">
          <input type="button" id="print_record_modal" class="btn btn-primary" value="PRINT"/>
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

$(document).ready(function () {
  var today = new Date();
  var tomorrow = new Date();
   tomorrow.setDate(today.getDate() + 1);
    $('.date_picker').datetimepicker({
        icons: {
            time: "fa fa-clock-o",
            date: "fa fa-calendar",
            up: "fa fa-chevron-up",
            down: "fa fa-chevron-down",
            previous: 'fa fa-chevron-left',
            next: 'fa fa-chevron-right',
            today: 'fa fa-screenshot',
            clear: 'fa fa-trash',
            close: 'fa fa-remove'
        },
        format: 'YYYY-MM-DD',
        locale: 'en',
        minDate: tomorrow,

    });

    $('.time_picker').datetimepicker({
        format: 'LT',
        stepping: 30,
        icons: 
        {
            time: "fa fa-clock-o",
            date: "fa fa-calendar",
            up: "fa fa-chevron-up",
            down: "fa fa-chevron-down",
            previous: 'fa fa-chevron-left',
            next: 'fa fa-chevron-right',
            today: 'fa fa-screenshot',
            clear: 'fa fa-trash',
            close: 'fa fa-remove'
        },
    });
  });

  $(document).on('click', '.create_record', function(){
      $('#formModal').modal('show');
      $('#myForm')[0].reset();
      $('.form-control').removeClass('is-invalid')
      $('.modal-title').text('Add Appointment');
      $('#action_button').val('Submit');
      $('#action').val('Add');
      $('#lblpurpose').addClass('bmd-label-floating')
  });


  $(document).on('click', '#btn_print_modal', function(){
      $('#printModal').modal('show');

      $('#table_print_appointments').DataTable({
        bDestroy: true,
        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,

        buttons: [
            { 
                extend: 'print',
                className: 'd-none',
            }
        ],
    });
  });

  $(document).on('click', '#print_record_modal', function(){
      $('#table_print_appointments').DataTable().buttons(0,0).trigger()
  });



  $('#myForm').on('submit', function(event){
    event.preventDefault();
    $('.form-control').removeClass('is-invalid')
    var action_url = "{{ route('patient.appointment.store') }}";
    var type = "POST";

    if($('#action').val() == 'Edit'){
        var id = $('#hidden_id').val();
        action_url = "appointment/" + id;
        type = "PUT";
    }

    $.ajax({
        url: action_url,
        method:type,
        data:$(this).serialize(),
        dataType:"json",
        beforeSend:function(){
            $("#action_button").attr("disabled", true);
            $("#action_button").attr("value", "Loading..");
        },
        success:function(data){
            if($('#action').val() == 'Edit'){
                $("#action_button").attr("disabled", false);
                $("#action_button").attr("value", "Update");
            }else{
                $("#action_button").attr("disabled", false);
                $("#action_button").attr("value", "Submit");
            }

            if(data.errors){
                $.each(data.errors, function(key,value){
                    
                    if(key == $('#'+key).attr('id')){
                        $('#'+key).addClass('is-invalid')
                        $('#error-'+key).text(value)
                    }
                })
            }
            if(data.success){
                $('.form-control').removeClass('is-invalid')
                $('#myForm')[0].reset();
                $('#formModal').modal('hide');
                $.confirm({
                    title: 'Confirmation',
                    content: data.success,
                    type: 'green',
                    buttons: {
                            confirm: {
                                text: 'confirm',
                                btnClass: 'btn-blue',
                                keys: ['enter', 'shift'],
                                action: function(){
                                    location.reload();
                                }
                            },
                            
                        }
                    });
            }
        
        }
    });
  });

  $(document).on('click', '.edit', function(){
      $('#formModal').modal('show');
      $('.modal-title').text('Appointment Information');
      $('#myForm')[0].reset();
      $('.form-control').removeClass('is-invalid')
      $('#lblpurpose').removeClass('bmd-label-floating')
      var id = $(this).attr('edit');

      $.ajax({
          url :"/patient/appointment/"+id+"/edit",
          dataType:"json",
          beforeSend:function(){
              $("#action_button").attr("disabled", true);
              $("#action_button").attr("value", "Loading..");
          },
          success:function(data){
              if($('#action').val() == 'Edit'){
                  $("#action_button").attr("disabled", false);
                  $("#action_button").attr("value", "Update");
              }else{
                  $("#action_button").attr("disabled", false);
                  $("#action_button").attr("value", "Submit");
              }
              $.each(data.result, function(key,value){
                  if(key == $('#'+key).attr('id')){
                      $('#'+key).val(value)
                      if(key == 'service_id'){
                        $("#service_id").select2("trigger", "select", {
                            data: { id: value }
                        });
                      }
                  }
              })
              $('#hidden_id').val(id);
              $('#action_button').val('Update');
              $('#action').val('Edit');
          }
      })
  });

  
  $(document).on('click', '.cancel', function(){
    var id = $(this).attr('cancel');
    $.confirm({
        title: 'Confirmation',
        content: 'You really want to cancel this record?',
        autoClose: 'cancel|10000',
        type: 'red',
        buttons: {
            confirm: {
                text: 'confirm',
                btnClass: 'btn-blue',
                keys: ['enter', 'shift'],
                action: function(){
                    return $.ajax({
                        url:"appointment/"+id,
                        method:'DELETE',
                        data: {
                            _token: '{!! csrf_token() !!}',
                        },
                        dataType:"json",
                        beforeSend:function(){
                          $('.cancel').html('Canceling..');
                        },
                        success:function(data){
                            if(data.success){
                              $.confirm({
                                title: 'Confirmation',
                                content: data.success,
                                type: 'green',
                                buttons: {
                                        confirm: {
                                            text: 'confirm',
                                            btnClass: 'btn-blue',
                                            keys: ['enter', 'shift'],
                                            action: function(){
                                                location.reload();
                                            }
                                        },
                                        
                                    }
                                });
                            }
                        }
                    })
                }
            },
            cancel:  {
                text: 'cancel',
                btnClass: 'btn-red',
                keys: ['enter', 'shift'],
            }
        }
    });

  });




</script>
@endsection