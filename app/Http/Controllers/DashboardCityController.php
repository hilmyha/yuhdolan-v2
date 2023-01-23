<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;

use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardCityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.city.index', [
            'title' => 'City',
            'cities' => City::where('user_id', auth()->user()->id)->latest()->paginate(4),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.city.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:cities',
            'description' => 'required',
        ]);
        $validatedData['user_id'] = auth()->user()->id;
        
        City::create($validatedData);

        return redirect('/dashboard/city')->with('success', 'Post has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 
        // $city = City::find($id);
        // return view('dashboard.city.show', [
        //     'title' => 'City',
        //     'city' => $city,
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city = City::find($id);
        return view('dashboard.city.edit', [
            'title' => 'City',
            'city' => $city,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $city = City::find($id);
        $rules = [
            'title' => 'required|max:255',
            'description' => 'required',
        ];

        if ($request->slug != $city->slug) {
            $rules['slug'] = 'required|unique:cities';
        }

        $validatedData = $request->validate($rules);
        $validatedData['user_id'] = auth()->user()->id;

        City::where('id', $id)->update($validatedData);

        return redirect('/dashboard/city')->with('success', 'Post has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        City::destroy($id);

        return redirect('/dashboard/city')->with('success', 'Post has been deleted');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(City::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
