<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Login</title>
  <meta name="description" content="Stuff about movies">
  <meta name="author" content="Dillon J Fearns" >
  <link rel="stylesheet" href="assets/style/stylesheet.css" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

</head>

<body>

<nav>
    <a href="/~djf1/F28WP/">Home</a>
    <a style="float: right" class="button" id="add-movie" href="#">Add Movie</a>
    <a style="float: right" class="button" id="logout-trig" href="">Logout</a>
    <a style="float: right" href="">Welcome <?= $_SESSION['username'] ?> </a>


  
</nav>	
<main>
<h1 class="text-center">Movie Page</h1>



<table style="width:100%">
    <tr>
        <th>Title</th>
        <th>Genre</th>
        <th>Rating</th>
        <th>Poster</th>
        <th>Action</th>
    </tr>
    <?php $movieList = null;
    foreach ($movieList as $movie): ?>
        <tr>
            <td><a href="<?= $movie['movieURL'] ?>" ><?= $movie['movieTitle'] ?></a></td>
            <td><?= $movie['movieGenre'] ?></td>
            <td><?= $movie['movieRating'] ?></td>
            <td><a class="btn getPoster" data-title="<?= $movie['movieTitle'] ?>" href="#" > View </a></td>
            <td><a class="btn deleteMovie" data-id="<?= $movie['movieID'] ?>" href="#" > Delete </a></td>
        </tr>
    <?php endforeach ?>
</table>
    <span id="deleteID" >This</span>
<div class="middle" id="add-form" style="display: none;">
    <form action="" method="POST">
        <label for="Title">Title</label><br><input type="text" name="Title" required /><br>
        <label for="Genre">Genre</label><br><input type="text" name="Genre" required /><br>
        <label for="rating">Rating</label><br><input type="number" min="0" max="10" value="5" name="Rating" required /><br>
        <label for="english">Is it in English?</label><br><input type="checkbox" name="English" value="1"/><input type="hidden" name="English" value="0" /><br>
        <label for="url">Trailer URL</label><br><input type="url" name="URL" required/><br>
        <input type="submit" name="insertMovie">
    </form>
</div>
</main>
<script type="text/javascript" >
$(document).ready(function() {
	$( "#add-movie" ).click(function() {
		$( "#add-form" ).fadeToggle( "fast", "linear" );
	});
	$( "#logout-trig" ).click(function() {
		$.post("", { logout: "true"}, window.location);
	});
	
	$(".deleteMovie").click(function () {
        var id = $(this).data("id");
        $("#deleteID").text("Thing" + id);
        $.ajax({
            type: 'POST',
            data: {'delete':'true', 'idtoDelete': id },
            success: $(this).parent().parent().replaceWith(" <tr><td colspan='5' class='text-center'>deleted</td><tr> "),
            error: $(this).replaceWith(" <p> Error </p> ")
        })

    });

    $(".getPoster").click(function () {
        var $el = $(this);
        var name = $el.data("title");

        $.post( "", {'fetchPoster': name })
            .done(function (data) {
                var jsonRet = $.parseJSON(data);

                if (!jsonRet['Search']) {
                    $el.attr({
                        "class": "btn btn-error"
                    });
                    $el.text("Failed");
                } else {
                    var img = jsonRet['Search'][0]["Poster"];
                    $el.replaceWith(" <img src='" + img +  "'/> ");
                }



            });

        })

    });
</script>
</body>
</html>

