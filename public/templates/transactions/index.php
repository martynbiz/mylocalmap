<ol class="breadcrumb">
    <li><a href="/accounts">Accounts</a></li>
    <li><a href="/accounts/{{ account.id }}">{{ account.name }}</a></li>
    <li class="active">Transactions</li>
</ol>

{{#if transactions}}
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Description</th>
                <th>Amount</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            {{# transactions }}
                <tr>
                    <td>{{ description }}</td>
                    <td>{{ amount }}</td>
                    <td>
                        <a href="/accounts/{{ account_id }}/transactions/{{ id }}">Show</a> |
                        <a href="/accounts/{{ account_id }}/transactions/{{ id }}/edit">Edit</a> |
                        <a href="/accounts/{{ account_id }}/transactions/{{ id }}/delete">Delete</a>
                    </td>
                </tr>
            {{/ transactions }}
        </tbody>
    </table>
{{else}}
    <p>There are currenty no transactions for this account</p>
{{/if }}

<div>
    <a href="/accounts/{{ account.id }}/transactions/create" class="btn btn-primary" role="button" data-action="new_account">create</a>
</div>