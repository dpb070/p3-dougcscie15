<?php
namespace P3\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
class UserGenController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  //return 'Show book '.$title;
        return view('usergen.index');
    }

}
