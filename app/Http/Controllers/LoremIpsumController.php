<?php
namespace P3\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use joshtronic\LoremIpsum; // used for text generation
class LoremIpsumController extends Controller
{
    /**
    * Doug Bradley
    * CSCIE-15 Project 3
    * Lorem Ipsum Section
    * Index function calls arrive via a GET route and store calls arrive
    * via POST.  Both functions invoke the same view, loremipsum.index.
    */
    private $paragraphLowerLimit = 1;
    private $paragraphUpperLimit = 10;

    public function index()
    {
        // The validation limits are pushed to the view for informational
        // display in the page
        $pageVars = [
            'paragraphLowerLimit' => $this->paragraphLowerLimit,
            'paragraphUpperLimit' => $this->paragraphUpperLimit,
        ];
        return view('loremipsum.index')->with($pageVars);
    }
    public function store(Request $request)
    {
        $pageVars = [
            'paragraphLowerLimit' => $this->paragraphLowerLimit,
            'paragraphUpperLimit' => $this->paragraphUpperLimit,
            'paragraphCount'  => $request->input('paragraphCount'),
        ];
        $paragraphRule =
        'integer|'
        .'between:'
        .$pageVars['paragraphLowerLimit'].','
        .$pageVars['paragraphUpperLimit'];
        $this->validate($request, [
            'paragraphCount' => $paragraphRule,
            ]);
        // generate text, pass to view through page variables
        $lorIpText = new LoremIpsum();
        $pageVars['loremIpsumText'] =
            $lorIpText->paragraphs($pageVars['paragraphCount'], 'p');
        return view('loremipsum.index')->with($pageVars);
    }


}
