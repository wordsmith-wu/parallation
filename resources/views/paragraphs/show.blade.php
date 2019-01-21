@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>Paragraph / Show #{{ $paragraph->id }}</h1>
      </div>

      <div class="card-body">
        <div class="card-block bg-light">
          <div class="row">
            <div class="col-md-6">
              <a class="btn btn-link" href="{{ route('paragraphs.index') }}"><- Back</a>
            </div>
            <div class="col-md-6">
              <a class="btn btn-sm btn-warning float-right mt-1" href="{{ route('paragraphs.edit', $paragraph->id) }}">
                Edit
              </a>
            </div>
          </div>
        </div>
        <br>

        <label>File_id</label>
<p>
	{{ $paragraph->file_id }}
</p> <label>Content</label>
<p>
	{{ $paragraph->content }}
</p> <label>Source_language_id</label>
<p>
	{{ $paragraph->source_language_id }}
</p> <label>Target_language_id</label>
<p>
	{{ $paragraph->target_language_id }}
</p> <label>Translation</label>
<p>
	{{ $paragraph->translation }}
</p> <label>Translator_id</label>
<p>
	{{ $paragraph->translator_id }}
</p> <label>Proofread_id</label>
<p>
	{{ $paragraph->proofread_id }}
</p> <label>Flag</label>
<p>
	{{ $paragraph->flag }}
</p>
      </div>
    </div>
  </div>
</div>

@endsection
