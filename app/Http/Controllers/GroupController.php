<?php

namespace App\Http\Controllers;

use App\Exports\GroupMembersExport;
use App\Models\User;
use App\Models\Group;
use App\Models\Member;
use App\Exports\UsersExport;
use Illuminate\Http\Request;
use App\Exports\GroupsExport;
use App\Exports\MembersExport;
use App\Exports\TransactionsExport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Validation\ValidationException;

class GroupController extends Controller
{

    // controller to display group in the table
   public function showGroup(){
    try{
        $groups=Group::All();
        $members=Member::All();
        $groupCount = $groups->count();
        $membertotal = $members->sum('total_amount');
        $MemberCount = $members->count();
        return view('admin',[
            'groups'=>Group::All(),
            'groupCount'=>$groupCount,
            'membertotal'=>$membertotal,
            'MemberCount'=>$MemberCount


        ]);
    }catch(\Exception $e){
       return redirect('/')->with('danger',$e->getMessage());
    }
   }

   public function groupdetail($id){
        $group=Group::find($id);
        return view('groupdetail',[
            'group'=>$group
        ]);

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
                'group_bank_account' => 'string',

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

            // dd($request['savers_gender']);
            $addMember = $request->validate([
                'group_id' => 'required|exists:groups,id', // Validate the selected category
                'savers_surname' => 'required',
                'savers_given_name' => 'required',
                'savers_age' => 'required',
                'savers_nationality' => 'required',
                'savers_nin' => 'string |nullable',
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
        } catch (ValidationException $e) {
            $errorMessages = collect($e->errors())->flatten()->toArray();
            $errorMessage = implode('', $errorMessages);
            return redirect('/')->with('danger', $errorMessage);
         } catch (\Exception $e) {
            // dd($e->getMessage());
            return redirect('/')->with('danger', 'Something went wrong Try again');
        }

    }

    // show the member
    public function showMember(){
        try{

            $groups=Group::All();
            $members=Member::All();
            $groupCount = $groups->count();
            $membertotal = $members->sum('total_amount');
            $MemberCount = $members->count();
            return view('admin',[
                'members'=>Member::All(),
                'groups'=>Group::All(),
                'groupCount'=>$groupCount,
                'membertotal'=>$membertotal,
                'MemberCount'=>$MemberCount
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

// contoller to show member in the group

public function allMember($id){
    $group=Group::find($id);
    $members=$group->members()->get();
    // dd($members);
    return view('groupMember',[
        'members'=>$members,
        'group'=>$group
]);
}
// controller to display all transaction for the members
public function alltransactions($id){
    $members=Member::find($id);
    // dd($members);
    $transactions=$members->transactions()->get();
    // dd($members);
    return view('memberTransaction',
    ['transactions'=>$transactions,
    'members'=>$members

]);
}


public function editMemberPage($id){
    $member =Member::find($id);
    $selectedGroupId = $member->group_id; // Assuming the Member model has a group_id attribute

    $groups = Group::all();
    // $selectedGroup= $groups->id;
//   dd($selectedGroupId);
    return view('editMemberPage',[
        'member'=>$member,
        'selectedGroupId'=>$selectedGroupId,
        'groups'=>$groups,
        'id'=>$id
    ]);

}



public function memberediting(request $request ,$id){

    try {

        // dd($request->all());
        $editMember = $request->validate([
            'group_id' => 'required|exists:groups,id', // Validate the selected category
            'savers_surname' => 'string | nullable',
            'savers_given_name' => 'string | nullable',
            'savers_age' => 'string | nullable',
            'savers_nationality' => 'string | nullable',
            'savers_nin' => 'string | nullable',
            'savers_address' => 'string | nullable',
            'savers_pnumber_1' => 'string | nullable',
            'savers_pnumber_2' => 'string | nullable',
            'savers_occupation' => 'string | nullable',
            'savers_gender' => 'string | nullable',
            'savers_marital_status' => 'string | nullable',
            'savers_nok_name' => 'string | nullable',
            'savers_nok_number' => 'string | nullable',
            'savers_nok_address' => 'string | nullable',
            'savers_nok_occupation' => 'string | nullable',
            'nok_relationship' => 'string | nullable',
        ]);

        if($request->hasFile('image')){
            $editMember['image']=$request->file('image')->store('images','public');
        }
        //   php artisan storage:link
        DB::table('members')->where('id',$id)->update($editMember);
        // DB::table('groups')->where('id',$id)->update($editGroup);


        return redirect('/')->with('success', 'Member Updated successfully');
    } catch (ValidationException $e) {
        $errorMessages = collect($e->errors())->flatten()->toArray();
        $errorMessage = implode('', $errorMessages);
        return redirect('/')->with('danger', $errorMessage);
     } catch (\Exception $e) {
        // dd($e->getMessage());
        return redirect('/')->with('danger', 'Something went wrong Try again');
    }

}

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
        'group_bank_account' => 'string',
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


// controller to edit admin page
public function adminEditProfile($id){
    $user= User::find($id);
    $admin = Auth::user(); // Assuming you're using Laravel's built-in authentication
if($admin->id !== $id){
return redirect('/login');
}
return view('adminEditProfile',[
  'user' => $user,
]);
}

// editpassword



public function editPassword(Request $request, $id){
    $user = User::find($id);

    // Validate the request data
    $request->validate([
        'current_pwd' => 'required',
        'new_pwd' => 'required|min:6',
        'confirm_pwd' => 'required|same:new_pwd',
    ]);

    $data = $request->all();

    // Check if the current password provided matches the authenticated user's password
    if (Hash::check($data['current_pwd'], $user->password)) {
        // Check if the new password and confirm password match
        if ($data['new_pwd'] == $data['confirm_pwd']) {
            // Update the user's password
            $user->update(['password' => bcrypt($data['new_pwd'])]);
            return redirect('adminProfilePage')->with('success', 'Your password has been changed successfully.');
        } else {
            return redirect()->back()->with('danger', 'New password and confirm password do not match. Please retype the password.');
        }
    } else {
        return redirect()->back()->with('danger', 'Current password is incorrect.');
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




     public function exportGroupMembers($groupMemberId)
     {
         // dd($memberId);
         return Excel::download(new GroupMembersExport($groupMemberId), 'GroupMembers.xlsx');
     }


public function exporttransaction($memberId)
{
    // dd($memberId);
    return Excel::download(new TransactionsExport($memberId), 'transactions.xlsx');
}

}


