<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- MDB -->
<link
href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.min.css"
rel="stylesheet"
/>
<!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
    <title>Login</title>
</head>
<body>
   
    <div class="container" style="width: 50%">
        <form style="padding-top: 30px" method="post" action="validate_login">
            @csrf
           <center> <h1>Login</h1></center>
         
            @if (session()->has('message'))
            <div class="alert alert-danger">
              {{ session()->get('message') }}
          </div>
            @endif
            @if($errors->any())

            @foreach ($errors as $error )
            <div class="alert alert-danger">
               {{$error}}
            </div>

            @endforeach
            @endif
            <div data-mdb-input-init class="form-outline mb-4">
              <input name="email" type="email" id="form2Example1" class="form-control" />
              <label class="form-label" for="form2Example1">Email address</label>
            </div>
          
            <!-- Password input -->
            <div data-mdb-input-init class="form-outline mb-4">
              <input name="password" type="password" id="form2Example2" class="form-control" />
              <label class="form-label" for="form2Example2">Password</label>
            </div>
          
            <!-- 2 column grid layout for inline styling -->
            <div class="row mb-4">
              <div class="col d-flex justify-content-center">
                <!-- Checkbox -->
                
              </div>
          
            
            </div>
          
            <!-- Submit button -->
            <button  type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4">Sign in</button>
          
            <!-- Register buttons -->
            <div class="text-center">
              <p>Not a user? <a href="user_register">Register</a></p>
             
            </div>
          </form>
      </div>



</body>
</html>