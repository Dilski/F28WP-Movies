<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Login</title>
  <meta name="description" content="Stuff about movies">
  <meta name="author" content="Dillon J Fearns" >
  <link rel="stylesheet" href="assets/style/stylesheet.css" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

</head>

<body>

<nav>
    <a href="<?= URL ?>">Home</a>
    <a style="float: right" class="button" id="edit" href="#">Edit </a>
    <a style="float: right" class="button" id="logout-trig" href="">Logout</a>
    <a style="float: right" href="">Welcome <?= session::get('username') ?> </a>
</nav>	
<main>
<h1 class="text-center">User Profile</h1>


<div style="display: inline-flex;margin-left: auto;margin-right: auto">
<table style="width: auto">
    <tr>
        <td>Username</td>
        <td><span id="username"><?= $userInfo['username'] ?></span></td>
    </tr>
    <tr>
        <td>Last Seen</td>
        <td><?= $userInfo['userLastSeen'] ?></td>
    </tr>
    <tr>
        <td>User Since</td>
        <td><?= $userInfo['userSince'] ?></td>
    </tr>
    <tr>
        <td>Location</td>
        <td class="info_col"><span id="location_text"><?= $userInfo['userLocation'] ?></span></td>
        <td style="display: none" class="info_col"> <input id="location_input" type="text" value="<?= $userInfo['userLocation'] ?>"></td>
    </tr>
    <tr>
        <td>About</td>
        <td class="info_col"><span id="about_text"><?= $userInfo['userAbout'] ?></span></td>
        <td style="display: none" class="info_col"> <input type="text" id="about_input" value="<?= $userInfo['userAbout'] ?>"></td>
    </tr>
    <tr>
        <td>Email</td>
        <td class="info_col"><span id="email_text"><?= $userInfo['userEmail'] ?></span></td>
        <td style="display: none" class="info_col"> <input id="email_input" type="email" value="<?= $userInfo['userEmail'] ?>"></td>
    </tr>
    <input type="button" id="save" style="display: none" class="btn btn-valid info_col" value="Save">
</table>
</div>
<div style="display: inline-flex">

</div>
</main>
<script type="text/javascript" >
    $(document).ready(function () {

        $("#edit").click(function () {
            $(".info_col").toggle()
        });

        $("#logout-trig").click(function () {
            $.post("", {logout: "true"}, window.location);
        });

        $("#save").click(function () {
            var location = $("#location_input").val();
            var about = $("#about_input").val();
            var email = $("#email_input").val();



            $(".info_col").toggle();

            $.post("", {
                'edit': true,
                'location': location,
                'about': about,
                'email': email
            }).done(function( response ) {
                var data = JSON.parse(response);
                $("#location_text").text(data["userLocation"]);
                $("#about_text").text(data["userAbout"]);
                $("#email_text").text(data["userEmail"]);
            });
        });
    });
</script>
</body>
</html>

