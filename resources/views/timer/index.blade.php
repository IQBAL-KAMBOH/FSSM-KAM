
<?php 
                 
                  $globalSettings=App\Http\Controllers\Admin\AdminAccountDetailsController::globalSettings();
                
                  
                  date_default_timezone_set("Asia/Karachi");
                  $givenTime =$globalSettings->timer_ending_date;
                  $givenTime=date("Y-m-d h:m:s",strtotime($givenTime));
                  $currentTimestamp = time(); // Current timestamp
                     
                  $givenTimestamp = strtotime($givenTime);
                   
                
                   
              ?>  
              
              
              @if($globalSettings->timer_status=='Active')
              <div class="p-4 m-4 " style="text-align:center;">
                           <div class="row mb-3">
                             <h1 class="mb-2" style="color:#3D405B;">
                              {{$globalSettings->timer_title}}
                             </h1>
                             
                          </div>
                          <style>
                  .countdown-container {
                      display: flex;
                      justify-content:center;
                      align-items: center;
                      text-align: center;
                  }
              
                  .countdown-item {
                      margin-top: 10px;
                  }
              
                  #days,
                  #hours,
                  #minutes,
                  #seconds {
                      background-color:black;
                      color: white;
                      padding: 15px;
                      width: 65px;
                      border-radius: 5px;
                      font-size: 18px; /* Set your desired font size for larger screens */
                  }
                  .text-span{
                        margin-top:15px;
                        
                        font-size:12px;
                    }
                    .dot-span{
                       margin-left:5px;
                       margin-right:5px;
                        font-size:18px;
                    }
              
                  @media (max-width: 768px) {
                      /* Adjust styles for screens with a maximum width of 768 pixels (typical for tablets and smaller screens) */
                      #days,
                      #hours,
                      #minutes,
                      #seconds {
                          font-size: 18px;
                          padding: 15px; /* Set your desired font size for smaller screens */
                      }
              
                      .text-span{
                        margin-top:10px;
                        font-size:12px;
                      }
                  }
              </style>
              
              <div class="countdown-container">
                  <div class="countdown-item">
                      <span id="days">00</span><span class="dot-span">:</span>
                      
                      <div class="text-span" style="margin-left:-10px;">Days</div>
                  </div>
                  <div class="countdown-item">
                      <span id="hours">00</span><span class="dot-span">:</span>
                      <div class="text-span" style="margin-left:-10px;">Hours</div>
                  </div>
                  <div class="countdown-item">
                      <span id="minutes">00</span><span class="dot-span">:</span>
                      <div class="text-span" style="margin-left:-10px;">Minutes</div>
                  </div>
                  <div class="countdown-item">
                      <span id="seconds">00</span>
                      <div class="text-span">Seconds</div>
                  </div>
              </div>
              
                         
                         <div class="row">
                           <!-- <div class="col-4 ">
                             <a href="#pro" class="mt-4 btn btn-danger">Claim deal</a>
                           </div> -->
                         </div>
                         </div>
              
                   @endif
                      
                         
                         <script>
                      // Get the end date from your PHP variable (e.g., $endDate)
                      var endDateTime = new Date("{{$givenTime}}");
                      var totalSeconds = Math.floor((endDateTime - new Date()) / 1000); // Calculate total seconds from now until the end date
              
                      var daysLabel = document.getElementById("days");
                      var hoursLabel = document.getElementById("hours");
                      var minutesLabel = document.getElementById("minutes");
                      var secondsLabel = document.getElementById("seconds");
              
                      // Call the initial update of the countdown timer
                      setTime();
              
                      // Update the countdown timer every second
                      setInterval(setTime, 1000);
              
                      function setTime() {
                          if (totalSeconds > 0) {
                              --totalSeconds;
                              var days = Math.floor(totalSeconds / (24 * 60 * 60));
                              var hours = Math.floor((totalSeconds % (24 * 60 * 60)) / (60 * 60));
                              var minutes = Math.floor((totalSeconds % (60 * 60)) / 60);
                              var seconds = totalSeconds % 60;
              
                              daysLabel.innerHTML = pad(days);
                              hoursLabel.innerHTML = pad(hours);
                              minutesLabel.innerHTML = pad(minutes);
                              secondsLabel.innerHTML = pad(seconds);
                          } else {
                              // Timer has ended
                              daysLabel.innerHTML = "00";
                              hoursLabel.innerHTML = "00";
                              minutesLabel.innerHTML = "00";
                              secondsLabel.innerHTML = "00";
                          }
                      }
              
                      function pad(val) {
                          var valString = val + "";
                          if (valString.length < 2) {
                              return "0" + valString;
                          } else {
                              return valString;
                          }
                      }
                  </script>