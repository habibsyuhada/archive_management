<?php $this->load->view('_partial/header');?>
<?php $this->load->view('_partial/top');?> 
<?php $this->load->view($sidebar);?> 
<div class="page-wrapper">
  <!-- ============================================================== -->
  <!-- Bread crumb and right sidebar toggle -->
  <!-- ============================================================== -->
  <div class="page-breadcrumb">
    <div class="row">
      <div class="col-12 d-flex no-block align-items-center">
        <h4 class="page-title"><?php echo $meta_title ?></h4>
        <div class="ml-auto text-right">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            	<?php foreach ($navigation as $key => $value): ?>
            		<li class="breadcrumb-item <?php echo ($key == count($navigation)-1 ? 'active' : '') ?>">
            			<?php if($key == count($navigation)-1): ?>
            			<?php echo $value['text']; ?>
            			<?php else: ?>
            			<a href="<?php echo $value['link']; ?>"><?php echo $value['text']; ?></a>
            			<?php endif; ?>
            		</li>
            	<?php endforeach; ?>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
<?php $this->load->view($subview);?>
<?php $this->load->view('_partial/footer');?>