@extends('layouts.admin')

    @section('content')
        <div class="card-body">
            <h1>User list</h1>
                <div class="chart-area">
                                @foreach ($users as $user)
                                <li>
                                {{ $user->name }}
                                {{ $user->surName }}
                                <div class="btn-group">
                               
                                <form method="POST" action="user/delete/{{ $user->id }}">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>

                                </form>
                               
                                <form method="GET" action="user/show/{{ $user->id }}">
                                @csrf 
       
                                <button class="btn btn-success" style="margin-left: 25%;"><i class="bi bi-pencil-square"></i></button>
                                </form>
                                </div>
    
                                </li>
                                @endforeach

                                {{ $users->links() }}



                                    </div>
                                </div>

    @endsection