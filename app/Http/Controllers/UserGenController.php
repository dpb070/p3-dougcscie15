<?php
namespace P3\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requestsuse;
use joshtronic\LoremIpsum; // used for profile generation
class UserGenController extends Controller
{
    /**
    * Doug Bradley
    * CSCIE-15 Project 3
    * User Generator Section
    * Index function calls arrive via a GET route and store calls arrive
    * via POST.  Both functions invoke the same view, usergen.index.
    */
    private $userLowerLimit = 1;   //minimum users to generate
    private $userUpperLimit = 50;  //maximum users to generate

    public function index()
    {
        // The validation limits are pushed to the view for informational
        // display in the page
        $pageVars = [
            'userLowerLimit' => $this->userLowerLimit,
            'userUpperLimit' => $this->userUpperLimit,
        ];
        return view('usergen.index')->with($pageVars);
    }
    public function store(Request $request)
    {
        $fNameArray = array("Thomas", "Richard", "Harold", "John",
                            "Jessica", "Susan", "Alice", "Ruth",
                            "Robert", "Ian", "Edward", "David",
                            "Janet","Jennifer","Carolyn","Debra"
                            );
        $lNameArray = array("Jones", "Smith", "Johnson", "Baker",
                            "Hunter", "Williams", "Brown", "Davis",
                            "Taylor", "White", "Harris", "Martin",
                            "Lewis","Lee","Walker","Hall"
                        );
        $nameCount = count($fNameArray);
        $dobStart = strtotime("1980-01-01");
        $dobEnd = strtotime("2000-12-31");
        $pageVars = [
            'userLowerLimit' => $this->userLowerLimit,
            'userUpperLimit' => $this->userUpperLimit,
            'userCount'  => $request->input('userCount'),
            'dobFlag' => $request->input('dobFlag'),
            'profileFlag' => $request->input('profileFlag')
        ];
        $userRule =
            'integer|'
            .'between:'
            .$pageVars['userLowerLimit'].','
            .$pageVars['userUpperLimit'];
        $this->validate($request, [
            'userCount' => $userRule,
        ]);
        // generate table array columns, pass to view
        // $pageVars['firstName'] = $fNameArray;
        // $pageVars['lastName'] = $lNameArray;
        // random date
        // random lorem ipsum text for profile
        // assign all values and control display in view
        for ($i = 0; $i < $pageVars['userCount']; $i++) {
            $pageVars['firstName'][$i] =
                    $fNameArray[rand(0,$nameCount-1)];
            $pageVars['lastName'][$i] =
                    $lNameArray[rand(0,$nameCount-1)];
            $pageVars['dateOfBirth'][$i] =
                    date("m/d/Y", mt_rand($dobStart, $dobEnd));
            $profileText = new LoremIpsum();
            $pageVars['profile'][$i] =
                        $profileText->sentence();
        }
        // $pageVars['dateOfBirth'] = $dobArray;
        return view('usergen.index')->with($pageVars);
    }


}
