<?php $__env->startSection('content'); ?>
    <div class="container">
        <div id="content" class="space-top-none">
            <div class="main-content">
                <div class="space60">&nbsp;</div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="beta-products-list">
                             <h3>New Trip</h3>
                            <div class="beta-products-details">
                                <div class="clearfix"></div>
                            </div>

                            <div class="row">
                            <?php $__currentLoopData = $new_trips; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $new_trip): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-sm-3">
                                    <div class="single-item">
                                        <div class="single-item-header">                                        
                                            <a href="#"><img src="<?php echo e($new_trip->coverimg); ?>" alt="" width="270" height="320" ></a>
                                        </div>
                                        <div class="single-item-body">
                                            <p><?php echo e($new_trip->name); ?></p>
                                        </div>
                                        <div class="single-item-caption">
                                            
                                            <a class="beta-btn primary" href="#">Details <i class="fa fa-chevron-right"></i></a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                            </div>
                            <div class="row">
                                <?php echo e($new_trips->links()); ?>  

                            </div>
                        
                        </div> <!-- .beta-trips-list -->

                        <div class="space50">&nbsp;</div>

                        <div class="beta-products-list">
                            <h3 class="me">Hot Trip</h3>
                            <div class="beta-products-details">
                                <div class="clearfix"></div>
                            </div>

                                                        <div class="row">
                            <?php $__currentLoopData = $new_trips; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $new_trip): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-sm-3">
                                    <div class="single-item">
                                        <div class="single-item-header">                                        
                                            <a href="#"><img src="<?php echo e($new_trip->coverimg); ?>" alt="" width="270" height="320" ></a>
                                        </div>
                                        <div class="single-item-body">
                                            <p><?php echo e($new_trip->name); ?></p>
                                        </div>
                                        <div class="single-item-caption">
                                            
                                            <a class="beta-btn primary" href="#">Details <i class="fa fa-chevron-right"></i></a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                            </div>
                            <div class="row">
                                <?php echo e($new_trips->links()); ?>  

                            </div>
                            
                        </div> <!-- .beta-trips-list -->
                    </div>
                </div> <!-- end section with sidebar and main content -->


            </div> <!-- .main-content -->
        </div> <!-- #content -->
    </div> <!-- .container -->

    
</body>
</html>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>