@extends ('layout')

@section('content')
    <p>ewwe</p>
{{--    <form method="get" action="{{route('search')}}">--}}
{{--        <input id = 'searchInput' name = 'searchInput' type="text">--}}
{{--        <button type="submit">Search</button>--}}
{{--    </form>--}}

    @foreach($persons as $person)
        <div>
            <p> {{$person->name}}</p>
        </div>
    @endforeach
    {{$persons->links()}}
@endsection
