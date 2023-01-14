<?php

namespace App\Http\Controllers\Aspirasi;

use App\Http\Controllers\Controller;
use App\Models\Aspirasi;
use Illuminate\Http\Request;

class StoreAspirasiController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
       $data = $request->validate([
           'isi' => ['required', 'min:8']
       ]);

       $data['user_id'] = $request->user()->id;
       $data['status'] = "belum divalidasi";
       date_default_timezone_set('Asia/Jakarta');
       $data['created_at'] = date('Y-m-d h:i:s A');

       Aspirasi::create($data);

       return redirect()->back()->with('success', 'Aspirasi Anda telah terkirim');
    }
}
