<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> ĐĂNG NHẬP</title>
   <!DOCTYPE html>
   <html lang="en">
   <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="{{ asset('css/login.css') }}">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">

   <title>Login admin</title>
   </head>
   <body>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
   </body>
   </html>
</head>
<div class="row">
    <div class="col-lg-5 m-auto">
        <div class="card mt-5 bg-dark   ">
            <div class="card-title text-center mt-3">
              <img src="{{ asset('/photos/1/anh/lake.jpg') }}" width="150px" height="150px">
            </div>
            <div class="card-body">
<form action="" method="post">
    @csrf
    <div class="input-group m-md-3">
     <div input-group-prepend>
         <span class="input-group-text">
           <i class="fa fa-user fa-3x" aria-hidden="true"></i>

         </span>
     </div>
     <input type="text" class="form-control py-4" placeholder="E-mail" name="email">
    </div>
    <div class="input-group m-md-3">
     <div input-group-prepend>
         <span class="input-group-text">
          <i class="fa fa-lock fa-3x" aria-hidden="true"></i>

         </span>
     </div>
     <input type="password" class="form-control py-4" placeholder="Password" name="password">
    </div>
    <button class="btn btn-success" type="submit">Login</button>
    <p class="float-right text-white nt-2"><input name="remember" type="checkbox">Remember me</p>
</form>
            </div>

        </div>

    </div>
</div>
</div>
</div>
</div>
</div>
</form>
</div>
</div>
</div>

</div>
</div>
</div>
</body>
</html>
