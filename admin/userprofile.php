<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thông tin Admin</h2>
        <div class="block">               
         <form>
            <table class="form">					
                <tr>
                    <td>
                        <label>Tên Admin: </label>
                    </td>
                    <td>
                        <input type="text" disabled="disabled" value="<?php
                        echo Session::get('name') ?>" name="title" class="medium" />
                
                    </td>
                </tr>
				 <tr>
                    <td>
                        <label>Email: </label>
                    </td>
                    <td>
                        <input type="text" disabled="disabled" value="<?php 
                         echo Session::get('admin_email')?>"  name="title" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>ID Admin: </label>
                    </td>
                    <td>
                        <input type="text" disabled="disabled" value="<?php
                        echo Session::get('id') ?>" name="title" class="medium" />
                
                    </td>
                </tr>
			
				
				 <tr>
                    <td>
                    </td>
                    <td>
                        
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>