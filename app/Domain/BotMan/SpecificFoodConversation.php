<?php
namespace App\Domain\BotMan;

use App\Models\Business;
use App\Models\Category;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class SpecificFoodConversation extends Conversation{


    public function recommend(){
        
    }

    public function run()
    {
        // $this->askRecommendation($this->catArr());
    }
}