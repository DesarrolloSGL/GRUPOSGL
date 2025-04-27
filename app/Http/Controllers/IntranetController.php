<?php

namespace App\Http\Controllers;

use URL;
use Illuminate\Http\Request;
use App\Models\IntranetFile;
use App\Models\OrganizationTable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class IntranetController extends Controller
{
    public function index(){
        $organization = OrganizationTable::query()->get();

        $user_role = Auth::user()->role;


        return view('intranet.index')->with([
            'organization'=>$organization,
            'user_role'=>$user_role,
        ]);

        $users_allowed = [
            'kevinarmas7@gmail.com'=>1,
            'alex.galindo@gruposgl.com'=>2,
            'hserrano@gruposgl.com'=>3,
            'heidy.serrano@gruposgl.com'=>101,
            'mairon.munoz@gruposgl.com'=>144,
            'sofia.tecun@gruposgl.com'=>327,
            'maria.guzman@gruposgl.com'=>330,
            'recursoshumanos@gruposgl.com'=>367,
            'andre.bejarano@gruposgl.com'=>477,
            'jose.bolanos@gruposgl.com'=>614,
        ];

        if(array_key_exists(Auth::user()->email, $users_allowed)){

        }
    }

    public function uploadFile(Request $request){
        $file = $request->file('file');
        $store_path = Storage::put('/intranet', $file, 'private');

        $intranet_file = new IntranetFile();
        $intranet_file->file = $store_path;
        $request->name ? $intranet_file->name = $request->name.'.'.$file->extension():$intranet_file->name = $file->getClientOriginalName();

        $intranet_file->file_type = $request->file_type;
        $intranet_file->organization_table_idorganization_table = $request->organization_id;
        $intranet_file->status = 1;
        $intranet_file->saveOrFail();

        return \Response::json('200');
    }

    public function showFiles(Request $request)
    {
        $id_organization = $request->only(['id_organization']);
        $file_type = $request->only(['file_type']);
        $files = IntranetFile::where('organization_table_idorganization_table', $id_organization)
        ->where('file_type', $file_type)
        ->where('status', '1')
        ->select()->get();
        //Para los que no son admins
        //$files = IntranetFile::where('organization_table_idorganization_table', $id_organization)->where('state', 1)->select()->get();
        return \Response::json($files);
    }

    public function showFile(Request $request)
    {
        $id_file = $request->only(['id_file']);
        $file = IntranetFile::where('idintranet_files', $id_file)->latest('created_at')->first();
        $file_name = explode('/', $file->file)[1];

        try {
            Storage::copy($file->file, 'public/intranet/' . $file_name);
        } catch (\Throwable $th) {
            //throw $th;
        }

        return \Response::json(URL::to('/') . '/storage/intranet/' . $file_name);
    }

    public function deleteFile(Request $request){
        $id_file = $request->only(['id_file']);
        $file = IntranetFile::findOrFail($id_file)->first();
        $file->status = 0;
        $file->saveOrFail();

        return \Response::json('Ok');
    }
}
