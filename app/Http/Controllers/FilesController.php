<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\FileRequest;
use App\Models\Paragraph;
use App\Models\Term;
use App\Handlers\FileUploadHandler;
use App\Models\Project;
use App\Handlers\TranslationHandler;
use App\Handlers\Docx2TextHandler;
use App\Handlers\SlugTranslateHandler;
use Auth;
use PhpOffice\PhpWord\Shared\ZipArchive;


class FilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index()
	{
		$files = File::recent()->paginate();
		return view('files.index', compact('files'));
	}

    // public function show(File $file)
    // {
    //     return view('files.show', compact('file'));
    // }


    public function show(File $file)
    {
		$paragraphs = Paragraph::where('file_id',$file->id)->paginate();
		return view('paragraphs.index', compact('paragraphs','file'))->with('message', 'Created successfully.');
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
			$data['path'] = $result['localpath'];
			$data['type'] = strtolower($request->file->getClientOriginalExtension());
			$data['name'] = str_replace('.' . $request->file->getClientOriginalExtension(), "", $request->file->getClientOriginalName());

			if ($request['direction'] == 0){
				$data['source_language_id'] = 2;
				$data['target_language_id'] = 1;
			} elseif ($request['direction'] == 0) {
				$data['source_language_id'] = 1;
				$data['target_language_id'] = 2;				
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

		$filename = public_path() . '/uploads/files/test.docx';
		// 实例化

        $docx = new ZipArchive();
        $docx->open($filename);
        $document = $docx->getFromName('word/document.xml');
        $docx->deleteName('word/document.xml');
        $domDocument = new \DomDocument();
        $domDocument->loadXML($document);
        //get the body node to check the content from all his children
  //       $bodyNode = $domDocument->getElementsByTagNameNS('http://schemas.openxmlformats.org/wordprocessingml/2006/main', 'body');
  //       //We get the body node. it is known that there is only one body tag
  //       $bodyNode = $bodyNode->item(0);
		// $child = $bodyNode->childNodes[0];
		// $textNode = $child->childNodes[];


        $textNodes = $domDocument->getElementsByTagNameNS('http://schemas.openxmlformats.org/wordprocessingml/2006/main', 't');
        //We get the body node. it is known that there is only one body tag
        $textNode = $textNodes[0];
        $textNode->nodeValue = app(TranslationHandler::class)->findTranslate($textNode->nodeValue,'zh','en');


		// $child->nodeValue = app(TranslationHandler::class)->findTranslate($child->nodeValue,'zh','en');
		// dd($child);
		// $str = $domDocument->saveXml();
		// dd($str);
		$docx->addFromString('word/document.xml',$domDocument->saveXml());
		$docx->close();
		// echo '<pre>'; echo print_r($textNode[0]); echo '</pre>';
		// echo '<pre>'; echo print_r($document); echo '</pre>';
		// $text = app(Docx2TextHandler::class);
		// // 加载docx文件
		// $text->setDocx($source);
		// // 将内容存入$docx变量中
		// $paras = $text->extract();

		// return view('files.showparas',compact('paras'));


		$result = 'abc';
		return view('files.result',compact('result'));
	}


	public function importExcel()
	{
  
		$source = '/home/wordsmith/Code/parallation/public/uploads/files/test.xlsx';
	    $cellName = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL', 'AM', 'AN', 'AO', 'AP', 'AQ', 'AR', 'AS', 'AT', 'AU', 'AV', 'AW', 'AX', 'AY', 'AZ'); 



		$obj = \Excel::load($source);
		// 加载docx文件
	    $currSheet = $obj->getSheet(0);   //获取指定的sheet表 
	    $columnH = $currSheet->getHighestColumn();   //取得最大的列号 
	    $columnCnt = array_search($columnH, $cellName); 
	    $rowCnt = $currSheet->getHighestRow();   //获取总行数 
	   
	    $data = array(); 
	    for($_row=1; $_row<=$rowCnt; $_row++){  //读取内容 
	        for($_column=0; $_column<=$columnCnt; $_column++){ 
	            $cellId = $cellName[$_column].$_row; 
	            $cellValue = $currSheet->getCell($cellId)->getValue(); 
	             //$cellValue = $currSheet->getCell($cellId)->getCalculatedValue();  #获取公式计算的值 
	            if($cellValue instanceof PHPExcel_RichText){   //富文本转换字符串 
	                $cellValue = $cellValue->__toString(); 
	            } 
	   
	            array_push($data, $cellValue); 
	        } 
	    } 

		// 将内容存入$docx变量中
		$paras = $data;
		// 调试输出
		// var_dump($paras);
		// $para = Paragraph::first();
		// $result = app(TranslationHandler::class)->baiduTranslate($para->content,'zh','en');
		// return view('files.result',compact('result'));
		return view('files.showparas',compact('paras'));
	}

	public function importWord()
	{
  
		$source = '/home/wordsmith/Code/parallation/public/uploads/files/test.docx';
		// 实例化
		$text = app(Docx2TextHandler::class);
		// 加载docx文件
		$text->setDocx($source);
		// 将内容存入$docx变量中
		$paras = $text->extract();

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