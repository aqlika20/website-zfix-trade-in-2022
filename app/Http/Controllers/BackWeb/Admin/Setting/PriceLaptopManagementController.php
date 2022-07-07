<?php

namespace App\Http\Controllers\BackWeb\Admin\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\BackWeb\Setting\UserManagement;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

use App\User;
use App\BackWeb\LaptopPrice;
use DB;
use App\Helper;

class PriceLaptopManagementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $page_title = 'Laptop Price';
        $page_description = '';
        $currentUser = User::find(Auth::id());
        $laptop_price = LaptopPrice::all();
        return view('pages.admin.managements.price.laptop_price', compact('page_title', 'page_description', 'currentUser', 'laptop_price'));
    }

    public function create(Request $request) 
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'brand' => 'required',
            'storages' => 'required', 
            'memory' => 'required',
            'priceGradeA' => 'required',
            'priceGradeB' => 'required',
            'priceGradeC' => 'required',

        ]);

        if ($validator->fails())
        {
            return redirect()->route('price_laptop')->with(['error'=>'Data not valid.']);
        }

        LaptopPrice::create($data);
        return redirect()->route('price_laptop')->with(['success'=>'Data created.']);
    }

    public function uploadFile(Request $request){

        if ($request->input('submit') != null ){
    
          $file = $request->file('file');
    
          // File Details 
          $filename = $file->getClientOriginalName();
          $extension = $file->getClientOriginalExtension();
          $tempPath = $file->getRealPath();
          $fileSize = $file->getSize();
          $mimeType = $file->getMimeType();
    
          // Valid File Extensions
          $valid_extension = array("csv");
    
          // 2MB in Bytes
          $maxFileSize = 2097152; 
    
          // Check file extension
          if(in_array(strtolower($extension),$valid_extension)){
    
            // Check file size
            if($fileSize <= $maxFileSize){
    
              // File upload location
              $location = 'uploads';
    
              // Upload file
              $file->move($location,$filename);
    
              // Import CSV to Database
              $filepath = public_path($location."/".$filename);
    
              // Reading file
              $file = fopen($filepath,"r");
    
              $importData_arr = array();
              $i = 0;
    
              while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                 $num = count($filedata );
                 
                 // Skip first row (Remove below comment if you want to skip the first row)
                 if($i == 0){
                    $i++;
                    continue; 
                 }
                 for ($c=0; $c < $num; $c++) {
                    $importData_arr[$i][] = $filedata [$c];
                 }
                 $i++;
              }
              fclose($file);
              
              DB::table('laptop_price')->delete();

              // Insert to MySQL database
              foreach($importData_arr as $importData){


                    $insertData = array(
                        "brand"=>$importData[0],
                        "memory"=>$importData[1],
                        "jenis_storage"=>$importData[2],
                        "storages"=>$importData[3],
                        "processor"=>$importData[4],
                        "os"=>$importData[5],
                        "ukuran_laptop"=>$importData[6],
                        "priceGradeA"=>Helper::resetMoneyFormat($importData[7]),
                        "priceGradeB"=>Helper::resetMoneyFormat($importData[8]),
                        "priceGradeC"=>Helper::resetMoneyFormat($importData[9]),
                     );
                     LaptopPrice::create($insertData);    
    
              }
    
            }
    
          }
    
        }
    
        // Redirect to index
        return redirect()->route('price_laptop')->with(['success'=>'Data created.']);
      }

    public function exportCsv(Request $request)
    {
      // $fileName = 'tess.csv';
   
      //      $headers = array(
      //          "Content-type"        => "text/csv",
      //          "Content-Disposition" => "attachment; filename=$fileName",
      //          "Pragma"              => "no-cache",
      //          "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
      //          "Expires"             => "0"
      //      );
   
      //      $columns = array('Title', 'Assign', 'Description', 'Start Date', 'Due Date');
   
      //      $callback = function() use($columns) {
      //          $file = fopen('php://output', 'w');
      //          fputcsv($file, $columns);
   
      //          fclose($file);
      //      };
   
      //      return response()->stream($callback, 200, $headers);
   
    }
}
