<div id="post-<?php the_ID(); ?>" class="item">
    <div name="meta">
        <p class="text-muted">
            <i class="fa fa-calendar"></i> <?php echo the_date(); ?>

            <span class="pull-right">
                 <?php edit_post_link('<i class="fa fa-edit"></i> ' . __('Edit', 'gitsta')); ?> 
            </span>
        </p>
    </div>
    <div class="post-content">
        <?php the_content(); ?>
    </div>
</div>