<?php 

    include 'header-form.php'; 
    include 'left-sidebar-object-home.php'; 
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!--
    <section class="content-header">
      <h1>
        General Form Elements
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol>
    </section>
-->

    <!-- Main content -->
    <section class="content">
        <!--
      <div class="callout callout-info">
        <h4>Reminder!</h4>
        Instructions for how to use modals are available on the
        <a href="http://getbootstrap.com/javascript/#modals">Bootstrap documentation</a>
      </div>
-->

        <div class="row">
            <div class="col-xs-12">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <i class="fa fa-cube"></i> 
                        <h3 class="box-title"><span><a href="object-home.php">Setup</a></span> New Custom Object</h3>
                    </div>
                    <div class="box-body  text-right">
                        <!--
              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                New
              </button>
-->

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">New Custom Object</h3>

                        <!-- form start -->
                        <form role="form">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label>Textarea</label>
                                    <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Minimal</label>
                                    <select class="form-control select2" style="width: 100%;">
                                      <option selected="selected">Alabama</option>
                                      <option>Alaska</option>
                                      <option>California</option>
                                      <option>Delaware</option>
                                      <option>Tennessee</option>
                                      <option>Texas</option>
                                      <option>Washington</option>
                                    </select>
                                </div>

                                <!-- checkbox -->
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                              <input type="checkbox">
                              Checkbox 1
                            </label>
                                    </div>

                                    <div class="checkbox">
                                        <label>
                              <input type="checkbox">
                              Checkbox 2
                            </label>
                                    </div>

                                    <div class="checkbox">
                                        <label>
                              <input type="checkbox" disabled>
                              Checkbox disabled
                            </label>
                                    </div>
                                </div>

                                <!-- radio -->
                                <div class="form-group">
                                    <div class="radio">
                                        <label>
                              <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                              Option one is this and that&mdash;be sure to include why it's great
                            </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                              <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                              Option two can be something else and selecting it will deselect option one
                            </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                              <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3" disabled>
                              Option three is disabled
                            </label>
                                    </div>
                                </div>
                                <!--
                        <div class="form-group">
                          <label for="exampleInputFile">File input</label>
                          <input type="file" id="exampleInputFile">

                          <p class="help-block">Example block-level help text here.</p>
                        </div>
        -->
                                <div class="checkbox">
                                    <label>
                            <input type="checkbox"> Check me out
                          </label>
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->


    

</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2017-2018 <a href="https://s-connect.org">Super Connect</a>.</strong> All rights reserved.
</footer>

<?php 
    include 'control-sidebar.php'; 
    include 'footer-form.php'; 
?>
