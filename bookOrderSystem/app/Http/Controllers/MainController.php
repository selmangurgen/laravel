<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Session;
use Redirect;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class MainController extends BaseController
{
    //use  DispatchesJobs, ValidatesRequests;
	
	public function getLogin(){
	  Session::put('kadir',0);
	  return view('loginpage');
	 }
	 
	 
	public function postLogin(){
		$admin_id = Input::get('admin_id');
		$password = Input::get('password');

			 	$data = array("IN_ADMIN_ID" => $admin_id, "IN_ADMIN_PASSWORD" => $password);
			 	$data_string = json_encode($data);
			  //connection
			  	$ch = curl_init();
			  	curl_setopt($ch, CURLOPT_URL, 'orderbook.azurewebsites.net/stajorderbook/test/adminLogin'); 
			  	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);  
				curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));  
				$output = curl_exec($ch);   
				  
				  // convert response
				  $output = json_decode($output, true);

				  curl_close($ch);
				  
				  if($output['outMessage'] == 'OK'){
				  		Session::put('kadir', $admin_id);
						
				  }else{
				  	Session::put('kadir', 0);
				  }

				  if(Session::has('kadir') && Session::get('kadir') == $admin_id){				
					return redirect('/');
			
				  }else{
					
				  	return redirect('/login');
				  }

			  exit();
		return $admin_id.' '.$password;
	}
	
	
		public function books(){
   if(Session::has('kadir') && Session::get('kadir') != 0){
	   
										/*$conn = curl_init();
										curl_setopt($conn, CURLOPT_URL, 'localhost:8989/stajorderbook/test/getBookList'); 
										curl_setopt($conn, CURLOPT_RETURNTRANSFER, 1);
										curl_setopt($conn, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));  
										$output = curl_exec($conn); 

										$output = json_decode($output, true);*/
	   $selman = 123;
   return view('managebookpage');
   }else{
     return redirect('login');
   }
 }
 
 
		public function orders(){
		return view('manageorderspage');
	}
	
	 
		public function getstats(){
					
			$date = Input::get('date');
			$date2 = Input::get('date2');
		
		

			 	$data = array("IN_BEGIN_DATE" => $date, "IN_END_DATE" => $date2 );
			 	$data_string = json_encode($data);
			  //connection
			  	$ch = curl_init();
			  	curl_setopt($ch, CURLOPT_URL, 'orderbook.azurewebsites.net/stajorderbook/test/adminGetStatistics'); 
			  	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);  
				curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));  
				$output = curl_exec($ch);   
				  
				  // convert response
				  $output = json_decode($output, true);

				  $data= $output;
				  $selman = 123;
				  $getStats = 1;
				  //curl_close($ch);
				  //print_r($output['outMessage']);
				  
				  
				  
				  if($output['outMessage'] == 'OK'){
	return redirect()->back()->with('datedata',$data)->with('dateStat',$getStats)->with('date1',$date)->with('date2',$date2);
						
					  //return redirect()->back()->with($data,$getStats,$date,$date2);
				  		//return view('managebookpage', compact('data','getStats','date','date2'));
						//return View('managebookpage',compact('data2',$data2));
						//Return View::make( 'managebookpage')->with( 'data', $data );
						//return View::make('managebookpage', $data);
						//return view('managebookpage', compact('data',$data));
						
							//return redirect('/');
						
				  }else{
					  
				  	print_r($output['outMessage']);
					
					return Redirect::back();
				  }
	}
	
		public function approveOrder(){
			
			
			
		$order_id = Input::get('a_order_id');
		
		

			 	$data = array("IN_ORDER_ID" => $order_id, "IN_ADMIN_ID" => Session::get('kadir'));
			 	$data_string = json_encode($data);
			  //connection
			  	$ch = curl_init();
			  	curl_setopt($ch, CURLOPT_URL, 'orderbook.azurewebsites.net/stajorderbook/test/adminApproveOrder'); 
			  	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);  
				curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));  
				$output = curl_exec($ch);   
				  
				  // convert response
				  $output = json_decode($output, true);

				  curl_close($ch);
				  //print_r($output['outMessage']);
				  
				  if($output['outMessage'] == 'OK'){
				  		
						print_r($output['outMessage']);
						return Redirect::back();
						
							//return redirect('/');
						
				  }else{
					  
				  	print_r($output['outMessage']);
					
					return Redirect::back();
				  }
	}
	
		public function disapproveOrder(){
		

		$order_id = Input::get('d_order_id');
		

			 	$data = array("IN_ORDER_ID" => $order_id);
			 	$data_string = json_encode($data);
			  //connection
			  	$ch = curl_init();
			  	curl_setopt($ch, CURLOPT_URL, 'orderbook.azurewebsites.net/stajorderbook/test/adminDisapproveOrder'); 
			  	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);  
				curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));  
				$output = curl_exec($ch);   
				  
				  // convert response
				  $output = json_decode($output, true);

				  curl_close($ch);
				  //print_r($output['outMessage']);
				  
				  if($output['outMessage'] == 'OK'){
				  		
						print_r($output['outMessage']);
						return Redirect::back();
						
							//return redirect('/');
						
				  }else{
					  
				  	print_r($output['outMessage']);
					
					return Redirect::back();
				  }
	}
	
	

		public function deleteBook(){
		
		$book_id = Input::get('d_book_id');
		

			 	$data = array("IN_BOOK_ID" => $book_id);
			 	$data_string = json_encode($data);
			  //connection
			  	$ch = curl_init();
			  	curl_setopt($ch, CURLOPT_URL, 'orderbook.azurewebsites.net/stajorderbook/test/deleteBook'); 
			  	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);  
				curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));  
				$output = curl_exec($ch);   
				  
				  // convert response
				  $output = json_decode($output, true);

				  curl_close($ch);
				  //print_r($output['outMessage']);
				  
				  if($output['outMessage'] == 'OK'){
				  		
						print_r($output['outMessage']);
						return Redirect::back();
						
							//return redirect('/');
						
				  }else{
					  
				  	print_r($output['outMessage']);
					
					return Redirect::back();
				  }
		
		
	}
	
		public function updateBook(){
		
		$book_id = Input::get('u_book_id');
		$book_price = Input::get('u_book_price');
		$book_stock_no = Input::get('u_book_stock_no');

			 	$data = array("IN_BOOK_ID" => $book_id, "IN_PRICE" => $book_price, "IN_COUNT" => $book_stock_no);
			 	$data_string = json_encode($data);
			  //connection
			  	$ch = curl_init();
			  	curl_setopt($ch, CURLOPT_URL, 'orderbook.azurewebsites.net/stajorderbook/test/updateBook'); 
			  	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);  
				curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));  
				$output = curl_exec($ch);   
				  
				  // convert response
				  $output = json_decode($output, true);

				  curl_close($ch);
				  //print_r($output['outMessage']);
				  
				  if($output['outMessage'] == 'OK'){
				  		
						print_r($output['outMessage']);
						return Redirect::back();
						
							//return redirect('/');
						
				  }else{
					  
				  	print_r($output['outMessage']);
					
					return Redirect::back();
				  }
		
		
	}
	
		public function createBook(){
				
		$book_id 		=	Input::get('add_book_id');
		$book_name 		= 	Input::get('add_book_name');
		$book_aname 	= 	Input::get('add_author_name');
		$book_price 	= 	Input::get('addd_book_price');
		$book_count 	= 	Input::get('add_book_count');
		$book_sales_count = Input::get('add_sale_count');;

			 	$data = array(	"IN_BOOK_ID" => $book_id,
								"IN_BOOK_NAME" => $book_name,
								"IN_BOOK_AUTHOR_NAME" => $book_aname, 
								"IN_BOOK_PRICE" => $book_price, 
								"IN_STOCK_NUMBER" => $book_count, 
								"IN_SALES_COUNT" => 0);
	
/*							
				$data = array(	"IN_BOOK_ID" => $book_id,
								"IN_BOOK_NAME" =>  $book_name,
								"IN_BOOK_AUTHOR_NAME" => $book_aname, 
								"IN_BOOK_PRICE" => $book_price, 
								"IN_STOCK_NUMBER" => $book_count, 
								"IN_SALES_COUNT" => 0);
*/								
			 	$data_string = json_encode($data);
			  //connection
			  	$ch = curl_init();
			  	curl_setopt($ch, CURLOPT_URL, 'orderbook.azurewebsites.net/stajorderbook/test/createBook'); 
			  	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);  
				curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));  
				$output = curl_exec($ch);   
				  
				  // convert response
				  $output = json_decode($output, true);

				  curl_close($ch);
				  //print_r($output['outMessage']);
				  
				  if($output['outMessage'] == 'OK'){
				  		
						print_r($output['outMessage']);
						return Redirect::back();
						
							//return redirect('/');
						
				  }else{
					  
				  	print_r($output['outMessage']);
					
					return Redirect::back();
				  }
		
		
		}
		
		
		public function adminRegister(){
			
			
			
		$name = Input::get('reg_admin_name');
		$pwd = Input::get('reg_admin_pwd');
		$addr = Input::get('reg_admin_addr');
		$phone = Input::get('reg_admin_phone');
		$mail = Input::get('reg_admin_mail');
		
		

			 	$data = array("IN_ADMIN_NAME" => $name, "IN_ADMIN_PASSWORD" => $pwd,"IN_ADMIN_ADDRESS" => $addr,"IN_ADMIN_PHONE_NO" => $phone,"IN_ADMIN_EMAIL" => $mail,);
			 	$data_string = json_encode($data);
			  //connection
			  	$ch = curl_init();
			  	curl_setopt($ch, CURLOPT_URL, 'orderbook.azurewebsites.net/stajorderbook/test/adminRegister'); 
			  	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);  
				curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));  
				$output = curl_exec($ch);   
				  
				  // convert response
				  $output = json_decode($output, true);

				  curl_close($ch);
				  //print_r($output['outMessage']);
				  
				  if($output['outMessage'] == 'OK'){
				  		
												
						return redirect()->back()->with('success', 'Registiration Successful : '. " " .$output['outMessage'])->with('successdata',"\xA Admin ID: ".$output['data'][0]['ADMIN_ID']." Password: ".$output['data'][0]['ADMIN_PASSWORD']);
						
							//return redirect('/');
						
				  }else{
					  
				  	//print_r($output['outMessage']);
					
					//return Redirect::back();
					return redirect()->back()->with('fail', 'Registiration Failed : '. " " .$output['outMessage']);
				  }
	}
	
}





?>
