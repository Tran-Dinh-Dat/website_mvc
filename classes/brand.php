<?php
    include './../lib/database.php';
    include './../helpers/format.php';
    class Brand
    {
        private $db;
        private $fm; //format helpers
        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function insert_brand($brandName)
        {
            $brandName = $this->fm->validation($brandName);
            $brandName = mysqli_real_escape_string($this->db->link, $brandName);
            

            if (empty($brandName)) {
                $alert = "<span class='text-error'>Thương hiệu sản phẩm không được trống!</span>";
                return $alert;
            } else {
                $query = "INSERT INTO tbl_brands(brandName) VALUES('$brandName')";
                $result = $this->db->insert($query);
                if ($result) {
                    $alert = "<span class='text-success'>Thêm thương hiệu sản phẩm thành công!</span>";
                    return $alert;
                } else {
                    $alert = "<span class='text-error'>Thêm thương hiệu sản phẩm thất bại!</span>";
                    return $alert;
                }
             
            }
        }

        public function show_brand()
        {
            $query = "SELECT * FROM tbl_brands ORDER BY brandId DESC";
            $result = $this->db->select($query);
            return $result;
        }

        public function getbrandbyId($id)
        {
            $query = "SELECT * FROM tbl_brands WHERE brandId = '$id'";
            $result = $this->db->select($query);
            return $result;
        }

        public function update_brand($brandName, $id)
        {
            $brandName = $this->fm->validation($brandName);
            $brandName = mysqli_real_escape_string($this->db->link, $brandName);
            $id = $this->fm->validation($id);
            $id = mysqli_real_escape_string($this->db->link, $id);

            if (empty($brandName)) {
                $alert = "<span class='text-error'>thương hiệu sản phẩm không được trống!</span>";
                return $alert;
            } else {
                $query = "UPDATE tbl_brands SET brandName = '$brandName' WHERE brandId = '$id'";
                $result = $this->db->insert($query);
                if ($result) {
                    $alert = "<span class='text-success'>Cập nhật thương hiệu sản phẩm thành công!</span>";
                    return $alert;
                } else {
                    $alert = "<span class='text-error'>Cập nhật thương hiệu sản phẩm thất bại!</span>";
                    return $alert;
                }
             
            }
        }

        public function delete_brand($id)
        {
            $id = $this->fm->validation($id);
            $id = mysqli_real_escape_string($this->db->link, $id);
            $query = "DELETE FROM tbl_brands WHERE brandId = '$id'";
            $result = $this->db->insert($query);
            if ($result) {
                $alert = "<span class='text-success'>Xóa thương hiệu sản phẩm thành công!</span>";
                return $alert;
            } else {
                $alert = "<span class='text-error'>Xóa thương hiệu sản phẩm thất bại!</span>";
                return $alert;
            }
        }


    }
    
?>
