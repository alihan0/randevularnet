@extends('rell.auth')
@section('title')
    {{__('text.title.register')}}
@endsection

@section('content')
<!-- Section: Design Block -->
<section class="background-radial-gradient overflow-hidden">
    <style>
      .background-radial-gradient {
        background-color: hsl(218, 41%, 15%);
        background-image: radial-gradient(650px circle at 0% 0%,
            hsl(218, 41%, 35%) 15%,
            hsl(218, 41%, 30%) 35%,
            hsl(218, 41%, 20%) 75%,
            hsl(218, 41%, 19%) 80%,
            transparent 100%),
          radial-gradient(1250px circle at 100% 100%,
            hsl(218, 41%, 45%) 15%,
            hsl(218, 41%, 30%) 35%,
            hsl(218, 41%, 20%) 75%,
            hsl(218, 41%, 19%) 80%,
            transparent 100%);
      }
  
      #radius-shape-1 {
        height: 220px;
        width: 220px;
        top: -60px;
        left: -130px;
        background: radial-gradient(#44006b, #ad1fff);
        overflow: hidden;
      }
  
      #radius-shape-2 {
        border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
        bottom: -60px;
        right: -110px;
        width: 300px;
        height: 300px;
        background: radial-gradient(#44006b, #ad1fff);
        overflow: hidden;
      }
  
      .bg-glass {
        background-color: hsla(0, 0%, 100%, 0.9) !important;
        backdrop-filter: saturate(200%) blur(25px);
      }
    </style>
  
    <div class="container px-4  text-center text-lg-start" style="height:100vh">
      <div class="row gx-lg-5 align-items-center" style="padding-top:150px">
        <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10;">
          <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
            {!!__('text.title.register')!!}
          </h1>
          <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
            {{__('text.auth.desc')}}
          </p>
          <p class="text-white">{{__('text.auth.have_account')}}</p><a href="/auth/login" class="btn btn-outline-warning">{{__('form.link.login')}}</a>
        </div>
  
        <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
          <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
          <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>
  
          <div class="card bg-glass">
            <div class="card-body px-4 py-5 px-md-5">
              <form action="javascript:void(0)">
                <!-- 2 column grid layout with text inputs for the first and last names -->
                <!-- Company input -->
                
                <div class="row">
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <label class="form-label" for="firstname">First name</label>
                        <input type="text" id="firstname" class="form-control" />
                      </div>
                    </div>
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <label class="form-label" for="lastname">Last name</label>
                        <input type="text" id="lastname" class="form-control" />
                      </div>
                    </div>
                  </div>
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="email">{{__('form.email')}}</label>
                    <input type="text" id="email" class="form-control" />
                </div>
  
                <!-- Password input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="password">{{__('form.password')}}</label>
                    <input type="password" id="password" class="form-control" />
                </div>
  
                <!-- Checkbox -->
                
  
                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4" id="BtnRegister">
                  {{__('form.link.register')}}
                </button>
                <a href="/auth/login" class="btn btn-block mb-4 float-end">
                  {{__('form.link.have_account')}}
                </a>
                
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section: Design Block -->
@endsection

@section('script')
    <script>
      $("#BtnRegister").on("click", function(){
        let firstname = $("#firstname").val();
        let lastname = $("#lastname").val();
        let email = $("#email").val();
        let password = $("#password").val();
        let company = $("#company").val();

        axios.post('/auth/register', {
            firstname : firstname,
            lastname : lastname,
            email : email,
            password : password,
            company:company
        }).then((res)=>{
           if(!res.data.status){
            toastr[res.data.type](res.data.message)
           }else{
            window.location.assign('/auth/login?email='+res.data.email)
           }
        })
    });
    </script>
@endsection