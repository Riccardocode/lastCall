<?php

namespace App\Domain\BotMan;

use App\Models\Business;
use App\Models\Category;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class RecommendationConversation extends Conversation
{
    // protected $buttons = catArr();

    public function catArr()
    {

        $category = Category::all();
        foreach ($category as $cat) {
            $buttons[] = Button::create($cat->name)->value($cat->id);
        }
        return $buttons;
    }

    

    public function askRecommendation($btns)
    {
        $this->say('rec');
        $question = Question::create('Select a category:')
        ->fallback('Error')
        ->addButtons($btns);

        $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                // $answer->getValue()
                $response = Business::all();

                $this->say($response . ' Thanks for chatting with me.');
            }
        });
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

    public function run()
    {
        // $botman = app('botman');
        // This will be called immediately
        // $botman->reply('Start Conversation');
        // $this->askRecommendation();
        $this->askRecommendation($this->catArr());
    }
}
?>