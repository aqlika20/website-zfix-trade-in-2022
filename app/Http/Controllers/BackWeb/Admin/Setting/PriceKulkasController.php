<?php

namespace App\Http\Controllers\BackWeb\Admin\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\BackWeb\Setting\UserManagement;
use Illuminate\Support\Facades\Validator;

use App\User;
use App\Helper;
use App\BackWeb\KulkasPrice;
use DB;

class PriceKulkasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $page_title = 'Kulkas Price';
        $page_description = '';
        $currentUser = User::find(Auth::id());
        $kulkas_price = KulkasPrice::all();
        return view('pages.admin.managements.price.kulkas_price', compact('page_title', 'page_description', 'currentUser', 'kulkas_price'));
    }

    public function create(Request $request) 
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'brand' => 'required', 
            'model' => 'required', 
            'type' => 'required', 
            'priceGradeA' => 'required',
            'priceGradeB' => 'required',
            'priceGradeC' => 'required',

        ]);

        if ($validator->fails())
        {
            return redirect()->route('price_kulkas')->with(['error'=>'Data not valid.']);
        }

        PsPrice::create($data);
        return redirect()->route('price_kulkas')->with(['success'=>'Data created.']);
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

            DB::table('kulkas_price')->delete();
  
            // Insert to MySQL database
            foreach($importData_arr as $importData){

            
                  $insertData = array(
                      "brand"=>$importData[0],
                      "model"=>$importData[1],
                      "type"=>$importData[2],
                      "priceGradeA"=>Helper::resetMoneyFormat($importData[3]),
                      "priceGradeB"=>Helper::resetMoneyFormat($importData[4]),
                      "priceGradeC"=>Helper::resetMoneyFormat($importData[5]),
                   );

                   KulkasPrice::create($insertData);  
             
  
            }
  
          }
  
        }
  
      }
  
      // Redirect to index
      return redirect()->route('price_kulkas')->with(['success'=>'Data created.']);
    }
}
