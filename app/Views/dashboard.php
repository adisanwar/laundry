<?= $this->extend('layouts/components/template') ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div> -->
    <!-- Content Row -->
    <div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-12 col-md-12 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">Hai Semangat Kerjanya, jangan lupa cek data customer dan ordernya yaaa </div>

                    </div>
                    <!-- <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    
    <!-- Page Heading -->
    
   
<script>

$(function () {
    // Data untuk Pie Chart
    var pieData = {
        datasets: [{
            data: [30, 20, 50], // Ganti dengan data Anda
            backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'], // Warna untuk setiap bagian chart
            hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'], // Warna ketika cursor diarahkan ke bagian chart
            hoverBorderColor: "rgba(234, 236, 244, 1)",
        }],
        labels: ['Data A', 'Data B', 'Data C'], // Ganti dengan label Anda
    };

    // Konfigurasi Pie Chart
    var pieOptions = {
        maintainAspectRatio: false,
        tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            caretPadding: 10,
        },
        legend: {
            display: true, // Ubah menjadi false jika tidak ingin menampilkan legenda
        },
        cutoutPercentage: 80, // Jarak tengah ke pinggir chart
    };

    // Inisialisasi Pie Chart
    var ctx = document.getElementById("myPieChart");
    var myPieChart = new Chart(ctx, {
        type: 'pie',
        data: pieData,
        options: pieOptions
    });
});

	</script>

<script src="<?= base_url('assets/js/demo/chart-area-demo.js');?>"></script>

<script src="<?= base_url('assets/js/demo/chart-bar-demo.js');?>"></script>

<script src="<?= base_url('assets/js/demo/chart-pie-demo.js');?>"></script>

<?= $this->endSection() ?>