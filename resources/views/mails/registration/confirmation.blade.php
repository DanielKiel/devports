Hallo {{$user->name}}, <br/> <br/>

vielen Dank für die Registrierung bei devports.de. <br/>

Bitte bestätige deine Email-Addresse, um den Prozess abzuschliessen. <br/><br/>


<a href="{{route('registration.confirm',[
    'code' => $user->confirmation_code,
    'email' => encrypt($user->email)
    ])}}">
        Email-Addresse bestätigen, um Account freizuschalten
</a>