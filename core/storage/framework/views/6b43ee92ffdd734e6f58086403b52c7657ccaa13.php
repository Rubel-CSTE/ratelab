<?php $__env->startSection('content'); ?>
    <section class="pt-100 pb-100 contact-section overflow-hidden section--bg">
        <div class="shape-one"></div>
        <div class="shape-two"></div>
        <div class="shape-three"></div>
        <div class="container">
            <div class="custom--card justify-content-center">
                <div class="table-responsive table-responsive--lg table-responsive--md table-responsive--sm">
                    <table class="table custom--table">
                        <thead class="thead-dark">
                            <tr>
                                <th><?php echo app('translator')->get('S.N.'); ?></th>
                                <th><?php echo app('translator')->get('Name'); ?></th>
                                <th><?php echo app('translator')->get('Address'); ?></th>
                                <th><?php echo app('translator')->get('Rating'); ?></th>
                                <th><?php echo app('translator')->get('Status'); ?></th>
                                <th><?php echo app('translator')->get('Action'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($companies->firstItem() + $loop->index); ?></td>
                                    <td>
                                        <a href="<?php if(@$company->status == 1): ?> <?php echo e(route('company.details', [$company->id, $company->name])); ?> <?php endif; ?>"
                                            class="text--base">
                                            <?php echo e(__(@$company->name)); ?>

                                        </a>
                                    </td>
                                    <td><?php echo e(@$company->address); ?></td>

                                    <td>
                                        <span class="text--base">
                                            <?php
                                                echo avgRating(@$company->avg_rating);
                                            ?>
                                        </span>
                                        (<?php echo e(@$company->reviews_count); ?>)
                                    </td>

                                    <td>
                                        <?php echo $company->statusBadge ?>
                                        
                                        <?php if($company->admin_feedback && $company->status != 0): ?>
                                            <button class="btn--info btn-sm mx-2 feedback" data-bs-toggle="modal"
                                                data-bs-target="#companyFeedBackModal" title="<?php echo app('translator')->get('Feedback info'); ?>"
                                                data-feedback="<?php echo e($company->admin_feedback); ?>">
                                                <i class="la la-info-circle"></i>
                                            </button>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($company->status == 1): ?>
                                        <button class="btn--primary btn-sm mx-2 infoScript" data-bs-toggle="modal"
                                        title="<?php echo app('translator')->get('Copy Script'); ?>" data-bs-target="#scriptModal"
                                            data-name="<?php echo e($company->name); ?>"
                                            data-id="<?php echo e($company->id); ?>" data-sitename="<?php echo e($general->site_name); ?>"
                                            data-url="<?php echo e(route('company.rating',encrypt($company->id))); ?>"
                                            data-redirectURL="<?php echo e(route('company.details', [$company->id, slug($company->name)])); ?>">
                                            <i class="la la-code"></i>
                                        </button>
                                        <?php endif; ?>

                                        <a href="<?php echo e(route('user.company.edit', $company->id)); ?>"
                                            class="btn--base btn-sm" title="<?php echo app('translator')->get('Edit'); ?>">
                                            <i class="fa fa-desktop"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="100%" class="text-center"><?php echo e(__($emptyMessage)); ?></td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <?php if($companies->hasPages()): ?>
                    <?php echo e(paginateLinks($companies)); ?>

                <?php endif; ?>
            </div>
            <div class="has--link">
                <div class="d-flex justify-content-center mt-5">
                    <?php echo getAdvertisement('728x90'); ?>
                </div>
            </div>
        </div>
    </section>

    <!-- //feedback Modal -->
    <div class="modal fade" id="companyFeedBackModal" tabindex="-1" aria-labelledby="companyFeedBackModal"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title " id="companyFeedBackModal"> <?php echo app('translator')->get('Admin Feedback'); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body admin-feedback">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn--base" data-bs-dismiss="modal"><?php echo app('translator')->get('Cancel'); ?></button>
                </div>
            </div>
        </div>
    </div>

    <!-- //script Modal -->
    <div class="modal fade" role="dialog" id="scriptModal" tabindex="-1" aria-labelledby="scriptModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title " id="scriptModal"> <?php echo app('translator')->get('Rating Script'); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="copyURL" class="companyScript"> </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn--base copytext border-0 copyBoard" id="copyBoard">
                        <i class="fa fa-copy"></i><?php echo app('translator')->get(' Copy'); ?> </span>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('style'); ?>
    <style>
        .companyScript 
        {
            width: 450px;
            height: 107px;
            word-wrap: break-word;
            overflow: hidden;
            text-overflow: ellipsis;
            background: #FFFCD7;
            padding: 5px;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        "use strict";
        $(document).ready(function() {

            $(".feedback").on('click', function() {
                $(".admin-feedback").text($(this).data('feedback'))
            })

            //Start-script-click-and_go!
            $(".infoScript").on('click', function() {
                $(".companyScript").empty();

                let cid       = $(this).data('id');
                let cName     = $(this).data('name');
                let url       = $(this).data('url');
                let siteUrl   = $(this).data('redirecturl');
                let siteName  = $(this).data('sitename');
                let halfStar  = '<?php echo e(getImage('assets/images/half-star.svg')); ?>';
                let fullStar  = '<?php echo e(getImage('assets/images/full-star.svg')); ?>';
                let blankStar = '<?php echo e(getImage('assets/images/blank-star.svg')); ?>';

                let scriptData =
                    `&lt;div title="${cName}" class=&quot;rating--here-${cid}&quot; style=&quot;text-align: center; margin: 30px auto 30px;&quot;&gt;&lt;/div&gt;&lt;script&gt;fetch(&quot;${url}&quot;).then((t=&gt;t.json())).then((t=&gt;{let a=t.rating?t.rating:0,s=0,e=&quot;&quot;,l=document.getElementsByClassName(&quot;rating--here-${cid}&quot;),n=t=&gt;e+=&apos;&lt;img width=&quot;25px&quot; style=&quot;margin: 5px auto 5px;&quot; src=&quot;&apos;+t+&apos;&quot;/&gt;&apos;;for(;s&lt;5;)n(a-s&gt;=1?&quot;${fullStar}&quot;:a-s&gt;0?&quot;${halfStar}&quot;:&quot;${blankStar}&quot;),s++;for(let a=0;a&lt;l.length;a++)l[a].innerHTML=&quot;&lt;div &gt;&quot;+e+&quot;&lt;/div&gt; &lt;h6&gt;&quot;+t.rating+t.outOf+&apos;&lt;/h6&gt;&lt;a href=&quot;${siteUrl}&quot; style=&quot;color: #d38a04;&quot; target=&quot;_blank&quot; class=&quot;text--base&quot;&gt;Powered By : ${siteName} &lt;/a&gt;&apos;})).catch((function(t){console.warn(&quot;Something went wrong in script.&quot;,t)})); &lt;/script&gt;`;

                $(".companyScript").append(scriptData);
            }); //End---Script for other web---//

        });

        $('.copyBoard').click(function() {
            var range = document.createRange();
            range.selectNode(document.getElementById("copyURL"));
            window.getSelection().removeAllRanges(); // clear current selection
            window.getSelection().addRange(range); // to select text
            document.execCommand("copy");
            window.getSelection().removeAllRanges(); // to deselect
            iziToast.success({
                message: "Script copied succesfully",
                position: "topRight"
            });
        });

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($activeTemplate . 'layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/fxbrizdp/public_html/core/resources/views/templates/basic/user/company/index.blade.php ENDPATH**/ ?>