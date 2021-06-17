<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login Admin</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            
            <div id="firebaseui-auth-container"></div>
            <div id="loader">Loading...</div>

        </div>


                <!-- The core Firebase JS SDK is always required and must be listed first -->
        <script src="https://www.gstatic.com/firebasejs/6.1.1/firebase-app.js"></script>

        <script src="https://www.gstatic.com/firebasejs/ui/4.6.1/firebase-ui-auth.js"></script>
        <link type="text/css" rel="stylesheet" href="https://www.gstatic.com/firebasejs/ui/4.6.1/firebase-ui-auth.css" />
        <script src="https://www.gstatic.com/firebasejs/6.1.1/firebase-auth.js"></script>
        <script>
        // Your web app's Firebase configuration
        // For Firebase JS SDK v7.20.0 and later, measurementId is optional
        var firebaseConfig = {
            apiKey: "AIzaSyB9Da6TcFKpDyH4QSbw70wpyGvYYQ2c5XI",
            authDomain: "smsautentication-f0044.firebaseapp.com",
            projectId: "smsautentication-f0044",
            storageBucket: "smsautentication-f0044.appspot.com",
            messagingSenderId: "713551806783",
            appId: "1:713551806783:web:712746a212a42f0ca5138a",
            measurementId: "G-3NY0ZF0ZE1"
        };
        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);
        var ui = new firebaseui.auth.AuthUI(firebase.auth());

          var uiConfig = {
            callbacks: {
              signInSuccessWithAuthResult: function(authResult, redirectUrl) {
                // User successfully signed in.
                // Return type determines whether we continue the redirect automatically
                // or whether we leave that to developer to handle.
                var user = firebase.auth().currentUser;

                return true;
              },
              uiShown: function() {
                // The widget is rendered.
                // Hide the loader.
                document.getElementById('loader').style.display = 'none';
              }
            },
            // Will use popup for IDP Providers sign-in flow instead of the default, redirect.
            signInFlow: 'popup',
            signInSuccessUrl: '/login',
            signInOptions: [
              {
                provider: firebase.auth.PhoneAuthProvider.PROVIDER_ID,
                recaptchaParameters: {
                  type: 'image', // 'audio'
                  size: 'normal', // 'invisible' or 'compact'
                  badge: 'bottomleft' //' bottomright' or 'inline' applies to invisible.
                },
                defaultCountry: 'GT', // Set default country to the United Kingdom (+44).
              }
            ],
            // Terms of service url.
            tosUrl: '<your-tos-url>',
            // Privacy policy url.
            privacyPolicyUrl: '<your-privacy-policy-url>'
          };

          // The start method will wait until the DOM is loaded.
          ui.start('#firebaseui-auth-container', uiConfig);


        </script>
    </body>
</html>
