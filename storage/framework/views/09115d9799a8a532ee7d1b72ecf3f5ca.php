<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <h2>Edit Contact</h2>

    <form action="<?php echo e(route('contacts.update', $contact->id)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" name="name" class="form-control" value="<?php echo e($contact->name); ?>" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" name="email" class="form-control" value="<?php echo e($contact->email); ?>" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone:</label>
            <input type="text" name="phone" class="form-control" value="<?php echo e($contact->phone); ?>" required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address:</label>
            <textarea name="address" class="form-control" required><?php echo e($contact->address); ?></textarea>
        </div>

        <div class="mb-3">
            <label for="photo" class="form-label">Photo:</label>
            <input type="file" name="photo" class="form-control">
            <?php if($contact->photo): ?>
                <p class="mt-2">Current: <img src="<?php echo e(asset('images/contacts/' . $contact->photo)); ?>" width="50" height="50"></p>
            <?php endif; ?>
        </div>

        <button type="submit" class="btn btn-success">Update Contact</button>
        <a href="<?php echo e(route('contacts.index')); ?>" class="btn btn-secondary">Back</a>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/rituchoudhary/Desktop/demo-app/resources/views/contacts/edit.blade.php ENDPATH**/ ?>