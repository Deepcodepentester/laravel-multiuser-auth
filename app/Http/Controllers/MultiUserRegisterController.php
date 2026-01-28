<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use App\Models\Vendor;
class MultiUserRegisterController extends Controller
{
    //
    use RegistersUsers;
    public function __construct()
    {
        $this->middleware('guest');
    }
    protected function showadminRegistrationForm(Request $request)
    {
        return view('admin.register');
    }
    protected function registeradmin(Request $request)
    {
        $this->validator($request->all(),'admins')->validate();
        $admin = new Admin();
        event(new Registered($user = $this->create($request->all(),$admin)));
        Auth::guard('admin')->login($user);
        
        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
                    ? new JsonResponse([], 201)
                    : redirect("/admin/login");
    }
    protected function showvendorRegistrationForm(Request $request)
    {
        return view('vendor.register');
    }
    protected function registervendor(Request $request)
    {
        $this->validator($request->all(),'vendors')->validate();
        $vendor = new Vendor();
        event(new Registered($user = $this->create($request->all(),$vendor)));
        Auth::guard('vendor')->login($user);
        
        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
                    ? new JsonResponse([], 201)
                    : redirect("/vendor/login");
    }

    protected function validator(array $data,$unique)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', "unique:$unique"],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data, Model $model)
    {
        return $model::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
