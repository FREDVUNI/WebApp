<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class DomainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('domain.create',compact("categories","subcategories"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255|unique:domains',
            'url' => 'required|url',
            'shortdescription' => 'required|max:150',
            'description' => 'required',
            'email' => 'required|email',
            'category_id' => 'required',
        ]);
        
        $domain = new Domain();
        $domain->title = $request['title'];
        $domain->url = $request['url'];
        $domain->shortdescription = $request['shortdescription'];
        $domain->description = $request['description'];
        $domain->email = $request['email'];
        $domain->category_id = $request['category_id'];
        $domain->subcategory_id = $request['subcategory_id'];

        if($request['img']):
            $image = $request['img'];
            $file = md5(microtime()).".".$image->getClientOriginalExtension();
            $image->move(public_path('./domains'),$file);
        else:
            $domain->img = 'default.jpg';
        endif;
        $domain->img = $file;
        $domain->save();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Domain $domain
     * @return \Illuminate\Http\Response
     */
    public function show(Domain $domain)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Domain $domain
     * @return \Illuminate\Http\Response
     */
    public function edit(Domain $domain)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \App\Models\Domain $domain
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Domain $domain)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function destroy(Domain $domain)
    {
        //
    }
}
