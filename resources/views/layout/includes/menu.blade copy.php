<ul class="list-unstyled menu-categories" id="accordionExample">
        @hasanyrole('User|Admin')

        <li class="menu {{ request()->is('dashboard') || request()->is('dashboard/*') ? 'active' : ''}}">
                <a href="#dashboard" data-bs-toggle="collapse" aria-expanded="{{ request()->is('dashboard') || request()->is('dashboard/*') ? 'true' : 'false'}}" class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns"><path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"></path></svg>
                        <span>Dashboard</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul id="dashboard" class="collapse submenu list-unstyled {{ request()->is('dashboard') || request()->is('dashboard/*') ? 'show' : ''}}"  data-bs-parent="#accordionExample">
                    <li class="{{ request()->is('dashboard') ? 'active' : ''}}">
                        <a href="/dashboard">Dashboard</a>
                    </li>
                                  
                </ul>
            </li>


            @hasrole('User')
            <li class="menu {{ request()->is('important_links') || request()->is('important_links/*') ? 'active' : ''}}">
                <a href="#links" data-bs-toggle="collapse" aria-expanded="{{ request()->is('important_links') || request()->is('important_links/*') ? 'true' : 'false'}}" class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns"><path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"></path></svg>
                        <span>Important Links</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul id="links" class="collapse submenu list-unstyled {{ request()->is('important_links') || request()->is('important_links/*') ? 'show' : ''}}"  data-bs-parent="#accordionExample">
                    <li class="{{ request()->is('important_links') ? 'active' : ''}}">
                        <a href="/important_links">View Links</a>
                    </li>
                                  
                </ul>
            </li>
            @endhasrole

            @hasrole('User')
            <li class="menu {{ request()->is('bv_log') || request()->is('bv_log/*') ? 'active' : ''}}">
                <a href="#bv" data-bs-toggle="collapse" aria-expanded="{{ request()->is('bv_log') || request()->is('bv_log/*') ? 'true' : 'false'}}" class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns"><path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"></path></svg>
                        <span>BV Log</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul id="bv" class="collapse submenu list-unstyled {{ request()->is('bv_log') || request()->is('bv_log/*') ? 'show' : ''}}"  data-bs-parent="#accordionExample">
                    <li class="{{ request()->is('bv_log') ? 'active' : ''}}">
                        <a href="/bv_log"> BV Log </a>
                    </li>
                                  
                </ul>
            </li>
            @endhasrole

            <li class="menu {{ request()->is('packages') || request()->is('packages/*') ? 'active' : ''}}">
                <a href="#packages" data-bs-toggle="collapse" aria-expanded="{{ request()->is('profile') || request()->is('profile/*') ? 'true' : 'false'}}" class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns"><path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"></path></svg>
                        <span>Packages</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul id="packages" class="collapse submenu list-unstyled {{ request()->is('packages') || request()->is('packages/*') ? 'show' : ''}}"  data-bs-parent="#accordionExample">
                    @hasrole('User')
                    <li class="{{ request()->is('packages') ? 'active' : ''}}">
                        <a href="/packages">Buy Packages </a>
                    </li>
                    @endhasrole
                                  
                </ul>
            </li>

            <li class="menu {{ request()->is('students') || request()->is('students/*') ? 'active' : ''}}">
                <a href="#order" data-bs-toggle="collapse" aria-expanded="{{ request()->is('students') || request()->is('students/*') ? 'true' : 'false'}}" class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns"><path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"></path></svg>
                        <span>Order Products</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul id="order" class="collapse submenu list-unstyled {{ request()->is('students') || request()->is('students/*') ? 'show' : ''}}"  data-bs-parent="#accordionExample">
                    <!-- <li class="{{ request()->is('students') ? 'active' : ''}}">
                        <a href="/students"> All Students </a>
                    </li> -->
                                  
                </ul>
            </li>
            @hasrole('User')
            <li class="menu {{ request()->is('referrals') ||  request()->is('referral_tree') || request()->is('referrals/*') ? 'active' : ''}}">
                <a href="#ref" data-bs-toggle="collapse" aria-expanded="{{ request()->is('referrals') ||  request()->is('referral_tree') || request()->is('referrals/*') ? 'true' : 'false'}}" class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns"><path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"></path></svg>
                        <span>My Refralls</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul id="ref" class="collapse submenu list-unstyled {{ request()->is('referrals') || request()->is('referrals/*') ? 'show' : ''}}"  data-bs-parent="#accordionExample">
                    <li class="{{ request()->is('referrals') ? 'active' : ''}}">
                        <a href="/referrals"> All Refrals </a>
                    </li>
                    <li class="{{ request()->is('referral_tree') ? 'active' : ''}}">
                        <a href="/referral_tree">Refral Tree</a>
                    </li>
                                  
                </ul>
            </li>
            @endhasrole

            @hasrole('User')
            <li class="menu {{ request()->is('network') || request()->is('network/*') ? 'active' : ''}}">
                <a href="#net" data-bs-toggle="collapse" aria-expanded="{{ request()->is('network') || request()->is('network/*') ? 'true' : 'false'}}" class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns"><path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"></path></svg>
                        <span>Sales Team</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul id="net" class="collapse submenu list-unstyled {{ request()->is('network') || request()->is('network/*') ? 'show' : ''}}"  data-bs-parent="#accordionExample">
                    <li class="{{ request()->is('network') ? 'active' : ''}}">
                        <a href="/network">Network Summary</a>
                    </li>
                                  
                </ul>
            </li>
            @endhasrole
            <li class="menu {{ request()->is('deposit_now') || request()->is('deposit_now/*') ? 'active' : ''}}">
                <a href="#dep" data-bs-toggle="collapse" aria-expanded="{{ request()->is('deposit_now') || request()->is('deposit_now/*') ? 'true' : 'false'}}" class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns"><path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"></path></svg>
                        <span>Deposit</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul id="dep" class="collapse submenu list-unstyled {{ request()->is('deposit_now') || request()->is('deposit_now/*') ? 'show' : ''}}"  data-bs-parent="#accordionExample">
                    @hasrole('User')
                    <li class="{{ request()->is('deposit_now') ? 'active' : ''}}">
                        <a href="/deposit_now">Deposit Now </a>
                    </li>
                    @endhasrole
                    @hasrole('Admin')
                    <li class="{{ request()->is('deposit_now') ? 'active' : ''}}">
                        <a href="/transactions">Deposit Transactions </a>
                    </li>
                    @endhasrole
                                  
                </ul>
            </li>

    <li class="menu {{ request()->is('withdraw') || request()->is('withdraw/*') ? 'active' : ''}}">
        <a href="#with" data-bs-toggle="collapse" aria-expanded="{{ request()->is('withdraw') || request()->is('withdraw/*') ? 'true' : 'false'}}" class="dropdown-toggle">
            <div class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns"><path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"></path></svg>
                <span>Withdraw Now</span>
            </div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </div>
        </a>
        <ul id="with" class="collapse submenu list-unstyled {{ request()->is('withdraw') || request()->is('withdraw/*') ? 'show' : ''}}"  data-bs-parent="#accordionExample">
            @hasrole('User')
            <li class="{{ request()->is('withdraw') ? 'active' : ''}}">
                <a href="/withdraw">Withdraw Now </a>
            </li>
            @endhasrole
            @hasrole('Admin')
            <li class="{{ request()->is('withdraw-transactions') ? 'active' : ''}}">
                <a href="/withdraw-transactions">Withdraw Transactions </a>
            </li>
            @endhasrole
        </ul>
    </li>


            <li class="menu {{ request()->is('transfer') || request()->is('transfer/*') ? 'active' : ''}}">
                <a href="#bal" data-bs-toggle="collapse" aria-expanded="{{ request()->is('transfer') || request()->is('transfer/*') ? 'true' : 'false'}}" class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns"><path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"></path></svg>
                        <span>Rp Transfer</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul id="bal" class="collapse submenu list-unstyled {{ request()->is('transfer') || request()->is('transfer/*') ? 'show' : ''}}"  data-bs-parent="#accordionExample">
                    <li class="{{ request()->is('transfer') ? 'active' : ''}}">
                        <a href="/transfer"> All Transfers </a>
                    </li>
                                  
                </ul>
            </li>

			@hasrole('Admin')
            <li class="menu {{ request()->is('transactions-history') || request()->is('transactions-history/*') ? 'active' : ''}}">
            <a href="#rep" data-bs-toggle="collapse" aria-expanded="{{ request()->is('transactions-history') || request()->is('transactions-history/*') ? 'true' : 'false'}}" class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns"><path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"></path></svg>
                        <span>Reports / History</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul id="rep" class="collapse submenu list-unstyled {{ request()->is('transactions_history') || request()->is('transactions_history/*') ? 'show' : ''}}"  data-bs-parent="#accordionExample">
                    <li class="{{ request()->is('transactions_history') ? 'active' : ''}}">
                        <a href="/transactions_history">Deposit History</a>
                    </li>

                <li class="{{ request()->is('withdraw-history') ? 'active' : ''}}">
                        <a href="/withdraw-history">WIthdraw History</a>
                    </li>

                                  
                </ul>
            </li>
            @endhasrole




            @hasrole('User')
            <li class="menu {{ request()->is('complaint') || request()->is('complaint/*') ? 'active' : ''}}">
                <a href="#cc" data-bs-toggle="collapse" aria-expanded="{{ request()->is('complaint') || request()->is('complaint/*') ? 'true' : 'false'}}" class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns"><path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"></path></svg>
                        <span> Complaint</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul id="cc" class="collapse submenu list-unstyled {{ request()->is('complaint') || request()->is('complaint/*') ? 'show' : ''}}"  data-bs-parent="#accordionExample">
                    <li class="{{ request()->is('complaint') ? 'active' : ''}}">
                        <a href="/complaint"> All Complaints </a>
                    </li>
                                  
                </ul>
            </li>
            @endhasrole



            @hasrole('User')
            <li class="menu {{ request()->is('ticket') || request()->is('ticket/*') ? 'active' : ''}}">
                <a href="#support" data-bs-toggle="collapse" aria-expanded="{{ request()->is('ticket') || request()->is('ticket/*') ? 'true' : 'false'}}" class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns"><path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"></path></svg>
                        <span>Support</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul id="support" class="collapse submenu list-unstyled {{ request()->is('ticket') || request()->is('ticket/*') ? 'show' : ''}}"  data-bs-parent="#accordionExample">
                    <li class="{{ request()->is('ticket') ? 'active' : ''}}">
                        <a href="/ticket"> All Support </a>
                    </li>
                                  
                </ul>
            </li>
            @endhasrole
            @hasrole('Admin')
            <li class="menu {{ request()->is('KYC') || request()->is('KYC/*') ? 'active' : ''}}">
                <a href="#kyc" data-bs-toggle="collapse" aria-expanded="{{ request()->is('KYC') || request()->is('KYC/*') ? 'true' : 'false'}}" class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns"><path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"></path></svg>
                        <span>KYC</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul id="kyc" class="collapse submenu list-unstyled {{ request()->is('KYC') || request()->is('KYC/*') ? 'show' : ''}}"  data-bs-parent="#accordionExample">
                    <li class="{{ request()->is('KYC') ? 'active' : ''}}">
                        <a href="/KYC">KYC Data</a>
                    </li>
                                  
                </ul>
            </li>
            @endhasrole

            
            @hasrole('Admin')
            <li class="menu {{ request()->is('stats') || request()->is('stats/*') ? 'active' : ''}}">
                <a href="#stats" data-bs-toggle="collapse" aria-expanded="{{ request()->is('stats') || request()->is('stats/*') ? 'true' : 'false'}}" class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns"><path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"></path></svg>
                        <span>Genealogy</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul id="stats" class="collapse submenu list-unstyled {{ request()->is('stats') || request()->is('stats/*') ? 'show' : ''}}"  data-bs-parent="#accordionExample">
                    <li class="{{ request()->is('stats') ? 'active' : ''}}">
                        <a href="/stats"> All Stats </a>
                    </li>
                                  
                </ul>
            </li>
            @endhasrole

            @hasrole('Admin')
            <li class="menu {{ request()->is('users') || request()->is('users/*') ? 'active' : ''}}">
            <a href="#users" data-bs-toggle="collapse" aria-expanded="{{ request()->is('users') || request()->is('users/*') ? 'true' : 'false'}}" class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns"><path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"></path></svg>
                        <span>Users</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul id="users" class="collapse submenu list-unstyled {{ request()->is('users') || request()->is('users/*') ? 'show' : ''}}"  data-bs-parent="#accordionExample">
                    <li class="{{ request()->is('users') ? 'active' : ''}}">
                        <a href="/users">All Users</a>
                    </li>
                 </ul>
            </li>
            @endhasrole

            
            @hasrole('Admin')
            <li class="menu {{ request()->is('users_packages') || request()->is('users_packages/*') ? 'active' : ''}}">
            <a href="#users_packages" data-bs-toggle="collapse" aria-expanded="{{ request()->is('users_packages') || request()->is('users_packages/*') ? 'true' : 'false'}}" class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns"><path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"></path></svg>
                        <span>Users packages</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul id="users_packages" class="collapse submenu list-unstyled {{ request()->is('users_packages') || request()->is('users_packages/*') ? 'show' : ''}}"  data-bs-parent="#accordionExample">
                    <li class="{{ request()->is('users_packages') ? 'active' : ''}}">
                        <a href="/users_packages">All Users packages</a>
                    </li>
                 </ul>
            </li>
            @endhasrole

            
            
            <li class="menu {{ request()->is('user-profile') || request()->is('user-profile/*') ? 'active' : ''}}">
                <a href="#profile" data-bs-toggle="collapse" aria-expanded="{{ request()->is('user-profile') || request()->is('user-profile/*') ? 'true' : 'false'}}" class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns"><path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"></path></svg>
                        <span>Profile</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul id="profile" class="collapse submenu list-unstyled {{ request()->is('user-profile') || request()->is('user-profile/*') ? 'show' : ''}}"  data-bs-parent="#accordionExample">
                    <li class="{{ request()->is('user-profile') ? 'active' : ''}}">
                        <a href="/user-profile">Profile </a>
                    </li>
                                  
                </ul>
            </li>

            <li class="menu {{ request()->is('login-history') || request()->is('login-history/*') ? 'active' : ''}}">
                <a href="#login_history" data-bs-toggle="collapse" aria-expanded="{{ request()->is('login-history') || request()->is('login-history/*') ? 'true' : 'false'}}" class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns"><path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"></path></svg>
                        <span>Login History</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul id="login_history" class="collapse submenu list-unstyled {{ request()->is('login-history') || request()->is('login-history/*') ? 'show' : ''}}"  data-bs-parent="#accordionExample">
                    <li class="{{ request()->is('login-history') ? 'active' : ''}}">
                        <a href="/login-history">Login history</a>
                    </li>
                                  
                </ul>
            </li>


            <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>Main Menu</span></div>
            </li>
           

            
           
     
           


         
            
        @endhasanyrole
          
            
        </ul>