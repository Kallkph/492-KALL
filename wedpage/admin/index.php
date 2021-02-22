<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	<title>jQuery UI Signature Basics</title>
	<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/themes/south-street/jquery-ui.css" rel="stylesheet">
	<link href="jquery.signature.css" rel="stylesheet">
	<style>
		.kbw-signature {
			width: 400px;
			height: 200px;
		}
	</style>
	<!--[if IE]>
<script src="excanvas.js"></script>
<![endif]-->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/jquery.ui.touch-punch.min.js"></script>
	<link type="text/css" href="css/jquery.signature.css" rel="stylesheet">
	<script type="text/javascript" src="js/jquery.signature.js"></script>
	<script>
		$(function() {
			$('#sig').signature();
			$('#clear').click(function() {
				Clear();
			});
			$('#json').click(function() {
				$.ajax({
					url: 'insert_draw.php',
					type: 'POST',
					data: 'txtName=' + $('#txtName').val() +
						'&Draw=' + $('#sig').signature('toJSON'),
					datatype: 'json',
					success: function(result) {
						var obj = jQuery.parseJSON(result);
						if (obj['Status'] == 'Success') {
							alert(obj['Msg']);
							Clear();
						}
					}
				});
				//alert($('#sig').signature('toJSON'));
			});

			function Clear() {
				$('#txtName').val('');
				$('#sig').signature('clear');
			}
		});
	</script>
</head>

<body>
	<table>
		<tr>
			<td>Name :</td>
			<td><input type="text" id="txtName" placeholder="input you name"><br /></td>
		</tr>
		<tr>
			<td>Signature</td>
			<td>
				<div id="sig"></div>
			</td>
		</tr>
		<tr>
			<td colspan="2"><button id="clear">Clear</button> <button id="json">Insert</button></td>
		</tr>
	</table>


</body>

</html>