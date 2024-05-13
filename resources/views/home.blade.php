<!DOCTYPE html>
<html dir="rtl">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>الصفحة الرئيسية</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href='https://fonts.googleapis.com/css?family=Cairo' rel='stylesheet'>
    <link rel="stylesheet" href="user/css/style.css">
    <link rel="stylesheet" href="user/css/font-awesome.min.css">

</head>

<body>
    <div class="main">
        <div class="container">
            <h1 class="title-h1"><span>علبتين بثمن علبة واحدة</span></h1>
            <div class="price">
                <p>
                    <span>2900</span>
                    <span style="font-size: medium;">&nbsp;د.ج</span>
                </p>
            </div>
            @if(Session::has('success'))
            <div class="alert">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                <span class="text">{!! Session::get('success') !!}</span>
            </div>
            @endif
            <form action="{{ route('store') }}" method="post" name="formName">
                @csrf
                <div class="main-user-info">
                    <div class="user-input-box">
                        <input type="text" id="name" name="name" required autofocus="autofocus" placeholder="الرجاء إدخال اللإسم كاملا" value="" />
                    </div>
                    <div class="user-input-box">
                        <input type="number" id="phoneNumber" name="phoneNumber" required autofocus="autofocus" placeholder="الرجاء إدخال رقم الهاتف" value="" />
                    </div>
                    <div class="user-input-box">
                        <input type="text" id="wilaya" name="wilaya" required autofocus="autofocus" placeholder="الرجاء إدخال الولاية" value="" />
                    </div>
                    <div class="user-input-box">
                        <input type="text" id="commune" name="commune" required autofocus="autofocus" placeholder="الرجاء إدخال البلدية" value="" />
                    </div>
                </div>
                <div class="free-delivery" style="text-align: center;"> زائد مصاريف التوصيل </div>
                <div class="form-submit-btn">
                    <input type="submit" value="إشتري الآن">
                </div>
                <div class="free-delivery" style="text-align: center;"> للطلب إملأ هذه اللإستمارة </div><br>
            </form>
        </div>
        <div>
            <img class="img-fluid" src="user/images/img1.png">
            <img class="img-fluid" src="user/images/img2.png">
            <img class="img-fluid" src="user/images/img3.png">
            <img class="img-fluid" src="user/images/img4.png">
            <img class="img-fluid" src="user/images/img5.png">
            <img class="img-fluid" src="user/images/img6.png">
            <img class="img-fluid img-7" src="user/images/img7.png">
        </div>
        <div class="delivery">
            🚚🚚🚚
        </div><br>
        <div style="display: flex; justify-content: center; padding-top: 3px;">
            <P style="border-top: solid 5px black; width: 30%; ;"></P>
        </div>
        <div class="request-btn">
            <button class="button-rqt" id="orderButton1">
                <p style="color:rgba(255, 255, 255); font-size: 120%;">أطلب الآن و لن تندم أبدا</p>
                <p class="fa fa-shopping-cart" style="display: flex; color: white; font-size: 150%; margin-right: 20px;"></p>
            </button>
        </div>
        <div style="display: flex; justify-content: center; padding-top: 3px;">
            <P style="margin-top: 30px; font-size: xx-large;display: flex; justify-content: center ;">⚠️ ملاحظة ⚠️</P>
        </div>
        <div class="div-green">
            <p style="font-size: x-large; font-weight: bold;">الحصول على نتيجة في فترة قصيرة</p>
        </div>
        <div style="display: flex; justify-content: center; padding-top: 3px;">
            <P style="border-top: solid 5px black; width: 20%;"></P>
        </div>
        <div style="display: flex; justify-content: center; padding-top: 3px;">
            <P style="border-top: solid 5px black; width: 20%;"></P>
        </div>
        <div style=" font-size:20px">
            <div id="countdown">
                <div class="circle">
                    <p id="seconds"></p>
                    <p style="font-size: small;">ثانية</p>
                </div>
                <div class="circle">
                    <p id="minutes"></p>
                    <p style="font-size: small;">دقيقة</p>
                </div>
                <div class="circle">
                    <p id="hours"></p>
                    <p style="font-size: small;">ساعة</p>
                </div>
            </div>
        </div>
        <div class="request-btn-2">
            <button class="button-rqt" id="orderButton2">
                <p style="color:rgba(255, 255, 255); font-size: 150%;">أطلب الآن و لن تندم</p>
                <p class="fa fa-shopping-cart" style="display: flex; color: white; font-size: 150%;  margin-right: 20px;"></p>
            </button>
        </div><br>
    </div>

    <script src="user/js/sweetalert2.all.min.js"></script>

    <script>
        function startCountdown(hours) {
            // Calculate the total seconds
            var totalSeconds = hours * 3600;

            // Get the current time
            var startTime = new Date().getTime();

            // Update the countdown every second
            var countdown = setInterval(function() {
                // Get the current time
                var currentTime = new Date().getTime();

                // Calculate the elapsed time in seconds
                var elapsedTime = Math.floor((currentTime - startTime) / 1000);

                // Calculate the remaining time in seconds
                var remainingSeconds = totalSeconds - elapsedTime;

                // Check if the countdown is finished
                if (remainingSeconds <= 0) {
                    clearInterval(countdown);
                    document.getElementById("hours").textContent = "00";
                    document.getElementById("minutes").textContent = "00";
                    document.getElementById("seconds").textContent = "00";
                    document.getElementById("countdown").textContent = "Countdown finished!";
                    return;
                }

                // Calculate the hours, minutes, and seconds
                var hours = Math.floor(remainingSeconds / 3600);
                var minutes = Math.floor((remainingSeconds % 3600) / 60);
                var seconds = remainingSeconds % 60;

                // Format the countdown display
                var hoursDisplay = hours.toString().padStart(2, "0");
                var minutesDisplay = minutes.toString().padStart(2, "0");
                var secondsDisplay = seconds.toString().padStart(2, "0");

                // Display the countdown in separate circles
                document.getElementById("hours").textContent = hoursDisplay;
                document.getElementById("minutes").textContent = minutesDisplay;
                document.getElementById("seconds").textContent = secondsDisplay;
            }, 1000); // Update every second (1000 milliseconds)
        }

        // Start the countdown with 1 hour for testing
        startCountdown(1);
    </script>
</body>

</html>