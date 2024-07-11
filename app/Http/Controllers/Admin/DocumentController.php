<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Document;
use App\Http\Requests\DocumentRequest;
use Illuminate\Support\Facades\Session;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $data = Document::orderBy('id', 'ASC')->paginate(3);
        return view('admin.documents.index', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.documents.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DocumentRequest $request)
    {
        //
        $input = $request->all();
        $input['thumbnail'] = '';
        $input['file'] = '';
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/documents/thumbnail'), $fileName);
            $input['thumbnail'] = $fileName;
        }
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/documents/file'), $fileName);
            $input['file'] = $fileName;
        }
        Document::create($input);
        return redirect()->route('documents.index')->with('success', 'Document created successfully.');
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
        $document = Document::findOrFail($id);
        return view('admin.documents.edit', compact('document'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DocumentRequest $request, string $id)
    {
        //
        $input = $request->all();
        $document = Document::findOrFail($id);
        $input['thumbnail'] = $document->thumbnail;
        $input['file'] = $document->file;   
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/documents/thumbnail'), $fileName);
            $input['thumbnail'] = $fileName;
        }
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/documents/file'), $fileName);
            $input['file'] = $fileName;
        }
        $document->update($input);
        return redirect()->route('documents.index')->with('success', 'Document updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
     
        $document = Document::findOrFail($id);
           // Xóa ảnh và file
        // $thumbnail = public_path('uploads/documents/thumbnail/' . $document->thumbnail);
        // $file = public_path('uploads/documents/file/' . $document->file);
        // if (file_exists($thumbnail)) {
        //     @unlink($thumbnail);
        // }
        // if (file_exists($file)) {
        //     @unlink($file);
        // }
        if ($document) {
            try {
                $document->delete();
                Session::flash('success', 'Delete lesson successfully');
                return true;
            } catch (\Exception $e) {
                Session::flash('error', $e->getMessage());
                return redirect()->back()->with('error', $e->getMessage());
            }
        } else {
            Session::flash('error', 'Not found lesson');
            return redirect()->route('document.index');
        }
    }

    public function updateDocumentStatus(Request $request)
    {
        $document = Document::findOrFail($request->id);
        $document->status = $request->status;
        $document->save();
        return 1;
    }

    public function updateDocumentFeatured(Request $request)
    {
        $document = Document::findOrFail($request->id);
        $document->is_featured = $request->is_featured;
        $document->save();
        return 1;
    }
}
