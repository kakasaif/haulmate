<h2>What's important to you when selecting an area to live in?</h2>
<p>Receive recommendations on which areas will best suit your lifestyle and preferences</p>

<div class="areas">
  <div class="row">
    @if(!empty($preferences))
    @php
      $selected = "";
      if (isset($user_detail) && isset($user_detail->preferences)) {
        $user_preferences = $user_detail->preferences;
        $user_preferences_arr = array();
        foreach ($user_preferences as $preference) {
          $user_preferences_arr[] = $preference->preference;
        }
      }
    @endphp
    @foreach($preferences as $preference)
    @php
        if (isset($user_preferences_arr)) {
          $selected = in_array($preference->preference, $user_preferences_arr) ? 'active' : '';
        }
    @endphp
    <div class="col-md-4">
      <div class="areas__item {{$selected}}" data-id="{{$preference->id}}">
        <div class="areas__item--icon">
          <img src="{{$preference->icon_url}}" />
        </div>
        <div class="areas__item--text">{{$preference->preference}}</div>
      </div>
    </div>
    @endforeach
    @endif
  </div>
</div>