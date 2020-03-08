@extends('layouts.app')
@section('content')
    <form action="{{route('menu.store')}}" method="post">
        @csrf
{{--        <ul style="list-style-type: none" class="menu">--}}
{{--            <li class="sub_menu">Add Menu <a href="javascript:void (0);" title="add menu" class="add_menu"><i class="fa fa-plus-circle"></i></a></li>--}}
{{--        </ul>--}}

        <input type="text" class="form-control" name="title" id="title" placeholder="title">
        <select class="form-control mt-2" name="parent_id">
            <option value="">select menu</option>
            @foreach($allmenus as $key => $value)
            <option value="{{$value}}">{{$key}}</option>
            @endforeach
        </select>
        <input type="submit" class="btn btn-primary mt-2" value="submit">
    </form>
    <br><br>
    <h2>Hirearchial Menu</h2>
    @foreach($lists as $list)
    <ul>
        <li>{{$list->title}}</li>
            @if(count($list->submenus))
                @include('submenu',['submenus' => $list->submenus])
                @endif
    </ul>
    @endforeach
@endsection
