<?php
            $co_list = Array();
            $query1 = "SELECT * FROM co_list";
            $result1 = $conn-> query($query1);
            while($row1 = $result1-> fetch_array()) {
              array_push($co_list, $row1[1]);
            }
            for ($k=0; $k<count($co_list); $k++) {
              echo "<tr>";
                echo "<td>";
                  echo $co_list[$k];
                echo "</td>";
                echo "<td>";
                  echo "<input type=text name='co_statement' placeholder='Enter Here' />";
                echo "</td>";
                echo "<td>";
                  echo "<input type=text size=3 name='hours' placeholder='hours' />";
                echo "</td>";
                  for ($i=0; $i<$no_pos; $i++) {
                    echo "<td>";
                      echo '<select name="pos[]">';
                        echo '<option value="0">Select PO</option>';
                        for ($j=1; $j<=15; $j++) {
                          echo "<option value=$j>$j</option>";
                        }
                      echo "</select>";
                    echo "</td>";
                  }
              echo "</tr>";
            }
          ?>