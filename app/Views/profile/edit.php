<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col-8 mx-auto my-5">
            <h3 class="text-center">Edit Your Profile
            </h3>
            <hr>
            <a href="#" class="mb-3 btn btn-primary">Kembali</a>
            <div class="card shadow rounded">
                <div class="card-body">
                    <form action="<?= base_url('profile/edit/' . $profile->id) ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $profile->id ?>">
                        <div class="form-group">
                            <label for="">First Name</label>
                            <input type="text" name="first_name" value="<?= $profile->first_name ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Last Name</label>
                            <input type="text" name="last_name" value="<?= $profile->last_name ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" value="<?= $profile->email ?>" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Phone Number</label>
                            <input type="text" value="<?= $profile->phone ?>" name="phone" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Address</label>
                            <textarea name="address" class="form-control"><?= $profile->address ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="desc" class="form-control"><?= $profile->description ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Photo</label>
                            <input type="file" id="photo-inp" name="photo" onchange="loadFile(event)" class=" form-control">
                            <input type="hidden" name="oldPhoto" value="<?= $profile->photo ?>">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Save" class="btn btn-success btn-block">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-4">
            <img src="<?= base_url() . "/uploads/photo/" . $profile->photo ?>" alt="" accept="image/*" width="200" id="photo-img" class="img-fluid mt-4">
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('custom-js') ?>
<script>
    var loadFile = function(event) {
        var output = document.getElementById('photo-img');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };
</script>
<?= $this->endSection() ?>