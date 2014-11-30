<ol class="breadcrumb">
    <li><a href="/accounts" data-data="/accounts" data-template="/templates/accounts/index.php">Accounts</a></li>
    <li class="active">{{ account.name }}</li>
</ol>

<div class="row">
<div class="col-lg-6">

{{#with account }}
<table class="table table-striped">
    <tr>
        <th>id</th>
        <td>{{ id }}</td>
    </tr>
    <tr>
        <th>name</th>
        <td>{{ name }}</td>
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
    <a href="/accounts/{{ account.id }}/edit" class="btn btn-primary" role="button">Edit</a>
</div>

<h3>Recent transactions</h3>

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

<p><a href="/accounts/{{ account.id }}/transactions">View all</a></p>

</div>
<div class="col-lg-6">

graph

</div>
</div>