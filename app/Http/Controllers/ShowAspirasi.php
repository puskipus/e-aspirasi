<?php

namespace App\Http\Controllers;

use App\Models\Aspirasi;
use Illuminate\Http\Request;

class ShowAspirasi extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view('dashboard', [
            'aspirasis' => Aspirasi::with('user')->latest('id')->get(),
        ]);


    }
}
