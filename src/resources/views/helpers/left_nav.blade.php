<div class="leftNav">
    <div class="leftNav__header">
        <i class="mdi mdi-shield-crown"></i> <span><b>Meal Plan</b> Panel</span>
    </div>

    <nav class="leftNav__nav">
        <ul>
            @foreach(config('navigation') as $item)
            <li>
                <a href="{{route($item['route_name'])}}" class="{{str_replace(['.show', '.edit', '.index'], '', Route::currentRouteName()) === $item['can'] ? '-active' : ''}}"><i class="mdi {{$item['icon']}}"></i> <span>{{$item['name']}}</span></a>
            </li>
            @endforeach

        </ul>
    </nav>
</div>
