<!DOCTYPE html>
<html>
<head>
    @include('users/include/header')
</head>
<body>
    <div class='container'>
        <div class='row'>
            <table class='table table-striped table-hover'>
                <legend>Users Table</legend>
                    <div class='row'>
                        <div class='col-lg-12'>
                            <form method='GET'>
                                <div class='input-group'>
                                    <input type='text' class='form-control' name='search' placeholder='Search User here...'></input>
                                    <span class='input-group-btn'>
                                        <button class='btn btn-default' type='submit'>Search</button>
                                    </span>
                                </div><!--input-group-->
                            </form>
                        </div><!--col-lg-12-->
                    </div><!--row-->
                <thead>
                    <tr class='info'>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($users->count() > 0)
                        @foreach ($users->all() as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->fullname}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    <a href="{{url('users/'.$user->id.'/edit')}}" class='label label-warning'>Edit</a>
                                    <a href="{{url('users/'.$user->id.'/delete')}}" class='label label-primary'>Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            <div class='row'>
                <div class='col-md-10'>
                    <a href='users/add' class='btn btn-success'>Add User</a>
                </div><!--col-md-10-->
                <div class='col-md-2'>
                    {{ $users->appends(Request::capture()->except('page'))->links() }}
                </div><!--col-md-2-->
            </div><!--row-->
        </div><!--row-->
    </div><!--container-->
</body>
</html>
