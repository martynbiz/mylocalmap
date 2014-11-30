<ol class="breadcrumb">
    <li><a href="/accounts">Accounts</a></li>
    <li><a href="/accounts/{{ account.id }}">{{ account.name }}</a></li>
    <li><a href="/accounts/{{ account.id }}/transactions">Transactions</a></li>
    <li class="active">New transactions</li>
</ol>

<?php include '_errors.php'; ?>

<form method="POST" action="/accounts/{{ account.id }}/transactions/create" name="transactions_create">
    <?php include '_form.php'; ?>
    
    <input type="submit" name="submit" value="Save" class="btn btn-primary" role="button">
</form>
