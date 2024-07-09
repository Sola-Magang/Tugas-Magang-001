<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\category;
use App\Models\profileData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class linkController extends Controller
{
    function show() {
        // dd(Auth::user()->profdat()->with('pos')->filter(request(['search','category']))->get());
        
        // dd(profileData::with('pos')->filter(request(['search','category']))->get());
        return view(
            'list-siswa',
            ['title' => 'Daftar Siswa', 
            'school' => 'SMK Harapan',
            // 'user' => $data, 
            // 'students' => profileData::with('pos')->filter(request(['search','category']))->get()]
            'students' => Auth::user()->profdat()->with('pos')->filter(request(['search','category']))->get()]
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
    
    function edit($slug){
        $category = category::all();
        $data = profileData::where('slug', '=', $slug)->first();
        return view(
            'edit', 
            compact('data','category'), 
            ['title'=>'Edit']
        );
    }

    function loginPage() {
        return view('login',['slot'=>'Login', 'mess' => '']);
    }

    function register(){
        return view('register',['slot'=>'Register']);
    }
}
