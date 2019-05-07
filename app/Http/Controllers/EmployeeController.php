<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Designation;
use App\Department;
use App\Employee;
use DB;

class EmployeeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
    	$employees = Employee::all();
    	return view('employee.index', compact('employees'));
    }

    public function create()
    {
    	$designation = Designation::all();
    	$dipartment = Department::all();
    	return view('employee.create', compact('designation','dipartment'));
    }

    public function store(Request $request)
    {
    	$validatedData = $request->validate([
        'employee_name' => 'required|max:255',
        'email' => 'required|unique:employees|max:255',
        'nid_no' => 'required|unique:employees|max:255',
        'address' => 'required',
        'phone' => 'required|max:13',
        'photo' => 'required',
        'salary' => 'required',
        ]);

        $data=array();
        $data['employee_name']=$request->employee_name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $data['experience']=$request->experience;
        $data['dip_id']=$request->dip_id;
        $data['disg_id']=$request->disg_id;
        $data['nid_no']=$request->nid_no;
        $data['salary']=$request->salary;
        $data['vacation']=$request->vacation;
        $data['city']=$request->city;
        $data['description']=$request->description;
        $image=$request->file('photo');

        if ($image) {
            $image_name= str_random(5);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/employee/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['photo']=$image_url;
                $employee=DB::table('employees')
                         ->insert($data);
              if ($employee) {
                 $notification=array(
                 'messege'=>'Successfully Employee Inserted ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('employee')->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }      
                
            }else{

              return Redirect()->back();
            	
            }
        }else{
        	  return Redirect()->back();
        }
    }

	//view a single employee
    public function ViewEmployee($id)
    {
        $single=DB::table('employees')
        		->join('departments','employees.dip_id','departments.id')
        		->join('designations','employees.disg_id','designations.id')
        		->select('employees.*','designations.name as desi_name','departments.name as dep_name')
                ->where('employees.id',$id)
                ->first();
        return view('employee.show', compact('single'));     
    }



    public function DeleteEmployee($id)
    {
         $delete=DB::table('employees')
                ->where('id',$id)
                ->first();
         $photo=$delete->photo;
         unlink($photo);
         $dltuser=DB::table('employees')
                  ->where('id',$id)
                  ->delete();
         if ($dltuser) {
                 $notification=array(
                 'messege'=>'Successfully Employee Deleted ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('employee')->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }               


    }
	//single emplyee data show for edit
    public function EditEmployee($id)
    {
    	$designation = Designation::all();
    	$dipartment = Department::all();
        $edit=DB::table('employees')
             ->where('id',$id)
             ->first();
        return view('employee.edit', compact('edit'));     
    }
	//update a single employee
    public function UpdateEmployee(Request $request,$id)
    {
        $validatedData = $request->validate([
        'employee_name' => 'required|max:255',
        'email' => 'required|max:255',
        'nid_no' => 'required',
        'phone' => 'required|max:13',
        ]);

        $data=array();
        $data['employee_name']=$request->employee_name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['street']=$request->street;
        $data['town']=$request->town;
        $data['district']=$request->district;
        $data['postcode']=$request->postcode;
        $data['dob']=$request->dob;
        $data['emp_id']=$request->emp_id;
        $data['join_date']=$request->join_date;
        $data['concern']=$request->concern;
        $data['account_holder']=$request->account_holder;
        $data['acc_no']=$request->acc_no;
        $data['branch']=$request->branch;
        $data['dept_head']=$request->dept_head;
        $data['experience']=$request->experience;
        $data['dip_id']=$request->dip_id;
        $data['disg_id']=$request->disg_id;
        $data['nid_no']=$request->nid_no;
        $data['salary']=$request->salary;
        $data['vacation']=$request->vacation;
        $data['city']=$request->city;
        $data['id_no']=$request->id_no;
        $data['mailbox_uri']=$request->mailbox_uri;
        $data['description']=$request->description;
        $image=$request->photo;
// echo "<pre>";
//            print_r($data);
        if ($image) {
           $image_name=str_random(20);
           $ext=strtolower($image->getClientOriginalExtension());
           $image_full_name=$image_name.'.'.$ext;
           $upload_path='public/employee/';
           $image_url=$upload_path.$image_full_name;
           $success=$image->move($upload_path,$image_full_name);
           
            if ($success) {
                $data['photo']=$image_url;
                $img=DB::table('employees')->where('id',$id)->first();
                $image_path = $img->photo;
                $done=unlink($image_path);
                $user=DB::table('employees')->where('id',$id)->update($data); 
                echo "out";
                if ($user) {
                    $notification=array(
                        'messege'=>'Employee Update Successfully',
                        'alert-type'=>'success'
                    );
                    echo "nothing";                   
                    return Redirect()->route('employee')->with($notification);
                }else{
                  return Redirect()->back();
                  echo "string";
                } 
            }
        }else{
            $oldphoto=$request->old_photo;
            if ($oldphoto) {
                echo "hobe";
                $data['photo']=$oldphoto;  
                $user=DB::table('employees')->where('id',$id)->update($data); 
                if ($user) {
                    $notification=array(
                        'messege'=>'Employee Update Successfully',
                        'alert-type'=>'success'
                    );
                    echo "somthing";
                    return Redirect()->route('employee')->with($notification);                      
                }else{
                    return Redirect()->back();
                    echo "getting";
                } 
            }
        }
    }

    public function creates($id)
    {
        $designation = Designation::all();
        $dipartment = Department::all();
        $edit=DB::table('employees')
             ->where('id',$id)
             ->first();
        return view('employee.creates', compact('edit','designation','dipartment'));
    }
}
