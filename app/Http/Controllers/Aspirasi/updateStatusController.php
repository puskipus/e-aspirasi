<?php

namespace App\Http\Controllers\Aspirasi;

use App\Http\Controllers\Controller;
use App\Models\Aspirasi;
use Illuminate\Http\Request;

class updateStatusController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Aspirasi $aspirasi)
    {
        $data = $request->validate([
            'status' => ['required'],
        ]);

        $status = Aspirasi::findOrFail($aspirasi->id);
        date_default_timezone_set('Asia/Jakarta');
        $data['updated_at'] = date('Y-m-d h:i:s A');

        $status->update($data);

        
        return redirect()->back()->with('success', 'Status telah diganti');
        
    }
}
