<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row" style="margin-top: 45px">
            <div class="col-md-4 offset-md-4">
                <h4 class="text-center">Login | Custom Auth</h4><hr>
                <form action="{{route('auth.check')}}" method="post">

                    @if (Session::get('fail'))
                    <div class="alert alert-danger">
                        {{Session::get('fail')}}
                    </div>
                    @endif
                    
                    @csrf
                    <div class="form-group">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email"  value="{{old('email')}}" >
                        <span class="text-danger">@error('email'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" value="{{old('password')}}" >
                        <div class="text-danger"> @error('password'){{$message}}@enderror</div>
                    </div>
                    <button type="submit" class="btn btn-block btn-primary w-100 mt-3 mb-3">Sign In</button><br>
                    <a class="text-center" href="{{route('auth.register')}}">I don't have aaccount ! Sign Up</a>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>