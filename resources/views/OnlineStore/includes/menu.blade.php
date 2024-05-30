<ul>
                           
                              <li><a class="text-light active" href="/store">B2B</a></li>
                              <li><a class="text-light" href="/store2">
                              @if(auth()->user() && auth()->user()->plan_id>0)
                                  B2C
                                 @else
                                 C2C
                              @endif
                              </a></li>
                             
                           </ul>