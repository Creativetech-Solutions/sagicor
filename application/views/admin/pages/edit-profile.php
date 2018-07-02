<?php
$row = $page_data;
//echo "<pre> "; print_r( $this->session  ); echo "</pre>";  
$flash = $this->session->flashdata('flashresponse'); ?>
<?php if(isset($flash) && $flash != '' ): ?> 
	<div id="msgholder"><?php echo $flash;?></div>
<?php endif; ?>


<p class="bluetip"><i class="icon-lightbulb icon-3x pull-left"></i> Here you can update your user info<br>
  Fields marked <i class="icon-append icon-asterisk"></i> are required.</p>
  
<form class="xform" id="admin_form" method="post"  action="<?php echo base_url();?>admin/profile/update" enctype="multipart/form-data">
<?php //echo form_open_multipart('admin/profile/update');?>

  <header>User Manager
  	<span>Editing Current User <i class="icon-double-angle-right"></i> <?php echo $row->username;?></span>
  </header>
  
  <div class="row">
    <section class="col col-6">
      <label class="input state-disabled"> <i class="icon-prepend icon-user"></i> <i class="icon-append icon-asterisk"></i>
        <input type="text" disabled="disabled" name="username" readonly="readonly" value="<?php echo $row->username;?>" placeholder="Username">
      </label>
      <div class="note note-error">Username</div>
    </section>
    <section class="col col-6">
      <label class="input"> <i class="icon-prepend icon-lock"></i> <i class="icon-append icon-asterisk"></i>
        <input type="text" name="password" placeholder="password">
      </label>
      <div class="note note-info">Leave it empty unless changing the password</div>
    </section>
  </div>
  
  <div class="row">
    <section class="col col-4">
      <label class="input"> <i class="icon-prepend icon-envelope-alt"></i> <i class="icon-append icon-asterisk"></i>
        <input type="text" name="email" value="<?php echo $row->email;?>" placeholder="Email">
      </label>
      <div class="note note-error">Email</div>
    </section>
    <section class="col col-4">
      <label class="input"> <i class="icon-prepend icon-user"></i>
        <input type="text" name="fname" value="<?php echo $row->fname;?>" placeholder="First Name">
      </label>
      <div class="note note-error">First Name</div>
    </section>
    <section class="col col-4">
      <label class="input"> <i class="icon-prepend icon-user"></i>
        <input type="text" name="lname" value="<?php echo $row->lname;?>" placeholder="Last Name">
      </label>
      <div class="note note-error">Last Name</div>
    </section>
  </div>
  <div class="row">
    <section class="col col-4">
      <select name="userlevel">
        <?php echo getUserLevels($row->userlevel);?>
      </select>
      <div class="note">Userlevel <i class="icon-exclamation-sign  tooltip" data-title="Userlevels 2-7 are custom groups, they have the same rights as registered users,but can access diferent pages based on their userlevel."></i></div>
    </section>
    <section class="col col-5">
      <div class="inline-group">
        <label class="radio">
          <input type="radio" name="active" value="y" <?php echo ($row->active == "y")?"checked":''; ?>>
          <i></i>Active</label>
        <label class="radio">
          <input type="radio" name="active" value="n" <?php echo ($row->active == "n")?"checked":''; ?>>
          <i></i>Inactive</label>
        <label class="radio">
          <input type="radio" name="active" value="b" <?php echo ($row->active == "b")?"checked":''; ?>>
          <i></i>Banned</label>
        <label class="radio">
          <input type="radio" name="active" value="t" <?php echo ($row->active == "t")?"checked":''; ?>>
          <i></i>Pending</label>
      </div>
      </section>
      <section class="col col-3">
      <div class="inline-group">
      <label class="checkbox">
          <input type="checkbox" name="club" <?php echo ($row->club == 1) ? 'checked' : ''; ?>>
          <i></i>President's Club</label>
      <label class="checkbox">
          <input type="checkbox" name="regclose" <?php echo ($row->regclose == 1) ? 'checked' : ''; ?>>
          <i></i>Close Registration</label>
          </div>
          </section>
    
    <div >
    <section class="col col-3" >
      <div class="inline-group">
        <label class="radio">
          <input type="radio" name="newsletter" value="1" <?php echo ($row->newsletter == 1)?"checked":''; ?>>
          <i></i>Yes</label>
        <label class="radio">
          <input type="radio" name="newsletter" value="0" <?php echo ($row->newsletter == 0)?"checked":''; ?>>
          <i></i>No</label>
      </div>
      <div class="note">Newsletter Subscriber</div>
    </section>
    </div>
    
  </div>
  <div class="row" hiddenX>
    <section class="col col-4">
      <label class="input">
        <!--<input name="avatar" type="file" class="fileinput"/>-->
        <?php echo form_upload('avatar'); ?><br />
      </label>
      <div class="note">User Avatar</div>
    </section>
    <section class="col col-4">
    <?php 		
				$img_link =  (getimagesize(base_url().'uploads/profiles/'.$row->id.'/'.$row->avatar)!== false)? base_url().'uploads/profiles/'.$row->id.'/'.$row->avatar : base_url().'assets/admin/images/blank.png';
		?>
    
    		<img style="width:100px; height:100px;" src="<?php echo $img_link; ?>" alt="" title="" class="avatar" />
    </section>
 </div>
  
  <div class="row">
  <section class="col col-4">
      <label class="input"> <i class="icon-prepend icon-user"></i>
        <input type="text" name="reg_id" value="<?php echo $row->reg_id;?>" placeholder="Registration ID">
      </label>
      <div class="note note-error">User Registration ID</div>
    </section>
    <section class="col col-4">
      <label class="input"> <i class="icon-prepend icon-user"></i>
        <input type="text" name="reg_idg" value="<?php echo $row->reg_idg;?>" placeholder="Guest Registration ID">
      </label>
      <div class="note note-error">Guest Registration ID</div>
    </section>
  </div>
  
  <div class="row">
    <section class="col col-4">
      <label class="input state-disabled"> <i class="icon-prepend icon-calendar"></i>
        <input type="text" name="created" disabled="disabled" readonly="readonly" value="<?php echo $row->created;?>" placeholder="Email">
      </label>
      <div class="note">Registration Date:</div>
    </section>
    <section class="col col-4">
      <label class="input state-disabled"> <i class="icon-prepend icon-calendar"></i>
        <input type="text" name="lastlogin" disabled="disabled" readonly="readonly" value="<?php echo $row->lastlogin;?>" placeholder="First Name">
      </label>
      <div class="note">Last Login</div>
    </section>
    <section class="col col-4">
      <label class="input state-disabled"> <i class="icon-prepend icon-laptop"></i>
        <input type="text" name="lastip" disabled="disabled" readonly="readonly" value="<?php echo $row->lastip;?>" placeholder="Last Name">
      </label>
      <div class="note">Last Login IP</div>
    </section>
  </div>
  
  <div class="row" >
  <hr />
    <section class="col col-12">
      <label class="textarea">
        <textarea name="notes" placeholder="User Notes" rows="3"><?php echo $row->notes;?></textarea>
      </label>
      <div class="note note">User Notes - For internal use only.</div>
    </section>
  </div>
  <footer>
    <button class="button" name="dosubmit" type="submit">Update User Profile<span><i class="icon-ok"></i></span></button>
    <a href="<?php echo base_url();?>admin/CPanel" class="button button-secondary">Cancel</a> </footer>
  <input name="username" type="hidden" value="<?php echo $row->username;?>" />
  <!--<input name="id" type="hidden" value="<?php //echo Filter::$id;?>" />-->
</form>