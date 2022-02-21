<!-- This page is using Bootstrap 4 CSS Style -->
<!-- MUHAMAD ASHRAFF BIN OTHMAN -->
<!-- ISB42503 - INTERNET PROGRAMMING -->
<!-- UNIVERSITI KUALA LUMPUR -->
<html>
    <head>
        <title>Ticket Price</title>
        <?php
        include ('includes/header.html');
        ?>
    </head>

    <body>
        <!-- Background Animation -->
        <div id="tsparticles"></div>
        <script src='includes/tsparticles.min.js'></script><script  src="includes/script.js"></script>
        <br>

        <?php
            //CREATE AND DECLARE ARRAY TO STORE VALUE OF TICKET PRICE, DEPARTURE DAY AND  DEPARTURE TIME
            $tablePrice = array(
                array(8,8,8,8,6), //SATURDAY
                array(8,8,8,8,6), //SUNDAY
                array(6,6,6,6,5), //MONDAY
                array(6,6,6,6,5), //TUESDAY
                array(6,6,6,6,5), //WEDNESDAY
                array(6,6,6,6,5), //THURSDAY
                array(6,6,6,6,5)  //FRIDAY
            );//END OF ARRAY

            $tableDay  = array("Saturday", "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday");
            $tableTime = array("7:00", "10:00", "13:00", "16:00", "21:00");

            if ($_SERVER['REQUEST_METHOD']=='POST') {
                //HANDLE

                //VALIDATE DAY // TIME
                if (empty($_POST['day']) || empty($_POST['time'])){
                    
                    cardHeader();   
                    echo '<div class="alert alert-danger shadow-lg" role="alert">                
                    <h4 class="alert-heading">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-emoji-dizzy" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M9.146 5.146a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708.708l-.647.646.647.646a.5.5 0 0 1-.708.708l-.646-.647-.646.647a.5.5 0 1 1-.708-.708l.647-.646-.647-.646a.5.5 0 0 1 0-.708zm-5 0a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 1 1 .708.708l-.647.646.647.646a.5.5 0 1 1-.708.708L5.5 7.207l-.646.647a.5.5 0 1 1-.708-.708l.647-.646-.647-.646a.5.5 0 0 1 0-.708zM10 11a2 2 0 1 1-4 0 2 2 0 0 1 4 0z"/>
                    </svg>
                    Oopss !</h4>
                    <p class="mb-0">It looks like there is an error occurred while we are trying to get your information to be processed.</p>
                    <hr>';

                    //SHOW ERROR MESSAGE FOR DAY
                    if (empty($_POST['day'])) {
                        $S_day = NULL;
                        errorMessage('You forgot to select departure day !');
                    }//END IF

                    //SHOW ERROR MESSAGE FOR TIME
                    if (empty($_POST['time'])) {
                        $S_time = NULL;
                        errorMessage('You forgot to select departure time !');
                    }//END IF

                    //SHOW WARNING MESSAGE
                    echo '<!-- Warning Message -->
                    <hr>
                    <div class="alert alert-danger" role="alert">
                    <center>Please go back and fill out the form again.</center>
                    </div>';
                    echo '<center><button class="btn btn-danger type="button" onclick="history.back();">< Back</button></center>';
                    echo '</div>';
                    cardFooter();

                    //IF ELSE NO ERROR, THEN PROCEED
                }else {

                    //ASSIGN VALUE TO VARIABLE
                    $S_day =  $_POST['day'];
                    $S_time = $_POST['time'];
                    
                    //SHOW THE OUTPUT
                    if($S_day && $S_time){
                        cardHeader();
                        echo '<!-- Bootstrap Alert -->
                        <div id="alert" class="alert alert-success alert-dismissible mb-200 pb-200 shadow">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <center><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </svg> Result has been successfully generated</center>
                        </div>';
                        
                        echo '<div class="card shadow-sm">
                        <div class="card-body">';
                        
                        //OUTPUT DEPARTURE DAY
                        echo '<p><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-week" viewBox="0 0 16 16">
                        <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                        </svg>  Departure Day : <strong>'.$S_day.'</strong></p>';

                        //OUTPUT DEPARTURE TIME IN 12HOUR AND 24HOUR
                        echo '<p><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                        <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
                        </svg>  Departure Time : <strong>'.$S_time." / ".date("g:iA", strtotime($S_time))."</strong><br></p>";
                        
                        //OUTPUT TICKET PRICE IN 2 DECIMAL POINT
                        echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z"/>
                        <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z"/>
                        <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z"/>
                        <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z"/>
                        </svg>  Ticket Price : <strong> RM'.number_format(getPrice($S_day, $S_time),2)."</strong>";

                        echo '</div></div><br>';
    
                        //BUTTON TO SHOW PRICE TABLE
                        echo '<center>
                        <button class="btn btn-primary btn shadow-lg" type="button" data-toggle="collapse" data-target="#tablePrice" aria-expanded="false" aria-controls="tablePrice"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-table" viewBox="0 0 16 16">
                        <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z"/>
                        </svg>
                        Show price table
                        </button>

                        <!-- BUTTON TO BACK TO INPUT PAGE --> 
                        <button class="btn btn-success btn shadow-lg type="button" onclick="history.back();"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                        <path d="M13.485 1.431a1.473 1.473 0 0 1 2.104 2.062l-7.84 9.801a1.473 1.473 0 0 1-2.12.04L.431 8.138a1.473 1.473 0 0 1 2.084-2.083l4.111 4.112 6.82-8.69a.486.486 0 0 1 .04-.045z"/>
                        </svg>
                        OK</button></center>
                        <br>

                        <div class="collapse" id="tablePrice">';
                        //INVOKE FUNCTION TO GET TABLE PRICE
                        echo gettablePrice($S_day, $S_time);
                        echo '</div>';

                        cardFooter();
                    }//END IF
                    
                }//END IF

                //IF NO SUBMIT ACTION IS PERFORMED, THEN SHOW INPUT FORM
            }else {
                //SHOW FORM
                cardHeader();
                echo '<!-- Bootstrap Alert -->
                    <div id="alert" class="alert alert-info alert-dismissible mb-200 pb-200 shadow">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                    </svg> Please input all of the information below.</center>
                    </div>
                    

                    <!-- Using Post Method -->
                    <form method="post" action="ticket.php">

                        <!--INPUT DAY -->
                        <label><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-calendar-week" viewBox="0 0 16 16">
                        <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                        </svg>  Select departure day :</label>
                        <select class="form-control shadow-sm" name="day">
                        <option selected disabled>Day</option>';
                        for($i=0; $i<count($tableDay); $i++){
                            echo "<option>".$tableDay[$i]."</option>";
                        }//END FOR
                        echo '</select><br>';
                        
                        echo'<!-- INPUT TIME-->
                        <label><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                        <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
                        </svg> Select departure time :</label>
                        <select class="form-control shadow-sm" name="time">
                        <option selected disabled>Time</option>';
                        for($i=0; $i<count($tableTime); $i++){
                            echo "<option>".$tableTime[$i]."</option>";
                        }//END FOR
                        echo '</select><br>';
    
                        echo '<!-- Submit Button -->
                        <div align="center">
                        <input type="submit" name="submit" value="  Check Price > "  class="btn btn-primary shadow-lg"/>
                        </div>';
                    echo '</form>';
                cardFooter();

            }//END IF

            //FUNCTION TO GET TICKET PRICE FROM PAYMENT TABLE
             //USING VALUES OF DAY AND TIME TO SEARCH FOR PRICE
            function getPrice($S_day, $S_time){
                global $tablePrice, $tableDay, $tableTime;
                $indexDay = array_search($S_day, $tableDay);
                $indexTime = array_search($S_time, $tableTime);
                return $tablePrice[$indexDay][$indexTime]; //RETURN VALUE OF PRICE BASED ON VALUES OF DAY AND TIME
            }//END FUNCTION

            //FUNCTION TO SHOW TABLE PRICE
            function gettablePrice($S_day, $S_time){
                global $tableTime,$tableDay,$tablePrice;
                $indexDay = array_search($S_day, $tableDay);
                $indexTime = array_search($S_time, $tableTime);
                echo '<table class="table table-hover shadow-lg tableprimary">
                        <thead>
                          <tr>
                            <th scope="col"><small>Day/Time</th>';
                            //USING FOR LOOP TO DISPLAY TABLE TIME
                            for ($i=0; $i<count($tableTime); $i++){
                                $boldTime = "";
                                $colourTime ='';
                                if ($tableTime[$i] == $S_time){
                                    $boldTime = "<strong>";
                                    $colourTime ='class="text-primary"';
                                }//END IF
                                echo '<th '.$colourTime.' scope="col"><small>'.$boldTime.$tableTime[$i].'</th>';
                            }//END LOOP
                        echo '</tr>
                        </thead>
                        <tbody>';
                            //NESTED LOOP
                                //OUTER LOOP
                            for ($i=0; $i<count($tableDay); $i++){
                                $tableColour = "table-info";
                                $boldDay = "";
                                $colourDay = '';
                                if ($tableDay[$i] == $S_day){
                                    $tableColour = "table-success";
                                    $boldDay = "<strong>";
                                    $colourDay = 'class="text-primary"';
                                }//END IF

                                echo '<tr class="'.$tableColour.'">
                                        <th '.$colourDay.' scope="row"><small>'.$boldDay.$tableDay[$i].'</th>';
                                        //INNER LOOP
                                    for ($j=0; $j<count($tableTime); $j++){
                                            $boldItem = "";
                                            $colourItem = "";
                                            if ($i == $indexDay && $j == $indexTime){
                                                $boldItem = "<strong>";
                                                $colourItem = 'class="text-success"';
                                            }//END IF
                                        echo '<td '.$colourItem.'><small>'.$boldItem.'RM '.$tablePrice[$i][$j].'</td>';
                                    }//END INNER LOOP
                            echo '</tr>'; 
                            }//END OUTER LOOP
                        echo '</tbody>
                        </table>';
            }//END FUNCTION
            
            //FUNCTION TO CALL BOOTSTRAP CARD HEADER
            function cardHeader(){
                echo '<!-- Bootstrap Card -->
                <div class="container">
                <div class="card mx-auto shadow-lg" style="width: 30rem;">
                <h5 class="card-header lead shadow-sm"><center><img src="includes\imageres\icon_ticket.png" class="float"> Bus Ticket Price</center></h5>
                <div class="card-body ">';
            }//END FUNCTION

            //FUNCTION TO CALL BOOTSTRAP CARD FOOTER
            function cardFooter(){
            echo'</div>
                </div>
                </div>';
            }//END FUNCTION

            //FUNCTION TO DISPLAY ERROR MESSAGE
            function errorMessage(String $message){
                echo '<p>';
                echo '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                </svg>';
                echo $message;
                echo '</p>';
            }//END FUNCTION
        ?>
        
        <?php
        include ('includes/footer.html');
        ?>
    </body>
</html>
