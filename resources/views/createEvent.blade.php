<h1>Create a event</h1>
       @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li id="error">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form method="POST" action="{{route('event.store.admin')}}">
        @csrf
            <label>
                Name
                <input type="text" name="name">

            </label>
            <label>
                Language
                <input type="text" name="language">

            </label>
            <label>
                Type
                <select name="type">
                    @foreach($typeList as $type)
                    <option>{{$type->name}}</option>
                    @endforeach
                </select>

            </label>
            <label>
               Date
                <input type="date" name="date">

            </label>
            <label>
                Hour
                <input type="text" name="hour">

            </label>
            <label>
                Price
                <input type="text" name="price">
            </label>
            <label>
                URL
                <input type="text" name="url">

            </label>
            <label>
                Image url
                <input type="text" name="image">

            </label>
            <label>
                Town
                <input type="text" name="townName">

            </label>
            <button type="submit">
                Send
            </button>

    </form>