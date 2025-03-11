<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Question;

class QuestionController extends Controller
{
    public function fetchInsert()
    {
        
        $response=Http::get('https://quizapi.io/api/v1/questions',[
        'apiKey' => 'RNU1RPgMmEDF0R97PsOcbpXjWCfvvu9dD8LS80KU',
        'limit'=>10,]);

        $questions=json_decode($response->body());
        foreach($questions as $q)
        {
        $question=new Question();
        $question->question=$q->question;
        $question->answer_a=$q->answers->answer_a;
        $question->answer_b=$q->answers->answer_b;
        $question->answer_c=$q->answers->answer_c;
        $question->save();
        }
        return "Data Fetched from external API and saved to Database.";
        
    }

    public function show()
    {
        $data['questions']=Question::all();
        return view('welcome',$data);
    }
}
