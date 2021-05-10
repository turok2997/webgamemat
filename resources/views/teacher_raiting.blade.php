<x-app-layout>
    <x-slot name="header">
    </x-slot>


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
