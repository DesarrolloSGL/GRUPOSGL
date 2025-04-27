<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use DB;
use Mail;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Package;
use App\Models\Payment;
use App\Models\DistrictTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function testCyberResponse(Request $request){
        dd($request);
    }

    public function test(){
        return view('test');
    }

    public function testStore($link){
        $link = "link-test";
        // $('span:contains("Category:")').next().text();
        $response = Http::get($link);
        $data = [
            'json'=>$response->json(),
            'quoter'=>['new'=>'js'],
        ];

        dd($data);
    }

    public function testCybersource(){

        return view('test');
    }


    public function testMail(){
        $data = [
            '0'=> '2023-23-32',
            '1'=> '2023-23-32'
        ];

        $data1 = [
            '0'=> 'efectivo',
            '1'=> 'banco'
        ];

        $order_number = 'SGLMIA34234234';
        return view('mail.storeQuotationConfirm')->with(['order_number'=>$order_number]);
    }

    public function guide(){
        return view('guide');
    }

    public function testFactura($idquotation){
        $package = Package::where('quotation_idquotation',$idquotation)->get()[0];
        $file_name = explode('/',$package->bill)[1];
        try {
            Storage::copy($package->bill, "public/package_bills/".$file_name);
        } catch (\Throwable $th) {
            //throw $th;
        }
        return \Response::json(URL::to('/').'/storage/package_bills/'.$file_name);
        // return Redirect::to('/storage/package_bills/'.$file_name);
        // Storage::delete("public/package_bills/".$file_name);
    }

    public function testDelete(Request $request){
        $package = Package::where('quotation_idquotation',$request->idquotation)->get()[0];

        $file_name = explode('/',$package->bill)[1];
        Storage::delete("public/package_bills/".$file_name);
        return \Response::json('Ok');
    }


    public function testDb(){
        try {
            DB::connection()->getPdo();
            print_r("Connected successfully to: " . DB::connection()->getDatabaseName());
        } catch (\Exception $e) {
            die("Could not connect to the database.  Please check your configuration. Error:" . $e );
        }
        $package_table = [
            ['size_min'=>'28','size_max'=>'36','weight_min'=>'1','weight_max'=>'10','price'=>'15','price_city'=>'15.88'],
            ['size_min'=>'36','size_max'=>'47','weight_min'=>'20.1','weight_max'=>'40','price'=>'45','price_city'=>'20.88'],
            ['size_min'=>'47','size_max'=>'51','weight_min'=>'40.1','weight_max'=>'50','price'=>'55','price_city'=>'28.88'],
            ['size_min'=>'51','size_max'=>'','weight_min'=>'50.1','weight_max'=>'','price'=>'60','price_city'=>'32.88']
        ];


        $exchange = [
            ['currency'=>'US','value'=>'8.01','created_at'=>'2023-09-30 14:04:12','updated_at'=>'2023-09-30 14:04:12'],
        ];

        $tracking_states = [
            ['service'=>'1','status_1'=>'Orden En Proceso','status_2'=>'En Ruta De Recolección','status_3'=>'Paquete Recolectado','status_4'=>'En Ruta De Entrega','status_5'=>'Paquete Entregado','status_6'=>'','status_7'=>'','status_8'=>'','status_9'=>'','status_10'=>''],
            ['service'=>'2','status_1'=>'Orden En Proceso','status_2'=>'Bodega de Miami','status_3'=>'En Transito','status_4'=>'Desaduanaje','status_5'=>'Bodega de Guatemala','status_6'=>'Paquete Enviado','status_7'=>'Paquete Entregado','status_8'=>'','status_9'=>'','status_10'=>''],
            ['service'=>'3','status_1'=>'Orden En Proceso','status_2'=>'Bodega de China','status_3'=>'En Transito','status_4'=>'Desaduanaje','status_5'=>'Bodega de Guatemala','status_6'=>'Paquete Enviado','status_7'=>'Paquete Entregado','status_8'=>'','status_9'=>'','status_10'=>''],
        ];

        $membership_table=[
            ['type'=>'1','name'=>'basica'],
            ['type'=>'2','name'=>'basica'],
            ['type'=>'3','name'=>'basica'],
            ['type'=>'4','name'=>'basica'],
            ['type'=>'5','name'=>'basica'],
        ];

        $locker_table=[
            ['type'=>'1','name'=>'GTM','country'=>'Guatemala'],
        ];

        // $users = [
        //     ['name'=>'Kevin','last_name'=>'Armas','email'=>'kevinarmas7@gmail.com','password'=>'1234Aa,.','rol'=>'super-admin','role'=>'SuperAdmin'],
        //     ['name'=>'Alexander','last_name'=>'Galindo','email'=>'alex.galindo@gruposgl.com','password'=>'uzRa#4YH','rol'=>'super-admin','role'=>'SuperAdmin'],
        //     ['name'=>'Heidy','last_name'=>'Serrano','email'=>'hserrano@gruposgl.com','password'=>'HN&X9sLK','rol'=>'super-admin','role'=>'SuperAdmin'],
        //     ['name'=>'David','last_name'=>'Escobar','email'=>'descobar@gruposgl.com','password'=>'B&fCd4te','rol'=>'admin','role'=>'Admin'],
        //     ['name'=>'Pedro','last_name'=>'DeLeon','email'=>'gcourier-express@gruposgl.com','password'=>'x2Sy#J5P','rol'=>'admin','role'=>'Admin'],
        //     ['name'=>'Ana','last_name'=>'Gaitan','email'=>'sales12@gruposgl.com','password'=>'nwM&N8KP','rol'=>'operator','role'=>'Operador'],
        //     ['name'=>'Jose','last_name'=>'Herrera','email'=>'sales16@gruposgl.com','password'=>'S#soE65f','rol'=>'operator','role'=>'Operador'],
        //     ['name'=>'Angie','last_name'=>'Diaz','email'=>'sales15@gruposgl.com','password'=>'W&HJ2yD8','rol'=>'operator','role'=>'Operador'],
        //     ['name'=>'Rosa','last_name'=>'Pinto','email'=>'sales9@gruposgl.com','password'=>'v4N#C8gW','rol'=>'operator','role'=>'Operador'],
        //     ['name'=>'Dulce','last_name'=>'Cortez','email'=>'sales3@gruposgl.com','password'=>'i3w&zQ31','rol'=>'operator','role'=>'Operador'],
        //     ['name'=>'Edar','last_name'=>'Duque','email'=>'gfinancial@gruposgl.com','password'=>'rH2H#25A','rol'=>'accounting','role'=>'Contabilidad'],
        //     ['name'=>'Sergio','last_name'=>'Veliz','email'=>'gaccounting@gruposgl.com','password'=>'Ui&U9NMq','rol'=>'accounting','role'=>'Contabilidad'],
        //     ['name'=>'Yonathan','last_name'=>'Guzman','email'=>'air-ops1@gruposgl.com','password'=>'G9I4h#nh','rol'=>'storer','role'=>'Bodega'],
        //     ['name'=>'Jefferson','last_name'=>'Trabanino','email'=>'bodega-gtc@gruposgl.com','password'=>'2Ko&aHuT','rol'=>'storer','role'=>'Bodega'],
        //     ['name'=>'Mario','last_name'=>'Ara','email'=>'mario_siac@gmail.com','password'=>'kZy4nCt#','rol'=>'super-admin','role'=>'Siac'],
        //     ['name'=>'Luis','last_name'=>'Juarez','email'=>'luis_siac@gmail.com','password'=>'9mM&Ta8','rol'=>'super-admin','role'=>'Siac'],
        // ];
        // foreach ($users as $key => $user) {
        //     $new_user = new User();
        //     $new_user->name = $user['name'];
        //     $new_user->last_name = $user['last_name'];
        //     $new_user->email = $user['email'];
        //     $new_user->password = bcrypt($user['password']);
        //     $new_user->role = $user['role'];
        //     $new_user->status = '1';
        //     $new_user->assignRole($user['rol']);
        //     $new_user->saveOrFail();
        // }

        $agency_table = [
            ['type'=>'1','name'=>'','departamento'=>'Guatemala','municipio'=>'Cda.Guatemala','address'=>''],
            ['type'=>'2','name'=>'Agencia Zona 10','departamento'=>'Guatemala','municipio'=>'Cda.Guatemala','address'=>'5ta. Avenida 15-45 Zona 10 Edificio Centro Empresarial'],
            ['type'=>'3','name'=>'Agencia El Dorado','departamento'=>'Guatemala','municipio'=>'Mixco','address'=>'Blvd San Cristobal Centro Comercial El Dorado Zona 8'],
            ['type'=>'4','name'=>'Agencia Chiquimula','departamento'=>'Chiquimula','municipio'=>'Chiquimula','address'=>'10a avenida 4-70 zona 1'],
            ['type'=>'5','name'=>'Agencia Quetzaltenango','departamento'=>'','municipio'=>'','address'=>'']
        ];

        // foreach ($agency_table as $key => $agency) {
        //     $new_agency = new DistrictTable();
        //     $new_agency->type = $agency['type'];
        //     $new_agency->name = $agency['name'];
        //     $new_agency->departamento = $agency['departamento'];
        //     $new_agency->municipio = $agency['municipio'];
        //     $new_agency->address = $agency['address'];
        //     $new_agency->saveOrFail();
        // }
        dd('done');
    }
}




