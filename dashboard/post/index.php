<?php require('../../models/session.php') ?>
<?php require('../../config/index-settings.php');?>

<?php include ('../components/head.php'); ?>

<!-- header start -->
<?php include ('../components/header.php'); ?>
<!-- header end -->

<!-- main sidebar start -->
<?php include ('../components/menu.php'); ?>
<!-- main sidebar end -->

<!-- main content start -->
<div class="main-content">
    <div class="dashboard-breadcrumb mb-30">
        <h2>Posts</h2>
    </div>
    <div class="row">
        <div class="alert" id="alert-notice"></div>
        <div class="col-xxl-4">
            <div class="panel">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" Method="post" enctype="multipart/form-data" id="new-post">
                    <div class="panel-header">
                        <h4>New Post</h4>
                    </div>
                    <div class="panel-body">
                        <div class="mb-3">
                            <label class="form-label" for="formGroupExampleInput">Title</label>
                            <input type="text" name="post_title" class="form-control" id="formGroupExampleInput" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="post_description" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Featured Image</label>
                            <input type="file" name="post_featured_image" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Video Link</label>
                            <small>Preferred Type: YouTube Video Link</small>
                            <input type="text" name="post_video_link" class="form-control" required>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <button type="submit" class="btn btn-danger">Save</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-xxl-8">
            <div class="panel">
                <div class="panel-header">
                    <h4>TableView</h4>
                </div>
                <div class="panel-body">
                    <table class="table table-dashed recent-order-table" id="postsTable">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Posting Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- footer start -->
<?php include ('../components/version.php') ?>
<!-- footer end -->
</div>
<!-- main content end -->

<?php include ('../components/footer.php') ?>

<script src="../../models/admin/post/js/post-script.js"></script>
<script src="../../models/admin/post/js/datatables-script.js"></script>