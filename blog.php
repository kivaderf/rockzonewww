<?php

require "Journ.php";
require "dabase/IStorage.php";
require "dabase/DBStorage.php";

$storage = new DBStorage();

if (isset($_POST['title'])) {
    $blog = new Journ();
    $blog->setTitle($_POST['title']);
    $blog->setBody($_POST['body']);
    $storage->Store($blog);
}

if (isset($_GET['delete'])) {
    $storage->remove($_GET['delete']);
    header('Location: /blog');
    exit;
}
?>
<div class="container page-content">
    <div class="row">
        <div class="blog-form col-lg-6">
            <div class="sticky-top">
                <div class="contact-heading">
                    <h1>Blog</h1>
                </div>
                <div class="row">
                    <form id="contact-form" method="post" enctype="application/x-www-form-urlencoded">
                        <div class="col-md-12">
                            <div class="contact-form-textfield">
                                <input type="text" name="title" placeholder="Názov (max. 50 znakov)" class="form-control"
                                       maxlength="50" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="contact-form-textfield">
                                <textarea name="body" placeholder="Správa (max. 255 znakov)" class="form-control" rows="5"
                                          maxlength="255" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 contact-form-button">
                            <button type="submit" class="btn btn-dark">Publikuj</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="blog-content col-lg-6">
            <?php foreach ($storage->getAll() as $blog) { ?>
                <div class="blog-post">
                    <div class="edit-buttons">
                        <a href="/edit-blog?id=<?= $blog->getId() ?>"><i class="bi bi-pen"></i></a>
                        <a href="?delete=<?= $blog->getId() ?>"><i class="bi bi-trash-fill"></i></a>
                    </div>
                    <h2><?= $blog->getTitle() ?></h2>
                    <p><?= $blog->getBody() ?></p>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
