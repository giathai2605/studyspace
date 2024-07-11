<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Certificate;
use Barryvdh\DomPDF\Facade\Pdf;

class CertificateController extends Controller
{
    public function generateCertificate($courseID)
    {
        $certificate = Certificate::with('user')->with('course')->where('userID', auth()->user()->id)
            ->where('courseID', $courseID)
            ->first();

        $pdf = PDF::loadView('client.certificate', compact('certificate'));
        $pdf->setOptions([
            'isHtml5ParserEnabled' => true,
            'isPhpEnabled' => true,
        ]);
        $pdf->setOption('encoding', 'utf-8');

        $pdf->setOption('defaultFont', 'NotoSans');
        return $pdf->download('certificate.pdf');
    }
    public function previewCertificate($courseID, $userID)
    {
        $certificate = Certificate::with('user')->with('course')
            ->where('courseID', $courseID)
            ->where('userID', $userID)
            ->first();
//        dd($dataCertificate);
        return view('client.preview_certificate', compact('certificate'));
    }
    public function showCertificate(string $id)
    {
        $certificates = Certificate::with('user')
            ->with('course')
            ->where('userID', $id)
            ->where('status', 1)
            ->get();
        $categories = Category::query()->get();
        return view('newclient.dashboard.certificate.index', compact('certificates', 'categories'));
    }
    public function filterCertificateByCategory(string $id) {
        if ($id == 0) {
            $certificates = Certificate::with('user')
                ->with('course')
                ->where('userID', auth()->user()->id)
                ->where('status', 1)
                ->get();
        } else {
            $certificates = Certificate::with('user')
                ->with('course')
                ->where('userID', auth()->user()->id)
                ->where('status', 1)
                ->whereHas('course', function ($courseQuery) use ($id) {
                    $courseQuery->where('CategoryID', $id);
                })
                ->get();
        }
        return response()->json($certificates);
    }
}
