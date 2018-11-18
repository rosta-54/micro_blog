<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function update(Request $request, User $user)
    {
        return response()->json(['success' => $user->update($request->all()), 'message' => 'Data has been updated']);

    }

}
