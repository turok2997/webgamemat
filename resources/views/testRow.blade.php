<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <link rel="stylesheet" href="{{ asset("css/table.css") }}">
    <style>
        body{
            background: url({{Storage::url('les.gif')}}) no-repeat;
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
            margin-top: 10%;
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
        <form method="POST" action="{{ route('RowCheck') }}" id="RowCheck">
            <table class="dannie">
                @for($i=1;$i<=3;$i++)
                    @csrf
                    <tr id={{$i}}>
{{--                        <td class="dan">{{$pattern[$i-1]->id}}.'  '.{{$pattern[$i-1]->pattern}}--}}
                        <td class="dan" ><img class="center-pic" src="https://chart.googleapis.com/chart?cht=tx&amp;chl={{$pattern[$i-1]->pattern}}&amp;chs=70"></td>
                        <td class="dan"> <input type="radio" name = "{{$pattern[$i-1]->id}}" value="1" required>Ряд сходится
                            <input type="radio" name = "{{$pattern[$i-1]->id}}" value="0" required>Ряд расходится</td>
                    </tr>
                @endfor
            </table>
            <br>
            <div class="submit">
                    <x-button class="ml-3" id="buttonSubmit">
                        Узнать результат
                    </x-button>
                <x-button type="button" onClick="location.href='{{route('RowCheck')}}';">
                    Другие ряды
                </x-button >
            </div>

        </form>
    </div>
    <script>
        $(document).ready(function () {
            $('form').on('submit', function (e) {
                e.preventDefault();
                var formID = $(this).attr('id'); // Получение ID формы
                    var formNm = $('#' + formID);
                    $.ajax({
                        type: 'POST',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        url: "{{url('/RowCheckAjax')}}",
                        data: $(formNm).serialize(),
                        success: function (data) {
                            if(data!=null){
                                 var error=JSON.stringify(data);
                                 var error1=JSON.parse(error);
                                // alert(err[1]);
                                for (key in error1) {
                                    if(error1[key]==1){
                                        $('#'+key).css("background", '#579134');
                                    }
                                    else{
                                        $('#'+key).css("background", '#923131');
                                    }

                                }

                                }
                            $('#buttonSubmit').hide();

                        },
                        complete: function (data) {

                        },
                        error: function (data) {
                            $('#senderror').show();
                            $('#sendmessage').hide();
                        }
                    });
            });
        });
    </script>
</x-app-layout>
