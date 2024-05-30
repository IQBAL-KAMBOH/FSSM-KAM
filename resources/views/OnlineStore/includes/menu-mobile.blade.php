


                <div id="mySidenav" class="sidenav">
                     <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
             
                              <a href="/store">B2B</a>
                              <a href="/store2"> @if(auth()->user() && auth()->user()->plan_id>0)
                        B2C
                        @else
                        C2C
                        @endif</a>
                              <hr class="text-light">
                             
                  </div>