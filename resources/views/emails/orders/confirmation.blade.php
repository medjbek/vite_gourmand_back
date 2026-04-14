@component('mail::message')
# Confirmation de votre commande

Bonjour {{ $order->client_prenom }} {{ $order->client_nom }},

Votre commande pour le menu **{{ $order->menu->title }}** a été enregistrée avec succès.

- Nombre de personnes : {{ $order->nb_personnes }}
- Adresse : {{ $order->adress }}, {{ $order->ville }}
- Date : {{ $order->event_at->format('d/m/Y') }}

Prix total : {{ number_format($order->prix_total, 2, ',', ' ') }} €

Merci de votre confiance.

@endcomponent
