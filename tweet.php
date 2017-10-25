<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Auto Refresh Div Content Using jQuery and AJAX</title>
	<script src="jquery.js"></script>
	<script src="js/bootstrap.js"></script>
	<link rel="stylesheet" href="css/bootstrap.css">
	<style>
		body{
			padding: 0;
			margin: 0;
			background-color: #f1f1f1;
		}
		.box{
			width: 500px;
			border: 1px solid #ccc;
			background-color: #fff;
			border-radius: 5px;
		}
		#load_tweets{
			padding: 16px;
			background-color: #f1f1f1;
			margin-bottom: 30px;
		}
		#load_tweets p{
			padding: 12px;
			border-bottom: 1px dotted #ccc;
		}
	</style>
</head>
<body>
	<div class="container box">
		<form name="add_tweet" method="post">
			<h3 align="center">Tweet Page</h3>
			<div class="form-group">
				<textarea name="tweet" id="tweet" class="form-control" cols="30" rows="5"></textarea>
			</div>
			<div class="form-group" align="right">
				<input type="button" name="btn_tweet" id="btn_tweet" class="btn btn-info btn-md" value="Tweet" />
			</div>
		</form>
		<br>
		<br>
		<div id="load_tweets"></div>
	</div>
</body>
</html>

<script>
	$(document).ready(function(){
		$("#btn_tweet").click(function(){
			var tweet_txt = $("#tweet").val();
			if($.trim(tweet_txt) != ''){
				$.ajax({
					url: "insert.php",
					method: "POST",
					data: {tweet:tweet_txt},
					dataType: "text",
					success: function(data){
						$("#tweet").val("")
					}
				});
			}
		});
		setInterval(function(){
            $("#load_tweets").load("fetch.php").fadeIn("slow");
		}, 1000);
	});
</script>