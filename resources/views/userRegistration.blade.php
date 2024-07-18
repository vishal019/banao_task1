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
    <title>Registration</title>
</head>
<body>
    <div class="container" style="width: 50%">
        <form style="padding-top: 30px" action="user_registerted" method="post">
            @csrf
           <center> <h1>Register</h1></center>
            <!-- Email input -->

            @if ($errors->any())
                
            @foreach ($errors->all() as $error)
            <li style="color: red">{{$error}}</li>
            @endforeach
            @endif
            <div data-mdb-input-init class="form-outline mb-4">
                <input name="name" type="name" id="form2Example1" class="form-control" />
                <label class="form-label" for="form2Example1">Name</label>
                
              </div>

            <div data-mdb-input-init class="form-outline mb-4">
              <input name="email" type="email" id="form2Example1" class="form-control" />
              <label class="form-label" for="form2Example1">Email address</label>
             
            </div>
          
            <!-- Password input -->
            <div data-mdb-input-init class="form-outline mb-4">
              <input name="password" type="password" id="form2Example2" class="form-control" />
              <label class="form-label" for="form2Example2">Password</label>
             
            </div>
          
           
            <button  type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4">Sign in</button>
          
            <!-- Register buttons -->
            <div class="text-center">
              <p>existing user? <a href="/">Login</a></p>
             
            </div>
          </form>
      </div>
</body>
</html>