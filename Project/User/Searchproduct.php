<?php
session_start();
include("../Asset/Connection/connection.php");


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Search Product</title>
<link rel="stylesheet" href="../Asset/Search/bootstrap.min.css">
<style>
            .custom-alert-box{
                width: 20%;
                height: 10%;
                position: fixed;
                bottom: 0;
                right: 0;
                left: auto;
				z-index:1;
            }

            .success {
                color: #3c763d;
                background-color: #dff0d8;
                border-color: #d6e9c6;
                display: none;
            }

            .failure {
                color: #a94442;
                background-color: #f2dede;
                border-color: #ebccd1;
                display: none;
            }

            .warning {
                color: #8a6d3b;
                background-color: #fcf8e3;
                border-color: #faebcc;
                display: none;
            }
        </style>
</head>

<body>
        <div class="custom-alert-box">
            <div class="alert-box success">Successful Added to Cart !!!</div>
            <div class="alert-box failure">Failed to Add Cart !!!</div>
            <div class="alert-box warning">Already Added to Cart !!!</div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <h5>Filter Product</h5>
                    <hr>
                    <h6 class="text-info"> Select Type</h6>
                    <ul class="list-group">
                        <?php                           
						 $selCat = "SELECT * from tbl_category";
                            $result = $conn->query($selCat);
                            while ($row=$result->fetch_assoc()) {
                        ?>
                        <li class="list-group-item">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" onclick="productCheck()" class="form-check-input product_check" value="<?php echo $row["category_id"]; ?>" id="category" ><?php echo $row["category_name"]; ?>
                                </label> 
                            </div>
                        </li>
                        <?php
                            }
                        ?>
                    </ul>
                    <br />
                    
                </div>
                
                <div class="col-lg-9">
                    <h5 class="text-center" id="textChange">All Products</h5>
                    <hr>
                    <div class="text-center">
                        <img src="../Asset/Temp/Search/loader.gif" id='loder' width="200" style="display: none"/>
                    </div>
                    <div class="row" id="result">

                        <?php
                            $selProduct = "SELECT * from tbl_product e inner join tbl_subcategory t on t.subcategory_id=e.subcategory_id inner join tbl_category sc on sc.category_id=t.category_id";                             
							$result1 = $conn->query($selProduct);
                            while ($row1=$result1->fetch_assoc()) {
								$average_rating = 0;
	$total_review = 0;
	$five_star_review = 0;
	$four_star_review = 0;
	$three_star_review = 0;
	$two_star_review = 0;
	$one_star_review = 0;
	$total_user_rating = 0;
	$review_content = array();

	$query = "
	SELECT * FROM tbl_review where product_id = '".$row1["product_id"]."' ORDER BY review_id DESC
	";

	$result = $conn->query($query);

	while($row = $result->fetch_assoc())
	{
		$review_content[] = array(
			'user_name'		=>	$row["user_name"],
			'user_review'	=>	$row["user_review"],
			'rating'		=>	$row["user_rating"],
			'datetime'		=>	$row["review_datetime"]
		);

		if($row["user_rating"] == '5')
		{
			$five_star_review++;
		}

		if($row["user_rating"] == '4')
		{
			$four_star_review++;
		}

		if($row["user_rating"] == '3')
		{
			$three_star_review++;
		}

		if($row["user_rating"] == '2')
		{
			$two_star_review++;
		}

		if($row["user_rating"] == '1')
		{
			$one_star_review++;
		}

		$total_review++;

		$total_user_rating = $total_user_rating + $row["user_rating"];

	}
	if($total_review==0 || $total_user_rating==0)
	{
		$average_rating=0;
	}
else
{
	$average_rating = $total_user_rating / $total_review;
}
                        ?>

                        <div class="col-md-3 mb-2">
                            <div class="card-deck">
                                <div class="card border-secondary">
                                    <img src="../Asset/Files/Product/<?php echo $row1["product_photo"]; ?>" class="card-img-top" height="250">
                                    <div class="card-img-secondary">
                                        <h6  class="text-light bg-info text-center rounded p-1"><?php echo $row1["category_name"]; ?></h6>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title text-danger" align="center">
                                            Price : <?php echo $row1["product_price"]; ?>/-
                                        </h4>
                                        <p align="center">
                                        <?php echo $average_rating."/5"; ?><br />
                                            
                                            
                                        </p>
                                        <?php
										 $stock = "select COALESCE(sum(stock_quantity),0) as stock from tbl_stock where  product_id = '" . $row1["product_id"] . "'";
											$result2 = $conn->query($stock);
                            				$row2=$result2->fetch_assoc();
											
											$stocka = "select sum(cart_quantity) as stock from tbl_cart where product_id = '" . $row1["product_id"] . "'";
											$result2a = $conn->query($stocka);
                            				$row2a=$result2a->fetch_assoc();
											
											$stock = $row2["stock"] - $row2a["stock"];
                                            
                                                if ($stock  > 0) {
                                        ?>
                                        <a href="javascript:void(0)" onclick="addCart('<?php echo $row1["product_id"]; ?>')" class="btn btn-success btn-block">Add to Cart</a>
                                        <?php
                                        } else if ($stock  == 0) {
                                        ?>
                                        <a href="javascript:void(0)" class="btn btn-danger btn-block">Out of Stock</a>
                                        <?php
                                            }
                                         else {
                                        ?>
                                        <a href="javascript:void(0)" class="btn btn-warning btn-block">Stock Not Found</a>
                                        <?php
                                            }
                                        ?>
                             <a class="btn btn-success btn-block" href="ViewMore.php?pid=<?php echo $row1["product_id"]?>">ViewMore</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                        ?>
                    </div>

                </div>

            </div>
                        </div>
<script src="../Asset/Search/jquery.min.js"></script>
        <script src="../Asset/Search/bootstrap.min.js"></script>
<script src="../Asset/Search/popper.min.js"></script>
        <script>




            function addCart(id)
            {
                $.ajax({
                    url: "../Asset/AjaxPages/AjaxAddCart.php?id=" + id,
                    success: function(response) {
                        if (response.trim() === "Added to Cart")
                        {
                            $("div.success").fadeIn(300).delay(1500).fadeOut(400);
                        }
                        else if (response.trim() === "Already Added to Cart")
                        {
                            $("div.warning").fadeIn(300).delay(1500).fadeOut(400);
                        }
                        else
                        {
                            $("div.failure").fadeIn(300).delay(1500).fadeOut(400);
                        }
                    }
                });
            }


            function productCheck(){
                    $("#loder").show();

                    var action = 'data';
                    var category = get_filter_text('category');
             		var qn=get_filter_text('qn');


                    $.ajax({
                        url: "../Asset/AjaxPages/AjaxSearchProduct.php?action=" + action +"&category=" + category+"&qn="+qn,
                        success: function(response) {
                            $("#result").html(response);
                            $("#loder").hide();
                            $("#textChange").text("Filtered Products");
                        }
                    });


                }



                function get_filter_text(text_id)
                {
                    var filterData = [];

                    $('#' + text_id + ':checked').each(function() {
                        filterData.push($(this).val());
                    });
                    return filterData;
                }
            
        </script>
    </body>

</html>