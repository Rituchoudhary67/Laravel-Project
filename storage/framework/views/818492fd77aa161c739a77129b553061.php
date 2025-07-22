<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Book</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4">
        <a class="navbar-brand" href="<?php echo e(route('contacts.index')); ?>">📒 Contact Book</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('contacts.create')); ?>">Add Contact</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container py-4">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
</body>
</html><?php /**PATH /Users/rituchoudhary/Desktop/demo-app/resources/views/layout.blade.php ENDPATH**/ ?>