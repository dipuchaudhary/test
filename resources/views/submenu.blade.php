<ol>
@foreach($submenus as $submenu)
    <li>{{$submenu->title}}
    @if(count($submenu->submenus))
        @include('submenu',['submenus'=> $submenu->submenus])
        @endif
    </li>
    @endforeach
</ol>
