<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <style>
        .raiting{
            background: #eee;
            border: 1px solid #ccc;
            padding: 10px;
            float: left;
            width: 50%;
            margin-right: 25%;
            margin-left: 25%;
            margin-top: 40px;
            text-align:center;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }


    </style>

    <div class="raiting">
        <form method="POST" id="filter_value" class="form-validate" >
            @csrf
            <select id="groups"  name="groups">
                <option value="all_group">Все Группы</option>
                @foreach($groups as $groups)
                    <option value="{{$groups->id}}">{{$groups->group}}</option>
                @endforeach
            </select>
            <select id="users"  name="users">
                <option value="all_users">Все участники</option>
                @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->surname.' '.$user->fname.' '.$user->patronymic}}</option>
                @endforeach
            </select>
            <x-button class="ml-3">
                Выбрать
            </x-button>
        </form>

        <table width="100%" style="border-collapse: collapse"; name="table" id="table">
            <tbody>

            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function () {
            $('#groups').change(function(e) {
                e.preventDefault();
                var group = $(this).val();
                $.ajax({
                    type: 'POST',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url: "{{url('/enter_user')}}",
                    data: {group : group},
                    success: function(msg) {
                        $('#users').html(msg);
                    },

                });
            });

            $('form').on('submit', function (e) {
                e.preventDefault();
                var formID = $(this).attr('id'); // Получение ID формы
                if(formID=="filter_value"){
                    var formNm = $('#' + formID);
                    $.ajax({
                        type: 'POST',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        url: "{{url('/ResultUser')}}",
                        data: $(formNm).serialize(),
                        success: function (data) {
                            $('#table').html(data);


                        },
                        complete: function (data) {

                        },
                        error: function (data) {
                            $('#senderror').show();
                            $('#sendmessage').hide();
                        }
                    });
                }
            });


        });
    </script>
</x-app-layout>
