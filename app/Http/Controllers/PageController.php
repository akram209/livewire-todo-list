<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\User;

class PageController extends Controller
{

    public function index()
    {
    }

    public function show(Page $page)
    {
        if ($page->user_id != auth()->user()->id) {
            return redirect()->route('home', auth()->user()->id);
        } else {
            return view('home');
        }
    }
    public function completed()
    {

        return view('completed');
    }



    public function store()
    {
    }

    public function update()
    {
    }

    public function destroy()
    {
    }
}
