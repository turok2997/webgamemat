<x-app-layout>
    <x-slot name="header">
    </x-slot>


{{--    <form method="POST" action="{{ route('level') }}">--}}
{{--        @for($i=1;$i<=$number_row[0]->quantity_row;$i++)--}}
{{--            @csrf--}}
{{--            <div>--}}
{{--                <img src="https://chart.googleapis.com/chart?cht=tx&amp;chl={{$pattern[$i-1]->pattern}}">--}}
{{--                <input type="radio" name = "{{$pattern[$i-1]->id}}" value="0" checked>Ряд сходится--}}
{{--                <input type="radio" name = "{{$pattern[$i-1]->id}}" value="1" checked>Ряд расходится--}}
{{--            </div>--}}
{{--        @endfor--}}
{{--        <x-button class="ml-3">--}}
{{--            Узнать результат--}}
{{--        </x-button>--}}
{{--    </form>--}}
    <div>
    <?php var_dump($currentlevel) ?>
    </div>
</x-app-layout>
