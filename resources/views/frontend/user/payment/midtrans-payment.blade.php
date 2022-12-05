
<html>
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
      <script type="text/javascript"
        src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ $clientToken }}"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
      <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
    </head>

    <body>
        <form action="{{ route('user.payment.callback') }}" id="submit_form" method="POST">
            @csrf
            <input type="hidden" name="json" id="json_callback">
        </form>

      <script type="text/javascript">
        window.snap.pay('{{ $snap }}', {
        onSuccess: function(result){
            /* You may add your own implementation here */
            alert('success');
            send_response_to_form(result);
        },
        onPending: function(result){
            alert('pending');
            send_response_to_form(result);
        },
        onError: function(result){
            alert('error');
            send_response_to_form(result);
        },
        onClose: function(){
            send_response_to_form(result);
        }
        })

        function send_response_to_form(result){
            document.getElementById('json_callback').value = JSON.stringify(result);
            $('#submit_form').submit();
        }
      </script>
    </body>
  </html>
