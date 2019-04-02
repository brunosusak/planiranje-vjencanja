@extends('layouts.admin')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Ime</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Akcije</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->user_name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    {{$user->role_name}}
                </td>
                <td>
                    @if($user->role_id == 1)
                        <form action="{{route('set-as-admin')}}" method="post">
                            @csrf
                            <input type="hidden" name="user_id" value="{{$user->id}}"/>
                            <button type="submit" class="btn btn-success">Postavi ga kao administratora</button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection