@extends('../layouts.admin')
@section('sub-title','Calendar')
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
              <h3 class="mb-0 text-uppercase" >CALENDAR</h3>
            </div>
            
          </div>
        </div>
        <div class="card-body">
            <div id="calendar">

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
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
<script>
    function calendaryo(){  
        events={!! json_encode($events) !!}; 
        $('#calendar').fullCalendar({
            events: events,
            selectable: true,
            selectHelper: true,
        });
    }

    $(document).ready(function () {
        return calendaryo();
    });
</script>
@endsection
