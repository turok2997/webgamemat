<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Result;
use App\Models\User;
use Illuminate\Http\Request;

class TeacherRaitingController extends Controller
{
    public function teacher_raiting()
    {
        $groups=Group::all();
        $users = User::where('role_id', 2)->get();
        return view('teacher_raiting',[
            'groups'=>$groups,
            'users'=>$users
        ]);

    }
    public function enter_user(Request $request)
    {
        if($request->group=='all_group'){
            $msg = User::where('role_id', 2)->get();
            echo  '<option value="all_users">Все участники</option>';
            foreach($msg as $msg){
                echo '<option value="'.$msg->id.'">'.$msg->surname.' '.$msg->fname.' '.$msg->patronymic.'</option>';
            }
        }
        else{
            $group_user=Group::where('id', $request->group)->get();
            echo  '<option value="all_users">Все участники</option>';
            if(User::where('groups', $group_user[0]->group)->exists()){
            $msg = User::where('groups', $group_user[0]->group)->where('role_id', 2)->select('surname', 'id','fname','patronymic')->get();
                foreach($msg as $msg){
                    echo '<option value="'.$msg->id.'">'.$msg->surname.' '.$msg->fname.' '.$msg->patronymic.'</option>';
                }
        }
        }

    }

    public function ResultUser(Request $request)
    {
        $users = User::all();
        if ($request->users == 'all_users') {
            if ($request->groups == 'all_group') {
                $results = Result::all();

            } else {
                $results_group = Group::where('id', $request->groups)->get();
                $users = User::where('groups', $results_group[0]->group)->where('role_id', 2)->select('id')->get();
                foreach ($users as $users) {
                    $results = Result::where('id_user', $users->id)->where('end', 1)->get();
                }


            }

        } else {
            $results = Result::where('id_user', $request->users)->where('end', 1)->get();
        }

        echo'<tr>';
        echo'<th width="40%" style="padding: 3px; border: 1px solid black;" align="center"> ФИО пользователя</th>';
        echo'<th width="10%" style="padding: 3px; border: 1px solid black;" align="center"> Набранные баллы</th>';
        echo'<th width="25%" style="padding: 3px; border: 1px solid black;" align="center"> Дата начала теста</th>';
        echo'<th width="25%" style="padding: 3px; border: 1px solid black;" align="center"> Дата окончания теста</th>';
        echo'</tr>';
//        if(isset($user_unique)) {
            foreach ($results as $result) {
                $fio=Result::find($result->id_user)->result;
                echo '<tr>';
                echo '<td width="40%" style="padding: 3px; border: 1px solid black; word-break: break-word;" align="center">' . $fio['surname'].' '.$fio['fname'].' '.$fio['patronymic']. '</td>';
                echo '<td width="10%" style="padding: 3px; border: 1px solid black; word-break: break-word;"align="center">' . $result->points . '</td>';
                echo '<td width="25%" style="padding: 3px; border: 1px solid black; word-break: break-word;"align="center">' . date('d-m-Y H:i:s', strtotime($result->created_at)) . '</td>';
                echo '<td width="25%" style="padding: 3px; border: 1px solid black; word-break: break-word;"align="center">' . date('d-m-Y H:i:s', strtotime($result->updated_at)) . '</td>';
                echo '</tr>';
            }
//        }
//        else{
//            echo '<tr>';
//            echo '<td width="100%" style="padding: 3px; border: 1px solid black; word-break: break-word;" colspan="2" align="center">Отсутсвуют заполненные критерии</td>';
//
//            echo '</tr>';
//        }


    }
}
