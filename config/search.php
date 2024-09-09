<form method="get" action="">
    <div class="input-group mb-3">
        <input type="text" name="search" class="form-control" placeholder="ค้นหาสินค้า" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
        <button class="btn-search" type="submit">ค้นหา</button>
    </div>
</form>
 