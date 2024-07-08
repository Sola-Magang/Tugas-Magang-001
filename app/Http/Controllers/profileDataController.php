<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\category;
use App\Models\profileData;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;

class profileDataController extends Controller
{
    function show(User $data) {
        // if (Session::get('status') != 'login' ) {
        //     return redirect()->route('login');
        // }


        $data = User::findE(Session::get('user'));
        // $data = Session::get('user');
        // dd($data);
        return view(
            'list-siswa',
            ['title' => 'Daftar Siswa', 
            'school' => 'SMK Harapan',
            'user' => $data, 
            'students' => profileData::with('pos')->filter(request(['search','category']))->get()]
        );
    }

    function add()
    {
        $category = category::all();
        return view(
            'add-data',
            compact('category'),
            ['title'=>'Tambah Data']
        );
    }

    function submit(Request $pd)
    {
        $data = new profileData();
        $data->name = $pd->name;
        $data->pos_id = $pd->category;
        $data->slug = Str::slug($pd->name) . rand(1,100);
        $data->place_birth = $pd->place_birth;
        $data->date_birth = $pd->date_birth;
        $data->school = $pd->school;
        $data->information = $pd->information;

        $data->save();

        return redirect()->route('show');
    }

    function edit($slug){
        $category = category::all();
        $data = profileData::where('slug', '=', $slug)->first();
        return view(
            'edit', 
            compact('data','category'), 
            ['title'=>'Edit']
        );
    }

    function update(Request $pd, $slug){
        $data = profileData::where('slug','=',$slug)->first();
        $data->name = $pd->name;
        $data->pos_id = $pd->category;
        $data->slug = Str::slug($pd->name);
        $data->place_birth = $pd->place_birth;
        $data->date_birth = $pd->date_birth;
        $data->school = $pd->school;
        $data->information = $pd->information;

        $data->update();

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

    function loginPage() {
        return view('login',['slot'=>'login', 'mess' => '']);
    }

    function login(Request $request) {
        Session::flash('email', $request->email);
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
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
        ])->onlyInput('email');
        // ->onlyInput('email');


        // // dd($pair);
        // $mess = "";
        // $user = User::findE($pair->email);
        // if ($user == null) {
        //     $mess = 'No User Found';
        //     return view('login',['slot'=>'login', 'mess' => $mess]);
        // }
        // else {
        //     if ($user->password == $pair->password) {
        //         $mess = "berhasil";
        //         // dd($user);
        //         return redirect()->route('show', $user);
        //     }else {
        //         $mess = "Password salah";
        //     return view('login',['slot'=>'login', 'mess' => $mess]);
        //     }
        // }


    }

    
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
     
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/');
    }


}
