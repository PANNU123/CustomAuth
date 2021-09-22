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
                <h4 class="text-center">Admin | Dashboard</h4><hr>
            </div>
        </div>
        <div class="row" style="margin-top: 45px">
            <div class="col-md-8 offset-md-2">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $index=1;
                        @endphp
                      <tr>
                        <th scope="row">{{$index++}}</th>
                        <td>{{$LoggedUserInfo['name']}}</td>
                        <td>{{$LoggedUserInfo['email']}}</td>
                        <td>
                            {{-- <a href="" class="btn btn-info btn-sm">Edit</a>
                            <a href="" class="btn btn-danger btn-sm">Delete</a> --}}
                            <a href="{{route('auth.logout')}}" class="btn btn-warning btn-sm">Logout</a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</body>
</html>






