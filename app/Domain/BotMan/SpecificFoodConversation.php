<?php

namespace App\Domain\BotMan;

use App\Models\Business;
use App\Models\Category;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class SpecificFoodConversation extends Conversation
{

    protected $type;
    protected $id;
    public function __construct($type)
    {
        $this->type = $type;
        $this->id = Category::where('name', 'LIKE', $type)->get()[0]->id;
    }

    public function recommend()
    {
        $question = Question::create('How many recommandations do you want?')
            ->fallback('Error');

        $this->ask($question, function (Answer $answer) {
            $response = Category::find($this->id)->business->take($answer->getValue()); //
            $ans = "These are the best Places that I would recommend! <hr>";
            foreach ($response as $key => $res) {
                $ans = $ans . "<a href='/business/" . $res->id . "/products' target='_blank'>" . $key + 1 . '. ' . $res->name . '</a><br>';
            }
            $this->say($ans);
        });
    }

    public function run()
    {
        $this->recommend();
    }
}
