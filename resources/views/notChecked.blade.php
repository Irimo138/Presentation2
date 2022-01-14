@extends('layouts.admin')

    @section('content')

    <div class="card-body">
                                <div class="chart-area">
                                @forelse ($events as $event)
                                <li>
                                {{ $event->name }}
                                {{ $event->language }}
                                {{ $event->date }}
                                {{ $event->hour }}
                                <div class="btn-group">
                               
                                <form method="POST" action="{{ route('event.destroy.admin',$event->id)}}">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>

                                </form>
                               
                                <form method="GET" action="{{ route('event.show',$event->id)}} ">
                                @csrf 
       
                                <button class="btn btn-success" style="margin-left: 25%;"><i class="bi bi-pencil-square"></i></button>
                                </form>
                                </div>
    
                                </li>
                                @empty
                                <h1>No events to check</h1>
                                @endforelse

                                {{ $events->links() }}



                                    </div>
                                </div>
                            </div>
                        </div>

    @endsection