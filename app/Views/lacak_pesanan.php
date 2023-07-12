<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <!-- Content Row -->
    
    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h2 class="m-0 font-weight-bold text-primary">Lacak Cucianmu</h2>
        </div>
        <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex flex-column">
                            <span class="lead fw-normal">Your order has been delivered</span>
                            <span class="text-muted small">by DHFL on 21 Jan, 2020</span>
                        </div>
                        <div>
                            <button class="btn btn-outline-primary" type="button">Track order details</button>
                        </div>
                    </div>
                    <hr class="my-4">

                    <div class="d-flex flex-row justify-content-between align-items-center align-content-center">
                        <span class="dot"></span>
                        <hr class="flex-fill track-line"><span class="dot"></span>
                        <hr class="flex-fill track-line"><span class="dot"></span>
                        <hr class="flex-fill track-line"><span class="dot"></span>
                        <hr class="flex-fill track-line"><span class="d-flex justify-content-center align-items-center big-dot dot">
                            <i class="fa fa-check text-white"></i></span>
                    </div>

                    <div class="d-flex flex-row justify-content-between align-items-center">
                        <div class="d-flex flex-column align-items-start"><span>15 Mar</span><span>Order placed</span>
                        </div>
                        <div class="d-flex flex-column justify-content-center"><span>15 Mar</span><span>Order
                                placed</span></div>
                        <div class="d-flex flex-column justify-content-center align-items-center"><span>15
                                Mar</span><span>Order Dispatched</span></div>
                        <div class="d-flex flex-column align-items-center"><span>15 Mar</span><span>Out for
                                delivery</span></div>
                        <div class="d-flex flex-column align-items-end"><span>15 Mar</span><span>Delivered</span></div>
                    </div>
        </div>


    </div>
</div>
    <!-- </section> -->
<?= $this->endSection() ?>