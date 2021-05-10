<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <link rel="stylesheet" href="{{ asset("css/table.css") }}">
    <style>
        #myVideo {
            background: #000;
            -o-object-fit: cover;
            object-fit: cover;
            position: fixed;
            top: 0; right: 0; bottom: 0; left: 0;
            z-index: -99;
            width: 100%;
            height: 100%;
        }
        .child1 {
            background: #eee;
            border: 1px solid #ccc;
            padding: 10px;
            float: left;
            width: 30%;
            margin-right: 5%;
            margin-left: 15%;
            margin-top: 60px;
            text-align:center;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
        .child1:last-child {
            width: 30%;
            margin-right: 15%;
            margin-left: 5%;
        }
        .end_test{
            width: 30%;
            margin-right: 35%;
            margin-left: 35%;
            text-align:center;
            margin-top: 60px;
            background: #eee;
            border: 1px solid #ccc;
        }

    </style>
    <div class="parent1">
        <div class="child1">
            Рейтинг по результатам приключения
            <table class="dannie">
                <thead>
                <tr>
                    <td class="dan1">ФИО пользователя</td>
                    <td class="dan1">Зачетики</td>
                    <td class="dan1">Время прохождения теста</td>
                </tr>
                </thead>
                @foreach($res as $key)
                    <tr>
                        <td class="dan">{{$key['id_user']['surname'].' '.$key['id_user']['fname'].' '.$key['id_user']['patronymic']}}</td>
                        <td class="dan">{{$key['points']}}</td>
                        <td class="dan">{{$key['time1']}} </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="child1">
            Рейтинг по результатам тренировок
            <div>
                <table class="dannie">
                    <thead>
                    <tr>
                        <td class="dan1">ФИО пользователя</td>
                        <td class="dan1">Треняши</td>
                    </tr>
                    </thead>
                    @foreach($test as $key1)
                        <tr>
                            <td class="dan">{{$key1['id_user']['surname'].' '.$key1['id_user']['fname'].' '.$key1['id_user']['patronymic']}}</td>
                            <td class="dan">{{$key1['points']}}</td>
                        </tr>

                    @endforeach
                </table>
            </div>
        </div>
    </div>




</x-app-layout>
