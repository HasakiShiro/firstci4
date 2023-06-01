<?= session()->getFlashdata('error') ?>

<form method="post" action="<?php echo site_url('news/update'); ?>">
    <?= csrf_field() ?>
    <input type="hidden" name="id" value="<?php echo $emailArray['id']; ?>">
    <input type="hidden" name="slug" value="<?= $emailArray['slug'] ?>">

    <label for="email">Email:</label>
    <input type="text" name="email" value="<?= old('email', $emailArray['email']) ?>">
    <br>
    <label for="title">Title:</label>
    <input type="text" name="title" value="<?= old('title', $emailArray['title']) ?>">
    <br>
    <label for="body">Body:</label>
    <textarea name="body"><?= old('body', $emailArray['body']) ?></textarea>
    <br>
    <input type="submit" value="Update">
    </form>
