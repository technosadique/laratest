<?php

namespace App\Http\Controllers;
use App\Http\Controllers\PostController;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mpdf\Mpdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
// composer require mpdf/mpdf:^8.2 --with-all-dependencies
class PostController extends Controller
{    
	 
	 protected $postservice;
	 
	 public function __construct(PostService $postservice){
		 $this->postservice=$postservice;
	 }
	 
	function index(Request $req){ 		
		$posts=$this->postservice->getAllPost();			
		return view('list-view',['posts'=>$posts]);		
	}
	
	function create(Request $req){ 	
		return view('add-post');		
	}
	
	function edit(Request $req,$id){
		//$posts=Post::where('id',$req->id)->get();
		//$posts=$posts[0];
		$posts=Post::where('id',$req->id)->first();
		//$posts=$posts[0];
		return view('edit-post',['posts'=>$posts]);
	}
	
	function update(Request $req){
		$this->validate($req,[
		'title'=>'required',		
		'body'=>'required',		
		]);
		$data=['title'=>$req->title,'body'=>$req->body];
		//$posts=Post::where('id',$req->id)->update($data);	
		$posts=$this->postservice->updatePost($data,$req->id);		
		return redirect('/')->with('success','Updated successfully');	
	}
	
	function store(Request $req){
		
		$this->validate($req,[
		'title'=>'required',
		'body'=>'required',		
		]);
		
		$data=['title'=>$req->title,'body'=>$req->body];		
		//$posts=Post::insert($data);		
		$posts=$this->postservice->createPost($req->all());		
		return redirect('/')->with('success','Added successfully');
	}
	
	function destroy(Request $req,$id){
		
		//$posts=Post::where('id',$req->id)->delete();
		$posts=$this->postservice->deletePost($req->id);	
		return redirect('/')->with('success','Deleted successfully');
	}
	
	function setsession(){
		session()->put('username','PETER');
	}
	function getsession(){
		echo session()->get('username');
	}
	function deletesession(){
		 session()->forget('username');
	}
	
	public function generate_pdf(){
		$posts = Post::orderby('title','DESC')->get();
		$html = view('sample-pdf-view',['posts'=>$posts]); 		
		$mpdf =new \Mpdf\Mpdf(['default_font' => 'A_Nefel_Botan']);			
		//$stylesheet = file_get_contents(BASE_URL.'public/assets/css/pdf.css'); // external css
		//$mpdf->WriteHTML($stylesheet,1);  
		$mpdf->WriteHTML($html);   
		$mpdf->Output("post_" . date("ymd") . ".pdf", 'I');
		exit;

	}
	
	/* public function generate_csv(){       
		$report_data = Post::orderby('title','DESC')->get();		
		$f = fopen('php://memory', 'w'); // Set header
		$seq = 1;
        $header = ['Sl No.', 'Title'];
		fputcsv($f, $header, ',');
		
		foreach ($report_data as $row) {
			$row_data = [	
                    $seq++,					
					($row['title'])					
				];				
				// Generate csv lines from the inner arrays
				fputcsv($f, $row_data, ','); 
		}
		fseek($f, 0);
		header('Content-Type: text/csv');
		header('Content-Disposition: attachment; filename="Post_Report' . '_' . date('dmy') . '.csv";');
		fpassthru($f);	
		
	} */
	
	public function download_csv(){
		  
			$spreadsheet = new Spreadsheet();
			$sheet = $spreadsheet->getActiveSheet();

			// Header
			$sheet->setCellValue('A1', 'Title');
			$sheet->setCellValue('B1', 'Body');

			// Data
			$posts = Post::orderBy('title', 'DESC')->get();
			$row = 2;

			foreach ($posts as $post) {
				$sheet->setCellValue('A' . $row, $post->title);
				$sheet->setCellValue('B' . $row, $post->body);
				$row++;
			}

			// Output to browser
			$writer = new Xlsx($spreadsheet);
			$fileName = 'Post_Data.xlsx';

			// HTTP headers
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header("Content-Disposition: attachment; filename=\"{$fileName}\"");
			header('Cache-Control: max-age=0');

			$writer->save('php://output');
			exit;
		
	}
	
}
