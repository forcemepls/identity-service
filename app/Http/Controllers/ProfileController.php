<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function get_profile(){
        $user = Auth::user();
        $user_id = $user->id;
        
        $profile = Profile::where('user_id', $user_id)->first();

        if (!$profile){
            $profile = Profile::create(
                [
                    'user_id' => $user_id,
                    'avatar' => null,
                    'bio' => null,
                    'settings' => null,
                ]
            );
        }
        return response()->json($profile);
    }

    public function update_profile(Request $request){
        $request->validate(
            [
                'avatar' => 'nullable|url',
                'bio' => 'nullable|string|max:200',
                'settings' => 'nullable|array',
            ]
        );

        $user = Auth::user();
        $user_id = $user->id;

        $profile = Profile::where('user_id', $user_id)->firstOrFail();

        $profile->update(
            [
                'avatar' => $request->avatar,
                'bio' => $request->bio,
                'settings' => $request->settings,
            ]
        );

        return response()->json($profile);
    }
}
