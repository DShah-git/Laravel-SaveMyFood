@extends('layouts.app')

@section('content')
    <style>
        .bg{
            background-color:#303030;
        }

        .bg-accent{
            background-color:var(--accent);
        }

        /* .bg-grey{
            background-color:#5d5d5d;
            color:white;
        } */

        .logo{
            width:150px;
            border-radius: 50%;
            box-shadow: 5px 10px 8px var(--accent);
        }

        .absolute{
            position:absolute;
            transform: translateY(-190%) translateX(10px);
        }

        .form-control{
            margin:10px 0px;
        }

        .width-40{
            width:30vw;
        }

        .box-shadow{
           box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        }

        @media only screen and (max-width: 1000px) {
            .width-40 {
                width:60vw;
            }
        }

        @media only screen and (max-width: 768px) {
            .width-40 {
                width:80vw;
            }
        }
    </style>

   <div class="w-100 h-100 justify-content-center align-items-center d-flex flex-column bg">
        <div class="my-5">
            <img class="logo" src="{{URL('images/save my food-logos_transparent.png')}}" alt="" srcset="">
        </div>

          <div class="card box-shadow my-3 width-40 bg-grey" style="border-radius: 15px; ">
            <div class="card-body p-5">
              <h2 class="text-center mb-5">Create an account</h2>
              <form method="POST" action="/users" >
                @csrf
                <div class="form-outline">
                  <input type="text" id="form3Example1cg" name="name" class="form-control form-control-lg " placeholder="Your Name" />
                   @error('name')
                     <p class="text-danger small">{{$message}}</p>
                   @enderror

                </div>
                <div class="form-outline ">
                  <input type="email" id="form3Example3cg" name="email"  class="form-control form-control-lg " placeholder="Your Email" />
                    @error('email')
                    <p class="text-danger small">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-outline ">
                  <input type="password" id="form3Example4cg" name="password" class="form-control form-control-lg"  placeholder="Enter a password" />
                     @error('password')
                    <p class="text-danger small">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-outline ">
                  <input type="password" id="form3Example4cdg" name="password_confirmation" class="form-control form-control-lg" placeholder="Confirm password" />
                    @error('password_confirmation')
                    <p class="text-danger small">{{$message}}</p>
                    @enderror
                </div>
                <div class="d-flex justify-content-center">
                  <button type="submit"
                    class="btn btn-block btn-lg gradient-custom-4 text-body mt-3 bg-accent">Register</button>
                </div>


                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="/login"
                    class="fw-bold text-body"><u>Login here</u></a></p>
              </form>
          </div>
        </div>
        </div>
   </div>
@endsection
