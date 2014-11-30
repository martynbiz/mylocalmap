<ol class="breadcrumb">
    <li><a href="/accounts">Accounts</a></li>
    <li><a href="/accounts/{{ account.id }}">{{ account.name }}</a></li>
    <li class="active">edit</li>
</ol>

<?php include '_errors.php'; ?>

<form method="POST" action="/accounts/{{ account.id }}/edit" name="accounts_update">
    <?php include '_form.php'; ?>
    
    <input type="hidden" name="_METHOD" value="PUT"/>
    
    <input type="submit" name="submit" value="Save" class="btn btn-primary" role="button">
    <a href="/accounts/{{ account.id }}" class="btn btn-default">Cancel</a>
</form>
