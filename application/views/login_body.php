
<body>


    <div id="login-button">
        <img src="https://dqcgrsy5v35b9.cloudfront.net/cruiseplanner/assets/img/icons/login-w-icon.png">
        </img>
    </div>
    <div id="container">
        <h1>Log In</h1>
        <span class="close-btn">
            <img src="https://cdn4.iconfinder.com/data/icons/miu/22/circle_close_delete_-128.png"></img>
        </span>

        <form>
            <input type="email" name="email" placeholder="E-mail">
            <input type="password" name="pass" placeholder="Password">
            <a href="#">Log in</a>

        </form>
    </div>
    <script>
        $('#login-button').click(function () {
            $('#login-button').fadeOut("slow", function () {
                $("#container").fadeIn();

            });
        });

        $(".close-btn").click(function () {
            $("#container, #forgotten-container").fadeOut(800, function () {
                $("#login-button").fadeIn(800);
            });
        });
    </script>
</body>
