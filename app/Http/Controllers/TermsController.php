<?php

namespace App\Http\Controllers;

use App\Models\Term;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TermRequest;

class TermsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index()
	{
		$terms = Term::paginate();
		return view('terms.index', compact('terms'));
	}

    public function show(Term $term)
    {
        return view('terms.show', compact('term'));
    }

	public function create(Term $term)
	{
		return view('terms.create_and_edit', compact('term'));
	}

	public function store(TermRequest $request)
	{
		$term = Term::create($request->all());
		return redirect()->route('terms.show', $term->id)->with('message', 'Created successfully.');
	}

	public function edit(Term $term)
	{
        $this->authorize('update', $term);
		return view('terms.create_and_edit', compact('term'));
	}

	public function update(TermRequest $request, Term $term)
	{
		$this->authorize('update', $term);
		$term->update($request->all());

		return redirect()->route('terms.show', $term->id)->with('message', 'Updated successfully.');
	}

	public function destroy(Term $term)
	{
		$this->authorize('destroy', $term);
		$term->delete();

		return redirect()->route('terms.index')->with('message', 'Deleted successfully.');
	}
}