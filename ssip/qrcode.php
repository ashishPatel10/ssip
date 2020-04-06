<!-- <!DOCTYPE html>
<html>
  <head>
    <title>Instascan</title>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <style type="text/css">

.qrcode-text-btn {
  display: inline-block;
  height: 10em;
  width: 10em;
  background: url(qr.png) 50% 50% no-repeat;
  cursor: pointer;
}

.qrcode-text-btn > input[type=file] {
  position: absolute;
  overflow: hidden;
  width: 1px;
  height: 1px;
  opacity: 0;
}
    </style>
    <script type="text/javascript">
      function openQRCamera(node) {
  var reader = new FileReader();
  reader.onload = function() {
    node.value = "";
    qrcode.callback = function(res) {
      if(res instanceof Error) {
        alert("No QR code found. Please make sure the QR code is within the camera's frame and try again.");
      } else {
        node.parentNode.previousElementSibling.value = res;
      }
    };
    qrcode.decode(reader.result);
  };
  reader.readAsDataURL(node.files[0]);
}

function showQRIntro() {
  return confirm("Use your camera to take a picture of a QR code.");
}
    </script>
  </head>
  <body>
    <video id="preview"></video>
  <label class=qrcode-text-btn>
   <input type=file
         accept="image/*"
         capture=environment
         tabindex=-1 width="80px" onchange="openQRCamera(this);"  onclick="return showQRIntro();">
</label>
  </body>
</html> -->
<!DOCTYPE html>
<html>
  <head>
    <title>QR Code Reader using Instascan</title>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script type="text/javascript">"https://webrtc.github.io/adapter/adapter-latest.js"</script>
    <script src='https://stephenlb.github.io/webrtc-sdk/js/webrtc.js'></script>
  </head>
  <body>
    <video id="preview"></video>
    <script type="text/javascript">
      let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
      scanner.addListener('scan', function (content) {
        console.log(content);
      });
      Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
          scanner.start(cameras[0]);
        } else {
          console.error('No cameras found.');
        }
      }).catch(function (e) {
        console.error(e);
      });
    </script>
  </body>
</html>