<?php
namespace P3\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
class LoremIpsumController extends Controller
{

    /**
    * Doug Bradley
    * CSCIE-15 Project 3
    * Index function calls arrive via a GET route and store calls arrive
    * via POST.  Both functions invoke the same view, loremipsum.index.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    private $paragraphLowerLimit = 1;
    private $paragraphUpperLimit = 10;

    public function index()
    {
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
        $pageVars['loremIpsumText'] = 'results here...';
        return view('loremipsum.index')->with($pageVars);
    }


}
