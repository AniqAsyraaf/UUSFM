<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
  <head>
      <title>Login</title>
    <meta charset="utf-8">
    <!-- Somehow I got an error, so I comment the title, just uncomment to show -->
    <!-- <title>Login Form Design | CodeLab</title> -->
    <link rel="stylesheet" href="/css/login.css">
  </head>
  <body style="background-color: whitesmoke;">
    <div class="wrapper">
      <div class="title">UTM Unit Sport Facilities Management</div>

      @if(session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

      @if(session()->has('loginError'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('loginError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

        <form action="/login" method="post">
            @csrf
            <div class="field">
                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" autofocus required value="{{ old('email') }}">
                <label>Email</label>
                @error('email')
                <div class="invalid-feedback">
                    {{ $message}}
                </div>
                @enderror
            </div>
            <div class="field">
                    <input type="password" name="password" id="password" required>
                    <label>Password</label>
            </div>
            <div class="content">
                
            </div>
            <div class="field">
                <input type="submit" value="Login">
            </div>
        </form>
      </div>
    </div>  
  </body>
</html>
