@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($mails as $mail)
    <p>Nome: {{ $mail->nome }}</p>
    <p>Telefone: {{ $mail->telefone }}</p>
    <p>Email: {{ $mail->email }}</p>
    <p>Mensagem: {{ $mail->mensagem }}</p>
    <p>Data de Envio: <?php echo date('d/m/Y H:i:s', strtotime($mail->created_at.' -3 Hours')) ?></p>
    
    <hr />
    @endforeach
</div>
@endsection
