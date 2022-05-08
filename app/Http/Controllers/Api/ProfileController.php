<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Http\Resources\ProfileResource;
use App\Models\Profile;
use App\Models\User;
use App\Models\UserProfile;
use App\Services\StoragePathWork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
    }


    public function show($id)
    {

        $user = User::with('userProfile')->find($id);
        return response()->json([
            'id' => $user->id,
            'first_name' => $user->userProfile->first_name,
            'last_name' => $user->userProfile->last_name,
            'gender' => $user->userProfile->gender,
            'phone' => $user->userProfile->phone,
            'email' => $user->email,
        ], 200);
    }

    public function update(ProfileRequest $request, $id)
    {

        $user = User::with('userProfile')->find($id);

        // Si la data es valida se la asignamos al usuario

        $user->email = $request->email;

        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        $profile =  $user->userProfile;
        $profile->first_name = $request->first_name;
        $profile->last_name = $request->last_name;
        $profile->gender = $request->gender;
        $profile->phone = $request->phone;

        $file = $request->photo;

        //dd($request->file);
        if (!is_null($file)) {
            $myServiceSPW = new StoragePathWork("users");
            $filename = $myServiceSPW->saveFile($file, '');
            $profile->photo = $filename;
        }

        $profile->save();
        return response()->json([
            'id' => $user->id,
            'first_name' => $user->userProfile->first_name,
            'last_name' => $user->userProfile->last_name,
            'gender' => $user->userProfile->gender,
            'phone' => $user->userProfile->phone,
            'email' => $user->email,
        ], 200);
    }
    public function destroy(UserProfile $userprofile)
    {
        //  $company->delete();

        return response()->noContent();
    }
}
