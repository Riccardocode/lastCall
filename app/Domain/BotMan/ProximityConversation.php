<?php

namespace App\Domain\BotMan;

use App\Models\Business;
use App\Models\Category;
use Illuminate\Support\Facades\Log;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;
use Illuminate\Support\Facades\Http;

class ProximityConversation extends Conversation
{

    public function askProximity()
    {
        $question = Question::create('Please provide an address')
            ->fallback('Error');

        $this->ask($question, function (Answer $answer) {
            // dd($answer->getValue());
            dd($this);
            dd(Http::post("http://localhost:8000/api/proximity",$answer->getValue()));
            // dd(session());
            $response = Category::find($answer->getValue())->business->take();
            $ans = "These are the best Places that I would recommend! <hr>";
            foreach ($response as $key => $res) {
                $ans = $ans . "<a href='/business/" . $res->id . "/products' target='_blank'>" . $key + 1 . '. ' . $res->name . '</a><br>';
            }
            $this->say($ans);
        });
    }

    public function run()
    {
        $this->askProximity();
    }
}
