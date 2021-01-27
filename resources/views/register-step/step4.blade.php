<h2>Do you have anywhere in mind you want to live <br>close to? (e.g. office, friends or landmark)</h2>
<p>This will narrow down which areas would best suit you</p>


<form id="regStepsForm" action="{{route('save_steps')}}" method="POST">
  @csrf
  <input type="hidden" id="page_from" name="page_from" value="" />
  <input type="hidden" id="services" name="services" value="" />
  <input type="hidden" id="preferences" name="preferences" value="" />
  <input type="hidden" id="remoteness" name="remoteness" value="" />
  <input type="hidden" id="moving" name="moving" value="" />
  <input type="hidden" id="transport" name="transport" value="">
  <input type="hidden" id="moving_from" name="moving_from" value="{{empty($moving_from->code) ? '' : $moving_from->code}}" />
  <input type="hidden" id="moving_to" name="moving_to" value="{{empty($moving_to->code) ? '' : $moving_to->code}}" />
  <div class="row">
    <div class="col-md-12">
      <div class="address">
        <input id="live_close" name="live_close" type="text" class="form-control autoComplete"
      placeholder="Street address, city, state" autocomplete="off" value="{{$user_detail->live_close ?? ''}}">
      </div>
    </div>
    <!-- <div class="col-md-3">
            <input type="text" class="form-control" placeholder="Apt/unit number">
        </div> -->
  </div>
  <div class="row buttonsSwitch">
    <div class="col-lg-4">
      <a href="#" class="btn remoteness {{isset($user_detail) && $user_detail->remoteness == 5 ? 'active' : ''}}" data-value="5">Within 5 minutes</a>
    </div>
    <div class="col-lg-4">
      <a href="#" class="btn remoteness {{isset($user_detail) && $user_detail->remoteness == 10 ? 'active' : ''}}" data-value="10">Within 10 minutes</a>
    </div>
    <div class="col-lg-4">
      <a href="#" class="btn remoteness {{isset($user_detail) && $user_detail->remoteness == 20 ? 'active' : ''}}" data-value="20">Within 20 minutes</a>
    </div>
    <div class="col-lg">
      <a href="#" class="btn remoteness {{isset($user_detail) && $user_detail->remoteness == 30 ? 'active' : ''}}" data-value="30">Within 30 minutes</a>
    </div>
    <div class="col-lg">
      <a href="#" class="btn remoteness {{isset($user_detail) && $user_detail->remoteness == 40 ? 'active' : ''}}" data-value="40">Within 40 minutes</a>
    </div>
  </div>
  <p style="margin: 10px; color: #989898; font-size: 13px;">By which mode of transport</p>
  <div class="row buttonsSwitch">
    <div class="col-md-4">
      <a href="#" class="btn transport {{isset($user_detail) && $user_detail->transport == 'walking' ? 'active' : ''}}" data-value="walking">Walking</a>
    </div>
    <div class="col-md-4">
      <a href="#" class="btn transport {{isset($user_detail) && $user_detail->transport == 'public' ? 'active' : ''}}" data-value="public">Public Transport</a>
    </div>
    <div class="col-md-4">
      <a href="#" class="btn transport {{isset($user_detail) && $user_detail->transport == 'taxi' ? 'active' : ''}}" data-value="taxi">Drive</a>
    </div>
  </div>
  <div class="row errors"></div>
</form>