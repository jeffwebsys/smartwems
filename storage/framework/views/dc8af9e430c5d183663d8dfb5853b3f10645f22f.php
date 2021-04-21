<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <link href="<?php echo e(asset('assets/css/loader.css')); ?>" rel="stylesheet" type="text/css" />
    <script src="<?php echo e(asset('assets/js/loader.js')); ?>"></script>

<?php echo $__env->make('layouts.partials.upperlinks', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<style>
    .layout-px-spacing {
        min-height: calc(100vh - 166px)!important;
    }
    .form-group label, label {
        font-size: 15px;
        color: #515151;
        letter-spacing: 1px;
    }
    .table > tbody > tr > td {
        vertical-align: middle;
        color: #515365;
        font-size: 13px;
        letter-spacing: 1px;
    }
    .table-hover:not(.table-dark) tbody tr:hover {
        background-color: #f1f2f3 !important;
    }
    table.dataTable { 
        margin-top: 0px !important;
    }
    .table > tbody::before {
        line-height: 0px;
        content: "";
        color: unset;
        display: block;

    }
    table.dataTable thead > tr > th.sorting_asc, table.dataTable thead > tr > th.sorting_desc, table.dataTable thead > tr > th.sorting {

            font-size: 10px;
            color: black;
            font-weight: 800;
    }
    
 div .fw-900 > label, option {
     font-weight: 900;
     color: #0E1726;
 }

 div .fw-900 > input {
     border: 1px solid #5684af;
         
 }

 div .fw-900 > select {
     border: 1px solid #5684af;
 }

 .error {
     color: red !important;
     font-size: 10px;
 }

</style>
<body>
<!--loader -->
<?php echo $__env->make('layouts.extras.loader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- NavBar -->
<?php echo $__env->make('layouts.extras.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Main Div -->
<?php echo $__env->make('layouts.extras.maindiv', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- SideBar -->
<?php echo $__env->make('layouts.extras.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Content -->
<?php echo $__env->make('layouts.extras.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- End Div -->
</div>
<?php echo $__env->make('layouts.partials.lowerlinks', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php /**PATH D:\xampp\htdocs\capstone2\resources\views/layouts/app.blade.php ENDPATH**/ ?>