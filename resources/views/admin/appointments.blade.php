@extends('../layouts.admin')
@section('sub-title','Appointments')
@section('navbar')
    @include('../partials.admin.navbar')
@endsection
@section('sidebar')
    @include('../partials.admin.sidebar')
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
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0 text-uppercase" id="titletable">Manage Appointments</h3>
            </div>
            <div class="col text-right">
              <select name="status_dd" id="status_dd" class="select2">
                  <option value="">FILTER STATUS</option>
                  <option value="PENDING">PENDING</option>
                  <option value="APPROVED">APPROVED</option>
                  <option value="DECLINED">DECLINED</option>
                  <option value="CANCELLED">CANCELLED</option>
                  <option value="FOLLOW-UP">FOLLOW-UP</option>
                  <option value="COMPLETED">COMPLETED</option>
              </select>
            </div>
            
          </div>
        </div>
        <div class="table-responsive">
          <!-- Projects table -->
          <table id="datatable-apps" class="table align-items-center table-flush display" cellspacing="0" width="100%">
            <thead class="thead-light">
              <tr>
               
                <th scope="col">Actions</th>
                <th scope="col">Appointment ID</th>
                <th scope="col">Role</th>
                <th scope="col">Full Name</th>
                <th scope="col">Email</th>
                <th scope="col">Contact Number</th>
                <th scope="col">Address</th>
                <th scope="col">Ref Number</th>
                <th scope="col">Appointment Date & Time</th>
                <th scope="col">Status</th>
                <th scope="col">Admin Comment</th>

                <th scope="col">Created At</th>
                <th scope="col">Date COMPLETED</th>
            </thead>
            <tbody class="text-uppercase font-weight-bold">
              @foreach($appointments as $appointments)
                    <tr data-entry-id="{{ $appointments->id ?? '' }}">
                    
                      <td>
                          <button type="button" name="change" change="{{  $appointments->id ?? '' }}"  class="change  btn btn-sm  btn-primary text-uppercase">Change Status</button>
                          <button type="button" name="remove" remove="{{  $appointments->id ?? '' }}" class="remove btn btn-sm  btn-danger text-uppercase">Remove</button>
                      </td>
                      <td>
                          {{  $appointments->id ?? '' }}
                      </td>
                      <td>
                                <h1 class="btn-sm btn btn-success text-uppercase"> {{  $appointments->user->role ?? '' }}</h1><br>
                          
                      </td>
                      <td>
                          {{  $appointments->user->name ?? '' }}
                      </td>
                      <td>
                          {{  $appointments->user->email ?? '' }}
                      </td>

                      <td>
                            {{  $appointments->user->contact_number ?? '' }}
                      </td>
                      <td>
                            {{  $appointments->user->address ?? '' }}
                      </td>
                      <td>
                            {{  $appointments->ref_number ?? '' }}
                      </td>
                      <td>
                            {{  $appointments->date ?? '' }} at {{  $appointments->time ?? '' }}
                      </td>
                      <td>
                            @if($appointments->status == 'PENDING')
                                <h1 class="btn-sm btn btn-warning text-uppercase">Pending</h1><br>
                            @elseif ($appointments->status == 'APPROVED')
                                <h1 class="btn-sm btn btn-info text-uppercase">Approved</h1>
                            @elseif ($appointments->status == 'DECLINED')
                                <h1 class="btn-sm btn btn-danger text-uppercase">Declined</h1>
                            @elseif ($appointments->status == 'FOLLOW-UP')
                                <h1 class="btn-sm btn btn-primary text-uppercase">Follow-Up</h1>
                            @elseif ($appointments->status == 'COMPLETED')
                                <h1 class="btn-sm btn btn-success text-uppercase">Completed</h1>
                            @elseif ($appointments->status == 'CANCELLED')
                                <h1 class="btn-sm btn btn-danger text-uppercase">Cancelled</h1>
                            @endif
                      </td>
                      <td>
                          {{  $appointments->comment ?? '' }}
                      </td>
                      <td>
                          {{ $appointments->created_at->format('l, j \\/ F / Y h:i:s A') }}
                      </td>
                      <td>
                          @if($appointments->status == 'COMPLETED')
                            {{ $appointments->updated_at->format('l, j \\/ F / Y h:i:s A') }}
                          @endif
                      </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<form method="post" id="myForm" class="contact-form">
    @csrf
    <div class="modal fade" id="formModal" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <i class="fas fa-times"></i>
            </button>
          </div>
          <div class="modal-body">
                <div class="form-group">
                  <label for="status" class="bmd-label-floating">Status</label>
                  <select name="status" id="status" class="form-control select2">
                          <option value="" disabled selected>Select Status</option>
                          <option value="PENDING">PENDING</option>
                          <option value="APPROVED">APPROVED</option>
                          <option value="DECLINED">DECLINED</option>
                          <option value="FOLLOW-UP">FOLLOW-UP</option>
                          <option value="COMPLETED">COMPLETED</option>
                          
                  </select>
                </div>
              
                <div class="form-group">
                  <label for="comment" id="lblpurpose" class="bmd-label-floating">Comment:</label>
                  <textarea class="form-control comment" rows="4" name="comment" id="comment"></textarea>
                  <span class="invalid-feedback" role="alert">
                      <strong id="error-comment"></strong>
                  </span>
                </div>

                <input type="hidden" name="action" id="action" value="Add" />
                <input type="hidden" name="hidden_id" id="hidden_id" />
              
          </div>
          <div class="modal-footer">
            <input type="submit" name="action_button" id="action_button" class="btn btn-primary text-uppercase" value="Save" />
            <button type="button" class="btn btn-danger text-uppercase" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </form>

@section('footer')
    @include('../partials.admin.footer')
@endsection


@endsection

@section('script')
<script>
  $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)


    $.extend(true, $.fn.dataTable.defaults, {
    pageLength: 100,
      'columnDefs': [{ 'orderable': false, 'targets': 0 }],
    });


    var table = $('#datatable-apps:not(.ajaxTable)').DataTable({ buttons: dtButtons });
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });

    $('#status_dd').on('change', function () {
      table.columns(9).search( this.value ).draw();
    });

  });

  $(document).on('click', '.change', function(){
      $('#formModal').modal('show');
      $('.modal-title').text('Change Status');
      $('#myForm')[0].reset();
      $('.form-control').removeClass('is-invalid');
      $('#status').select2({
        placeholder: 'Select Status'
      })

      var id = $(this).attr('change');
      $('#hidden_id').val(id);
      available_doctor();
      $('#current_selected_doctor').text(null);
  

      $.ajax({
          url :"/admin/appointment/"+id,
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

                    if(key == 'status'){
                          $("#status").select2("trigger", "select", {
                              data: { id: value }
                          });
                    }

                    
                }
                if(key == 'doctor_id'){
                    $("#doctor").val(value);
                }
                
              })

              $('#action_button').val('Update');
              $('#action').val('Edit');
              
              
          }
      })
  });

  function available_doctor(){
      var id = $('#hidden_id').val();
      $.ajax({
          url: "/admin/doctor/appointment/available", 
          type: "get",
          dataType:"json",
          data: {
              id:id,_token: '{!! csrf_token() !!}',
          },
          beforeSend: function() {
          },
          success: function(data){
                var doctors = '';
                doctors += '<option value="">Select Doctor</option>';
                $.each(data.doctors, function(key,value){
                    doctors += '<option value="'+value.id+'">'+value.name+'</option>';
                });
                $('#doctor').empty().append(doctors);
              
              
          },
      });
  }

  $('#myForm').on('submit', function(event){
    event.preventDefault();
    
    var id = $('#hidden_id').val();
    var action_url = "appointment/" + id;
    var type = "PUT"; 

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
            var html = '';
            if(data.errors){
                $.each(data.errors, function(key,value){
                    if($('#action').val() == 'Edit'){
                        $("#action_button").attr("disabled", false);
                        $("#action_button").attr("value", "Update");
                    }else{
                        $("#action_button").attr("disabled", false);
                        $("#action_button").attr("value", "Submit");
                    }
                    if(key == $('#'+key).attr('id')){
                        $('#'+key).addClass('is-invalid')
                        $('#error-'+key).text(value)
                    }
                })
            }
            if(data.success){
                if($('#action').val() == 'Edit'){
                    $("#action_button").attr("disabled", false);
                    $("#action_button").attr("value", "Update");
                }else{
                    $("#action_button").attr("disabled", false);
                    $("#action_button").attr("value", "Submit");
                }
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

  $(document).on('click', '.remove', function(){
    var id = $(this).attr('remove');
    $.confirm({
        title: 'Confirmation',
        content: 'You really want to remove this record?',
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
                          $('#titletable').text('Loading...');
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
