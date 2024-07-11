<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Certificate;
use App\Models\Document;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    const OBJECT = 'admin.certificate';
    const DOT = '.';

    public function __construct()
    {
        $this->middleware('permission:certificate.index', ['only' => ['index']]);
        $this->middleware('permission:certificate.create', ['only' => ['create', 'store']]);
        $this->middleware('permission:certificate.update', ['only' => ['edit', 'update', 'updateCertificateStatus']]);
        $this->middleware('permission:certificate.destroy', ['only' => ['destroy']]);
        $this->middleware('permission:certificate.show', ['only' => ['show']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data =Certificate::query()
            ->with('user')
            ->with('course')
            ->orderBy('created_at','desc')
            ->paginate(10);
        $categories = Category::all();
        return view(self::OBJECT.self::DOT.'index',compact('data','categories'));
    }
    public function updateCertificateStatus(Request $request)
    {
        $document = Certificate::findOrFail($request->id);
        $document->status = $request->status;
        $document->save();
        return 1;
    }
    /**
     * Show the form for creating a new resource.
     */
    public function filterCertificateByCategory(string $id)
    {
        if ($id == 0) {
            $certificates = Certificate::with('user')
                ->with('course')
                ->get();
        } else {
            $certificates = Certificate::with('user')
                ->with('course')
                ->whereHas('course', function ($courseQuery) use ($id) {
                    $courseQuery->where('CategoryID', $id);
                })
                ->get();
        }
        return response()->json($certificates);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $certificate = Certificate::findOrFail($id);
        $certificate->delete();
        return redirect()->route('certificates.index')->with('success', 'Certificate deleted successfully.');
    }
}
