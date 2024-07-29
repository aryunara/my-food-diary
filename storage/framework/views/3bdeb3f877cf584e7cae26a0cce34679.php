<?php $__env->startSection('main_content'); ?>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <title>Post creating</title>
</head>

<body>
<br>
<div class="container">
    <header id="page-header" class="text-white col-sm-12" style="background-color: #75250c">
        <h1 id="main-heading" class="text-center">Post creating</h1>
    </header>

    <div class="row">
        <main class="col-sm-10 offset-sm-1">

            <form action="/post-creation" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <input type="hidden" value="<?php echo e(Auth::id()); ?>" name="user_id" required>
                    <?php $__errorArgs = ['user_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-danger"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <input type="file" placeholder="Download the image" name="image" id="image" class="form-control" required></input>
                    <?php $__errorArgs = ['path'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-danger"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <br><br>
                <textarea type="text" rows="5" cols="90" placeholder="Description to the post" name="description" required></textarea>
                    <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-danger"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <br><br>
                <textarea type="text" rows="5" cols="90" placeholder="Write the recipe name" name="recipe_name"></textarea>
                    <?php $__errorArgs = ['recipe_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-danger"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <br><br>
                <textarea type="text" rows="2" cols="90" placeholder="Cooking time" name="cooking_time"></textarea>
                    <?php $__errorArgs = ['cooking_time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-danger"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <br><br>
                <textarea type="text" rows="5" cols="90" placeholder="Description to the recipe" name="recipe_description"></textarea>
                    <?php $__errorArgs = ['recipe_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-danger"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <br><br>

                <button id="submit-button" type="submit" class="btn btn-primary">
                    Submit
                </button>
            </form>
        </main>
    </div>
    <div class="row">
        <section class="col-sm-10 offset-sm-1">
            <p id="response-message"></p>
            <h2 id="response-title"></h2>
            <small id="response-id"></small>
            <p id="response-content"></p>
        </section>
    </div>
</div>
<script src="scripts.js"></script>
</body>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('main_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/post.blade.php ENDPATH**/ ?>