<h2 style="font-size:16px !important">Confirm your details</h2>

<form id="leadsForm" action="#" class="form-border">
    @csrf
    <input type="hidden" name="user_id" value="{{ empty($user->id) ? '' : $user->id }}"/>
    <input type="hidden" name="partner_id" value="{{ empty($partner_id) ? '' : $partner_id }}"/>
    <input type="hidden" name="property_id" value="{{ empty($property_id) ? '' : $property_id }}"/>
    <input type="hidden" name="street" id="street" value=""/>
    <input type="hidden" name="postal_code" id="postal_code" value=""/>
    <input type="hidden" name="move_size" id="move_size" value=""/>
    <input type="hidden" name="items" id="items" value=""/>
    <div class="form-group">
        <label for="">First name</label>
        <input type="text" class="form-control" placeholder="" value="{{ empty($user->first_name) ? '' : $user->first_name }}" disabled="">
    </div>
    <div class="form-group">
        <label for="">Last name</label>
        <input type="text" class="form-control" placeholder="" value="{{ empty($user->last_name) ? '' : $user->last_name }}" disabled="">
    </div>
    <div class="form-group">
        <label for="">Email address</label>
        <input type="email" class="form-control" placeholder="" value="{{ empty($user->email) ? '' : $user->email }}" disabled="">
    </div>
    <div class="form-group">
        <label for="">Mobile Number</label>
        <input type="tel" class="form-control" placeholder="" name="mobile_phone" id="mobile_phone">
        <div id="mobile_error" class="error" style="display:none">Correct Mobile Number is required</div>
    </div>
    <div class="form-group">
        <label for="moving_on">When are you moving?</label>
        <select name="moving_on" class="form-control select2-main">
            <option value="">Not sure yet</option>
            <?php
            for ($index = 0; $index < 6; $index++) {
                $cur_time = strtotime("+$index months");
                $value = date("Y-m-01", $cur_time);
                $label = date("F Y", $cur_time);
                print('<option value=' . $value . '>' . $label . '</option>');
            }
            ?>
        </select>
    </div>
</form>
<style>
    .error {
        color: red;
        font-size: 13px;
    }
</style>