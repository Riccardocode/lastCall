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

use function PHPUnit\Framework\isEmpty;

class BotManController extends Controller
{
    protected static $isError = -1;

    public function changeIsError($value){
        $file = file_get_contents('variables.txt');
        dd($file);
        if(isEmpty(file_get_contents('variables.txt'))){
            file_put_contents('variables.txt',"isError=".$value.",\r",FILE_APPEND);
        }else{
            // $file = file_get_contents('variables.txt');
            if(str_contains($file, 'isError')){
                dd($file);
            }
        }
        
    }

    public function testDump(){
        $test = new RecommendationConversation(3);
        dd(Category::find('1')->business->take(3));
        // dd($test);
    }

    public function about($botman){
        $botman->hears('{message}', function ($botman, $message) {
            if (str_contains($message, 'about')) {
                $botman->reply("The Mission of this Website is to reduce waste by selling the food that has been cooked by Businesses but not sold.");
            } else {
                $botman->reply("Did not hear about");
            }
        });

        $botman->listen();
    }

    public function askName($botman)
    {
        $botman->ask('Hello! What is your Name?', function (Answer $answer) {
            $name = $answer->getText();
            $this->say('Nice to Meet you ' . $name);
        });
    }

    public function test($botman){
        $botman->reply("The Mission of this Website is to reduce waste by selling the food that has been cooked by Businesses but not sold.");
    }

    public function check($message){
        if (str_contains($message, 'about')) {
            return 1;
        } else if (str_contains($message, 'reco')) {
            return 2;
        } else {
            return -1;
        }
    }

    public function input(){
        $botman = BotManFactory::create(['driver' => 'web'], new LaravelCache());
        $botman->hears('{message}', function ($botman, $message) {
            $number = $this->check($message); 
            switch ($number) {
                case 1:
                    $this->test($botman);
                    break;
                case 2:
                    $botman->startConversation(new RecommendationConversation());
                    break;
                default:
                    $botman->reply('error');
            }
        });
        $botman->listen();
    }

    public function returnRegex($cats){
        $res = '.*\b(?:';
        foreach ($cats as $cat) {
            $res = $res . $cat->name . '|';
        }
        $res = $res . ').*\?';
        return $res;
    }

    public function loopHear($botman){
        $cats = Category::all();
        $ans = '';
        foreach ($cats as $cat) {
            $res = '.*\b(?:'.$cat->name.').*\?';
            $botman->hears($res, function ($botman) {
                $message = $botman->getMessage()->getPayload()["message"];
            });
        }
    }
    public function inputTest(){
        
        $botman = BotManFactory::create(['driver' => 'web'], new LaravelCache());
        $cats = Category::all();
        $pattern4 = $this->returnRegex($cats);
        // dd($pattern4);
        $pattern1 = '.*\b(?:about|mission|about us|intention).*\?';
        $botman->hears($pattern1, function ($botman) {
            $this->test($botman);
        });
        $pattern3 = '.*(?:recommendation|reco|recom|recommend).*\?';
        $botman->hears($pattern3, function ($botman) {
            $botman->reply('pattern3');
            $botman->startConversation(new RecommendationConversation());
        });
        $pattern2 = '.*(?:recommendation|reco|recom|recommend).*(\d+).*\?';
        $botman->hears($pattern2, function ($botman, $number) {
            $botman->reply('pattern2');
            $botman->startConversation(new RecommendationConversation($number));
        });
        // $botman->hears($pattern4, function ($botman, $message) {
        //     $botman->reply('You said: ' . $message->getText());
        //     $botman->reply('test');
        //     // $botman->startConversation(new RecommendationConversation($number));
        // });
        $this->loopHear($botman);
        
        $botman->listen();
    }
}
