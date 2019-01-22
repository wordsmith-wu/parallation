<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LanguageRequest;

class LanguagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index()
	{
		$languages = Language::paginate();
		return view('languages.index', compact('languages'));
	}

    public function show(Language $language)
    {
        return view('languages.show', compact('language'));
    }

	public function create(Language $language)
	{
		return view('languages.create_and_edit', compact('language'));
	}

	public function store(LanguageRequest $request)
	{
		$language = Language::create($request->all());
		return redirect()->route('languages.show', $language->id)->with('message', 'Created successfully.');
	}

	public function edit(Language $language)
	{
        $this->authorize('update', $language);
		return view('languages.create_and_edit', compact('language'));
	}

	public function update(LanguageRequest $request, Language $language)
	{
		$this->authorize('update', $language);
		$language->update($request->all());

		return redirect()->route('languages.show', $language->id)->with('message', 'Updated successfully.');
	}

	public function destroy(Language $language)
	{
		$this->authorize('destroy', $language);
		$language->delete();

		return redirect()->route('languages.index')->with('message', 'Deleted successfully.');
	}
}