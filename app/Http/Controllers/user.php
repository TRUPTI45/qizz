<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon;
use Session;
use DateTime;
use DateInterval;
use App\Models\usermail;
use App\Models\queresponse;

class user extends Controller
{
    public function mail(Request $request)
    {

        $email = $request->email_id;
        session(['email' => $email]);
        DB::delete("delete from usermail where email='$email'");
        $email_id=DB::table('usermail')->select('id')->where('email',$email)->value('id');
        DB::delete("delete from queresponse where email_id='$email_id'");
        $user = new usermail();
        $user->email = $request->email_id;
        $user->save();
        $question_id = $request->question_id;
        $data = DB::table('usermail')->select('email')->where('email', $email)->value('email');
        $ques = DB::table('que')->select('question')->where('question_id', $question_id)->get();
        $ansr = DB::table('ans')->select('answer')->where('question_id', $question_id)->get();
        $a = DB::select("select * from usermail where email='$email'");
        $mytime = Carbon\Carbon::now()->format('h:i:s');



        $minutes_to_add = 10;

        $time = Carbon\Carbon::now();
        $time->add(new DateInterval('PT' . $minutes_to_add . 'M'));

        $stamp = $time->format('Y-m-d H:i');


        Session::put('time', $stamp);

        return view('quiz', ['question' => $question, 'answer' => $answer, 'question_id' => $question_id, 'email' => $email]);
    }

    public function result(Request $request)
    {
        $data=DB::select("select correct_answer from question");
        $a=[];
        foreach($data as $data)
        {
            array_push($a,$data->correct_answer);
        }
        $email = $request->session()->get('email');
        $email_id=DB::table('usermail')->select('id')->where('email',$email)->value('id');
        $res=DB::select("
        select answer.option_id from answer inner join questionresponse on answer.answer_id=questionresponse.answer_id where email_id='$email_id'
        ");
        $score=0;
        $f=DB::select("select answer.option_id from answer inner join questionresponse on answer.answer_id=questionresponse.answer_id  inner join question on question.question_id=answer.question_id where questionresponse.email_id='$email_id' and question.correct_answer=answer.option_id");
        foreach($f as $f)
        {
            $score=$score+1;
        }


        return view('test_result1',['score'=>$score]);

    }
}
