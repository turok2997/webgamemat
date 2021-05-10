<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <link rel="stylesheet" href="{{ asset("css/table.css") }}">
    <table class="dannie">
        <thead>
        <tr>
            <td class="dan1">ID пользователя</td>
            <td class="dan1">Набранные баллы за итоговый уровень</td>
            <td class="dan1">Дата и время начала теста</td>
            <td class="dan1">Дата и время окончания теста</td>
        </tr>
        </thead>
        @foreach($result as $result)
            @csrf
            <tr>
                <td class="dan">{{$result->id_user}}</td>
                <td class="dan">{{$result->points}}</td>
                <td class="dan">{{$result->created_at}}</td>
                <td class="dan">{{$result->updated_at}}</td>
            </tr><br>

        @endforeach
    </table>
    <div>
    </div>
</x-app-layout>
