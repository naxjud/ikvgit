<?php 
    include 'header.php';

?>
        <div class="row">
            <div class="col-md-12">
                <form role="form" class="form-horizontal" method="get" id="daten">
                    <div class="form-group has-feedback">
                    <div class="col-md-offset-3 col-md-3">
                            <select id="monat" type="month" class="form-control">
                                <option value="1">Januar</option>
                                <option value="2">Februar</option>
                                <option value="3">M&auml;rz</option>
                                <option value="4">April</option>
                                <option value="5">Mai</option>
                                <option value="6">Juni</option>
                                <option value="7">Juli</option>
                                <option value="8">August</option>
                                <option value="9">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Dezember</option>

                            </select>
                        </div>
                        <div class="col-md-2">
                            <input type="number" class="form-control" name="jahr" id="jahr" min="2015">
                        </div>
                        
                    </div>

                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table id="cal" class="kalender">
                    <thead>
                        <tr>
                            <th scope="col"><span title="Monday">Mo</span></th>
                            <th scope="col"><span title="Tuesday">Di</span></th>
                            <th scope="col"><span title="Wednesday">Mi</span></th>
                            <th scope="col"><span title="Thursday">Do</span></th>
                            <th scope="col"><span title="Friday">Fr</span></th>
                            <th scope="col"><span title="Saturday">Sa</span></th> 
                            <th scope="col"><span title="Sunday">So</span></th>
                        </tr>
                    </thead>
                    <tbody>

                   </tbody>
                </table> 

            </div>
        </div>
        <br>

 <?php
 include 'footer.php';
 ?>

