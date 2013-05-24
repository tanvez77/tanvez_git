<div class="modal-body push-right">
    <table class="table table-striped table-hover">
        <tr>
        <th>Image</th>
        <th>Tags</th>
        <th>Add/Edit Tags</th>
        </tr>
        <?php foreach($images as $image):?>
        <tr>
            <td><img src="<?php echo base_url()
            .$image->get_path();?>" width="80px" height="60px"></td>
        <td><?php echo $image->get_tags();?></td>
        <td><a href="<?php 
        echo base_url();?>gigged/tags/<?php echo $image->get_id();?>">Add/Edit</a></td>
        <td><a href="<?php 
        echo base_url();?>gigged/delete_image/<?php echo $image->get_id();?>">Delete</a></td>
        </tr>
        <?php endforeach;?>
    </table>
</div>