<?php
namespace App\Domain\BotMan;

use App\Models\Business;
use App\Models\Category;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class SpecificFoodConversation extends Conversation{

    protected $type;
    protected $id;
    public function __construct($type)
    {
        $this->type = $type;
        $this->id = Category::where('name','LIKE', $type)->get()[0]->id;
        // dd($this->id);
    }

    public function recommend(){
        $question = Question::create('How many recommandations do you want?')
        ->fallback('Error');

        $this->ask($question, function (Answer $answer) {
            // if ($answer->isInteractiveMessageReply()) {
                // dd(Category::find($this->id));
                // dd($answer->getValue());
                $response = Category::find($this->id)->business->take($answer->getValue());//
                // dd($response);
                // $ans = "These are the best Places that I would recommend!\n";
                $this->say('These are the best Places that I would recommend!');
                foreach ($response as $res) {
                    $this->say($res->name);
                    // $ans . $res->name . "\n";
                }
                // $this->say($ans);
            // }
        });
    }

    public function run()
    {
        // $this->say($this->type . ' and ' . $this->id);
        // dd($this->id);
        $this->recommend();
    }
}