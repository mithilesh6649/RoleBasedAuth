<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Upload</title>
    <style>
        #progress-container {
            width: 100%;
            background-color: #f3f3f3;
            border: 1px solid #ccc;
            margin-top: 10px;
            display: none; /* Hidden initially */
        }
        #progress-bar {
            height: 30px;
            width: 0;
            background-color: #4caf50;
            text-align: center;
            line-height: 30px;
            color: white;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Upload Video</h1>
    <form id="upload-form" action="{{ route('upload.video') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="video" id="video" accept="video/*" required>
        <button type="submit">Upload</button>
    </form>

    <div id="progress-container">
        <div id="progress-bar">0%</div>
    </div>

    <script>
        $(document).ready(function() {
            $('#upload-form').on('submit', function(event) {
              
                event.preventDefault();

                var formData = new FormData(this);

                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    xhr: function() {
                        var xhr = new window.XMLHttpRequest();
                        xhr.upload.addEventListener('progress', function(event) {
                            console.log('sdfsdfd');
                            if (event.lengthComputable) {
                                var percentComplete = Math.round((event.loaded / event.total) * 100);
                                $('#progress-container').show();
                                $('#progress-bar').css('width', percentComplete + '%').text(percentComplete + '%');
                            }
                        });
                        return xhr;
                    },
                    success: function(response) {
                        alert('Upload complete!');
                        $('#progress-bar').css('width', '0%').text('0%');
                        $('#progress-container').hide();
                    },
                    error: function(xhr) {
                        alert('Upload failed! Status: ' + xhr.status);
                        $('#progress-bar').css('width', '0%').text('0%');
                        $('#progress-container').hide();
                    }
                });
            });
        });
    </script>
</body>
</html>
