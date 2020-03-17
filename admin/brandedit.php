<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include './../classes/brand.php';?>

<?php 
    $brand = new Brand();
    if (!isset($_GET['brandid']) || $_GET['brandid'] == NULL) {
        echo '<script>window.location.href = "brandlist.php"</script>';
    } else {
        $id = $_GET['brandid'];  
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$brandName = $_POST['brandName'];

        $updateBrand = $brand->update_brand($brandName, $id);
	}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa danh mục</h2>
               <div class="block copyblock"> 
                <?php
                    if (isset($updateBrand)) {
                        echo $updateBrand;
                    }
                ?>
                 <form action="" method="post">
                    <table class="form" >	
                        <?php
                            $get_brand_name = $brand->getbrandbyId($id);
                            if ($get_brand_name) {
                                    $i = 1;
                                    while ($result = $get_brand_name->fetch_assoc()) {
                                    $i++;
                        ?>				
                        <tr>
                            <td>
                                <input type="text" name="brandName" value='<?=$result['brandName']?>' class="medium" />
                            </td>
                        </tr>
                        <?php
                            }
                        }
                        ?>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Cập nhật" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>