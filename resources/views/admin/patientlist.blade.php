@extends('../layouts.admin')
@section('sub-title','Patients')
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
              <h3 class="mb-0 text-uppercase" id="titletable">Patient List</h3>
            </div>
            <div class="col text-right">
              <select name="status_dd" id="status_dd" class="select2">
                  <option value="">FILTER ROLE</option>
                  <option value="STUDENT">STUDENT</option>
                  <option value="TEACHER">TEACHER</option>
                  <option value="NON PERSONNEL">NON PERSONNEL</option>
              </select>
            </div>
            
          </div>
        </div>
        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush datatable-brgy display" cellspacing="0" width="100%">
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
            <tbody class="text-uppercase font-weight-bold">
              @foreach($patients as $patient)
                    <tr>
                      <td>
                          {{  $patient->student_id ?? $patient->teacher_id ?? $patient->non_personnel_id }}
                      </td>
                      <td>
                                <h1 class="btn-sm btn btn-success text-uppercase"> {{  $patient->role ?? '' }}</h1><br>
                          
                      </td>
                      <td>
                          {{  $patient->name ?? '' }}
                      </td>
                      <td>
                          {{  $patient->email ?? '' }}
                      </td>
                      <td>
                            {{  $patient->contact_number ?? '' }}
                      </td>
                      <td>
                            {{  $patient->address ?? '' }}
                      </td>
                      <td>
                            {{  $patient->grade_student ?? 'N/A' }}
                      </td>
                      <td>
                            {{  $patient->lrn ?? 'N/A' }}
                      </td>
                      <td>
                          {{ $patient->created_at->format('l, j \\/ F / Y h:i:s A') }}
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
    'columnDefs': [{ 'orderable': false, 'targets': 0 }],
  });

  $('.datatable-brgy:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
  });



</script>
@endsection
