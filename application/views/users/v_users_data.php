<section class="content-header">
    <h1>Data Users <small>Users</small></h1>
    <ol class="breadcrumb">
        <li>
            <a href="<?= site_url('Dashboard') ?>">
                <i class="fa fa-dashboard"></i>
            </a>
        </li>
        <li>
            Users
        </li>
    </ol>
</section>

<section class="content">
    <?= $this->session->flashdata('message'); ?>
    <div class="box box-primary">
        <div class="box-header">
            <h4>Data Users</h4>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="mytable">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Alamat</th>
                        <th class="text-center">Is Active</th>
                        <th class="text-center">Level</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($row as $key => $data) { ?>
                        <?php if ($this->session->userdata('user_id') == $data->user_id) { ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td><?= $data->name ?></td>
                                <td><?= $data->email ?></td>
                                <td><?= $data->alamat ?></td>
                                <td class="text-center"><?= $data->is_active == 1 ? 'Active' : 'Tidak Aktif' ?></td>
                                <td class="text-center"><?= $data->level == 1 ? 'Admin' : 'Member' ?></td>
                                <td class="text-center">
                                    <a href="<?= site_url('Users/edit/' . $data->user_id) ?>" class="btn btn-success btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <?php if ($data->level == 1) { ?>
                                        <a href="<?= site_url('Users/del/' . $data->user_id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Data <?= $data->name ?> akan dihapus secara permanen, apakah anda yakin  ?')">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php }  ?>
                    <?php } ?>
                </tbody>
            </table>
            <?php if ($this->session->userdata('level') == 2) { ?>
                <i class="text-danger">*</i> The delete button is not activated
            <?php }  ?>
        </div>
    </div>
</section>