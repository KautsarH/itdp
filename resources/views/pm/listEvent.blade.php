@extends('layouts.app')

@section('content')

<div class="card card-default">
    <div class="card-header">List of Events</div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Events</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Leader Commitee</th>
                        <th>Total Points</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($listParti as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role}}</td>
                        @if ({{$user->isLead == 1}} )
                            <td>Yes</td>
                        @else
                            <td>No</td>
                        @endif
                        <td>{{$user->totalPoints}}</td>
                        <td><a href="" class="btn btn-primary">Assign as Commitee Lead</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>   
</div>



@endsection


