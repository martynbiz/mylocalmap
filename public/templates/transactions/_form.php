<div class="well bs-component">
    <fieldset>
        <div class="form-group">
            <label for="inputDescription" class="col-lg-2 control-label">
                Description
            </label>
            <div class="col-lg-10">
                <input type="text" class="form-control" id="inputDescription" placeholder="Description" name="description" value="{{ params.description }}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputAmount" class="col-lg-2 control-label">
                Amount
            </label>
            <div class="col-lg-10">
                <input type="text" class="form-control" id="inputAmount" placeholder="Amount" name="amount" value="{{ params.amount }}">
            </div>
        </div>
    </fieldset>
</div>

<input type="hidden" name="_SECURITYTOKEN" value="{{ _SECURITYTOKEN }}">