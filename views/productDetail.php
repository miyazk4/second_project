<!DOCTYPE html>
<html lang="pt">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Sabrina Carpenter - <?php echo $detail["s_name"]; ?></title>
		<link rel="icon" type="image/png" href="../images/favicon.ico">
		<link rel="stylesheet" href="../css/productDetail.css">
	</head>
	<body>
		<main>
			<div id="mainContainer">
				<div class="productDetailContainer">
					<div class="leftSide">
						<div class="imageContainer">
							<img src="../images/productImages/<?php echo $detail["image"]; ?>" alt="<?php echo $detail["s_name"]; ?>">
						</div>
					</div>
					<div class="rightSide">
						<h2 class="productName"><?php echo $detail["s_name"];?></h2>
						<div class="priceContainer">
							<span class="productPrice">$<?php echo $detail["price"]; ?></span>
						</div>
<?php
	if(empty($detail["stock"]) || $detail["stock"] === "0" ) {
		echo '<p class="unavailableStock">Stock is currently unavailable.</p>';
	}
?>
<?php 
	if(!empty($detail["stock"])) {
		echo '
			<form action="'.ROOT. 'cart' .'" method="post">
				<div class="preorderContainer">
					';
	if(!empty($detail["preorder_info"])) {
		echo ' 
					<label>
						<input type="checkbox" name="preorder" class="checkbox" required>
						Pre-order*
					</label>
					'.$detail["preorder_info"].'
				</div>';
	}

	if(empty($sizes)) {
		echo '			
			<div class="buttonContainer">
				<button type="submit" name="send" class="cartButton">Add to cart</button>
			</div>';
		}
?>
						

<?php		
	}

	if(!empty($detail["stock"]) && !empty($sizes)){
	
?>
			<div class="sizeContainer">
				<span class="sizeInfo">Size</span>
			</div>
			<select name="stock_id">
<?php
		foreach($sizes as $size) {
			echo '
				<option value="'.$size["stock_id"].'">'.$size["size"].'</option>

			';
		}
?>
			</select>
			<div class="buttonContainer">
				<button type="submit" name="send" class="cartButton">Add to cart</button>
			</div>
<?php 
	}
	else{
		echo '
			<input type="hidden" name="stock_id" value="'.$detail["stock_id_default"].'">
		';
	}
?>
					
							
							<input type="hidden" name="product_id" value="<?php echo $detail["product_id"]; ?>">
						</form>
						<div class="descriptionContainer">
							<?php echo $detail["description"]?>
						</div>
					</div>
				</div>
			</div>
		</main>
	</body>
</html>