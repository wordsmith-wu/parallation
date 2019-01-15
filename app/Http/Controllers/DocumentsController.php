<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DocumentRequest;
use App\Models\Category;
use Auth;


class DocumentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index(Request $request, Document $document)
	{
		$documents = $document->withOrder($request->order)->paginate(20);
		return view('documents.index', compact('documents'));
	}

    public function show(Request $request, Document $document)
    {
    		if (! empty($document->slug) && $document->slug != $request->slug) {
    				return redirect($document->link(),301);
    		}
        return view('documents.show', compact('document'));
    }

	public function create(Document $document)
	{
		$categories = Category::all();
		return view('documents.create_and_edit', compact('document','categories'));
	}

	public function store(DocumentRequest $request, Document $document)
	{
		$document->fill($request->all());
		$document->user_id = Auth::id();
		$document->save();
		return redirect()->to($document->link())->with('message', '文件创建成功');
	}

	public function edit(Document $document)
	{
        $this->authorize('update', $document);
        $categories = Category::all();
		return view('documents.create_and_edit', compact('document','categories'));
	}

	public function update(DocumentRequest $request, Document $document)
	{
		$this->authorize('update', $document);
		$document->update($request->all());

		return redirect()->to($document->link())->with('message', 'Updated successfully.');
	}

	public function destroy(Document $document)
	{
		$this->authorize('destroy', $document);
		$document->delete();

		return redirect()->route('documents.index')->with('message', '成功删除');
	}

  public function excel()
  {
      return view('documents.excel');
  }

  
}