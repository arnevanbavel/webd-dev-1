<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <title>Export</title>
</head>
<body>
<table>
    @foreach($users->all() as $user )
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>
                @foreach($user->codes as $code )
                  {{$code->code}},
                @endforeach
            </td>
            @if($user->admin1_user0 == 0)
                <td>User</td>
            @else
                <td>Admin</td>
            @endif
            <td>
            @if($user->deleted_at != NULL)
                Kwalificeren
            @else
                Diskwalificeren
            @endif
            </td>
        </tr>
    @endforeach
</table>
</body>
</html>
