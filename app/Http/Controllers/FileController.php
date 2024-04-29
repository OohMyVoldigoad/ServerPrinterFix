<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use setasign\Fpdi\PdfReader;

class FileController extends Controller
{
    public function countPages(Request $request)
    {
        // Validasi input
        $request->validate([
            'file_name' => 'required|string',
        ]);

        // Path ke file PDF di public storage
        $filePath = public_path('storage/' . $request->file_name);

        // Periksa apakah file ada
        if (!Storage::disk('public')->exists($request->file_name)) {
            return response()->json(['error' => 'File tidak ditemukan'], 404);
        }

        try {
            // Buat objek PdfReader untuk membaca metadata file PDF
            $pdfReader = new PdfReader();
            $pdfReader->setSourceFile($filePath);

            // Dapatkan jumlah halaman
            $numPages = $pdfReader->getPdfParser()->getPagesCount();

            return response()->json(['num_pages' => $numPages]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal membaca file PDF'], 500);
        }
    }
}
