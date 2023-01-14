<?php

namespace App\Http\Controllers\Aspirasi;

use App\Http\Controllers\Controller;
use App\Models\Aspirasi;
use Illuminate\Http\Request;

class ShowMasingAspirasiController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Aspirasi $aspirasi)
    {
        return view('aspirasi.show', [
            'aspirasi' => $aspirasi->load('komentars', 'komentars.user', 'user'),
        ]);
    }
}
