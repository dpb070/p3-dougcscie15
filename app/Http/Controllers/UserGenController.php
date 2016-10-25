<?php
namespace P3\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
class UserGenController extends Controller
{
    /**
    * Doug Bradley
    * CSCIE-15 Project 3
    * User Generator Section
    * Index function calls arrive via a GET route and store calls arrive
    * via POST.  Both functions invoke the same view, loremipsum.index.
    */
    private $userLowerLimit = 1;
    private $userUpperLimit = 50;

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
        $dobStart = strtotime("1980-01-01");
        $dobEnd = strtotime("2000-12-31");
        $pageVars = [
            'userLowerLimit' => $this->userLowerLimit,
            'userUpperLimit' => $this->userUpperLimit,
            'userCount'  => $request->input('userCount'),
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
        $pageVars['firstName'] = $fNameArray;
        $pageVars['lastName'] = $lNameArray;
        // random date
        for ($i = 0; $i < $pageVars['userCount']; $i++) {
            $dobArray[$i] = date("d M Y", mt_rand($dobStart, $dobEnd));
        }
        $pageVars['dateOfBirth'] = $dobArray;
        return view('usergen.index')->with($pageVars);
    }


}
