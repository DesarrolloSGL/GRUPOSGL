<?php

namespace App\Http\Controllers;

use DB;
use Session;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\Tracking;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\TrackingStates;
use App\Models\TrackingStatus;
use Illuminate\Support\Facades\Redirect;

use Mail;
use Mailtrap\Config;
use Mailtrap\Helper\ResponseHelper;
use Mailtrap\MailtrapClient;
use Illuminate\Mail\Mailable;
use Symfony\Component\Mime\Address as EmailAddress;
use Symfony\Component\Mime\Email;
use Mailtrap\EmailHeader\CategoryHeader;
use Mailtrap\EmailHeader\CustomVariableHeader;


class TrackingController extends Controller
{
    public function index(){
        $tracking = Tracking::Where('status',1)->orderBy('created_at', 'desc')->paginate(10);

        $tracking_reverse = array_reverse($tracking->all());

        return view('tracking.index')->with(['tracking'=>$tracking_reverse,'last_page'=>$tracking->lastPage()]);
    }

    public function addToOrder(Request $request){
        dd($request);
        $request->request->add(['status'=>'1']);
        $tracking = globalnewTracking($request);
        $service = $tracking->service;

        $tracking_states = TrackingStates::where('service',$service)->first();

        $request->merge(['status' =>'status_1']);
        $request->request->add(['state'=>$tracking_states->status_1]);
        $request->request->add(['tracking_idtracking'=>$tracking->idtracking]);
        $tracking_status = globalnewTrackingStatus($request);

        return Redirect::to('/tracking-index');
    }

    public function add(Request $request){

        $request->request->add(['status'=>'1']);
        $tracking = globalnewTracking($request);
        $service = $tracking->service;

        $tracking_states = TrackingStates::where('service',$service)->first();

        $request->merge(['status' =>'status_1']);
        $request->request->add(['state'=>$tracking_states->status_1]);
        $request->request->add(['tracking_idtracking'=>$tracking->idtracking]);
        $tracking_status = globalnewTrackingStatus($request);

        return Redirect::to('/tracking-index');
    }

    public function updateView($idtracking){
        $tracking = Tracking::findOrFail($idtracking);

        $tracking_states = TrackingStates::where('service',$tracking->service)->first();
        $tracking_status = TrackingStatus::where('tracking_idtracking',$idtracking)->get();

        foreach ($tracking_states->getAttributes() as $key => $ts) {
            if(!(strpos($key,'status') === 0) || $ts ==null ){
                unset($tracking_states[$key]);
            }
        }

        $tracking_states = $tracking_states->getAttributes();

        return view('tracking.update')->with(['tracking'=>$tracking,'tracking_states'=>$tracking_states,'tracking_status'=>$tracking_status]);
    }

    public function updateTracking(Request $request){
        $request->request->add(['idtracking'=>$request->tracking_id]);
        $tracking = globalnewTracking($request);

        return Redirect::to('/tracking-update/'.$request->tracking_id);
    }

    public function updateStatus(Request $request){
        $tracking = Tracking::Where('idtracking',$request->tracking_id)->first();

        $service = $tracking->service;

        $tracking_states = TrackingStates::where('service',$service)->first();

        $service == 1 ? $request->tracking_state == 'status_5'? $this->completeOrder($tracking):false:false;
        $service == 2 ? $request->tracking_state == 'status_15'? $this->completeOrder($tracking):false:false;
        $service == 3 ? $request->tracking_state == 'status_15'? $this->completeOrder($tracking):false:false;

        $request->request->add(['status'=>$request->tracking_state]);
        $request->request->add(['state'=>$tracking_states[$request->tracking_state]]);
        $request->request->add(['tracking_idtracking'=>$tracking->idtracking]);
        $tracking_status = globalnewTrackingStatus($request);

        $this->emailNewStatus($tracking,$tracking_status);

        return Redirect::to('/tracking-update/'.$tracking->idtracking);
    }

    public function completeOrder($tracking){
        $order = Order::findOrFail($tracking->order_idorder);
        $order->status = 4;
        $order->saveOrFail();
    }

    public function delete(Request $request){
        $request->request->add(['idtracking'=>$request->tracking_id]);
        $request->request->add(['status'=>0]);
        $tracking = globalnewTracking($request);

        return Redirect::to('/tracking-index');
    }

    public function search(Request $request){
        // dd($request->tracking_number);
        try {
            if($request->tracking_number){
                $tracking = Tracking::where(function ($query) use ($request) {
                    $query->where('tracking_number', '=', $request->tracking_number)
                        ->orWhere('hbl', '=', $request->tracking_number)
                        ->orWhere('mbl', '=', $request->tracking_number)
                        ->orWhere('awb', '=', $request->tracking_number)
                        ->orWhere('order_number', '=', $request->tracking_number);
                })->first();


            }else{
                trigger_error("Undefined Tracking Number", E_USER_ERROR);
            }


        } catch (\Throwable $th) {
            return Redirect::to('/tracking-index');
        }
        return Redirect::to('/tracking-update/'.$tracking->idtracking);
    }

    public function track(Request $request){
        try {
            if($request->tracking_number){
                $tracking = Tracking::where(function ($query) use ($request) {
                    $query->where('tracking_number', '=', $request->tracking_number)
                        ->orWhere('hbl', '=', $request->tracking_number)
                        ->orWhere('mbl', '=', $request->tracking_number)
                        ->orWhere('awb', '=', $request->tracking_number)
                        ->orWhere('order_number', '=', $request->tracking_number);
                })->first();

                $tracking_status = TrackingStatus::Where('tracking_idtracking',$tracking->idtracking)->get();
                $last_status = $tracking_status->last()->status;
            }else{
                trigger_error("Undefined Tracking Number", E_USER_ERROR);
            }

        } catch (\Throwable $th) {
            return Redirect::to('/');
        }
        return view('tracking.status')->with(['tracking'=>$tracking,'tracking_status'=>$tracking_status,'last_status'=>$last_status]);
    }

    public function getTrack(Request $request){
        $tracking_number = $request->input('tracking_number');

        try {
            if($tracking_number){
                $tracking = Tracking::where('tracking_number', '=', $tracking_number)->first();
                $tracking_status = TrackingStatus::Where('tracking_idtracking',$tracking->idtracking)->get();
                $last_status = $tracking_status->last()->status;
            }else{
                trigger_error("Undefined Tracking Number", E_USER_ERROR);
            }

        } catch (\Throwable $th) {
            return Redirect::to('/');
        }
        return view('tracking.status')->with(['tracking'=>$tracking,'tracking_status'=>$tracking_status,'last_status'=>$last_status]);
    }

    public function paginate(){
        $tracking = Tracking::Where('status',1)->orderBy('created_at', 'desc')->paginate(10);

        $tracking_reverse = array_reverse($tracking->all());
        return view('tracking.index')->with(['tracking'=>$tracking_reverse,'last_page'=>$tracking->lastPage()]);
    }

    // SendEmail New Tracking Status
    public function emailNewStatus($tracking,$tracking_status){
        try {
            $tracking->tracking_status = $tracking_status->state;
            $tracking->created_at = $tracking_status->created_at;

            $order = Order::findOrFail($tracking->order_idorder);
            $user = User::findOrFail($order->users_id);

            $apiKey = '5e260d63e70586c30a6bb2ff8d4250e7';
            $mailtrap = new MailtrapClient(new Config($apiKey));

            $html = view('mail.trackingStatus', $tracking)->render();

            $email = (new Email())
                ->from(new EmailAddress('tracking@gruposgl.com', 'Tracking GruposSGL'))
                ->to(new EmailAddress($user->email))
                ->subject('Tracking '.$tracking->tracking_number)
                ->html($html);

            $response = $mailtrap->sending()->emails()->send($email);
        } catch (\Throwable $th) {
        }
    }
}
