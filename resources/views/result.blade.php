@extends('layouts.layout')
@section('content')

@if(isset($data))
    @csrf
<div class="items">
    <div class="item item1">
        <div class="mainBlock search"><form method="post" action="/">
                @csrf
{{--                <label for="city">City:</label>--}}
                <input class=" search-bar" type="text" id="city" name="city" required placeholder="{{$data['location']['name']}}">
                <button><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" height="1.5em"
                             width="1.5em" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M909.6 854.5L649.9 594.8C690.2 542.7 712 479 712 412c0-80.2-31.3-155.4-87.9-212.1-56.6-56.7-132-87.9-212.1-87.9s-155.5 31.3-212.1 87.9C143.2 256.5 112 331.8 112 412c0 80.1 31.3 155.5 87.9 212.1C256.5 680.8 331.8 712 412 712c67 0 130.6-21.8 182.7-62l259.7 259.6a8.2 8.2 0 0 0 11.6 0l43.6-43.5a8.2 8.2 0 0 0 0-11.6zM570.4 570.4C528 612.7 471.8 636 412 636s-116-23.3-158.4-65.6C211.3 528 188 471.8 188 412s23.3-116.1 65.6-158.4C296 211.3 352.2 188 412 188s116.1 23.2 158.4 65.6S636 352.2 636 412s-23.3 116.1-65.6 158.4z">
                        </path>
                    </svg>
                </button>
            </form>
        </div>
        <div class="mainBlock weather">
            <p>{{$data['current']['temp_c']}}°C</p>
            <p>{{$data['current']['condition']['text']}}</p>
            <img src="{{$data['current']['condition']['icon']}}" class="mimg">
        </div>
        <div class="mainBlock feels">Ощущается<br> {{$data['current']['feelslike_c']}}°C</div>
        <div class="mainBlock precipitation">Атм осадки<br> {{$data['current']['precip_mm']}}мм</div>
        <div class="mainBlock visibility">Видимость<br> {{$data['current']['vis_km']}}м</div>
        <div class="mainBlock humidity">Влажность<br> {{$data['current']['humidity']}}%

        </div>

    </div>
    <div class="item item2">

        @foreach($wheatherPerHour as $hour)

            <div class="item hour">
                <p>{{mb_substr($hour['time'],11)}}</p>
                <p>{{$hour['temp_c']}}°C</p>
                <img src="{{$hour['condition']['icon']}}">
            </div>
        @endforeach
    </div>
    <div class="item item3">
        @foreach($data['forecast']['forecastday'] as $item)
            <div class="item day">
                <p>{{mb_substr($item['date'],5)}}</p>
                <p>{{$item['day']['avgtemp_c']}}</p>
                <img src="{{$item['day']['condition']['icon']}}">
            </div >
        @endforeach</div >
    <div class="item item4">
        <p>uv</p>
        <p>{{$data['current']['uv']}}</p>
    </div>
    <div class="item item5">
        <p>wind {{$data['current']['wind_kph']}} км/ч</p>

        <p>gust {{$data['current']['gust_kph']}} км/ч</p>
    </div>

</div>
@endif
@endsection
