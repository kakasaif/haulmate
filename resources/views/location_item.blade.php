<h2 class="dashboard__title-main">{{$location->title}} 
    @if (count($user_pref_ids) > 0)
    <span class="dashboard__match {{$location->perc_match >= 75 ? 'active' : ''}}">{{number_format($location->perc_match)}}% Match</span>
    @endif
</h2> 
@if (empty($user->live_close))
<p>Within {{ $location->time_distance }} mins by public transport from city centre</p>
@else
<p>Within {{ $location->time_distance }} mins by {{ $location->transport }} from your preferred location ({{$user->live_close}})</p>
@endif
<table class="info">
    <tbody>
        <tr>
            <td>
                <span>Rent starting from</span>
                <span>${{number_format($location->avg_rent)}}</span>
            </td>
            <td>
                @if (empty($user->live_close))
                <span>Distance to city centre</span>
                @else
                <span>Distance to your preferred location</span>
                @endif
                <span>{{number_format($location->distance_from_location, 2) . ' kms'}}</span>
            </td>
        </tr>
    </tbody>
</table>
