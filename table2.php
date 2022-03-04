<td><?php echo $show['uid']; ?></td>
                  <td><?php echo $show['sname']; ?></td>
                  <td><?php echo $show['sclass']; ?></td>
                  <td>
                     Present<input type="radio" name="attendance[<?php echo $show['uid']; ?>]" value="Present"  required > 
                     Absent<input type="radio" name="attendance[<?php echo $show['uid']; ?>]" value="Absent"  >
                  </td> <div class="table-responsive">
        <table class="table table-responsive table-borderless">
            <thead>
                <tr class="bg-light">
                    <th scope="col" width="20%">Date</th>
                    <th scope="col" width="10%">Status</th>
                    <th scope="col" width="20%">Customer</th>
                    <th scope="col" width="20%">Purchased</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $show['uid']; ?></td> 
                    <td><?php echo $show['sname']; ?></td>
                    <td><?php echo $show['sclass']; ?></td>
                    <td> Present<input type="radio" name="attendance[<?php echo $show['uid']; ?>]" value="Present"  required > 
                     Absent<input type="radio" name="attendance[<?php echo $show['uid']; ?>]" value="Absent"  ></td>
                </tr>
               
            </tbody>
        </table>