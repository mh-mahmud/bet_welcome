<?php if($this->session->flashdata('msg')) { ?>
    <div class="alert alert-success alert-dismissible show" role="alert">
      <strong><?php echo $this->session->flashdata('msg'); ?></strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
<?php } if($this->session->flashdata('error')){ ?>
    <div class="alert alert-warning alert-dismissible show" role="alert">
      <strong><?php echo $this->session->flashdata('error'); ?></strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
<?php } ?>
