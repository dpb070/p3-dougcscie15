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
    public function show()
    {  
        return view('loremipsum.show');
    }

}
