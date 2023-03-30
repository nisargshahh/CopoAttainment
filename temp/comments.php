<script type='text/javascript'>
    $(document).ready(function(){
      $("select[id='co_name']").change(function(){
        var co_array = [];
        if (localStorage.getItem('co_array') === null) {
          // localStorage.setItem('co_array', co_array);
        } else {
          co_array = JSON.parse(localStorage.getItem('co_array'));
        }

        var cos = $('select[id^="co_name"]').get();
        $(cos).each(function(index, value){
          if(co_array[index] !== value.value) {
            co_array[index] = value.value;
            localStorage.setItem('co_array', JSON.stringify(co_array));
          } else if (co_array.includes(value.value)) {
            if (co_array[index] !== value.value) {
              co_array[index] = value.value;
              localStorage.setItem('co_array', JSON.stringify(co_array));
            }
          } else {
            co_array.push(value.value);
            localStorage.setItem('co_array', JSON.stringify(co_array));
            return false;
          }
        })

        var final_array = JSON.parse(localStorage.getItem('co_array'));
        var new_array = new Array();
        new_array.push(final_array[0]);
        console.log(new_array);
        for (var i=1; i<final_array.length; i++) {
          if (final_array[i] === '0') {
            console.log("inside if");
          } else {
            if (new_array.includes(final_array[i])) {
              var html = $.parseHTML("<p id='target_value' name='target_value[]'>hello</p>");
              // console.log(html);
              var target_vals = $('select[id^="target_value"]').get();
              target_vals[i] = html[0];
              $('#target_value').replaceWith(target_vals);
              var target_vals = $('select[id="target_value"]').get();
              console.log(target_vals);
            } else {
              new_array.push(final_array[i]);
            }
          }
        }
      })
    })
  </script>


<!-- ----------------------------------Target value code for upper and lower range------------------------- -->
<div class="input-field">
          <table id="customers">
            <tr>
              <th></th>
              <th>Lower range</th>
              <th>Upper range</th>
            </tr>
            <?php
              // for ($i=0; $i<$number_quests; $i++) {
              //   echo "<tr>";
              //     echo "<td>Range for Q".strval($i+1).":</td>";
              //     echo "<td>";
              //       echo '<select name="quests_max_levels[]" class="mySelect">';
              //         echo '<option value=0>Select lower range</option>';
              //         for ($j=40; $j<=100; $j+=10) {
              //           echo '<option value='.$j.'>'.$j.'%</option>';
              //         }
              //       echo '</select>';
              //     echo '</td>';
              //     echo "<td>";
              //       echo '<select name="quests_min_levels[]" class="mySelect">';
              //         echo '<option value=0>Select upper range</option>';
              //         for ($j=40; $j<=100; $j+=10) {
              //           echo '<option value='.$j.'>'.$j.'%</option>';
              //         }
              //       echo '</select>';
              //     echo '</td>';
              //   echo "</tr>";
              // }
              for($i=0; $i<count($sub_quests_array); $i++) {
                if ($sub_quests_array[$i] == 0) {
                  echo "<tr>";
                    echo "<td>Range for Q".strval($i+1).":</td>";
                    echo "<td>";
                      echo '<select name="quests_max_levels[]" class="mySelect">';
                        echo '<option value=0>Select lower range</option>';
                        for ($j=40; $j<=100; $j+=10) {
                          echo '<option value='.$j.'>'.$j.'%</option>';
                        }
                      echo '</select>';
                    echo '</td>';
                    echo "<td>";
                      echo '<select name="quests_min_levels[]" class="mySelect">';
                        echo '<option value=0>Select upper range</option>';
                        for ($j=40; $j<=100; $j+=10) {
                          echo '<option value='.$j.'>'.$j.'%</option>';
                        }
                      echo '</select>';
                    echo '</td>';
                  echo "</tr>";
                } else {
                  for ($j=0; $j<$sub_quests_array[$i]; $j++) {
                    echo "<tr>";
                      echo "<td>Range for Q".strval($i+1).":</td>";
                      echo "<td>";
                        echo '<select name="quests_max_levels[]" class="mySelect">';
                          echo '<option value=0>Select lower range</option>';
                          for ($j=40; $j<=100; $j+=10) {
                            echo '<option value='.$j.'>'.$j.'%</option>';
                          }
                        echo '</select>';
                      echo '</td>';
                      echo "<td>";
                        echo '<select name="quests_min_levels[]" class="mySelect">';
                          echo '<option value=0>Select upper range</option>';
                          for ($j=40; $j<=100; $j+=10) {
                            echo '<option value='.$j.'>'.$j.'%</option>';
                          }
                        echo '</select>';
                      echo '</td>';
                    echo "</tr>";
                  }
                }
              }
            ?>
          </table><br>
        </div>