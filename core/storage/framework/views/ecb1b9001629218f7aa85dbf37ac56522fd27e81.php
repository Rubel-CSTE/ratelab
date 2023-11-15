

<?php
if (isset($seoContents) && count($seoContents)) {
    $seoContents = json_decode(json_encode($seoContents, true));
    $socialImageSize = explode('x', $seoContents->image_size);
} elseif ($seo) {
    $seoContents = $seo;
    $socialImageSize = explode('x', getFileSize('seo'));
    $seoContents->image = getImage(getFilePath('seo') . '/' . $seo->image);
} else {
    $seoContents = null;
}

?>

<meta name="title" Content="<?php echo e($general->sitename(__($pageTitle))); ?>">

<?php if($seoContents): ?>
    <meta name="description" content="<?php echo e($seoContents->meta_description ?? $seoContents->description); ?>">
    <meta name="keywords" content="<?php echo e(implode(',', $seoContents->keywords)); ?>">
    <link type="image/x-icon" href="<?php echo e(getImage(getFilePath('logoIcon') . '/favicon.png')); ?>" rel="shortcut icon">

    
    <link href="<?php echo e(getImage(getFilePath('logoIcon') . '/logo.png')); ?>" rel="apple-touch-icon">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="<?php echo e($general->sitename($pageTitle)); ?>">
    
    <meta itemprop="name" content="<?php echo e($general->sitename($pageTitle)); ?>">
    <meta itemprop="description" content="<?php echo e($seoContents->description); ?>">
    <meta itemprop="image" content="<?php echo e($seoContents->image); ?>">
    
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo e($seoContents->social_title); ?>">
    <meta property="og:description" content="<?php echo e($seoContents->social_description); ?>">
    <meta property="og:image" content="<?php echo e($seoContents->image); ?>" />
    <meta property="og:image:type" content="<?php echo e(@pathinfo($seoContents->image)['extension']); ?>" />
    <meta property="og:image:width" content="<?php echo e($socialImageSize[0]); ?>" />
    <meta property="og:image:height" content="<?php echo e($socialImageSize[1]); ?>" />
    <meta property="og:url" content="<?php echo e(url()->current()); ?>">
    
    <meta name="twitter:card" content="summary_large_image">
<?php endif; ?><?php /**PATH /home/fxbrizdp/public_html/core/resources/views/partials/seo.blade.php ENDPATH**/ ?>