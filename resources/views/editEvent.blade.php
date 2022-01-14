
 @extends('layouts.admin')

    @section('content')
<h1>Event update</h1>

<form action="{{ route('event.edit',$event->id)}}" method="POST">
    @method('PUT')
    @csrf

<label>
  Name
    <input type="text" name="name" value="{{ $event->name }}">
 </label>
 <br>
 <label>
  Language
    <input type="text" name="language" value="{{ $event->language }}">
 </label>
        <label>
            Type
                <select name="type">
                    @foreach($typeList as $type)
                        @if($event->type==$type->name)
                            <option selected>{{$type->name}}</option>
                        @else
                            <option>{{$type->name}}</option>
                        @endif
                    @endforeach
                </select>
                </label>

                <label>
                Date
                <input type="date" value="{{ $event->date }}" name="date"/>
                </label>

                <label>
                Hour
                <input type="text" name="hour" value="{{ $event->hour }}">
                </label>
                <label>
                    Price
                    <input type="text" name="price" value="{{ $event->price }}">
                </label>
                <label> 
                Url
                <a href="{{$event->url}}">Check url</a>
                <input type="text" name="url" value="{{ $event->url }}">
                </label>

                <label> 
                Image
                <img src="{{ $event->image }}">
                <input type="text" name="image" value="{{ $event->image }}">
                </label>
                <label> 
                Town
                <input type="text" name="price" value="{{ $event->townName }}">
                </label>
            <button class="btn btn-success"  type="submit">UPDATE</button>

            </form>
            <form method="POST" action="{{ route('event.destroy.admin', $event->id)  }}">
                    @csrf 
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>

            </form>
            @endsection