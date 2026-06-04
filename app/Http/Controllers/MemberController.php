<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    
    public function index()
    {
        $members = Member::all(); 
        return view('members.index', compact('members')); 
    }

    
    public function create()
    {
        return view('members.create');
    }

    
    public function store(Request $request)
    {
       
        $request->validate([
            'full_name'  => 'required|min:3',
            'department' => 'required',
            'email'      => 'required|email|unique:members',
            'phone'      => 'required|regex:/^[0-9\s]+$/',
            'photo'      => 'nullable|image|max:2048',
        ]);

       
        $input = $request->all();

        
        if ($request->hasFile('photo')) {
            $imageName = time() . '.' . $request->photo->extension(); 
            $request->photo->move(public_path('uploads'), $imageName); 
            $input['photo'] = 'uploads/' . $imageName; 
        }

       
        $input['is_active'] = $request->has('is_active') ? 1 : 0;

       
        Member::create($input);

        return redirect()->route('members.index');
    }

    
    public function edit($id)
    {
        $member = Member::find($id); 
        return view('members.edit', compact('member'));
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'full_name'  => 'required|min:3',
            'department' => 'required',
            'email'      => 'required|email|unique:members,email,'.$id, 
            'phone'      => 'required|min:10|max:12',
            'photo'      => 'nullable|image|max:2048',
        ]);

        $member = Member::find($id);
        $input = $request->all();

        
        if ($request->hasFile('photo')) {
            $imageName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('uploads'), $imageName);
            $input['photo'] = 'uploads/' . $imageName;
        }

        $input['is_active'] = $request->has('is_active') ? 1 : 0;

        $member->update($input);

        return redirect()->route('members.index');
    }

    
    public function destroy($id)
    {
        Member::find($id)->delete();
        return redirect()->route('members.index');
    }
}