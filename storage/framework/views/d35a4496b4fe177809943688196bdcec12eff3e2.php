<?php $__env->startSection('content'); ?>
    <h3 class="page-title">Work types</h3>

    <p>
        <a href="<?php echo e(route('work_types.create')); ?>" class="btn btn-success">Add new</a>
    </p>

    <div class="panel panel-default">
        <div class="panel-heading">
            List
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped <?php echo e(count($work_types) > 0 ? 'datatable' : ''); ?> dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th>Name</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if(count($work_types) > 0): ?>
                        <?php $__currentLoopData = $work_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $work_type): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <tr data-entry-id="<?php echo e($work_type->id); ?>">
                                <td></td>
                                <td><?php echo e($work_type->name); ?></td>
                                <td>
                                    <a href="<?php echo e(route('work_types.show',[$work_type->id])); ?>" class="btn btn-xs btn-primary">View</a>
                                    <a href="<?php echo e(route('work_types.edit',[$work_type->id])); ?>" class="btn btn-xs btn-info">Edit</a>
                                    <?php echo Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("Are you sure?")."');",
                                        'route' => ['work_types.destroy', $work_type->id])); ?>

                                    <?php echo Form::submit('Delete', array('class' => 'btn btn-xs btn-danger')); ?>

                                    <?php echo Form::close(); ?>

                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3">No entries in table</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <script>
        window.route_mass_crud_entries_destroy = '<?php echo e(route('work_types.mass_destroy')); ?>';
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>