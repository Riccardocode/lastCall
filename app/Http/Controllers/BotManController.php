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
use App\Domain\BotMan\MealConversation;
use function PHPUnit\Framework\isEmpty;
use BotMan\BotMan\Messages\Incoming\Answer;
use App\Domain\BotMan\ProximityConversation;

use BotMan\BotMan\Messages\Outgoing\Question;
use App\Domain\BotMan\SpecificFoodConversation;
use App\Domain\BotMan\RecommendationConversation;
use App\Models\Product;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;

class BotManController extends Controller
{

    // Checks if string exists inside file
    public function checkFile($value){
        if (str_contains(file_get_contents('variables.txt'), $value)) {
            return true;
        } else {
            return false;
        }
    }

    // Replaces or Inserts string inside file 
    public function fileTest($value){
        $file = file_get_contents('variables.txt');
        if (empty($file) || !str_contains($file, $value)) {
            file_put_contents('variables.txt', $value, FILE_APPEND);
        } else {
            if (str_contains($file, $value)) {
                $file = str_replace($value, '', $file);
                file_put_contents('variables.txt', $file);
            }
        }
    }



    //*Test
    public function testDump()
    {
        $test = new RecommendationConversation(3);
        dd(Category::find('1')->business->take(3));
    }

    //* Displays Message about Website
    public function test($botman)
    {
        $botman->reply("The Mission of this Website is to reduce waste by selling the food that has been cooked by Businesses but not sold.", ['parse_mode' => 'HTML']);
    }

    //* Creates dynamic Regex for Categories
    public function returnRegex($cats)
    {
        $res = '.*(?:';
        foreach ($cats as $cat) {
            $res = $res . strtolower($cat->name) . '|';
        }
        $trimmed = substr($res, 0, strlen($res) - 1);
        $trimmed = $trimmed.').*\?';
        return $trimmed;
    }

    //* Checks if string contains dish category
    public function dynamicConsversationStarter($botman, $message)
    {
        $cats = Category::all();
        foreach ($cats as $cat) {
            if (str_contains(strtolower($message), strtolower($cat->name))) {
                $botman->startConversation(new SpecificFoodConversation($cat->name));
            }
        }
    }

    //* Talk about Website Logic
    public function talkAboutWebsite($botman)
    {
        Log::info("Before Pattern Hear About");
        $pattern1 = '.*\b(?:about|mission|about us|intention)\b.*\?';
        $botman->hears($pattern1, function ($botman) {
            if ($this->checkFile("Command")) {

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
        $pattern3 = '.*(?:recommendation|recommend)*\?';
        $botman->hears($pattern3, function ($botman) {
            if ($this->checkFile("Command")) {
                $this->fileTest("Command");
                $this->fileTest("Error");
                $botman->startConversation(new RecommendationConversation());
            }
        });
    }

    //*Recommendation with Location
    // public function locationRecommend($botman)
    // {
    //     Log::info("Before Pattern Hear loc");
    //     $pattern7 = '.*(?:location|proximity).*\?';
    //     $botman->hears($pattern7, function ($botman) {
    //         if ($this->checkFile("Command")) {
    //             Log::info("Inside Hear loc");
    //             $this->fileTest("Command");
    //             $this->fileTest("Error");
                // $this->dummy($botman);
        //         $botman->startConversation(new ProximityConversation());
        //     }
        // });
    // }

    //*Recommendation with Amount Logic
    public function recommendMultiple($botman){
        Log::info("Before Pattern Hear rec with amount");
        $pattern21 = '.*(?:recommendation|recommend).*(\d+).*\?';
        $pattern22 = '.*(\d+).*(?:recommendation|reco|recom|recommend).*\?';
        $botman->hears($pattern21, function ($botman, $number) {
            if ($this->checkFile("Command")) {

                Log::info("Inside Hear rec with amount 1");
                $this->fileTest("Command");
                $this->fileTest("Error");
                // $this->dummy($botman);
                $botman->startConversation(new RecommendationConversation($number));
            }
        });
        $botman->hears($pattern22, function ($botman, $number) {
            if ($this->checkFile("Command")) {

                Log::info("Inside Hear rec with amount 2");
                $this->fileTest("Command");
                $this->fileTest("Error");
                // $this->dummy($botman);
                $botman->startConversation(new RecommendationConversation($number));
            }
        });
    }


    public function dynamicMealConversation($botman, $message)
    {
        $meals = Product::all();
        $count = 0;
        foreach ($meals as $meal) {
            $temp = " ".$meal->category;
            if (str_contains(strtolower($message), strtolower($temp)) && $count== 0) {
                // if (strtolower($message) == strtolower($meal->category) && $count== 0) {
                $count = $count +1 ;
                $botman->startConversation(new MealConversation($meal->category));
            }
        }
    }
    
    //*Recommendation with Amount Logic
    public function recommendMeal($botman){
        $pattern31 = '.*(?:recommendation|reco|recom|recommend).*(?:vegan|Vegan|vegetarian|Vegetarian|non-vegetarian|non-Vegetarian|vegeterian|Vegeterian).*\?';
        $pattern32 = '.*(?:vegan|Vegan|vegetarian|Vegetarian|non-vegetarian|non-Vegetarian).*(?:recommendation|reco|recom|recommend).*\?';
        $botman->hears($pattern31, function ($botman) {
            if ($this->checkFile("Command")) {
                $this->fileTest("Command");
                $this->fileTest("Error");
                $this->dynamicMealConversation($botman, $botman->getMessage()->getPayload()["message"]);
            }
        });
        $botman->hears($pattern32, function ($botman) {
            if ($this->checkFile("Command")) {
                $this->fileTest("Command");
                $this->fileTest("Error");
                // $this->dummy($botman);
                $this->dynamicMealConversation($botman, $botman->getMessage()->getPayload()["message"]);
            }
        });
    }



    //*Recommendation Dish Logic
    public function recommendDish($botman){
        $cats = Category::all();
        $pattern4 = $this->returnRegex($cats);
        $botman->hears($pattern4, function ($botman) {
            if ($this->checkFile("Command")) {
                $this->fileTest("Command");
                $this->fileTest("Error");
                $this->dynamicConsversationStarter($botman, $botman->getMessage()->getPayload()["message"]);
            }
        });
    }

    public function paymentIssues($botman){
        $pattern = '.*(?:payment|Payment).*\?';
        $botman->hears($pattern, function ($botman) {
            if ($this->checkFile("Command")) {
                $this->fileTest("Command");
                $this->fileTest("Error");
                $botman->reply("So the Main Issues with Payment are usually due to a couple of things. Check That Your Credit Card is still Valid and that you have enough Funds. ", [
                    'parse_mode' => 'HTML'
                ]);
            }
        });
    }

    public function help($botman){
        $pattern = '.*(?:help|Help).*\?';
        $botman->hears($pattern, function ($botman) {
            if ($this->checkFile("Command")) {
                $this->fileTest("Command");
                $this->fileTest("Error");
                $botman->reply("Hello, I am a Web Chatbot that can give you suggestions and recommendations for Foods. As well as help you with any struggles you are having. For example ask me 'What can you recommend?'", [
                    'parse_mode' => 'HTML'
                ]);
            }
        });
    }

    public function CashPayment($botman){
        $pattern6 = '.*(?:Cash|cash).*\?';
        $botman->hears($pattern6, function ($botman) {
            if ($this->checkFile("Command")) {
                $this->fileTest("Command");
                $this->fileTest("Error");
                $botman->reply("Currently there is no System in Place to pay in Cash. Cash Payment is currently in Developpment and will be available shortly. ", [
                    'parse_mode' => 'HTML'
                ]);
            }
        });
        
    }

    public function CheckoutProblems($botman){
        $pattern = '.*(?:Cash|cash).*\?';
        $botman->hears($pattern, function ($botman) {
            if ($this->checkFile("Command")) {
                $this->fileTest("Command");
                $this->fileTest("Error");
                $botman->reply("The Main Issues that can appear when you try to checkout is that your Information didn't get inserted correctly or the Server had Problems processing the Data.", [
                    'parse_mode' => 'HTML'
                ]);
            }
        });
        
    }

    public function LoginProblems($botman){
        $pattern5 = '.*(?:login|Login).*\?';
        $botman->hears($pattern5, function ($botman) {
            if ($this->checkFile("Command")) {
                $this->fileTest("Command");
                $this->fileTest("Error");
                $botman->reply("If you are struggling to login here are some things you can do: <br>1. Double Check that your Credentials are correct.<br>2. Try to Reset your Password <a href='/password'>Click here</a><br>3. Check that your Account is verified.", [
                    'parse_mode' => 'HTML'
                ]);
            }
        });
    }

    public function RegisterProblems($botman){
        $pattern5 = '.*(?:register|Register).*\?';
        $botman->hears($pattern5, function ($botman) {
            if ($this->checkFile("Command")) {
                $this->fileTest("Command");
                $this->fileTest("Error");
                $botman->reply("If you are struggling to register into our Website, please check that you have all the necessary requirements for all the Fields. If that doesn't help, please try again. ", [
                    'parse_mode' => 'HTML'
                ]);
            }
        });
    }

    //* Listens for Misinput and Apologizes
    public function displayError($botman)
    {
        Log::info("Outside Error Hear");
        $botman->hears('.*', function ($botman) {
            Log::info("Inside Error Hear");
            if ($this->checkFile("Error")) {
                $botman->reply("Sorry did not understand the Command. Write 'help' to get a display of all the functionality");
            }
        });
    }

    //* Resets file to initial Value
    public function resetFile()
    {
        $f = fopen('variables.txt', 'w');
        fwrite($f, 'ErrorCommand');
        //close the file in write mode
        fclose($f);
    }

    //* Check file Content
    public function dummy($botman)
    {
        $botman->reply("File = " . file_get_contents('variables.txt'));
    }

    public function inputTest()
    {
        $botman = BotManFactory::create(['driver' => 'web'], new LaravelCache());
        Log::info("Input Start");
        $this->resetFile();

        //* recommend Dish
        if ($this->checkFile("Command")) {
            Log::info("Login Issues");
            // $botman->reply('test');
            $this->recommendMeal($botman);
        }

        //* Login Issues
        if ($this->checkFile("Command")) {
            $this->LoginProblems($botman);
        }

        //* Login Issues
        // if ($this->checkFile("Command")) {
            // Log::info("Location");
            // $botman->reply('test');
            // $this->locationRecommend($botman);
        // }

        //* Register Issues
        if ($this->checkFile("Command")) {
            Log::info("Register Issues");
            // $botman->reply('test');
            $this->RegisterProblems($botman);
        }

        //* Help
        if ($this->checkFile("Command")) {
            Log::info("Help");
            // $botman->reply('test');
            $this->help($botman);
        }

        //* Cash Issues
        if ($this->checkFile("Command")) {
            Log::info("Cash Issues");
            // $botman->reply('test');
            $this->CashPayment($botman);
        }

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
            Log::info("Command Error");
            $this->displayError($botman);
        }
        $this->resetFile();
        $botman->listen();
    }
}
