<?php

namespace App\Domain\BotMan;

use App\Models\Business;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Log;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;
use Illuminate\Support\Facades\Http;

class MealConversation extends Conversation
{
    protected $amount = 10;
    protected $type;
    // protected $id;
    public function __construct($type )
    {
        $this->type = $type;
    }

    public function askMealRecommendation(){
        $question = Question::create('How many '. $this->type .' Meals should I recommend ?')
            ->fallback('Error');

        $this->ask($question, function (Answer $answer) {
                $response = Product::where('category','=', $this->type)->take($answer->getValue())->get();
                $ans = "These are the best ".$this->type ." Dishes that I would recommend! <hr>";
                foreach ($response as $key => $res) {
                    $ans = $ans ."<a href='/business/". $res->business_id ."/products/".$res->id ."' target='_blank'>". $key+1 .'. ' . $res->name . '</a><br>';
                }
                $this->say($ans);
        });
    }

    public function run(){
        Log::info("Inside Meal Recommendation Conversation");
        $this->askMealRecommendation();
    }
}
