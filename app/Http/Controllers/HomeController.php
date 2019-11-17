<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('show');
    }

    public function index()
    {
        $user = User::findOrFail(1);
        $homes = Home::latest()->take(7)->get();

        return view('welcome', compact('user', 'homes'));
    }

    public function show($id)
    {        //check for blog user and if is admin
        if(Auth::user()->isAdmin !== 1){
            return redirect('/')->with('error', 'No No No');
        }
        $home = Home::findOrFail($id);
        return view('home.show', compact('home'));
    }

    public function store(Home $home)
    {
        //check for blog user and if is admin
        if(Auth::user()->isAdmin !== 1){
            return redirect('/');
        }
        Home::create($this->validateRequest());

        return back()->with('success','Event Created Successfully!');
    }

    public function update($id)
    {
        //check for blog user and if is admin
        if(Auth::user()->isAdmin !== 1){
            return redirect('/');
        }
        $home = Home::findOrFail($id);
        //update blog
        $home->update($this->validateRequest());

        return redirect(route('welcome'))->with('success','Event Updated Successfully!');
    }

    public function destroy($id)
    {
        //check for blog user and if is admin
        if(Auth::user()->isAdmin !== 1){
            return redirect('/');
        }
        $home = Home::findOrFail($id);
        //delete blog
        $home->delete();

        return redirect(route('welcome'))->with('success','Event Deleted Successfully!');
    }

    private function validateRequest()
    {
        return request()->validate([
            'title' => 'required|min:4',
            'place' => 'required',
            'date' => 'required',
            'url' => 'required',
        ]);
    }
}
