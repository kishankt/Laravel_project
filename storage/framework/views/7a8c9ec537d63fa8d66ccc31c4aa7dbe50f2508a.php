<?php $__env->startSection('content'); ?>
    <h3 class="page-title">Reports</h3>

    <?php echo Form::open(['method' => 'get']); ?>

        <div class="row">
            <div class="col-xs-2 col-md-2 form-group">
                <?php echo Form::label('from','From',['class' => 'control-label']); ?>

                <?php echo Form::text('from', old('from', Request::get('from', date('Y-m-d'))), ['class' => 'form-control date', 'placeholder' => '']); ?>

            </div>
            <div class="col-xs-2 col-md-2 form-group">
                <?php echo Form::label('to','To',['class' => 'control-label']); ?>

                <?php echo Form::text('to', old('to', Request::get('to', date('Y-m-d'))), ['class' => 'form-control date', 'placeholder' => '']); ?>

            </div>
            <div class="col-xs-4">
                <label class="control-label">&nbsp;</label><br>
                <?php echo Form::submit('Select month',['class' => 'btn btn-primary']); ?>

            </div>
        </div>
    <?php echo Form::close(); ?>

    <div class="panel panel-default">
        <div class="panel-heading">
            Report
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Time by projects</th>
                            <th></th>
                        </tr>
                    <?php $__currentLoopData = $projects_time; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $projects): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <tr>
                            <th><?php echo e($projects['name']); ?></th>
                            <td><?php echo e(gmdate("H:i:s", $projects['time'])); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Time by work type</th>
                            <th></th>
                        </tr>
                    <?php $__currentLoopData = $work_type_time; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $work_type): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <tr>
                            <th><?php echo e($work_type['name']); ?></th>
                            <td><?php echo e(gmdate("H:i:s", $work_type['time'])); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    @parent
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.4.5/jquery-ui-timepicker-addon.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>
    <script>
        $('.date').datepicker({
            autoclose: true,
            dateFormat: "<?php echo e(config('app.date_format_js')); ?>"
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>