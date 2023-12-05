<?php

namespace App\Http\Controllers;

use App\Domain\BotMan\Middle;
use App\Models\Category;
use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Cache\LaravelCache;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use App\Domain\BotMan\RecommendationConversation;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;

class BotManController extends Controller
{

    public function about($botman)
    {
        $botman->hears('{message}', function ($botman, $message) {
            if (str_contains($message, 'about')) {
                $botman->reply("The Mission of this Website is to reduce waste by selling the food that has been cooked by Businesses but not sold.");
            } else {
                $botman->reply("Did not hear about");
            }
        });

        $botman->listen();
    }

    public function handle()
    {
        $botman = app('botman');

        $botman->about($botman);



        $botman->listen();
    }

    public function askName($botman)
    {
        $botman->ask('Hello! What is your Name?', function (Answer $answer) {
            $name = $answer->getText();
            $this->say('Nice to Meet you ' . $name);
        });
    }

    public function test($botman)
    {
        $botman->reply("The Mission of this Website is to reduce waste by selling the food that has been cooked by Businesses but not sold.");
    }

    public function check($message)
    {
        if (str_contains($message, 'about')) {
            // $this->test($botman);
            return 1;
        } else if (str_contains($message, 'reco')) {
            // $botman->reply('success');
            // $this->askRecommendation($botman);
            return 2;
        } else {
            // $botman->reply('error');
            return -1;
        }
    }

    

    public function input()
    {
        // $botman = app('botman');
        $botman = BotManFactory::create(['driver' => 'web'], new LaravelCache());
        $botman->hears('{message}', function ($botman, $message) {
            // if (str_contains($message, 'about')) {
            //     $this->test($botman);
            // } else if (str_contains($message, 'recommendation')) {
            //     $botman->reply('success');
            //     $this->askRecommendation($botman);
            // }else{
            //     $botman->reply('error');
            // }

            $number = $this->check($message); // Replace this with the actual number you want to switch on

            switch ($number) {
                case 1:
                    $this->test($botman);
                    break;

                case 2:
                    $botman->reply('correct Switch');
                    $botman->startConversation(new RecommendationConversation());
                    // $this->askRecommendation($botman,$this->catArr());
                    break;

                default:
                    $botman->reply('error');
            }
        });

        $botman->listen();
    }

    
}
