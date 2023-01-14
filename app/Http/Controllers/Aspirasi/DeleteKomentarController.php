<?php

namespace App\Http\Controllers\Aspirasi;

use App\Http\Controllers\Controller;
use App\Models\Aspirasi;
use App\Models\Komentar;
use Illuminate\Http\Request;

class DeleteKomentarController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Aspirasi $aspirasi, Komentar $komentar)
    {

        $this->authorize('delete', $komentar);

        $komentar->delete();

        session()->flash('success', 'Komentar telah dihapus.');

        return redirect()->back();
    }
}
