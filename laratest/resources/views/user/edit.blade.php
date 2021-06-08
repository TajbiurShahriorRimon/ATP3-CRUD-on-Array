<!DOCTYPE html>
<html>
<head>
    <title>Create user</title>
</head>
<body>
<a href='/home'> Back </a> |
<a href='/logout'> logout</a>

<h3> Update User</h3>

<form method="post" action="">
    <table>
        <tr>
            <td>Id</td>
            <td><input type="text" readonly name="id" value="{{$userInfo['id']}}"></td>
        </tr>
        <tr>
            <td>Username</td>
            <td><input type="text" name="username" value="{{$userInfo['username']}}"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="password" value="{{$userInfo['password']}}"></td>
        </tr>
        <tr>
            <td>Re-Pass</td>
            <td><input type="password" name="repass"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="email" name="email"  value="{{$userInfo['email']}}"></td>
        </tr>
        <tr>
            <td>Type</td>
            <td><input type="text" name="type"  value="{{$userInfo['type']}}"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="create" value="Create"></td>
        </tr>
    </table>
</form>
</body>
</html>
