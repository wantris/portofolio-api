<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col-8 mx-auto my-5">
            <h3 class="text-center">Add Your New Education
            </h3>
            <hr>
            <a href="<?= base_url('education') ?>" class="mb-3 btn btn-primary">Kembali</a>
            <div class="card shadow rounded">
                <div class="card-body">
                    <form action="<?= base_url('education/update/' . $item->id) ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" name="title" value="<?= $item->title ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Major</label>
                            <input type="text" name="major" value="<?= $item->major ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Final Score</label>
                            <input type="text" name="final_score" value="<?= $item->final_score ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Date Start</label>
                            <input type="date" name="date_start" value="<?= $item->date_start ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Date End</label>
                            <input type="date" class="form-control" value="<?= $item->date_end ?>" name="date_end" id="">
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="desc" class="form-control">
                                <?= $item->description ?>
                            </textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Save" class="btn btn-success btn-block">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>