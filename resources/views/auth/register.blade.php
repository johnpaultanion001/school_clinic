@extends('../layouts.site')
@section('sub-title','Register')

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
        <div class="col-lg-10 col-md-10 ml-auto mr-auto">
          <div class="card card-login">
          <form method="POST" action="{{ route('register') }}">
              @csrf
              <div class="card-header card-header-primary text-center">
                <h4 class="card-title">Register</h4>
                <p class="description text-white text-center">All Field Are Required</p>
              </div>
              <br><br>
              <div class="card-body row">
                  <div class="col-md-10 mx-auto">
                    <div class="form-group">
                      <label for="name" class="bmd-label-floating">Name <span class="text-danger">*</span></label>
                      <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"  autocomplete="name" autofocus>
                      @error('name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-10 mx-auto">
                    <div class="form-group">
                      <label for="email" class="bmd-label-floating">Email <span class="text-danger">*</span></label>
                      <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"  value="{{ old('email') }}"  autocomplete="email">
                      @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-10 mx-auto">
                    <div class="form-group">
                      <label for="contact_number" class="bmd-label-floating">Contact Number <span class="text-danger">*</span></label>
                      <input type="number" id="contact_number" name="contact_number" class="form-control @error('contact_number') is-invalid @enderror"  value="{{ old('contact_number') }}"  autocomplete="contact_number">
                      @error('contact_number')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-10 mx-auto">
                    <div class="form-group">
                      <label for="address" class="bmd-label-floating">Home Address <span class="text-danger">*</span></label>
                      <input type="text" id="address" name="address" class="form-control @error('address') is-invalid @enderror"  value="{{ old('address') }}"  autocomplete="address">
                      @error('address')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-10 mx-auto grade_section">
                    <div class="form-group">
                      <label for="grade_section" class="bmd-label-floating">Grade/Section <span class="text-danger">*</span></label>
                      <input type="text" id="grade_section" name="grade_section" class="form-control @error('grade_section') is-invalid @enderror"  value="{{ old('grade_section') }}" autocomplete="grade_section">
                      @error('grade_section')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-10 mx-auto lrn">
                    <div class="form-group">
                      <label for="lrn" class="bmd-label-floating">LRN Of Student <span class="text-danger">*</span></label>
                      <input type="text" id="lrn" name="lrn" class="form-control @error('lrn') is-invalid @enderror"  value="{{ old('lrn') }}" autocomplete="lrn">
                      @error('lrn')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-10 mx-auto student_id">
                    <div class="form-group">
                      <label for="student_id" class="bmd-label-floating">Student ID <span class="text-danger">*</span></label>
                      <input type="text" id="student_id" name="student_id" class="form-control @error('student_id') is-invalid @enderror"  value="{{ old('student_id') }}" autocomplete="student_id">
                      @error('student_id')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-10 mx-auto teacher_id">
                    <div class="form-group">
                      <label for="teacher_id" class="bmd-label-floating">Teacher ID <span class="text-danger">*</span></label>
                      <input type="text" id="teacher_id" name="teacher_id" class="form-control @error('teacher_id') is-invalid @enderror"  value="{{ old('teacher_id') }}" autocomplete="teacher_id">
                      @error('teacher_id')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-10 mx-auto non_personnel_id">
                    <div class="form-group">
                      <label for="non_personnel_id" class="bmd-label-floating">Non Personnel ID <span class="text-danger">*</span></label>
                      <input type="text" id="non_personnel_id" name="non_personnel_id" class="form-control @error('non_personnel_id') is-invalid @enderror"  value="{{ old('non_personnel_id') }}" autocomplete="non_personnel_id">
                      @error('non_personnel_id')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-10 mx-auto">
                    <div class="form-group">
                      <label for="password"class="bmd-label-floating" >Password <span class="text-danger">*</span></label>
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password" >
                      <span toggle="#current_password-field" class="fa fa-fw fa-eye field_icon toggle-current_password" style="float: right; margin-left: -25px; margin-top: -22px; position: relative; z-index: 2;"></span>   
                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-10 mx-auto">
                    <div class="form-group">
                      <label for="password-confirm" class="bmd-label-floating">Confirm Password <span class="text-danger">*</span></label>
                      <input type="password" id="password-confirm" name="password_confirmation" class="form-control"  autocomplete="new-password">
                      <span toggle="#current_password-field" class="fa fa-fw fa-eye field_icon toggle-confirm_password" style="float: right; margin-left: -25px; margin-top: -22px; position: relative; z-index: 2;"></span>   
                    </div>
                  </div>
                  <div class="col-md-10 mx-auto text-center">
                    <div class="form-group form-check ml-3">
                      <input type="checkbox" class="form-check-input show_terms_and_condition @error('terms_and_conditions') is-invalid @enderror" name="terms_and_conditions" id="terms_and_conditions">
                      <label class="form-check-label text-uppercase text-primary show_terms_and_condition" style="font-size: 15px;">Terms and conditions</label>
                      @error('terms_and_conditions')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                    <input type="hidden" readonly id="user_type" name="user_type" value="test">
                  </div>
              </div>
              <br><br><br>
              <div class="footer text-center">
               
                <button type="submit" class="btn btn-primary btn-lg"> Register </button>
              </div>
              <p class="description text-center">Already a member? <a href="/login">Login Now</a> </p>
              <br><br>
            </form>
          </div>
        </div>
      </div>
    </div>
      </div>
    </div>
 

  <div class="modal fade" id="tacModal" role="dialog">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Terms and Conditions</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="material-icons">clear</i>
          </button>
        </div>
        <div class="modal-body">
          <div class="row justify-content-center">
              <iframe src="/assets/terms_and_conditions/Terms-and-Conditions.pdf#zoom=135" width="90%" height="900">
              </iframe>
          </div>
        </div>
        <div class="modal-footer">
          <input type="button" id="tacConfirm" class="btn btn-primary text-uppercase" value="All Agreed to the Terms and Conditions"/>
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

$(function () {
  var params = new window.URLSearchParams(window.location.search);
  var user_type = params.get('user_type')
  if(user_type == 'student'){
    $('.card-title').text('REGISTRATION OF STUDENT');
    $('.teacher_id').hide();
    $('.non_personnel_id').hide();
    $('.student_id').show();
    $('.grade_section').show();
    $('.lrn').show();
    $('#user_type').val('student');
    
  }
  if(user_type == 'teacher'){
    $('.card-title').text('REGISTRATION OF TEACHER');
    $('.student_id').hide();
    $('.grade_section').hide();
    $('.lrn').hide();
    $('.non_personnel_id').hide();
    $('.teacher_id').show();
    $('#user_type').val('teacher');
  }

  if(user_type == 'non_personnel'){
    $('.card-title').text('REGISTRATION OF NON PERSONNEL');
    $('.student_id').hide();
    $('.grade_section').hide();
    $('.lrn').hide();
    $('.teacher_id').hide();
    $('.non_personnel_id').show();
    $('#user_type').val('non_personnel');
  }
  
});

$(document).on('click', '.show_terms_and_condition', function(){
    $('#tacModal').modal('show');
    $('#terms_and_conditions').prop('checked', false);
});

$(document).on('click', '#tacConfirm', function(){
    $('#tacModal').modal('hide');
    $('#terms_and_conditions').prop('checked', true);
});

$("body").on('click', '.toggle-current_password', function() {
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $("#password");
    if (input.attr("type") === "password") {
    input.attr("type", "text");
    } else {
    input.attr("type", "password");
    }
});

$("body").on('click', '.toggle-confirm_password', function() {
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $("#password-confirm");
    if (input.attr("type") === "password") {
    input.attr("type", "text");
    } else {
    input.attr("type", "password");
    }
});



</script>
@endsection