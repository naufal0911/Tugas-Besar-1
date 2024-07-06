<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PDFController extends Controller
{
    public function uploadPDF(Request $request)
    {
        if ($request->hasFile('pdf')) {
            $path = $request->file('pdf')->store('pdfs', 'public');
            return response()->json(['url' => Storage::url($path)]);
        }
        return response()->json(['error' => 'No file uploaded'], 400);
    }
}
