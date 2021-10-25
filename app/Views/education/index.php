<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col-12 mx-auto my-5">
            <h3 class="text-center">Your Education
            </h3>
            <hr>
            <a href="<?= base_url('education/create') ?>" class="mb-3 btn btn-primary">Add new education</a>
            <div class="card shadow rounded">
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Title</th>
                                <th scope="col">Major</th>
                                <th scope="col">Date Start</th>
                                <th scope="col">Date End</th>
                                <th scope="col">Description</th>
                                <th scope="col">Final Score</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($educations as $item) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $item->title ?></td>
                                    <td><?= $item->major ?></td>
                                    <td><?= $item->date_start ?></td>
                                    <td><?= $item->date_end ?></td>
                                    <td><?= $item->description ?></td>
                                    <td><?= $item->final_score ?></td>
                                    <td>
                                        <a href="<?= base_url('education/edit/' . $item->id) ?>" class="btn btn-success">Edit</a>
                                        <a href="<?= base_url('education/delete/' . $item->id) ?>" class="btn btn-danger">Hapus</a>
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