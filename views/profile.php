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

<?php if (session::isKeySet('id')): ?>
<nav>
    <a href="<?= URL ?>">Home</a>
    <a style="float: right" class="button" id="logout-trig" href="">Logout</a>
    <a style="float: right" href="">Welcome <?= session::get('username') ?> </a>
</nav>
<?php else: ?>
<nav>
    <a href="<?= URL ?>">Home</a>
    <a style="float: right" class="button" id="logout-trig" href="<?= URL . '?p=login' ?>">Login</a>
</nav>
<?php endif; ?>
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
    </tr>
    <tr>
        <td>About</td>
        <td class="info_col"><span id="about_text"><?= $userInfo['userAbout'] ?></span></td>
    </tr>
    <tr>
        <td>Email</td>
        <td class="info_col"><span id="email_text"><?= $userInfo['userEmail'] ?></span></td>
    </tr>
    <input type="button" id="save" style="display: none" class="btn btn-valid info_col" value="Save">
</table>
</div>
<div style="display: inline-flex">

</div>
</main>
<script type="text/javascript" >
    $(document).ready(function () {

        $("#logout-trig").click(function () {
            $.post("", {logout: "true"}).done(function () {
                location.reload(true);
            });
        });

    });
</script>
</body>
</html>

