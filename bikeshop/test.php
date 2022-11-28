
<form class="filter-form" action="">
          <div class="input-field">
          <div class="accessories-display-subtitle"><h2>BRANDS</h2></div>
          <div class="input-field-content">
            <div class="checkbox-div"><input type="checkbox" name="brand" value="raleigh" id="raleigh"><label for="raleigh">Raleigh</label></div>
            <div class="checkbox-div"><input type="checkbox" name="brand" value="focus" id="focus"><label for="focus">Focus</label></div>
            <div class="checkbox-div"><input type="checkbox" name="brand" value="felt" id="felt"><label for="felt">Felt</label></div>
            <div class="checkbox-div"><input type="checkbox" name="brand" value="specialized" id="specialized"><label for="specialized">Specialized</label></div>
            <div class="checkbox-div"><input type="checkbox" name="brand" value="trek" id="trek"><label for="trek">Trek</label></div>
            <div class="checkbox-div"><input type="checkbox" name="brand" value="pinarello" id="pinarello"><label for="pinarello">Pinarello</label></div>
            <div class="checkbox-div"><input type="checkbox" name="brand" value="bmc" id="bmc"><label for="bmc">BMC</label></div>
            <div class="checkbox-div"><input type="checkbox" name="brand" value="giant" id="giant"><label for="giant">Giant</label></div>
            <div class="checkbox-div"><input type="checkbox" name="brand" value="salsa" id="salsa"><label for="salsa">Salsa</label></div>
            <div class="checkbox-div"><input type="checkbox" name="brand" value="cannondale" id="cannondale"><label for="cannondale">Cannondale</label></div>
            <div class="checkbox-div"><input type="checkbox" name="brand" value="cervelo" id="cervelo"><label for="cervelo">Cervelo</label></div>
            <div class="checkbox-div"><input type="checkbox" name="brand" value="bianchi" id="bianchi"><label for="bianchi">Bianchi</label></div>
            <div class="checkbox-div"><input type="checkbox" name="brand" value="trinx" id="trinx"><label for="trinx">Trinx</label></div>
            <div class="checkbox-div"><input type="checkbox" name="brand" value="spanker" id="spanker"><label for="spanker">Spanker</label></div>
            </div>
            </div>
            <div class="input-field">
          <div class="accessories-display-subtitle"><h2>PRICE RANGE</h2></div>
          <div class="input-field-content">
            <div class="checkbox-div"><input type="checkbox" name="price" value="6-7k" id="6-7k"><label for="6-7k">₱6000 - ₱7000</label></div>
            <div class="checkbox-div"><input type="checkbox" name="price" value="8-9k" id="8-9k"><label for="8-9k">₱8000 - ₱9000</label></div>
            <div class="checkbox-div"><input type="checkbox" name="price" value="10-20k" id="10-20k"><label for="10-20k">₱10000 - ₱95000</label></div>
            <div class="checkbox-div"><input type="checkbox" name="price" value="20-40k" id="20-40k"><label for="20-40k">₱95000 - ₱40000</label></div>
            <div class="checkbox-div"><input type="checkbox" name="price" value="40-60k" id="40-60k"><label for="40-60k">₱40000 - ₱60000</label></div>
            <div class="checkbox-div"><input type="checkbox" name="price" value="60-80k" id="60-80k"><label for="60-80k">₱60000 - ₱80000</label></div>
            <div class="checkbox-div"><input type="checkbox" name="price" value="80upk" id="80upk"><label for="80upk">₱80000 and higher</label></div>
            </div>
            </div>
            <div class="input-buttons">
              <input type="submit" value="Filter" name="filter">
              <input type="reset" value="Reset" name="reset">
            </div>
          </form>

<div class="flowers">
  <div class="flower" data-id="aloe" data-category="giant trinx">Aloe</div>
  <div class="flower" data-id="lavendar" data-category="purple green medium africa europe">Lavender</div>
  <div class="flower" data-id="stinging-nettle" data-category="green large africa europe asia">Stinging Nettle</div>
  <div class="flower" data-id="gorse" data-category="green yellow large europe">Gorse</div>
  <div class="flower" data-id="hemp" data-category="green large asia">Hemp</div>
  <div class="flower" data-id="titan-arum" data-category="purple other giant asia">Titan Arum</div>
  <div class="flower" data-id="golden-wattle" data-category="green yellow large australasia">Golden Wattle</div>
  <div class="flower" data-id="purple-prairie-clover" data-category="purple green other medium north-america">Purple Prairie Clover</div>
  <div class="flower" data-id="camellia" data-category="pink other large north-america">Camellia</div>
  <div class="flower" data-id="scarlet-carnation" data-category="red medium north-america">Scarlet Carnation</div>
  <div class="flower" data-id="indian-paintbrush" data-category="red medium north-america">Indian Paintbrush</div>
  <div class="flower" data-id="moss-verbena" data-category="purple other small south-america">Moss Verbena</div>
  <div class="flower" data-id="climbing-dayflower" data-category="blue tiny south-america">Climbing Dayflower</div>
  <div class="flower" data-id="antarctic-pearlwort" data-category="green yellow large antarctica">Antarctic Pearlwort</div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>var $filterCheckboxes = $('input[type="checkbox"]');

$filterCheckboxes.on('change', function() {

  var selectedFilters = {};

  $filterCheckboxes.filter(':checked').each(function() {

    if (!selectedFilters.hasOwnProperty(this.name)) {
      selectedFilters[this.name] = [];
    }

    selectedFilters[this.name].push(this.value);

  });

 
  var $filteredResults = $('.flower');


  $.each(selectedFilters, function(name, filterValues) {


    $filteredResults = $filteredResults.filter(function() {

      var matched = false,
        currentFilterValues = $(this).data('category').split(' ');

      $.each(currentFilterValues, function(_, currentFilterValue) {



        if ($.inArray(currentFilterValue, filterValues) != -1) {
          matched = true;
          return false;
        }
      });

      return matched;

    });
  });

  $('.flower').hide().filter($filteredResults).show();

});
</script>