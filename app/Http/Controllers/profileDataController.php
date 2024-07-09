<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\category;
use App\Models\profileData;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;

class profileDataController extends Controller
{
    function submit(Request $pd)
    {
        $data = new profileData();
        $data->name = $pd->name;
        $data->pos_id = $pd->category;
        $data->slug = Str::slug($pd->name) . rand(1,100);
        $data->place_birth = $pd->place_birth;
        $data->date_birth = $pd->date_birth;
        $data->user_id = Auth::user()->id;
        $data->information = $pd->information;

        $data->save();

        Session::flash('mess','Berhasil menambahkan data');
        return redirect()->route('show');
    }

    function update(Request $pd, $slug){
        $data = profileData::where('slug','=',$slug)->first();
        $data->name = $pd->name;
        $data->pos_id = $pd->category;
        $data->slug = Str::slug($pd->name);
        $data->place_birth = $pd->place_birth;
        $data->date_birth = $pd->date_birth;
        $data->user_id = Auth::user()->id;
        $data->information = $pd->information;

        $data->update();

        Session::flash('mess','Berhasil mengedit data ' . $pd->name);
        return redirect()->route('show');
    }

    function delete($slug)
    {
        $data = profileData::where('slug','=',$slug)->first();
        $data->delete();
        return redirect()->route('show');
    }

    function categor(category $category){
        return view(
            'list-siswa', 
            ['title' => 'Daftar Siswa',
            'school' => 'SMK Harapan',
            'students' => $category->profdat->load('pos')]
        );
    }

    function deleteMO(Request $list){
        $mess = "";
        // dd($list);
        if ($list != null) {
            $mess = count($list->list);
            foreach ($list->list as $data) {
                if ($data == "no-data") {
                    
                }else {
                    $query = profileData::where('slug','=',$data)->first();
                    $query->delete();
                }
            }
        }else {
            $mess = "no data selected";
        }
        return redirect()->route('show');
    }

    function login(Request $request) {
        Session::flash('email', $request->email);
        $credentials = $request->validate([
            'email' => ['required', 'email:dns'],
            'password' => ['required', 'min:8'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            Session::flash('user', $request->email);
            Session::flash('mess', 'Login Berhasil');
            return redirect()->intended('/');
        }
        
        Session::flash('mess', 'Login Gagal');
        
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
            'mess' => 'login gagal'
        ])->onlyInput('email');
    }

    
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
     
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/');
    }

    function regist(Request $rq){
        $store = $rq->validate([
            'name'=> ['required','max:255', 'min:5'],
            'email'=> ['required', 'email:dns', 'unique:users,email'],
            'password' => ['required', 'min:8']
        ]);
        $store['remember_token'] = Str::random(10);
        // $store['email_verified_at'] = now();

        $store['password'] = Hash::make($store['password']);
        // dd($store);
        User::create($store);

        Session::flash('mess', 'Berhasil Registrasi');
        Session::flash('email', $store['email']);
        return redirect('/login');
    }

}
