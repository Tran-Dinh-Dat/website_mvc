<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include './../classes/category.php';?>

<?php 
    $category = new Category();
    if (!isset($_GET['cateid']) || $_GET['cateid'] == NULL) {
        echo '<script>window.location.href = "catlist.php"</script>';
    } else {
        $id = $_GET['cateid'];  
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$cateName = $_POST['cateName'];

        $updateCate = $category->update_category($cateName, $id);
	}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa danh mục</h2>
               <div class="block copyblock"> 
                <?php
                    if (isset($updateCate)) {
                        echo $updateCate;
                    }
                ?>
                 <form action="" method="post">
                    <table class="form" >	
                        <?php
                            $get_cate_name = $category->getcatebyId($id);
                            if ($get_cate_name) {
                                    $i = 1;
                                    while ($result = $get_cate_name->fetch_assoc()) {
                                    $i++;
                        ?>				
                        <tr>
                            <td>
                                <input type="text" name="cateName" value='<?=$result['cateName']?>' class="medium" />
                            </td>
                        </tr>
                        <?php
                            }
                        }
                        ?>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Cập nhật" />
                               <button> <a href="catlist.php">Xong</a></button>
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>