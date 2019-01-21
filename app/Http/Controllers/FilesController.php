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


		return redirect()->route('files.show', $file)->with('message', 'Created successfully.');
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