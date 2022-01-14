@extends('layouts.admin')

    @section('content')
        <div class="card-body">
            <h1>Artist list</h1>
                <div class="chart-area">
                                @foreach ($artists as $artist)
                                <li>
                                {{ $artist->artisticName }}
                                
                                <div class="btn-group">
                               
                                <form method="POST" action="user/delete/{{ $artist->id }}">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>

                                </form>
                               
                                <form method="GET" action="user/show/{{ $artist->id }}">
                                @csrf 
       
                                <button class="btn btn-success" style="margin-left: 25%;"><i class="bi bi-pencil-square"></i></button>
                                </form>
                                </div>
    
                                </li>
                                @endforeach

                                {{ $artists->links() }}



                                    </div>
                                </div>

    @endsection