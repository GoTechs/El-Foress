<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use nirab\resetpassword\Models\UserResetPassword;

class resetPassworController extends Controller
{
    public function update(Request $request){

        $resetpassword = new UserResetPassword();
        $email = $request->email;
        $status = $resetpassword->SendMail($email);

        return redirect('')->with('status',$status);



    }
}
