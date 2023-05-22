<x-mail::message>
    # Informatie

    Er is een nieuwe User geregistreerd...


    <x-mail::button :url="'http://shop.lactam.be'">
        To The Shop!
    </x-mail::button>

    <x-mail::panel>
        <br>
        naam nieuwe gebruiker :{{$user->name}}<br>
        mail nieuwe gebruiker : {{$user->email}}<br>

    </x-mail::panel>

    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>
