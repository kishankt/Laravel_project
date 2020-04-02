<?php $__env->startSection('content'); ?>
    <h3 class="page-title">Projects</h3>

    <p>
        <a href="<?php echo e(route('projects.create')); ?>" class="btn btn-success">Add new</a>
    </p>

    <div class="panel panel-default">
        <div class="panel-heading">
            List
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped <?php echo e(count($projects) > 0 ? 'datatable' : ''); ?> dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th>Name</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php if(count($projects) > 0): ?>
                        <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <tr data-entry-id="<?php echo e($project->id); ?>">
                                <td></td>
                                <td><?php echo e($project->name); ?></td>
                                <td><a href="<?php echo e(route('projects.show',[$project->id])); ?>" class="btn btn-xs btn-primary">View</a><a href="<?php echo e(route('projects.edit',[$project->id])); ?>" class="btn btn-xs btn-info">Edit</a><?php echo Form::open(array(
                'style' => 'display: inline-block;',
                'method' => 'DELETE',
                'onsubmit' => "return confirm('".trans("Are you sure?")."');",
                'route' => ['projects.destroy', $project->id])); ?>

    <?php echo Form::submit('Delete', array('class' => 'btn btn-xs btn-danger')); ?>

    <?php echo Form::close(); ?></td>
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
        window.route_mass_crud_entries_destroy = '<?php echo e(route('projects.mass_destroy')); ?>';
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>