<?php

namespace App\Http\Controllers;

use DB;
use Session;
use App\Models\User;
use App\Models\RateUs;
use App\Models\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $exchange = DB::table('exchange')->where('currency','US')->first();

        $home_data = $this->homeData();
        $home_data['rates']->exchange = $exchange->value;

        $zoning_data = $this->zoningData();

        $sales = User::where('role','Operador')->get(['name','last_name','email']);

        session()->forget('idquotation');
        return view('home.home')->with([
            'rates' => $home_data['rates'],
            'user' => $home_data['user'],
            'zoning'=> $zoning_data,
            'sales'=>$sales
        ]);
    }

    public function zoningData(){
        $zoning_array = [];

        $districts = DB::table('district_table')->get();
        $cities = DB::table('city_table')->get();
        $zones = DB::table('zone_table')->get();

        foreach ($districts as $key => $district) {
            foreach ($cities as $key => $city) {
                $zone_c = 0;
                foreach ($zones as $key => $zone) {
                    $city->idcity_table == $zone->city_table_idcity_table?
                    $zone_c += 1
                    :false;
                }
                $district->iddistrict_table == $city->district_table_iddistrict_table ?
                array_push($zoning_array,["district_id"=>$district->iddistrict_table,"departamento"=>$district->departamento,"municipio"=>$city->name,"zonas"=>$zone_c])
                :false;
            }

            $district->iddistrict_table > 22?
            array_push($zoning_array,["district_id"=>$district->iddistrict_table,"departamento"=>$district->name,"municipio"=>$district->municipio.','.$district->departamento,"zonas"=>0])
            :false;
        }
        return($zoning_array);
    }

    public function homeData(){

        // Membresía
        if(Auth::check()){
            $user = Auth::user();
            $user_membership = Membership::where('users_id',Auth::user()->id)->latest()->first();
            $rates = DB::table('membership_table')->where('idmembership_table',$user_membership->type)->first();
            $user->lastname = $user->last_name;
        }else{
            $rates = DB::table('membership_table')->where('idmembership_table',1)->first();
            $user = null;
        }

        // EndMembresía

        unset($rates->created_at);
        unset($rates->idmembership_table);
        unset($rates->level);
        unset($rates->name);
        unset($rates->points);
        unset($rates->shipping);
        unset($rates->updated_at);

        unset($user->id);
        unset($user->password);
        unset($user->extra_phone);
        unset($user->email_verified_at);
        unset($user->remember_token);
        unset($user->role);
        unset($user->status);
        unset($user->last_time);
        unset($user->created_at);
        unset($user->updated_at);
        unset($user->promo_idpromo);
        $data = ([
            'rates'=>$rates,
            'user'=>$user,
        ]);

        return ($data);
    }

    public function rateUs(Request $request)
    {
        try{
            $rating = new RateUs();
            $request->has('rate_1')?$rating->rating = 1:false;
            $request->has('rate_2')?$rating->rating = 2:false;
            $request->has('rate_3')?$rating->rating = 3:false;
            $request->has('rate_4')?$rating->rating = 4:false;
            $request->has('rate_5')?$rating->rating = 5:false;
            $rating->commentary = $request->commentary;
            $rating->users_id = Auth::user()->id;
            $rating->saveOrFail();
        } catch (\Throwable $th) {
            //throw $th;
        }
        return Redirect::to('/');
    }

    public function membership()
    {
        return view('home.membership');
    }

    public function workWithUsCategory()
    {
        return view('footer.workWithUs.category');
    }

    public function workWithUsJob()
    {
        return view('footer.workWithUs.job');
    }

    public function aboutUs()
    {
        return view('home.aboutUs');
    }

    public function workWithUs()
    {
        return view('home.workWithUs');
    }

    public function freqs()
    {
        return view('home.freqs');
    }

    public function termsConditions()
    {
        return view('home.termsConditions');
    }

    public function refunds()
    {
        return view('home.refunds');
    }

    public function blog()
    {
        return view('home.blog');
    }
}
