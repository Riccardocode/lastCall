<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Category;
use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use App\Domain\BotMan\Middle;
use BotMan\BotMan\BotManFactory;
use Illuminate\Support\Facades\Log;
use BotMan\BotMan\Cache\LaravelCache;
use function PHPUnit\Framework\isEmpty;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;

use App\Domain\BotMan\SpecificFoodConversation;
use App\Domain\BotMan\RecommendationConversation;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;

class BotManController extends Controller
{

    //* Checks if string exists inside file
    public function checkFile($value){
        if (str_contains(file_get_contents('variables.txt'), $value)) {
            return true;
        } else {
            return false;
        }
    }

    //* Replaces or Inserts string inside file 
    public function fileTest($value){
        $file = file_get_contents('variables.txt');
        if (empty($file) || !str_contains($file, $value)) {
            file_put_contents('variables.txt', $value, FILE_APPEND);
            // dd(file_get_contents('variables.txt'));
        } else {
            // $file = file_get_contents('variables.txt');
            if (str_contains($file, $value)) {
                // dd($file);
                $file = str_replace($value, '', $file);
                // dd($file);
                file_put_contents('variables.txt', $file);
                // dd($file);
                // dd(file_get_contents('variables.txt'));
            }
        }
        // dd($file);
    }

    

    //*Test
    public function testDump()
    {
        $test = new RecommendationConversation(3);
        dd(Category::find('1')->business->take(3));
    }

    //* Displays Message about Website
    public function test($botman){
        $botman->reply("The Mission of this Website is to reduce waste by selling the food that has been cooked by Businesses but not sold." , ['parse_mode' => 'HTML']);
    }

    //* Creates dynamic Regex for Categories
    public function returnRegex($cats){
        $res = '\b(?:';
        foreach ($cats as $cat) {
            $res = $res . strtolower($cat->name) . '|';
        }
        $trimmed = substr($res, 0, strlen($res) - 1);
        $trimmed = $trimmed . ')\b.*\?';
        return $trimmed;
    }

    //* Checks if string contains dish category
    public function loopHear($botman, $message){
        $cats = Category::all();
        foreach ($cats as $cat) {
            if (str_contains(strtolower($message), strtolower($cat->name))) {
                $botman->startConversation(new SpecificFoodConversation($cat->name));
            }
        }
    }

    //* Talk about Website Logic
    public function talkAboutWebsite($botman){
        Log::info("Before Pattern Hear About");
        $pattern1 = '.*\b(?:about|mission|about us|intention)\b.*\?';
        $botman->hears($pattern1, function ($botman) {
            if ($this->checkFile("Command")){

                Log::info("Inside Hear About");
                $this->fileTest("Command");
                $this->fileTest("Error");
                // $this->dummy($botman);
                $this->test($botman);
            }
        });
    }

    //*Recommendation without Amount Logic
    public function singleRecommend($botman){
        Log::info("Before Pattern Hear rec without amount");
        $pattern3 = '\b(?:recommendation|reco|recom|recommend)(?:(?!pizza|dessert|sushi|burger|pasta|salad|sandwich|drink|other).)*\?';
        $botman->hears($pattern3, function ($botman) {
            if ($this->checkFile("Command")){

                Log::info("Inside Hear rec without amount");
                $this->fileTest("Command");
                $this->fileTest("Error");
                // $this->dummy($botman);
                $botman->startConversation(new RecommendationConversation());
            }
        });
    }

    //*Recommendation with Amount Logic
    public function recommendMultiple($botman){
        Log::info("Before Pattern Hear rec with amount");
        $pattern21 = '.*(?:recommendation|reco|recom|recommend).*(\d+).*\?';
        $pattern22 = '.*(\d+).*(?:recommendation|reco|recom|recommend).*\?';
        $botman->hears($pattern21, function ($botman, $number) {
            if ($this->checkFile("Command")){

                Log::info("Inside Hear rec with amount 1");
                $this->fileTest("Command");
                $this->fileTest("Error");
                // $this->dummy($botman);
                $botman->startConversation(new RecommendationConversation($number));
            }
        });
        $botman->hears($pattern22, function ($botman, $number) {
            if ($this->checkFile("Command")){

                Log::info("Inside Hear rec with amount 2");
                $this->fileTest("Command");
                $this->fileTest("Error");
                // $this->dummy($botman);
                $botman->startConversation(new RecommendationConversation($number));
            }
        });
    }

    //*Recommendation Dish Logic
    public function recommendDish($botman){
        Log::info("Before Pattern Hear dish");
        $cats = Category::all();
        $pattern4 = $this->returnRegex($cats);
        // dd($pattern4);
        $botman->hears($pattern4, function ($botman) {
            if ($this->checkFile("Command")){

                Log::info("Inside Hear dish");
                $this->fileTest("Command");
                $this->fileTest("Error");
                // $this->dummy($botman);
                $this->loopHear($botman, $botman->getMessage()->getPayload()["message"]);
            }
        });
    }

    //* Listens for Misinput and Apologizes
    public function displayError($botman){
        $botman->hears('.*', function ($botman) {
            if ($this->checkFile("Error")) {
                $botman->reply("Sorry did not understand the Command. Write 'help' to get a display of all the functionality");
            }
        });
    }

    //* Resets file to initial Value
    public function resetFile(){
        $f = fopen('variables.txt', 'w');
        fwrite($f, 'ErrorCommand');
        //close the file in write mode
        fclose($f);
    }

    //* Check file Content
    public function dummy($botman){
        $botman->reply("File = " . file_get_contents('variables.txt'));
    }

    public function inputTest()
    {
        $botman = BotManFactory::create(['driver' => 'web'], new LaravelCache());
        Log::info("Input Start");
        $this->resetFile();
        //* Talk about the website
        if ($this->checkFile("Command")) {
            Log::info("Command Talk About Website");
            // $botman->reply('test');
            $this->talkAboutWebsite($botman);
        }
        
        //* Recommendation with amount
        if ($this->checkFile("Command")) {
            Log::info("Command Recommend With Amount");
            // $botman->reply('test');
            $this->recommendMultiple($botman);
        }
        //* Single Recommendation
        if ($this->checkFile("Command")) {
            Log::info("Command Recommend Alone");
            // $botman->reply('test');
            $this->singleRecommend($botman);
        }
        //* Recommendation of specific Dish
        if ($this->checkFile("Command")) {
            Log::info("Command Recommed Dish");
            // $botman->reply('test');
            $this->recommendDish($botman);
        }
        // * Check for Misinput
        if ($this->checkFile("Error")) {
            $this->displayError($botman);
        }

        $this->resetFile();
        $botman->listen();
    }
}
