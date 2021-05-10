<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <link rel="stylesheet" href="{{ asset("css/table.css") }}">
    <style>
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
            width:100%;
        }
        td.dan {
            padding: 10px;
            text-align:center;
            width: 33%; /* Ширина ячейки */
            border-top: none;



        }
        </style>
    <div class="main">
    <table class="dannie">
        <thead>
        <tr>
            <td class="dan1">Набранные баллы за итоговый уровень</td>
            <td class="dan1">Дата и время начала теста</td>
            <td class="dan1">Дата и время окончания теста</td>
        </tr>
        </thead>
        @foreach($result as $result)
            @csrf
                <tr>
                    <td class="dan">{{$result->points}}</td>
                    <td class="dan">{{date('d-m-Y H:i:s', strtotime($result->created_at))}}</td>
                    <td class="dan">{{date('d-m-Y H:i:s', strtotime($result->updated_at))}}</td>
                </tr>

        @endforeach
        </table>
    </div>
</x-app-layout>
