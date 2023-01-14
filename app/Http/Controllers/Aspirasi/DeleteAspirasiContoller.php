<?php

namespace App\Http\Controllers\Aspirasi;

use App\Http\Controllers\Controller;
use App\Models\Aspirasi;
use Illuminate\Http\Request;

class DeleteAspirasiContoller extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Aspirasi $aspirasi)
    {
        $this->authorize('delete', $aspirasi);

        $aspirasi->delete();

        // session()->flash('success', 'Komentar telah dihapus.');

        return redirect('/dashboard');
    }
}
