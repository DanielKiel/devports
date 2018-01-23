Hallo {{$user->name}},

vielen Dank für die Registrierung bei devports.de.

Bitte bestätige deine Email-Addresse, um den Prozess abzuschliessen.


<a href="{{route('registration.confirm',[
    'code' => $user->confirmation_code,
    'email' => encrypt($user->email)
    ])}}">
        Email-Addresse bestätigen, um Account freizuschalten
</a>