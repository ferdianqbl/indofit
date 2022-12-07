<div>
    <p>Halo, {{ $item->order_item->order->user->name }},</p>
    <p>Kami mendapat pesan dari pelatih {{ $item->order_item->coach_domain->coach->name }} bahwa dia membatalkan jadwalnya dikarenakan {{ $item->cancel_reason->reason }}</p>
    <p>Jika anda tidak dihubungi olehnya, harap menghubungi pelatih tersebut ({{ $item->order_item->coach_domain->coach->phone_number }}) / bisa menghubungi kami di 082219075070 melalui whatsapp</p>
</div>
