<?php

namespace App\Http\Controllers;

use App\Models\JenjangPendidikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;

class JenjangPendidikanController extends Controller
{
    public function index(){
        $jenjangPendidikan = JenjangPendidikan::all();
        return view("pages.jenjang-pendidikan.index", [
            "jenjangPendidikan"=> $jenjangPendidikan
        ]);
    }

    public function create(){
        return view("pages.jenjang-pendidikan.create");
    }

    public function store(Request $request){
        $validate = $request->validate(['jenjang_pendidikan'=>'required']);
        JenjangPendidikan::create($validate);
        return redirect()->route('jenjang-pendidikan.index')->with('success', 'Berhasil menambahkan Jenjang Pendidikan');
    }

    public function delete(JenjangPendidikan $jenjangPendidikan){
        $jenjangPendidikan->delete();
        return redirect()->route('jenjang-pendidikan.index')->with('success','Data berhasil dihapus');
    }

    public function edit(JenjangPendidikan $jenjangPendidikan){
        return view("pages.jenjang-pendidikan.edit", ["jenjangPendidikan"=>$jenjangPendidikan]);
    }

    public function update(Request $request, JenjangPendidikan $jenjangPendidikan){
        $validate = $request->validate(["jenjang_pendidikan"=> "required"]);
        $jenjangPendidikan->update($validate);

        return redirect()->route("jenjang-pendidikan.index")->with("success","Data berhasil di update");
    }
}
