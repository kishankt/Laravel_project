<?php $__env->startSection('content'); ?>
    <h3 class="page-title">Time entries</h3>

    <p>
        <a href="<?php echo e(route('time_entries.create')); ?>" class="btn btn-success">Add new</a>
    </p>

    <div class="panel panel-default">
        <div class="panel-heading">
            List
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped <?php echo e(count($time_entries) > 0 ? 'datatable' : ''); ?> dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th>Project</th>
                        <th>Work type</th>
                        <th>Start time</th>
                        <th>End time</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php if(count($time_entries) > 0): ?>
                        <?php $__currentLoopData = $time_entries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $time_entry): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <tr data-entry-id="<?php echo e($time_entry->id); ?>">
                                <td></td>
                                <td><?php echo e(isset($time_entry->project->name) ? $time_entry->project->name : ''); ?></td>
                                <td><?php echo e(isset($time_entry->work_type->name) ? $time_entry->work_type->name : ''); ?></td>
                                <td><?php echo e($time_entry->start_time); ?></td>
                                <td><?php echo e($time_entry->end_time); ?></td>
                                <td><a href="<?php echo e(route('time_entries.show',[$time_entry->id])); ?>" class="btn btn-xs btn-primary">View</a><a href="<?php echo e(route('time_entries.edit',[$time_entry->id])); ?>" class="btn btn-xs btn-info">Edit</a><?php echo Form::open(array(
                'style' => 'display: inline-block;',
                'method' => 'DELETE',
                'onsubmit' => "return confirm('".trans("Are you sure?")."');",
                'route' => ['time_entries.destroy', $time_entry->id])); ?>

    <?php echo Form::submit('Delete', array('class' => 'btn btn-xs btn-danger')); ?>

    <?php echo Form::close(); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6">No entries in table</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <script>
        window.route_mass_crud_entries_destroy = '<?php echo e(route('time_entries.mass_destroy')); ?>';
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>