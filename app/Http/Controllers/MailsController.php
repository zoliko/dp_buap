<?php
  namespace App\Http\Controllers;

    use App\User;
    use App\Http\Controllers\Controller;
    use PhpOffice\PhpSpreadsheet\Reader\Xls;
    use Illuminate\Http\Request; //indispensable para usar Request de los JSON
    use Illuminate\Support\Facades\Storage;
    use App\Mail\EnvioMail;
    use Illuminate\Support\Facades\Mail;
    use Illuminate\Support\Facades\DB;//consulta a la base de datos

    class MailsController extends Controller
    {   

        public static function NotificarSolicitudRevision($destino,$dependencia,$encargado,$contacto,$mail){
                $titulo = "CREO QUE ESTO NO SALE";
                // $dependencia = 'Dependencia';
                $data = array(
                    'titulo'=>$titulo,
                    'dependencia'=>$dependencia,
                    'encargado'=>$encargado,
                    'contacto'=>$contacto,
                    'mail'=>$mail);
                // Path or name to the blade template to be rendered
                $asunto = 'Confirmación de solicitud';
                $template_path = 'mails.solicitud_revision';
                $nombre_usuario = $encargado;
                $destinatario = $destino;
                $exito = false;
                $exito = Mail::send($template_path,$data, function($message) use ($nombre_usuario,$destinatario,$asunto){
                    // Set the sender
                    $message->from('drh.descripciones.puesto@gmail.com','Descripciones de Puestos RH');
                    // Set the receiver and subject of the mail.
                    $message->to($destinatario)->subject('[Descripciones de Puestos] '.$asunto);
                });
                return true;
        }

        public static function PruebaMail(){
                $nombre_usuario = 'Responsable';
                $asunto = "MAIL DE PRUEBA";
                $titulo = "TITULO MAIL";
                $mensaje = "Mensaje del mail, contenido";
                // $destino = ['marvineliosa@hotmail.com','marvineliosa@gmail.com'];
                $destino = ['marvineliosa@hotmail.com','marvineliosa@gmail.com'];
                $data = array('titulo'=>$titulo,'mensaje'=>$mensaje);
                // Path or name to the blade template to be rendered
                $template_path = 'mails.mail_general';
                $destinatario = $destino;
                $exito = false;
                $exito = Mail::send($template_path,$data, function($message) use ($nombre_usuario,$destinatario,$asunto){
                    // Set the sender
                    $message->from('pruebasdemarvin@gmail.com','Descripciones de Puestos RH');
                    // Set the receiver and subject of the mail.
                    $message->to($destinatario)->subject('[Descripciones de Puestos] '.$asunto);
                });
                dd('listo');
        }


    }