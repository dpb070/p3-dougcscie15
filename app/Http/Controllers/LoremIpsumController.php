<?php
namespace P3\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
class LoremIpsumController extends Controller
{

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return view('loremipsum.index');
    }
    public function store(Request $request)
    {
        $paragraphCount = $request->input('paragraphCount');
        // return 'Process show: '.$x.'post: '.implode($_POST);
        return view('loremipsum.store')->with('paragraphCount', $paragraphCount);
        // return view('loremipsum.show')->with('paragraphCount', $paragraphCount);
    }


}
