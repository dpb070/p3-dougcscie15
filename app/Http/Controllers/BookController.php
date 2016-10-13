<?php
namespace P3\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
class BookController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($title)
    {  //return 'Show book '.$title;
        return view('book.show')->with('title', $title);
    }

}
