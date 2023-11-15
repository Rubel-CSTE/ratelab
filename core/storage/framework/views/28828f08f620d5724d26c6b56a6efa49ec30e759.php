<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['route' => '']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['route' => '']); ?>
<?php foreach (array_filter((['route' => '']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<a href="<?php echo e($route); ?>" class="btn btn-sm btn-outline--primary">
    <i class="la la-undo"></i> <?php echo app('translator')->get('Back'); ?>
</a>
<?php /**PATH /home/fxbrizdp/public_html/core/resources/views/components/back.blade.php ENDPATH**/ ?>