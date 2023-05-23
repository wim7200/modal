<x-mail::message>
# Informatie

Er is een nieuwe User geregistreerd...
<x-mail::panel>
     naam nieuwe gebruiker : {{$user->name}}<br>
     mail nieuwe gebruiker : {{$user->email}}
</x-mail::panel>


<x-mail::button :url="'http://shop.lactam.be'">
     To The Shop!
</x-mail::button>



Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
