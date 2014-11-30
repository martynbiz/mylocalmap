<ol class="breadcrumb">
    <li class="active">Accounts</li>
</ol>

{{#if accounts}}
    <table class="table table-striped">
        <thead>
            <tr>
                <th>name</th>
                <th>amount</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            {{# accounts }}
                <tr>
                    <td>{{ name }}</td>
                    <td>{{ amount }}</td>
                    <td>
                        <a href="/accounts/{{ id }}">Show</a> |
                        <a href="/accounts/{{ id }}/edit">Edit</a> |
                        <a href="/accounts/{{ id }}/delete">Delete</a>
                    </td>
                </tr>
            {{/ accounts }}
        </tbody>
    </table>
{{else}}
    <p>There are currenty no accounts</p>
{{/if }}

<div>
    <a href="/accounts/create" class="btn btn-primary" role="button" data-action="new_account">create</a>
</div>