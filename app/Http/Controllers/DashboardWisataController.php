<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\User;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Cviebrock\EloquentSluggable\Services\SlugService;

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
            'wisatas' => Wisata::where('user_id', auth()->user()->id)->latest()->get(),
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
        $vaidatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:wisatas',
            'city_id' => 'required',
            'body' => 'required',
        ]);
        $vaidatedData['user_id'] = auth()->user()->id;
        $vaidatedData['excerpt'] = Str::words(strip_tags($request->body), 200);

        // dd($vaidatedData);
        Wisata::create($vaidatedData);

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Wisata::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
