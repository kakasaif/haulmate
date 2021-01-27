<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ChangePasswordController extends AdminController
{
    public function index()
    {
        return view('admin.change_password.index');
    }

    public function update(Request $request)
    {
        $this->updatePasswordValidator($request->all())->validate();
        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect(route('admin.change_password'))->with(['error' => "Your password is incorrect"]);
        }

        Admin::where('id', $user->id)->update(['password' => Hash::make($request->new_password)]);
        
        return redirect()->back()->with('message', 'Change Password Successfully');
    }

    private function updatePasswordValidator($data)
    {
        return Validator::make($data, [
            'current_password' => ['required', 'string', 'min:8'],
            'new_password' => ['required', 'string', 'min:8', 'confirmed']
        ]);
    }
}
