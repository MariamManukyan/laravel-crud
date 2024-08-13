<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>User CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
{{--{{ dd($user_colum_name) }}--}}
<div class="container p-5 my-5">
    <div class="border">
        <div class="bg-light d-flex align-items-center justify-content-center" style="height: 80px; font-size: 25px; font-weight: 600">
            Laravel CRUD (Create, Read, Update and Delete)
        </div>
        <button type="button" data-bs-toggle="modal" data-bs-target="#myModal" class="btn btn-success m-3">Add New</button>
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                @foreach($user_colum_name as $key => $value)
                    @if(!in_array($key, [0,4,5,6,8]))
                        <th>{{$value}}</th>
                    @endif
                @endforeach
                <th>actions</th>
            </tr>
            </thead>
            <tbody>
                @foreach($users as $key => $user)
                    <tr>
                        <td>{{++$key}}</td>
                    @foreach($user as $index => $value)
{{--                        {{dd($user)}}--}}
                        @if($index == 'id')
                            <input type="hidden" name="" value="{{$value}}">
                            @continue
                        @endif
                        <td>{{$value}}</td>
                    @endforeach
                        <td>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-info view">View</button>
                            <button type="button" class="btn btn-primary">Edit</button>
                            <button type="button" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- The Modal add-->
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Create User</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('users/create') }}" method="post" class="d-flex flex-column">
                            @csrf
                            <label for="name">name</label>
                            <input type="text" name="name" id="name">
                            <label for="email">email</label>
                            <input type="email" name="email" id="email">
                            <label for="image">image</label>
                            <input type="file" name="image" id="image">
                            <label for="password">password</label>
                            <input type="password" name="password" id="password">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- The Modal view-->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
