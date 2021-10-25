<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('profile') ?>">Profile <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('experience') ?>">Experience</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('education') ?>">Education</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('skill') ?>">Skill</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('project') ?>">Projects</a>
            </li>
        </ul>
    </div>
</nav>