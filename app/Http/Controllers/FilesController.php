<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\FileRequest;
use App\Models\Paragraph;
use App\Handlers\FileUploadHandler;
use App\Models\Project;
use App\Handlers\TranslationHandler;

use Auth;

class FilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index()
	{
		$files = File::paginate();
		return view('files.index', compact('files'));
	}

    public function show(File $file)
    {
        return view('files.show', compact('file'));
    }

	public function create(File $file)
	{
		$projects = Project::all();
		return view('files.create', compact('file','projects'));
	}


	public function upload(FileRequest $request)
	{
		\Excel::load($request->excel, function($reader){
			//获取第一个数据表中
			$sheet = $reader->first();
			$sheet->each(function($paragraphData){
				$paragraph = Paragraph::class;

				// $paragraph->file_id = ;
				// $paragraph->content = ;
				// $paragraph->source_language_id = ;
				// $paragraph->target_language_id = ;
				// $paragraph->translation = ;
				// $paragraph->file_id = ;
				// $paragraph->file_id = ;

			});

		});
	}

	public function store(FileRequest $request, FileUploadHandler $uploader, File $file)
	{
		$data = $request->all();
		if ($request){
			$result = $uploader->save($request->file,'upload',Auth::id(),416);
			$data['url'] = $result['path'];
			$data['relativepath'] = $result['relativepath'];
			$data['type'] = strtolower($request->file->getClientOriginalExtension());
			$data['name'] = $request->file->getClientOriginalName();

			if ($request['direction'] == '0'){
				$data['source_language_id'] = 0;
				$data['target_language_id'] = 1;
			} else {
				$data['source_language_id'] = 1;
				$data['target_language_id'] = 0;				
			}

			$data['user_id'] = Auth::id();
		}

		$file->fill($data);
		$file->save();

		$paragraphs = Paragraph::where('file_id',$file->id)->paginate();
		return view('paragraphs.index', compact('paragraphs'))->with('message', 'Created successfully.');

	}



    public function update1(UserRequest $request, FileUploadHandler $uploader, User $user)
    {
		$this->authorize('update', $user);
    	$data = $request->all();
    	if ($request->avatar) {
    		$result = $uploader->save($request->avatar,'avatars',$user->id, 416);
    		if ($result) {
    			$data['avatar'] = $result['path'];
    		}
    	}
        $user->update($data);
        return redirect()->route('users.show', $user->id)->with('success', '个人资料更新成功！');

	}


	public function import()
	{
  
		$source = '/home/wordsmith/Code/parallation/public/uploads/files/test.txt';
		$para = Paragraph::first();
		$result = app(TranslationHandler::class)->baiduTranslate($para->content,'zh','en');
		return view('files.result',compact('result'));
	}


	public function importExcel()
	{
  
		$source = '/home/wordsmith/Code/parallation/public/uploads/files/test.xlsx';
		$phpExcel = \Excel::load($source);
		$sheet = $phpExcel->first();

		 dd(var_dump($sheet->first()));
		return view('files.showparas',compact('paras'));
	}

	public function importWord()
	{
  
		$source = '/home/wordsmith/Code/parallation/public/uploads/files/test.docx';
		$phpWord = \PhpOffice\PhpWord\IOFactory::load($source);
		// dd($phpWord);
		// $paras = array(['段落A','段落B']);
		// return redirect()->route('files.showparas',compact('paras'))->with('message', 'Created successfully.');
		//$paras = ['段落A','段落B'];
		//$paras = $phpWord->getSection(0)->getTexts();
		 dd(var_dump($phpWord->getSections()));
		// $phpWord->save("/home/wordsmith/Code/parallation/public/uploads/files/testb.docx");
		return view('files.showparas',compact('paras'));
	}

	public function export()
	{
		// Creating the new document...
		$phpWord = new \PhpOffice\PhpWord\PhpWord();

		/* Note: any element you append to a document must reside inside of a Section. */

		// Adding an empty Section to the document...
		$section = $phpWord->addSection();
		// Adding Text element to the Section having font styled by default...
		$section->addText(
		    '"Learn from yesterday, live for today, hope for tomorrow. '
		        . 'The important thing is not to stop questioning." '
		        . '(Albert Einstein)'
		);

		/*
		 * Note: it's possible to customize font style of the Text element you add in three ways:
		 * - inline;
		 * - using named font style (new font style object will be implicitly created);
		 * - using explicitly created font style object.
		 */

		// Adding Text element with font customized inline...
		$section->addText(
		    '"Great achievement is usually born of great sacrifice, '
		        . 'and is never the result of selfishness." '
		        . '(Napoleon Hill)',
		    array('name' => 'Tahoma', 'size' => 10)
		);

		// Adding Text element with font customized using named font style...
		$fontStyleName = 'oneUserDefinedStyle';
		$phpWord->addFontStyle(
		    $fontStyleName,
		    array('name' => 'Tahoma', 'size' => 10, 'color' => '1B2232', 'bold' => true)
		);
		$section->addText(
		    '"The greatest accomplishment is not in never falling, '
		        . 'but in rising again after you fall." '
		        . '(Vince Lombardi)',
		    $fontStyleName
		);

		// Adding Text element with font customized using explicitly created font style object...
		$fontStyle = new \PhpOffice\PhpWord\Style\Font();
		$fontStyle->setBold(true);
		$fontStyle->setName('Tahoma');
		$fontStyle->setSize(13);
		$myTextElement = $section->addText('"Believe you can and you\'re halfway there." (Theodor Roosevelt)');
		$myTextElement->setFontStyle($fontStyle);

		// Saving the document as OOXML file...
		$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
		$objWriter->save('/home/wordsmith/Code/parallation/public/uploads/files/' . 'hellow.docx');


	}











	public function update(FileRequest $request, File $file)
	{
		$this->authorize('update', $file);
		$file->update($request->all());

		return redirect()->route('files.show', $file->id)->with('message', 'Updated successfully.');
	}

	public function destroy(File $file)
	{
		$this->authorize('destroy', $file);
		$file->delete();

		return redirect()->route('files.index')->with('message', 'Deleted successfully.');
	}
}