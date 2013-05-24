<div class="modal-body push-right">
    <img class="push-left" src="<?php echo 
            base_url().$image->get_path();?>" width="420px" height="295px">
    <form class="well push-right" action="<?php echo base_url();?>gigged/edit_tags" method="post">
        <label>Tags</label>
        <input type="text" name="tags" class="span3" value="<?php 
                echo $image->get_tags();?>">
        <input type="hidden" name="id" value="<?php echo $image->get_id();?>">
            <button type="submit" class="btn btn-primary">Update Tags</button>
    </form>
</div>