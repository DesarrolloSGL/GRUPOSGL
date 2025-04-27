<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use \Carbon\Carbon;
use Mailtrap\Config;
use Mailtrap\Helper\ResponseHelper;
use Mailtrap\MailtrapClient;
use Illuminate\Mail\Mailable;
use Symfony\Component\Mime\Address as EmailAddress;
use Symfony\Component\Mime\Email;
use Mailtrap\EmailHeader\CategoryHeader;
use Mailtrap\EmailHeader\CustomVariableHeader;
use App\Models\Event;

class AppointmentController extends Controller
{

    public function appointment()
    {
        return view('home.requestAppointment');
    }

    public function newAppointment(Request $request){
        $apiKey = '5e260d63e70586c30a6bb2ff8d4250e7';
        $mailtrap = new MailtrapClient(new Config($apiKey));

        $date = Carbon::now()->toDateTimeString();
        $number = random_int(100000,999999);
        $appointment_number = $number.'-'.$date;

        $data = $request;

        $html = view('mail.requestAppointment', $data)->render();

        $mail = $this->mailList($request->department);

        $email = (new Email())
            ->from(new EmailAddress('citas@gruposgl.com', 'CitasGruposSGL'))
            ->to(new EmailAddress($mail))
            ->cc($request->email)
            // ->bcc('alex.galindo@gruposgl.com')
            ->subject("Solicitud de Cita".'-'.$appointment_number)
            ->html($html)
        ;

        $response = $mailtrap->sending()->emails()->send($email);
        return \Response::json('200');
    }

    public function mailList($department){
        $package_table = array(
            "Contabilidad" => "mairon.munoz@gruposgl.com",
            "Operaciones" => "heidy.serrano@gruposgl.com",
            "Comercial" => "maria.guzman@gruposgl.com",
            "Administrativo" => "alex.galindo@gruposgl.com",
            "Marketing" => "paula.bautista@gruposgl.com",
            "Legal" => "legal@gruposgl.com",
            "IT" => "desarrollo-sistemas@gruposgl.com",
        );

        return $package_table[$department];
    }

    public function event()
    {
        do {
            $random = random_int(1000,9999);
        } while (Event::where('number','=',$random)->exists());

        return view('home.registerNewEvent')->with(['event_number'=>$random]);
    }

    public function newEvent(Request $request)
    {
        $event = new Event($request->all() + ['index' => 'value']);
        $event->number = $request->event_number;
        $event->description = "Desayuno Conferencia: Promoción de Servicios Consolidados Marítimos de Importación Grupo SGL 15 de enero";
        $event->status = 1;
        $event->save();
        return \Response::json('200');
    }
}