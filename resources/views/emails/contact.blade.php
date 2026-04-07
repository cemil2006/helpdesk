<h1>Nieuw contactbericht</h1>
<p><strong>Afzender:</strong> {{ $senderName }} ({{ $senderEmail }})</p>
<p><strong>Onderwerp:</strong> {{ $mailSubject }}</p>
<hr>
<p>{!! nl2br(e($mailMessage)) !!}</p>