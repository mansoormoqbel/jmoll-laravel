<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\DriverInfo;
use App\Models\User; 
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class DriverInfoController extends Controller
{
    public function index()
    {
        $driverinfos=DriverInfo::with('user')/* ->whereHas('user', function ($query) {
            $query->where('type_user', 2);
        }) */
        ->get();
        /* return $driverinfos; */
       
        return view('admin.driverinfo.index',compact('driverinfos')); 
    }
    public function create()
    { 
        $users=User::Where('type_user',1)->get();
        
        return view('admin.driverinfo.create',compact('users'));  
    }
    public function store(Request $request)
    { 
       
       
        try {
            $users=DriverInfo::Where('user_id',$request->user)->get();
           
            if (!$users  ) {
                return redirect()->route('admin.driverinfo.create')
                            ->with('error','لا يمكن الاضافة ');
            }
            $driverinfos= Validator::make($request->all(), [
                'car_model' => ['required', 'string', 'max:255'],
                'car_make' => ['required', 'string', 'max:255'],
                'car_number' => ['required', 'string', 'max:255'],
                'car_color' => ['required', 'string', 'max:255'],
                'birth_date' => ['required', 'date'],
                'car_year_made' => ['required', 'date'],
                'personal_identity_file' => [ 'required','mimes:jpeg,png,jpg,gif,svg,pdf,docx,doc' ,'max:2048'],
                'driving_license_file' => [ 'required','mimes:jpeg,png,jpg,gif,svg,pdf,docx,doc' ,'max:2048'],
                'car_license_file' => [ 'required','mimes:jpeg,png,jpg,gif,svg,pdf,docx,doc' ,'max:2048'], 
            ]);
            if ($driverinfos->fails()) {
                return redirect()->route('admin.driverinfo.create')
                            ->withErrors($driverinfos)
                            ->withInput();
            }
                
                if ($request->has('driving_license_file')) {
                    $image=$request->file('driving_license_file');
                    $DIF=time().'.'.$image->extension();
                    $image->move(public_path('DIF'),$DIF);
                }
                if ($request->has('personal_identity_file')) {
                    $image=$request->file('personal_identity_file');
                    $PIF=time().'.'.$image->extension();
                    $image->move(public_path('PIF'),$PIF);
                }
                if ($request->has('car_license_file')) {
                    $image=$request->file('car_license_file');
                    $CIF=time().'.'.$image->extension();
                    $image->move(public_path('CIF'),$CIF);
                }

               
                $driverinfo = new DriverInfo;
                $driverinfo->user_id=$request->user;
                $driverinfo->car_model=$request->car_model;
                $driverinfo->car_make=$request->car_make;
                $driverinfo->birth_date=$request->birth_date;
                $driverinfo->car_year_made=$request->car_year_made;
                $driverinfo->car_number=$request->car_number;
                $driverinfo->car_color=$request->car_color;
                $driverinfo->personal_identity_file=$PIF;
                $driverinfo->driving_license_file=$DIF;
                $driverinfo->car_license_file=$CIF;
                $request->availability?$driverinfo->availability=1:$driverinfo->availability=0;
                $request->acception? $driverinfo->acception=1: $driverinfo->acception=0;
              
                
        
                $driverinfo->save();
                return   redirect()->back()->with(['success' => 'تم الحفظ بنجاح']);
                //return redirect()->route('admin.user.index')->with(['success' => 'تم الحفظ بنجاح']);
            
    
            
        } catch (\Throwable $th) {
            return redirect()->route('admin.driverinfo.index')->with(['error' => $th]);
        }
      
    }
    public function edit($id)
    {
        $DriverInfo = DriverInfo::Where('id',$id)->first();
        $users=User::all() /* Where('type_user','!=',3)->get() */ ;
        /* return $DriverInfo; */
        return view('admin.driverinfo.edit',compact('DriverInfo','users'));
    }
    public function update(Request $request)
    {
       
        $DriverInfo = DriverInfo::Where('id',$request->id)->first();
        $DriverInfos= Validator::make($request->all(), [
            'car_model' => ['required', 'string', 'max:255'],
            'car_make' => ['required', 'string', 'max:255'],
            'car_number' => ['required', 'string', 'max:255'],
            'car_color' => ['required', 'string', 'max:255'],
            'birth_date' => ['required', 'date'],
            'car_year_made' => ['required', 'date'],
            'personal_identity_file' => [ 'mimes:jpeg,png,jpg,gif,svg,pdf,docx,doc' ,'max:2048'],
            'driving_license_file' => [ 'mimes:jpeg,png,jpg,gif,svg,pdf,docx,doc' ,'max:2048'],
            'car_license_file' => [ 'mimes:jpeg,png,jpg,gif,svg,pdf,docx,doc' ,'max:2048'], 
            
            
        ]);
        if ($DriverInfos->fails()) {
            return redirect()->route('admin.driverinfo.edit',$request->id)
                        ->withErrors($DriverInfos)
                        ->withInput();
        }
        $PIF = public_path('PIF/' . $DriverInfo->personal_identity_file);
        $DIF = public_path('DIF/' . $DriverInfo->driving_license_file);
        $CIF = public_path('CIF/' . $DriverInfo->car_license_file);
        // التحقق من وجود الصورة وحذفها
        if($request->has('personal_identity_file')){
            if (File::exists($PIF)) {
                File::delete($PIF);
            }
            if ($request->has('personal_identity_file')) {
                $image=$request->file('personal_identity_file');
                $PIF=time().'.'.$image->extension();
                $image->move(public_path('PIF'),$PIF);
            }
        }
        if($request->has('driving_license_file')){
            if (File::exists($DIF)) {
                File::delete($DIF);
            }
            if ($request->has('driving_license_file')) {
                $image=$request->file('driving_license_file');
                $DIF=time().'.'.$image->extension();
                $image->move(public_path('DIF'),$DIF);
            }
        }
        if($request->has('car_license_file')){
            if (File::exists($CIF)) {
                File::delete($CIF);
            }
            
            if ($request->has('car_license_file')) {
                $image=$request->file('car_license_file');
                $CIF=time().'.'.$image->extension();
                $image->move(public_path('CIF'),$CIF);
            }
        }
        $DriverInfo->car_model=$request->car_model;
        $DriverInfo->car_make=$request->car_make;
        $DriverInfo->birth_date=$request->birth_date;
        $DriverInfo->car_year_made=$request->car_year_made;
        $DriverInfo->car_number=$request->car_number;
        $DriverInfo->car_color=$request->car_color;
        if($request->has('personal_identity_file')){
            $DriverInfo->personal_identity_file=$PIF;
        }
        if($request->has('driving_license_file')){
            $DriverInfo->driving_license_file=$DIF;
        }
        if($request->has('car_license_file')){
            $DriverInfo->car_license_file=$CIF;
        }
        $request->availability?$DriverInfo->availability=1:$DriverInfo->availability=0;
        $request->acception? $DriverInfo->acception=1: $DriverInfo->acception=0;
        $DriverInfo->save();
        // Save the user
        return redirect()->route('admin.driverinfo.index')->with('success', 'User updated successfully.');
       
    }
    public function show(string $id)
    {
        $DriverInfo = DriverInfo::Where('id',$id)->with('user')->first();

        /* return $DriverInfo; */
                
        // افترض أن لديك مسار الملف
       

        // افترض أن لديك مسار الملف
        $PIF = $DriverInfo->personal_identity_file;
        $DIF = $DriverInfo->driving_license_file;
        $CIF = $DriverInfo->car_license_file;

        //'path/to/your/file.docx';
        $PIFs = Str::afterLast($PIF, '.');
        $DIFs = Str::afterLast($DIF, '.');
        $CIFs = Str::afterLast($CIF, '.');
        /* $xxx =$PIFs.' '.$DIFs.' '.$CIFs;
        return $xxx; */
        // استخدم Str::afterLast للحصول على الامتداد
        /* $fileExtension = Str::afterLast($filePath, '.'); */

        /* echo $fileExtension; */

        
        /*  return $user; */
         return view('admin.driverinfo.show',compact('DriverInfo','PIFs','DIFs','CIFs'));

       
    }

    public function destroy($id) {
        // استرجاع السجل من قاعدة البيانات
        $record = DriverInfo::find($id);
        if ($record) {
            // تحديد مسار الصورة
            $PIF = public_path('PIF/' . $record->personal_identity_file);
            $DIF = public_path('DIF/' . $record->driving_license_file);
            $CIF = public_path('CIF/' . $record->car_license_file);
            // التحقق من وجود الصورة وحذفها
            if (File::exists($PIF)) {
                File::delete($PIF);
            }
            if (File::exists($DIF)) {
                File::delete($DIF);
            }
            if (File::exists($CIF)) {
                File::delete($CIF);
            }

            // حذف السجل من قاعدة البيانات
            $record->delete();
        }
        return redirect()->back()->with('success', 'تم حذف الصورة بنجاح');
    }
}
