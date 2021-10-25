<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col-12 mx-auto my-5">
            <h3 class="text-center">Your Skill
            </h3>
            <hr>
            <a href="<?= base_url('skill/create') ?>" class="mb-3 btn btn-primary">Add new skill</a>
            <div class="card shadow rounded">
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Title</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($skills as $item) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $item->title ?></td>
                                    <td>
                                        <a href="<?= base_url('skill/edit/' . $item->id) ?>" class="btn btn-success">Edit</a>
                                        <a href="<?= base_url('skill/delete/' . $item->id) ?>" class="btn btn-danger">Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>