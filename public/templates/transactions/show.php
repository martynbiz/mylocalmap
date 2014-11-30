<ol class="breadcrumb">
    <li><a href="/accounts">Accounts</a></li>
    <li><a href="/accounts/{{ account.id }}">{{ account.name }}</a></li>
    <li><a href="/accounts/{{ account.id }}/transactions">Transactions</a></li>
    <li class="active">#{{ transaction.id }}</li>
</ol>

{{#with transaction }}
<table class="table table-striped">
    <tr>
        <th>Description</th>
        <td>{{ description }}</td>
    </tr>
    <tr>
        <th>amount</th>
        <td>{{ amount }}</td>
    </tr>
    <tr>
        <th>created_at</th>
        <td>{{ created_at }}</td>
    </tr>
    <tr>
        <th>updated_at</th>
        <td>{{ updated_at }}</td>
    </tr>
    <tr>
    </tr>
</table>
{{/with }}
    
<div>
    <a href="/accounts/{{ account.id }}/transactions/{{ transaction.id }}/edit" class="btn btn-primary" role="button">Edit</a>
</div>