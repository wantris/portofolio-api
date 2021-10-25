<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col-12 mx-auto my-5">
            <h3 class="text-center">Your Profile
            </h3>
            <hr>
            <a href="<?= base_url('profile/create') ?>" class="mb-3 btn btn-primary">Tambah data</a>
            <div class="card shadow rounded">
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Nama Depan</th>
                                <th scope="col">Nama Terakhir</th>
                                <th scope="col">Email</th>
                                <th scope="col">Nomor</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Photo</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?= $profile->first_name ?></td>
                                <td><?= $profile->last_name ?></td>
                                <td><?= $profile->email ?></td>
                                <td><?= $profile->phone ?></td>
                                <td><?= $profile->address ?></td>
                                <td><?= $profile->description ?></td>
                                <td><img src="<?= $profile->setPhotoUrl()->photo ?>" width="50" alt=""></td>
                                <td>
                                    <a href="<?= base_url('profile/edit/' . $profile->id) ?>" class="btn btn-success">Edit</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>