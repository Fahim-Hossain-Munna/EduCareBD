<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI;

class QueryGeneratorController extends Controller
{
    public function index(){
        $title = '';
        $content = '';
        return view('frontend_files.query_genarate', compact('title', 'content'));
    }
    public function index_post(Request $request)
    {
        if ($request['query'] == null) {
            return;
        }

        $title = $request['query'];

        $client = OpenAI::client(env('OPENAI_API_KEY'));

        $result = $client->completions()->create([
            "model" => "text-davinci-003",
            "temperature" => 0.7,
            "top_p" => 1,
            "frequency_penalty" => 0,
            "presence_penalty" => 0,
            'max_tokens' => 3000,
            'prompt' => $request['query'],
        ]);

        $content = trim($result['choices'][0]['text']);


        return view('frontend_files.query_genarate', compact('title', 'content'));
    }
}
