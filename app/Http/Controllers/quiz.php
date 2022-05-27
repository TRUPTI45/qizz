<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon;
use Session;
use DateTime;
use DateInterval;
use App\Models\usermail;
use App\Models\queresponse;

class quizz extends Controller
{
    public function quizz(Request $request, $question_id)
    {
        $email = $request->session()->get('email');
        $user = new usermail();

        $data = DB::table('usermail')->select('email')->where('email', $email)->value('email');
        $question = DB::table('question')->select('question')->where('question_id', $question_id)->get();
        $answer = DB::table('answer')->select('answer')->where('question_id', $question_id)->get();

        $allquestion=DB::table('question')->select('question_id')->get();
        if ($data == $email) {
            return view('quiz', ['question' => $question, 'answer' => $answer, 'question_id' => $question_id, 'email' => $email,'allque'=>$allquestion]);
        } else {
            $user->email = $request->email_id;
            $user->save();
        }
    }


    public function save(Request $request)
    {
        $email = $request->email;
        $question_id = $request->question_id;
        $question = DB::table('question')->select('question')->where('question_id', $question_id)->get();
        $answer = DB::table('answer')->select('answer')->where('question_id', $question_id)->get();
        $answer_id = DB::table("answer")->select("answer_id")->where('answer', $request->answer)->value('answer_id');
        $email_id = DB::table('usermail')->select('id')->where('email', $email)->value('id');
        $q_id = $question_id - 1;
        $question_id = DB::table('questionresponse')->select('question_id')->where('email_id', $email_id)->where('question_id', $question_id - 1)->value('question_id');


        if ($question_id - 1 == $question_id) {
            DB::update("update questionresponse set answer_id='$answer_id' where question_id='$q_id' and email_id='$email_id'");
        } else {
            $res = new queresponse();
            $res->question_id = $question_id - 1;
            $res->answer_id = $answer_id;
            $res->email_id = $email_id;
            $res->save();
        }

        if($question_id==11)
        {
            return redirect()->route('test_result1');
        }
        $allque=DB::table('question')->select('question_id')->get();



        return view('quiz', ['question' => $ques, 'answer' => $answer, 'question_id' => $question_id, 'email' => $email,'allque'=>$allque]);
    }
}
