<?php
namespace P3\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
class PasswordGenController extends Controller
{
    /**
    * Doug Bradley
    * CSCIE-15 Project 3
    * Password Generator Section - adapted from P2 xkcd-style generator
    * Index function calls arrive via a GET route and store calls arrive
    * via POST.  Both functions invoke the same view, passwordgen.index.
    */

    private $pwMinWords = 3;  // minimum words in phrase
    private $pwMaxWords = 10; // maximum words in phrase

    public function index()
    {
        // The validation limits are pushed to the view for informational
        // display in the page
        $pageVars = [
            'pwMinWords' => $this->pwMinWords,
            'pwMaxWords' => $this->pwMaxWords,
        ];
        return view('passwordgen.index')->with($pageVars);
    }
    public function store(Request $request)
    {
        $dictArray = array("correct", "horse", "battery", "staple",
        "now", "is", "the", "time",
        "for", "all", "good", "men"
    );
    $dictUpperIndex = count($dictArray) - 1;
    $specialSymbolList = "~ ! @ # $ % ^ & * ( ) _ + = [ ] { } < > ?";
    $specialSymbolArray = explode(' ',$specialSymbolList);
    $specialSymbolArrayCount = count($specialSymbolArray);
    $pageVars = [
        'pwMinWords' => $this->pwMinWords,
        'pwMaxWords' => $this->pwMaxWords,
        'wordCount'  => $request->input('wordCount'),
        'numberFlag' => $request->input('numberFlag'),
        'symbolFlag' => $request->input('symbolFlag'),
        'wordSeparator' => $request->input('wordSeparator')
    ];
    $wordCountRule =
        'required|'
        .'integer|'
        .'between:'
        .$pageVars['pwMinWords'].','
        .$pageVars['pwMaxWords'];
    $this->validate($request, [
        'wordCount' => $wordCountRule,
    ]);
    $pwArray = [];
    $pwArrayCount = 0;
    while(count($pwArray) < $pageVars['wordCount']) {
        $pwArray[$pwArrayCount] = $dictArray[rand(0,$dictUpperIndex)];  //add
        $pwArray = array_unique($pwArray); // remove if duplicate
        $pwArrayCount = count($pwArray);
    }
    if (isset($pageVars['numberFlag'])) {
        $pwNum = rand(0,1000);
        $replaceArrayPos = rand(0,$pwArrayCount -1);
        $pwArray[$replaceArrayPos] = $pwNum;
    }
    if (isset($pageVars['symbolFlag'])) {
        $pwSymArrayPos = rand(0,$specialSymbolArrayCount-1);
        $replaceArrayPos = rand(0,$pwArrayCount -1);
        $pwArray[$replaceArrayPos] = $pwArray[$replaceArrayPos].$specialSymbolArray[$pwSymArrayPos];
    }
    if ($pageVars['wordSeparator']=="hyphen") {
        $wordSep = "-";
    } else {
        $wordSep = " ";
    }
    $pageVars['password'] = implode($wordSep, $pwArray);

    return view('passwordgen.index')->with($pageVars);
}

}
