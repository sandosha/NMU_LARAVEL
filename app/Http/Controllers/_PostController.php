<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class _PostController extends Controller
{
    //
    function index()
    {
        return view('index', data: ["posts" => $array]);
    }
    function show($id)
    {
        $array =
            [
                "id" => $id,
                "title" => "post1",
                "body" => "body1"
            ];
        return view('view',  ["posts" => $array]);
    }
    function edit($id)
    {
        $array =
            [
                "id" => $id,
                "title" => "post1",
                "body" => "body1"
            ];
        return view('edit',  ["post" => $array]);
    }
    function update(Request $request, $id)
    {

        return "update done";
    }
    function create()
    {

        return view('create');
    }
    function store(Request $request)
    {
        //validation data
        //store post
        //print store post
        return "done";
    }
    function destroy($id)
    {
        return "Destroy Post";
    }
}
