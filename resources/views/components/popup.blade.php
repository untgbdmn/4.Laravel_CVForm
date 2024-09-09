<!DOCTYPE html>
<html>

<head>
    <style>
        #popup-container {
            position: absolute;
            top: 50px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #fff;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            display: none;
            z-index: 1000;
        }

        #popup-container.show {
            display: block;
        }
        .popup-card {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .pesan {
            padding-right: 7px;
        }
        .pesan h2 {
            font-size: 16px;
            font-weight: 600;
        }
        .pesan p {
            font-size: 14px;
            font-weight: 400;
        }
        .gambar img {
            width: 70px;
            padding: 10px
        }
    </style>
</head>

<body>
    <div id="popup-container">
        <div class="popup-card">
            <div class="pesan">
                <h2>Buat CV Anda Dengan Mudah</h2>
                <p>Buat CV yan membantu Anda menarik dan menonjol bagi perusahaan</p>
            </div>
            <div class="gambar">
                <img src="{{ asset('img/cv.png') }}" alt="Popup">
            </div>
        </div>
    </div>

    <script>
        const popupContainer = document.getElementById('popup-container');

        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                popupContainer.classList.add('show');
            }, 2000);
        });

        setTimeout(function() {
            popupContainer.classList.remove('show');
        }, 7000);
    </script>
</body>

</html>
