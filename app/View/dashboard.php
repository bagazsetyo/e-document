<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h2>Hi,  <span style="text-transform: capitalize;"><?= getSession('user')->name ?></span></h2>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total user</h4>
                </div>
                <div class="card-body">
                    <?= $data['user'] ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="fas fa-file"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Dokumen</h4>
                </div>
                <div class="card-body">
                    <?= $data['document'] ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="fas fa-file-alt"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Dokumen File</h4>
                </div>
                <div class="card-body">
                    <?= $data['documentFile'] ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="fas fa-user-friends"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Pengguna</h4>
                </div>
                <div class="card-body">
                    <?= $data['pengguna'] ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="fas fa-user-friends"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Jenis Pengguna</h4>
                </div>
                <div class="card-body">
                    <?= $data['jenisPengguna'] ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="fas fa-list"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Setting</h4>
                </div>
                <div class="card-body">
                    <?= $data['setting'] ?>
                </div>
            </div>
        </div>
    </div>
</div>