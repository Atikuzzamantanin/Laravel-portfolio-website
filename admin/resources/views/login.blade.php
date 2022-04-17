@extends('layout.app2')
@section('title', 'Login Page')
@section('content')
    <div class="container">
        <div class="row mt-5">
            <div style="..." class="col-md-6 bg-light p-3">
                <form action=""  class="m-5 loginForm">
                    <div class="form-group">
                        <label for="EmampleInputEmail">User Name</label>
                        <input name="userName" value="" type="text" class="form-control" id="EmampleInputEmail" aria-describedby="emailHelp" placeholder="User Name" required="">
                    </div>
                    <div class="form-group">
                        <label for="EmampleInputPassword1">Password</label>
                        <input name="userPassword" value="" type="password" class="form-control" id="EmampleInputPassword1" aria-describedby="passwordHelp" placeholder="User Password" required="">
                    </div>
                    <div class="form-group">
                        <button name="submit" type="submit" class="btn btn-block btn-danger">Login</button>
                    </div>
                </form>
            </div>

            <div style="height: 450px" class="col-md-6 bg-light">
               <img class="w-75 m-5" src="{{asset('siteImg/login.gif')}}" alt="picture">
            </div>
            

     
        </div>
    </div>
    <!-- ............ -->



@endsection

@section('scriptsection')
    <script type="text/javascript">
      
       $('.loginForm').on('submit', function(event){

        event.preventDefault();
        let formData=$(this).serializeArray();
        let userName=formData[0]['value'];
        let password=formData[1]['value'];

        let url="/onlogin";
        axios.post(url,{
            user:userName,
            pass:password
        }).then(function(response){
            if(response.status==200 && response.data==1){
                window.location.href="{{'/'}}";
            }else{
                toastr.error('Login Faild. Username or Password is incorrect ');
            }
        }).catch(function(error){
            toastr.error('Login Faild. Username or Password is incorrect ');
        })

       })

       </script>
    

@endsection