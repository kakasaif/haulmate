$('#movingToFilterForm').on('submit', function (e) {
  e.preventDefault();
  var url = $(this).attr('action');
  var data = $(this).serialize() + '&'+$.param({ 'limit': $(this).data('limit') });
  $.ajax({
    url: url,
    data: data,
    method: 'POST',
    success: function (result) {
      // update moving table
      $('#movingTable tbody, table[data-type="movings"] tbody').html('');
      var html_row = '';
      result.forEach((row, index) => {
        html_row += `
              <tr>
                  <th scope="row">${index + 1}</th>
                  <td>${row.country}</td>
                  <td>${row.moving_from_count}</td>
              </tr>
          `;
      });
      $('#movingTable tbody, table[data-type="movings"] tbody').html(html_row);

      // update map
      const list = [];
      for (i in result) {
        var {
          latitude,
          longitude,
          moving_from_count
        } = result[i];
        list.push(moving_from_count);
      }

      let listMax = Math.max.apply(null, list);

      markersLayer.clearLayers();
      for (i in result) {
        var {
          latitude,
          longitude,
          moving_from_count,
        } = result[i];
        var popup = `Moving from: ${moving_from_count}`;

        if (moving_from_count == 0) {
          continue;
        }

        var marker = L.circleMarker([latitude, longitude], {
          color: '#8e5ea2',
          fillColor: '#8e5ea2',
          fillOpacity: 0.5,
          width: 0.5
        }).bindPopup(popup);
        // add marker
        markersLayer.addLayer(marker);
      }
    },
  });
});

$('#movingToFilter').on('change', function (e) {
  $('#movingToFilterForm').submit();
});
