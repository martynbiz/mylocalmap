<ol class="breadcrumb">
    <li><a href="/accounts">Accounts</a></li>
    <li><a href="/accounts/{{ account.id }}">{{ account.name }}</a></li>
    <li><a href="/accounts/{{ account.id }}/transactions">Transactions</a></li>
    <li><a href="/accounts/{{ account.id }}/transactions/{{ transaction.id }}">#{{ transaction.id }}</a></li>
    <li>Delete</li>
</ol>


<div class="panel panel-default">
    <div class="panel-body">
        <form method="POST" action="/accounts/{{ account.id }}/transactions/{{ transaction.id }}/delete" name="accounts_update">
            <p>Are you sure you want to delete 'transaction #{{ transaction.id }}'?</p>
            
            <input type="hidden" name="_METHOD" value="DELETE"/>
            <input type="hidden" name="_SECURITYTOKEN" value="{{ _SECURITYTOKEN }}">
            
            <input type="submit" name="submit" value="Delete" class="btn btn-primary" role="button">
            <a href="/accounts" class="btn btn-default">Cancel</a>
        </form>
    </div>
</div>
