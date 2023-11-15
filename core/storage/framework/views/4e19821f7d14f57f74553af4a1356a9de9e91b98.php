<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['placeholder' => 'Search...', 'btn' => 'btn--primary']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['placeholder' => 'Search...', 'btn' => 'btn--primary']); ?>
<?php foreach (array_filter((['placeholder' => 'Search...', 'btn' => 'btn--primary']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<div class="input-group w-auto flex-fill">
    <input type="search" name="search" class="form-control bg--white" placeholder="<?php echo e(__($placeholder)); ?>" value="<?php echo e(request()->search); ?>">
    <button class="btn <?php echo e($btn); ?>" type="submit"><i class="la la-search"></i></button>
</div><?php /**PATH /home/fxbrizdp/public_html/core/resources/views/components/search-key-field.blade.php ENDPATH**/ ?>