<?php

namespace App\Http\Controllers;

use App\Models\Paragraph;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ParagraphRequest;

class ParagraphsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index()
	{
		$paragraphs = Paragraph::paginate();
		return view('paragraphs.index', compact('paragraphs'));
	}

    public function show(Paragraph $paragraph)
    {
        return view('paragraphs.show', compact('paragraph'));
    }

	public function create(Paragraph $paragraph)
	{
		return view('paragraphs.create_and_edit', compact('paragraph'));
	}

	public function store(ParagraphRequest $request)
	{
		$paragraph = Paragraph::create($request->all());
		return redirect()->route('paragraphs.show', $paragraph->id)->with('message', 'Created successfully.');
	}

	public function edit(Paragraph $paragraph)
	{
        $this->authorize('update', $paragraph);
		return view('paragraphs.create_and_edit', compact('paragraph'));
	}

	public function update(ParagraphRequest $request, Paragraph $paragraph)
	{
		$this->authorize('update', $paragraph);
		$paragraph->update($request->all());

		return redirect()->route('paragraphs.show', $paragraph->id)->with('message', 'Updated successfully.');
	}

	public function destroy(Paragraph $paragraph)
	{
		$this->authorize('destroy', $paragraph);
		$paragraph->delete();

		return redirect()->route('paragraphs.index')->with('message', 'Deleted successfully.');
	}
}