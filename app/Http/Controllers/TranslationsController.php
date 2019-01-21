<?php

namespace App\Http\Controllers;

use App\Models\Translation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TranslationRequest;

class TranslationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index()
	{
		$translations = Translation::paginate();
		return view('translations.index', compact('translations'));
	}

    public function show(Translation $translation)
    {
        return view('translations.show', compact('translation'));
    }

	public function create(Translation $translation)
	{
		return view('translations.create_and_edit', compact('translation'));
	}

	public function store(TranslationRequest $request)
	{
		$translation = Translation::create($request->all());
		return redirect()->route('translations.show', $translation->id)->with('message', 'Created successfully.');
	}

	public function edit(Translation $translation)
	{
        $this->authorize('update', $translation);
		return view('translations.create_and_edit', compact('translation'));
	}

	public function update(TranslationRequest $request, Translation $translation)
	{
		$this->authorize('update', $translation);
		$translation->update($request->all());

		return redirect()->route('translations.show', $translation->id)->with('message', 'Updated successfully.');
	}

	public function destroy(Translation $translation)
	{
		$this->authorize('destroy', $translation);
		$translation->delete();

		return redirect()->route('translations.index')->with('message', 'Deleted successfully.');
	}
}