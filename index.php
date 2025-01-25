<?php 
require_once 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Image Gallery App</title>
	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body{
            font-family: cursive;
        }
        .gallery>div.col-md-3{
            padding-left: 0;
        }
        .gallery div.col-md-3:nth-child(5){
            padding-right: 0;
        }
        .gallery h3{
            padding: 5px;
            font-family: 'circular';
            border: 2px solid #eee5e5;
        }
        h5.card-title.text-center {
            padding: 5px;
            background: #eeeeee;
        }
        button.btn.btn-danger {
            padding: 2px 10px;
        }
    </style>
</head>
<body>
	<div class="wrapper">
		<div class="container">
			<div class="form-area mb-4">
				<div class="row justify-content-center">
					<div class="col col-md-4 mt-2">
						<!-- Photo Upload Form -->
						<form action="upload.php" method="POST" enctype="multipart/form-data">
							<input type="text" name="title" class="form-control mb-2" placeholder="Enter image title" required>
							<input type="file" name="image" accept="image/*" class="form-control mb-2" required>
							<button type="submit" class="btn w-100 btn-success">Submit</button>
						</form>
					</div>
				</div>
			</div>
			<div class="gallery row">
				<h3 class="text-center mb-3">Photo Gallery</h3>
				<!-- Start of iterate all data from DB -->
				<?php $query = $conn->query("SELECT * FROM photos ORDER BY created_at DESC");
                  if($query->num_rows>0):
                  while($row = mysqli_fetch_assoc($query)):
                ?>
				<div class="col-md-3">
					<div class="card">
						<h5 class="card-title text-center"><?= $row['title']?></h5>
						<img src="<?= $row['image_path']?>" class="card-img-top" alt="<?= $row['title']?>" height="250">
						<div class="card-body text-center">
							<form action="delete.php" method="POST">
								<input type="hidden" name="photo_id" value="<?= $row['id']?>">
								<button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
							</form>
						</div>
					</div>
				</div>
				<?php 
            endwhile;
            else:
                echo '<p class="text-center">No photos uploaded Yet.</p>';
            endif;
            ?>
			<!-- End of iterate all data from DB -->
			</div>
		</div>
	</div>
	<!-- Bootstrap Js-->
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>