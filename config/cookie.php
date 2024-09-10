<style>
        .cookie-consent {
            position: fixed;
            /* position: absolute; */
            bottom: 0;
            left: 0;
            right: 0;
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
            display: none;
            z-index: 20;
            /* position: absolute; */
        }
        .cookie-consent button {
            background-color: #e95ba2;
            border: none;
            color: #fff;
            padding: 5px 10px;
            cursor: pointer;
        }
    </style>
       <div class="cookie-consent" id="cookieConsent">
        <p>We use cookies to improve your experience on our site. By using our site, you consent to cookies. <button onclick="acceptCookies()">Accept</button></p>
    </div>

    <script>
        function acceptCookies() {
            document.getElementById('cookieConsent').style.display = 'none';
            document.cookie = "cookies_accepted=true; path=/; max-age=" + (60 * 60 * 24 * 365);
        }

        window.onload = function() {
            if (document.cookie.indexOf('cookies_accepted=true') === -1) {
                document.getElementById('cookieConsent').style.display = 'block';
            }
        }
    </script>