<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>HTML5 Websocket</title>
    </head>
    <body>
        <script type="application/javascript">
            var connection = new WebSocket('ws://html5rocks.websocket.org/echo', ['soap', 'xmpp']);
            
            // When the connection is open, send some data to the server
            connection.onopen = function () {
                connection.send('Ping'); // Send the message 'Ping' to the server
            };

            // Log errors
            connection.onerror = function (error) {
                console.log('WebSocket Error ' + error);
            };

            // Log messages from the server
            connection.onmessage = function (e) {
                console.log('Server: ' + e.data);
            };
            
            // Sending String
            connection.send('your message');

            // Sending canvas ImageData as ArrayBuffer
            var img = canvas_context.getImageData(0, 0, 400, 320);
            var binary = new Uint8Array(img.data.length);
            for (var i = 0; i < img.data.length; i++) {
                binary[i] = img.data[i];
            }
            connection.send(binary.buffer);

            // Sending file as Blob
            var file = document.querySelector('input[type="file"]').files[0];
            connection.send(file);
            
            // Setting binaryType to accept received binary as either 'blob' or 'arraybuffer'
            connection.binaryType = 'arraybuffer';
            connection.onmessage = function(e) {
                console.log(e.data.byteLength); // ArrayBuffer object if binary
            };
            console.log(connection.extensions);
        </script>
    </body>
</html>
