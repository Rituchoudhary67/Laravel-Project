<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <h2>All Contacts</h2>
    <a href="<?php echo e(route('contacts.create')); ?>" class="btn btn-success mb-3">➕ Add Contact</a>
    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>
    <?php if($contacts->isEmpty()): ?>
        <p>No contacts found.</p>
    <?php else: ?> 
        <table class="table table-bordered mt-3">
            <thead class="table-dark">
                <tr>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                <tr>
                    <td>
                        <?php if($contact->photo): ?>
                            <img src="<?php echo e(asset('images/contacts/' . $contact->photo)); ?>" width="50" height="50">
                        <?php else: ?>
                            N/A
                        <?php endif; ?>
                    </td>
                    <td><?php echo e($contact->name); ?></td>
                    <td><?php echo e($contact->email); ?></td>
                    <td><?php echo e($contact->phone); ?></td>
                    <td><?php echo e($contact->address); ?></td>
                    <td>
                        <a href="<?php echo e(route('contacts.edit', $contact->id)); ?>" class="btn btn-primary btn-sm">Edit</a>

                        <form action="<?php echo e(route('contacts.destroy', $contact->id)); ?>" method="POST" style="display:inline-block;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>

                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/rituchoudhary/Desktop/demo-app/resources/views/contacts/index.blade.php ENDPATH**/ ?>