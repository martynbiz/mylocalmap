<ol class="breadcrumb">
    <li><a href="/accounts" data-data="/accounts" data-template="/templates/accounts/index.php">Accounts</a></li>
    <li class="active">New account</li>
</ol>

<?php include '_errors.php'; ?>

<form method="POST" action="/accounts/create" name="accounts_create" class="form-horizontal">
    <?php include '_form.php'; ?>
    
    <input type="submit" name="submit" value="Save" class="btn btn-primary" role="button">
</form>
