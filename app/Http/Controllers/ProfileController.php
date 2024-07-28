<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Articles;
use App\Http\Requests\ProfileRequest;
use Illuminate\Validation\ValidationException;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('auth.profile', compact('user'));
    }


    public function update($user_id,ProfileRequest $request)
    {
        try {

            $user = User::find($user_id);

            if (!$user)
                return redirect()->route('profile')->with(['error' => 'هذا القسم غير موجود ']);
           
                User::where('id', $user_id)->update([
                    'email' => $request->email,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'bio' => $request->bio,
                ]);

                if ($request->hasFile('photo')) {
                    $filePath = uploadImage('user', $request->photo);
                    User::where('id', $user_id)->update([
                        'photo' => $filePath,
                    ]);
                }
            return redirect()->route('profile')->with(['success' => 'تم ألتحديث بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->route('profile')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

    }
}
