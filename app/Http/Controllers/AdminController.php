<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Resume;
use App\Models\Template;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AdminController extends Controller
{
 //====================================================dashboard================================================//

    public function dashboard(){
        $totalUsers=User::count();
        $totalResumes=Resume::count();
        $users=User::latest()->take(5)->get();

        return view('admin.adminpanel',compact('totalUsers','totalResumes','users'));
    }
    public function users(){
        $users=User::latest()->paginate(10);
            return view('admin.users',compact('users'));
    }
    public function deleteUser($id){
        $user=User::findOrFail($id);
        Resume::where('user_id',$user->id)->delete();
        $user->delete();
            return back()->with('success','User deleted successfully');
    }
    public function resumes(){
        $resumes=Resume::with('user')->latest()->paginate(10);
            return view('admin.resumes',compact('resumes'));
    }
    public function deleteResumes($id){
        $resume=Resume::findOrFail($id);
            return back()->with('success','Resume deleted successfully');
    }
//============================================template============================================================//
    public function templates(){
        $template=Template::latest()->get();
            return view('admin.templates',compact('templates'));
    }

    public function storeTemplates(Request $request){
        $request->validate([
            'name'=>'required|string|max:255'
        ]);
        
        Template::create([
            'name'=>$request->name,
            'slug'=>Str::slug($request->name),
            'is_active'=>true
        ]);
            return back()->with('success','Template created');
    }

    public function toggleTemplate($id){
        $template=Template::findOrFail($id);
        $template->is_active=!$template->is_active;
        $template->save();

            return back();
    }

    public function deleteTemplate($id){
        Template::fimdOrFail($id)->delete();
            return back()->with('success','Template deleted');
    }
}
