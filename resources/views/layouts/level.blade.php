<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <link rel="stylesheet" href="{{ asset("css/table.css") }}">

    <style>
        body{
            @if($currentlevel=='lvl-1')
            background: url({{Storage::url('lava.gif')}}) no-repeat;
            @elseif($currentlevel=='lvl-2')
            background: url({{Storage::url('voda.gif')}}) no-repeat;
            @elseif($currentlevel=='lvl-3')
            background: url({{Storage::url('noch.gif')}}) no-repeat;
            @elseif($currentlevel=='lvl-4')
            background: url({{Storage::url('gori.gif')}}) no-repeat;
            @endif
            background-repeat: no-repeat;
            background-position: center center;
            background-attachment: fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
        .main{
            width:50%;
            margin-left: auto;
            margin-right: auto;
            margin-top: 40px;
            border: 4px double black; /* Параметры границы */
            background: #ffffff; /* Цвет фона */
            padding: 10px; /* Поля вокруг текста */

        }
        table.dannie {
            border-collapse: collapse;
            /*убираем пустые промежутки между ячейками*/
            border: none;
            /*устанавливаем для таблицы внешнюю границу серого цвета толщиной 1px*/
            padding: 20px;
            width:100%;
        }
        td.dan {
            padding: 20px;
            text-align:center;
            width: 50%; /* Ширина ячейки */
            border-top: none;
            border-left: none;
            border-right: none;


        }
        .center-pic{
            display:block;
            margin:auto;
        }
        .submit{
            width:100%;
            text-align:center;
        }
        </style>
    <div class="main">
    <form method="POST" action="{{ route('check') }}">
        <table class="dannie">
@for($i=1;$i<=$number_row[0]->quantity_row;$i++)
            @csrf
         <tr>
             <td class="dan" ><img class="center-pic" src="https://chart.googleapis.com/chart?cht=tx&amp;chl={{$pattern[$i-1]->pattern}}&amp;chs=70"></td>
             <td class="dan"> <input type="radio" name = "{{$pattern[$i-1]->id}}" value="1" required>Ряд сходится
        <input type="radio" name = "{{$pattern[$i-1]->id}}" value="0" required>Ряд расходится</td>
         </tr>
{{--         {{$id_row[$i-1]=$pattern[$i-1]->id}}--}}
@endfor
        </table>
        <br>
    <input type="hidden" name="currentlevel" value="{{$currentlevel}}">
        <div class="submit">
        @if($currentlevel=='lvl-4')
    <x-button class="ml-3">
        Узнать результат
    </x-button>
        @else
            <x-button class="ml-3">
                Следующий уровень
            </x-button>
            @endif
            </div>
        </form>
    </div>
</x-app-layout>

