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

class RecommendationConversation extends Conversation
{
    protected $amount;
    public function __construct($amount = 10)
    {
        $this->amount = $amount;
    }

    public function catArr(){

        $category = Category::all();
        foreach ($category as $cat) {
            $buttons[] = Button::create($cat->name)->value($cat->id);
        }
        return $buttons;
    }


    public function askRecommendation($btns){
        $question = Question::create('What type of Food are you craving for?')
            ->fallback('Error')
            ->addButtons($btns);

        $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                $response = Category::find($answer->getValue())->business->take($this->amount);
                $ans = "These are the best Places that I would recommend! <hr>";
                foreach ($response as $key => $res) {
                    $ans = $ans ."<a href='/business/". $res->id ."/products' target='_blank'>". $key+1 .'. ' . $res->name . '</a><br>';
                }
                $this->say($ans);
            }
        });
    }

    public function run(){
        Log::info("Inside Recommendation Conversation");
        $this->askRecommendation($this->catArr());
    }
}



// public function askHowAreYouDoing()
// {
//     $this->ask('Are you doing well?', function (Answer $answer) {
//         if (strtolower($answer->getText()) === 'cringe') {
//             $this->say('Oh no! It seems like you are not doing well.');
//             $this->askAreYouBased();
//         } else {
//             $this->say('Glad to hear that you are doing well!');
//         }
//     });
// }

// public function askAreYouBased()
// {
//     $question = Question::create('Are you based?')
//         ->fallback('I cannot proceed with this question.')
//         ->addButtons([
//             \BotMan\BotMan\Messages\Outgoing\Actions\Button::create('Yes')->value('yes'),
//             \BotMan\BotMan\Messages\Outgoing\Actions\Button::create('No')->value('no'),
//         ]);

//     $this->ask($question, function (Answer $answer) {
//         if ($answer->isInteractiveMessageReply()) {
//             $response = $answer->getValue() === 'yes' ? 'Great!' : 'Oh no!';

//             $this->say($response . ' Thanks for chatting with me.');
//         }
//     });
// }
