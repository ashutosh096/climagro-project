<?php
include("header.php");
include("sidebar.php");
?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Manage ClimIntello Requests</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <?php if ($this->session->flashdata("deleteslider")) { ?>
                <div class="alert <?php echo $this->session->flashdata("deleteclass"); ?>"><?php echo $this->session->flashdata("deleteslider"); ?></div>
            <?php }; ?>
            <div class="panel panel-default">
                <div class="panel-heading"> List of Data Requests (<?php echo count($requests); ?> total)</div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th width="40"></th>
                                <th width="50">ID</th>
                                <th>User</th>
                                <th>Organization</th>
                                <th>Type</th>
                                <th>Location</th>
                                <th>Submitted At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($requests as $index => $req) { ?>
                                <tr class="odd" data-toggle="collapse" data-target="#details-<?php echo $req->id; ?>" style="cursor: pointer;">
                                    <td class="text-center">
                                        <i class="fa fa-chevron-down collapse-icon" id="icon-<?php echo $req->id; ?>"></i>
                                    </td>
                                    <td><?php echo $req->id; ?></td>
                                    <td>
                                        <strong><?php echo $req->user_name; ?></strong><br>
                                        <small><?php echo $req->user_email; ?></small>
                                    </td>
                                    <td><?php echo $req->user_org_type; ?></td>
                                    <td>
                                        <span class="label label-info"><?php echo $req->request_type; ?></span>
                                    </td>
                                    <td>
                                        <?php echo $req->location_method; ?>
                                        <br><small><?php echo $req->admin_level; ?></small>
                                    </td>
                                    <td><?php echo date('d M Y H:i', strtotime($req->submitted_at)); ?></td>
                                    <td class="center" onclick="event.stopPropagation();">
                                        <?php
                                        echo anchor("administrator/delete_climintellio/" . $req->id, "<i class='fa fa-trash'></i>", array("class" => "btn btn-danger btn-circle", "onclick" => "return confirm('Are you sure you want to delete this request?')", "title" => "Delete"));
                                        ?>
                                    </td>
                                </tr>
                                <!-- Collapsible Details Row -->
                                <tr class="collapse" id="details-<?php echo $req->id; ?>">
                                    <td colspan="8" style="background-color: #f9f9f9; padding: 20px;">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <h5><strong><i class="fa fa-map-marker"></i> Location Details</strong></h5>
                                                <p><strong>Country:</strong> <?php echo $req->country ?? 'India'; ?></p>
                                                <p><strong>States:</strong> <?php 
                                                    $states = json_decode($req->states ?? '[]');
                                                    echo is_array($states) && !empty($states) ? implode(', ', $states) : 'N/A'; 
                                                ?></p>
                                                <p><strong>Districts:</strong> <?php 
                                                    $districts = json_decode($req->districts ?? '[]');
                                                    echo is_array($districts) && !empty($districts) ? implode(', ', $districts) : 'N/A'; 
                                                ?></p>
                                            </div>
                                            <div class="col-md-4">
                                                <h5><strong><i class="fa fa-bolt"></i> Hazards & Variables</strong></h5>
                                                <p><strong>Hazards:</strong> <?php 
                                                    $hazards = json_decode($req->hazards ?? '[]');
                                                    echo is_array($hazards) && !empty($hazards) ? implode(', ', $hazards) : 'N/A'; 
                                                ?></p>
                                                <p><strong>Variables:</strong> <?php 
                                                    $variables = json_decode($req->variables ?? '[]');
                                                    echo is_array($variables) && !empty($variables) ? implode(', ', $variables) : 'N/A'; 
                                                ?></p>
                                                <p><strong>Metrics:</strong> <?php echo !empty($req->metrics) ? $req->metrics : 'N/A'; ?></p>
                                            </div>
                                            <div class="col-md-4">
                                                <h5><strong><i class="fa fa-calendar"></i> Time Period & Format</strong></h5>
                                                <p><strong>Coverage:</strong> <?php echo !empty($req->coverage_type) ? $req->coverage_type : 'N/A'; ?></p>
                                                <p><strong>Historical:</strong> <?php 
                                                    echo (!empty($req->hist_year_start) && !empty($req->hist_year_end)) 
                                                        ? $req->hist_year_start . ' - ' . $req->hist_year_end 
                                                        : 'N/A'; 
                                                ?></p>
                                                <p><strong>Future:</strong> <?php 
                                                    echo (!empty($req->future_year_start) && !empty($req->future_year_end)) 
                                                        ? $req->future_year_start . ' - ' . $req->future_year_end 
                                                        : 'N/A'; 
                                                ?></p>
                                                <p><strong>Scenarios:</strong> <?php 
                                                    $scenarios = json_decode($req->scenarios ?? '[]');
                                                    echo is_array($scenarios) && !empty($scenarios) ? implode(', ', $scenarios) : 'N/A'; 
                                                ?></p>
                                                <p><strong>Format:</strong> <?php echo !empty($req->format) ? $req->format : 'N/A'; ?></p>
                                            </div>
                                        </div>
                                        <?php if (!empty($req->user_message)) { ?>
                                        <div class="row" style="margin-top: 15px;">
                                            <div class="col-md-12">
                                                <h5><strong><i class="fa fa-comment"></i> User Message</strong></h5>
                                                <div class="well well-sm"><?php echo nl2br(htmlspecialchars($req->user_message)); ?></div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <!-- /.table-responsive -->

                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <!-- /.row -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<style>
.collapse-icon {
    transition: transform 0.3s ease;
}
.collapse-icon.rotated {
    transform: rotate(180deg);
}
tr[data-toggle="collapse"]:hover {
    background-color: #f5f5f5;
}
.well-sm {
    padding: 10px;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 4px;
}
</style>

<script>
$(document).ready(function() {
    // Toggle chevron icon on collapse show/hide
    $('.collapse').on('show.bs.collapse', function () {
        var id = $(this).attr('id').replace('details-', '');
        $('#icon-' + id).addClass('rotated');
    }).on('hide.bs.collapse', function () {
        var id = $(this).attr('id').replace('details-', '');
        $('#icon-' + id).removeClass('rotated');
    });
});
</script>

<?php include("footer.php"); ?>

