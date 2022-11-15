<?php

require "Journ.php";
require "dabase/IStorage.php";
require "dabase/DBStorage.php";

$storage = new DBStorage();

if (isset($_GET['id'])) {
    $editing = new Journ();
    $editing = $storage->getOne($_GET['id']);
} else {
    header("Location: /blog");
    exit();
}

?>
<div class="container page-content">
    <div class="row justify-content-center">
        <div class="contact-edit col-lg-6">
            <div class="contact-heading">
                <h1>Uprav blog</h1>
            </div>
            <div class="row">
                <form action="confirmedit.php?id=<?= $_GET['id'] ?>" id="contact-form" method="post"
                      enctype="application/x-www-form-urlencoded">
                    <div class="col-md-12">
                        <div class="contact-form-textfield">
                            <input type="text" name="title" placeholder="Názov (max. 50 znakov)" class="form-control"
                                   maxlength="50" value="<?= $editing['title'] ?? "" ?>" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="contact-form-textfield">
                            <textarea name="body" placeholder="Správa (max. 255 znakov)" class="form-control" rows="5"
                                      maxlength="255" required><?= $editing['body'] ?? "" ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-12 contact-form-button">
                        <button type="submit" name="editForm" class="btn btn-dark">Uprav</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>