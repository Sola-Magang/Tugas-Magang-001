<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\profileData;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class profileDataController extends Controller
{
    function show() {
        return view('list-siswa', ['title' => 'Daftar Siswa', 'school' => 'SMK Harapan', 'students' => profileData::filter(request(['search','category']))->get()
    ]);
    }

    function add()
    {
        $category = category::all();
        return view('add-data',compact('category'),['title'=>'Tambah Data']);
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
        return view('edit', compact('data','category'), ['title'=>'Edit']);
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
        return redirect()->route('tampil');
    }

}
