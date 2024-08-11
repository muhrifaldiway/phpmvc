<!-- PAGE CONTAINER-->
<div class="page-container">
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">


  <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Dashboard</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"><h3 class="text-white">Jumlah Siswa</h3></i>
                                                
                                            </div>
                                            
                                            <div class="text">
                                            <?php foreach ($data['siswa'] as $kelas) : ?>
                                                    <h2><?=$kelas['jumlah_siswa'];?></h2>
                                                    <span><?=$kelas['nama'];?></span>
                                            <?php endforeach;?>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart1"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                            
</div>
