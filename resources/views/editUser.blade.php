@extends('layouts.admin')

    @section('content')
        <div class="card-body">
            <h1>{{$user->name}} {{$user->surName}}</h1>
            <div class="chart-area">
            <form action="{{ route('user.edit',$user->id)}}" method="POST">
    @method('PUT')
    @csrf

        <label>
        Name
            <input type="text" name="name" value="{{ $user->name }}">
        </label>
        <br>
        <label>
        Surname
            <input type="text" name="surname" value="{{ $user->surName }}">
        </label>
        <label>
                        Date of birth
                        <input type="date" value="{{ $user->date }}" name="date"/>
                        </label>
               
                        </label>
                        <label>
                       Phone
                        <input type="string" value="{{ $user->phone }}" name="phone"/>
                        </label>
                <label>
                    Password
                <input type="password" name="password" id="form_password" class="form-control"  placeholder="Password *" value=""/>
                </label>
                </label>
                        <label>
                       Town
                        <input type="string" value="{{ $user->town }}" name="town"/>
                        </label>
                @if($user->role==2)

                <label>
                     Artistic name
                     <input type="text" name="artisticName" value="{{ $user->artisticName }}">
                    </label>
                        <label>
                    Type
                        <select name="type">
                            @foreach($typeList as $type)
                                @if($user->type==$type->name)
                                    <option selected>{{$type->name}}</option>
                                @else
                                    <option>{{$type->name}}</option>
                                @endif
                            @endforeach
                        </select>

                    </label>
                    <label>
                     Subtype
                     <input type="text" name="subType" value="{{ $user->subType }}">
                    </label>
                    <label>
                        Description
                        <input type="text" name="description" value="{{ $user->description }}">
                    </label>
                    <label>
                        Your web page link
                        <input type="text" name="url" value="{{ $user->link }}">
                    </label>



                @endif

                       
                    <button class="btn btn-success"  type="submit">UPDATE</button>

                    </form>
            <form method="POST" action="{{ route('user.destroy.admin', $user->id)  }}">
                    @csrf 
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>

            </form>
                
                </div>
            </div>
        </div>
    @endsection