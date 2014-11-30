<ol class="breadcrumb">
    <li><a href="/accounts">Accounts</a></li>
    <li><a href="/accounts/{{ account.id }}">{{ account.name }}</a></li>
    <li><a href="/accounts/{{ account.id }}/transactions">Transactions</a></li>
    <li><a href="/accounts/{{ account.id }}/transactions/{{ transaction.id }}">#{{ transaction.id }}</a></li>
    <li>Edit</li>
</ol>

<?php include '_errors.php'; ?>

<form method="POST" action="/accounts/{{ account.id }}/edit" name="accounts_update">
    <?php include '_form.php'; ?>
    
    <input type="hidden" name="_METHOD" value="PUT"/>
    
    <input type="submit" name="submit" value="Save" class="btn btn-primary" role="button">
    <a href="/accounts/{{ account.id }}/transactions/{{ transaction.id }}" class="btn btn-default">Cancel</a>
</form>
