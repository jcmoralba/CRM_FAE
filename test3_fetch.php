<?php
include 'includes/connect.php';
            $sql = "SELECT * FROM norbar WHERE stat='0' LIMIT 40";
            $stmt = $con1->prepare($sql);
            $stmt->execute();
            while ($row = $stmt->fetch()) {
            ?>
                <form action="test3_process.php" method="post">
                    <tr>
                        <td>
                            <input type="text" name="id" value="<?php echo $row['id']; ?>">
                        </td>
                        <td>
                            <input type="text" name="model_id" value="<?php echo $row['COL 1']; ?>">
                        </td>
                        <td>
                            <!-- <input type="text" name="item_name" value="<?php echo $row['COL 2']; ?>"> -->
                            <textarea name="item_name" id="" cols="30" rows="10"><?php echo $row['COL 2']; ?></textarea>
                        </td>
                        <td>
                            <textarea name="desc" id="" cols="30" rows="10"><?php echo nl2br($row['COL 4']); ?></textarea>
                        </td>
                        <!-- <td>
                            <textarea name="specs" id="" cols="30" rows="10"><?php echo nl2br($row['COL 4']); ?></textarea>
                            <input type="text" name="specs1" value="<?php echo nl2br($row['COL 4']); ?>">    
                        </td> -->
                        <td>
                            <textarea name="specs" id="" cols="30" rows="10"><?php echo nl2br($row['COL 3']); ?></textarea>

                        </td>
                        <td>
                            <input type="text" name="pics" value="<?php echo $row['COL 5']; ?>">
                        </td>
                        <td>
                            <input type="text" name="status" value="<?php echo $row['COL 6']; ?>">
                        </td>
                        <td>
                            <button name="submit" type="submit" id="123" onclick="jc()" class="btn btn-success">convert</button>
                        </td>
                    </tr>
                </form>
            <?php } ?>