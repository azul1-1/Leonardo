<?php

namespace App\Http\Controllers;
use App\Models\User;


use Illuminate\Http\Request;

class VerifyController extends Controller
{
    public function toggleSecondAuth(Request $request)
{
    $user = User::find($request->user_id);
    $user->verify_confirmation = $request->verify_confirmation;
    $user->save();

    return response()->json(['success'=>'Status change successfully.']);
}
}
