<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Member;
use App\Exports\UsersExport;
use Illuminate\Http\Request;
use App\Exports\GroupsExport;
use App\Exports\MembersExport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class GroupController extends Controller
{

    // controller to display group in the table
   public function showGroup(){
    try{
        // $groups=Group::All();
        return view('admin',[
            'groups'=>Group::All()
        ]);
    }catch(\Exception $e){
       return redirect('/')->with('danger',$e->getMessage());
    }
   }

    //controller to store group
    public function storeGroup(request $request)
    {
        try {

            // dd($request->all());
            $addGroup = $request->validate([
                'group_name' => 'required',
                'group_phone' => 'required',
                'group_location' => 'required',
            ]);
            DB::table('groups')->insert($addGroup);

            return redirect('/')->with('success', 'Group Added successfully');
        } catch (\Exception $e) {
            // dd($e->getMessage());
            return redirect('/')->with('danger', $e->getMessage());
        }
    }

    public function storeMember(request $request){

        try {

            // dd($request->all());
            $addMember = $request->validate([
                'group_id' => 'required|exists:groups,id', // Validate the selected category
                'savers_surname' => 'required',
                'savers_given_name' => 'required',
                'savers_age' => 'required',
                'savers_nationality' => 'required',
                'savers_nin' => 'required',
                'savers_address' => 'required',
                'savers_pnumber_1' => 'required',
                'savers_pnumber_2' => 'required',
                'savers_occupation' => 'required',
                'savers_gender' => 'required',
                'savers_marital_status' => 'required',
                'savers_nok_name' => 'required',
                'savers_nok_number' => 'required',
                'savers_nok_address' => 'required',
                'savers_nok_occupation' => 'required',
                'nok_relationship' => 'required',
            ]);

            if($request->hasFile('image')){
                $addMember['image']=$request->file('image')->store('images','public');
            }

            //   php artisan storage:link
            DB::table('members')->insert($addMember);

            return redirect('/')->with('success', 'Member Added successfully');
        } catch (\Exception $e) {
            // dd($e->getMessage());
            return redirect('/')->with('danger', $e->getMessage());
        }

    }

    // show the member
    public function showMember(){
        try{
            return view('admin',[
                'members'=>Member::All(),
                'groups'=>Group::All()

            ]);
        }catch(\Exception $e){
           return redirect('/')->with('danger',$e->getMessage());
        }
       }



    //    route to show edit group
//     public function showEditCategory(category $category)
// {
//     return view('', ['group' => $group]);
// }

public function showEditPage($id){
    // $group =Group::find($id);
    $group = Group::findOrFail($id);
    $members = $group->members()->get();

    // return view('editGroup',['group'=>$group]);
    return view('editGroup',[
        'group'=>$group,
        'members'=>$members,
        'id'=>$id
    ]);

}

// route to edit
public function editGroup(request $request, $id){
   try{
    $group = Group::find($id);

    if(!$group){
        return view('editGroup')->with('danger','The group does not exit');
    }
    //    dd($request->all());
    $editGroup = $request -> validate([
        "group_name" => "required",
        "group_phone" => "required",
        "group_location" => "required",
        "chairman_id" => "nullable",
        "secretary_id" => "nullable",
        "treasurer_id" => "nullable",
    ]);
    // dd($request->all());
   DB::table('groups')->where('id',$id)->update($editGroup);
   return redirect('/')->with('success','Group updated successfully');
   }catch(\Exception $e){
    // dd($e);
    return redirect('/')->with('danger',$e->getMessage());

}


}

// public function showDetails($id){
//     try {
//         $group = Group::findOrFail($id);
//         $members = $group->members()->get(); // Assuming you have a relationship defined in your Group model

//         return response()->json([
//             'group' => $group,
//             'members' => $members
//         ], 200);
//     } catch (\Exception $e) {
//         return response()->json([
//             'error' => 'Group not found'
//         ], 404);
//     }
// }


// controller to export excel
//  public function export()
//     {
//         return Excel::download(new UsersExport, 'users.xlsx');
//     }

    //controller to export excel for groups
    public function exportGroup()
    {
        return Excel::download(new GroupsExport, 'groups.xlsx');
    }

     // controller to export excel
     public function exportMember()
     {
         return Excel::download(new MembersExport, 'members.xlsx');
     }
}


