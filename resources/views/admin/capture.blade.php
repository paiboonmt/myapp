@include('admin.header')

<div class="row">
    <div class="col-12 p-2">
    <div class="card p-2">
        <div class="row">
            <video id="webcam" autoplay playsinline></video>
        </div>
        <div class="row">
            <button id="capture" class="btn btn-info">Capture Photo</button>
            <canvas id="canvas" style="display:none;"></canvas>
            <img id="photo">
        </div>
    </div>
</div>
</div>

@include('admin.footer')

<script>
    const video = document.getElementById('webcam');
    const canvas = document.getElementById('canvas');
    const photo = document.getElementById('photo');
    const captureButton = document.getElementById('capture');

    // ขออนุญาตเข้าถึงกล้องเว็บแคม
    navigator.mediaDevices.getUserMedia({
            video: true
        })
        .then(function(stream) {
            video.srcObject = stream;
        })
        .catch(function(error) {
            console.error('Error accessing webcam: ', error);
        });

    // captureButton.addEventListener('click', function() {
    //     const context = canvas.getContext('2d');
    //     canvas.width = video.videoWidth;
    //     canvas.height = video.videoHeight;
    //     context.drawImage(video, 0, 0, canvas.width, canvas.height);
        
    // });
</script>