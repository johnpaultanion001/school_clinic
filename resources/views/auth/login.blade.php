@extends('../layouts.site')
@section('sub-title','Login')

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
        <div class="col-lg-6 col-md-6 ml-auto mr-auto">
          <div class="card card-login">
          <form method="POST" action="{{ route('login') }}">
              @csrf
              <div class="card-header card-header-primary text-center">
                <h4 class="card-title">Login</h4>
                <p class="description text-white text-center">Your Credentials</p>
              </div>
              <br><br>
              <div class="card-body">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fas fa-user fa-lg"></i>
                    </span>
                  </div>
                  
                  <input type="text" id="username" name="username" class="form-control @error('username') is-invalid @enderror" placeholder="Email Or Phone Number" value="{{ old('username') }}" required autocomplete="username" autofocus>
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                @if(session()->has('error_login'))
                        <strong class="text-danger">{{ session()->get('error_login') }}</strong>
                  @endif
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">lock_outline</i>
                    </span>
                  </div>
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                  <span toggle="#current_password-field" class="fa fa-fw fa-eye field_icon toggle-current_password" style="float: right; margin-left: -25px; margin-top: 10px; position: relative; z-index: 2;"></span>   
                  @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              </div>
              <br><br><br>
              <div class="footer text-center">
               
                <button type="submit" class="btn btn-primary btn-lg"> Login </button>
              </div>
              <p class="description text-center">Not a member? <br>
              <a href="/register?user_type=student">Register as a student?</a>
              <br> <a href="/register?user_type=teacher">Register as a teacher?</a>
              <br> <a href="/register?user_type=non_personnel">Register as a non personnel?</a> </p>
              <p class="description text-center"><a href="/password/reset">Forgot your password?</a></p>
              <br><br>
            </form>
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
$("body").on('click', '.toggle-current_password', function() {
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $("#password");
    if (input.attr("type") === "password") {
    input.attr("type", "text");
    } else {
    input.attr("type", "password");
    }
});
</script>
@endsection