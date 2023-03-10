<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\User;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class DashboardWisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.wisata.index', [
            'title' => 'Wisata',
            'wisatas' => Wisata::where('user_id', auth()->user()->id)->latest()->paginate(4),
            // 'wisatas' => Wisata::with('city', 'user')->latest()->paginate(6),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.wisata.create', [
            'cities' => City::all(),
        ]);
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
            'slug' => 'required|unique:wisatas',
            'excerpt' => 'required',
            'harga' => 'required',
            'no_pengelola' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'city_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        
        Wisata::create($validatedData);

        return redirect('/dashboard/wisata')->with('success', 'Post has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function show($id)
    {
        $wisata = Wisata::find($id);
        $cities = City::all();
        $users = User::all();
        return view('dashboard.wisata.show', [
                'wisata' => $wisata,
                // 'cities' => $cities,
                // 'users' => $users,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $wisata = Wisata::find($id);
        $cities = City::all();
        $users = User::all();
        return view('dashboard.wisata.edit', [
            'wisata' => $wisata,
            'cities' => City::all(),
            'users' => $users,
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
        $wisata = Wisata::find($id);
        $rules = [
            'title' => 'required|max:255',
            'excerpt' => 'required',
            'harga' => 'required',
            'no_pengelola' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'city_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required',
        ];

        if ($request->slug != $wisata->slug) {
            $rules['slug'] = 'required|unique:wisatas';
        }

        $validatedData = $request->validate($rules);
        
        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('images');
        }
        
        $validatedData['user_id'] = auth()->user()->id;

        Wisata::where('id', $wisata->id)->update($validatedData);

        return redirect('/dashboard/wisata')->with('success', 'Post has been updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (auth()->user()->id == '1') {
            $wisata = Wisata::find($id);
            if ($wisata->image) {
                Storage::delete($wisata->image);
            }
        }
        Wisata::destroy($id);

        return redirect('/dashboard/wisata')->with('success', 'Post has been deleted');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Wisata::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
