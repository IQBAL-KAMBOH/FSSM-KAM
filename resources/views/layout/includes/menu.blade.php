
<ul class="list-unstyled menu-categories" id="accordionExample">
@hasanyrole('User|Admin')

            <li class="menu {{ request()->is('dashboard') || request()->is('dashboard/*') ? 'active' : ''}}">

                <a href="#dashboard" data-bs-toggle="collapse" aria-expanded="{{ request()->is('dashboard') ? 'true' : 'false'}}" class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns"><path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"></path></svg>
                        <span>Dashboard</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ request()->is('dashboard') ? 'show' : ''}}" id="dashboard" data-bs-parent="#accordionExample">
                    <li class="{{ request()->is('dashboard') ? 'active' : ''}}">
                        <a href="dashboard">Dashboard </a>
                    </li>
                                  
                </ul>
            </li>
    
            @hasrole('User')
            
            <li class="menu {{ request()->is('stats') || request()->is('stats/*') ? 'active' : ''}}">
                <a href="#stats" data-bs-toggle="collapse" aria-expanded="{{ request()->is('stats') || request()->is('students/*') ? 'true' : 'false'}}" class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns"><path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"></path></svg>
                        <span>Genealogy</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul id="stats" class="collapse submenu list-unstyled {{ request()->is('students') || request()->is('students/*') ? 'show' : ''}}"  data-bs-parent="#accordionExample">
                    <li class="{{ request()->is('stats') ? 'active' : ''}}">
                        <a href="/stats"> All Stats </a>
                    </li>
                                  
                </ul>
            </li>
            @endhasrole

            <!-- Unilevel Passive Income -->
            @hasrole('User')
            @if(auth()->user()->plan_id!=NULL || auth()->user()->plan_id>0)
            <li class="menu {{ request()->is('unilevel-network-summary') ||  request()->is('unilevel-income') || request()->is('unilevel-income/*') ? 'active' : ''}}">
                <a href="#unilevel-income" data-bs-toggle="collapse" aria-expanded="{{ request()->is('unilevel-income') || request()->is('unilevel-income/*') ? 'true' : 'false'}}" class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns"><path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"></path></svg>
                        <span>Unilevel</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul id="unilevel-income" class="collapse submenu list-unstyled {{ request()->is('unilevel-income') || request()->is('unilevel-income/*') ? 'show' : ''}}"  data-bs-parent="#accordionExample">
                    <li class="{{ request()->is('unilevel-income') ? 'active' : ''}}">
                        <a href="/unilevel-income">Passive Income</a>
                    </li>
                                  
                </ul>
            </li>
            @endif
            @endhasrole
            <!-- Unilevel Passive Income end-->
             <!-- Affiliate Passive Income -->
             @hasrole('User')
             @if(auth()->user()->plan_id==NULL || auth()->user()->plan_id<1)
            
            <li class="menu {{ request()->is('affiliate-income') || request()->is('affiliate-income/*') ? 'active' : ''}}">
                <a href="#affiliate-income" data-bs-toggle="collapse" aria-expanded="{{ request()->is('affiliate-income') || request()->is('affiliate-income/*') ? 'true' : 'false'}}" class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns"><path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"></path></svg>
                        <span>Affiliate</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul id="affiliate-income" class="collapse submenu list-unstyled {{ request()->is('affiliate-income') || request()->is('affiliate-income/*') ? 'show' : ''}}"  data-bs-parent="#accordionExample">
                    <li class="{{ request()->is('affiliate-income') ? 'active' : ''}}">
                        <a href="/affiliate-income">Affiliate Team</a>
                    </li>
                                  
                </ul>
            </li>
            
            @endif
            @endhasrole
            <!-- Affiliate Passive Income end-->
            @hasanyrole('User|Admin')
            <li class="menu {{ request()->is('gallery') || request()->is('gallery/*') ? 'active' : ''}}">
                <a href="#links" data-bs-toggle="collapse" aria-expanded="{{ request()->is('gallery') || request()->is('gallery/*') ? 'true' : 'false'}}" class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns"><path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"></path></svg>
                        <span>Important Information</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul id="links" class="collapse submenu list-unstyled {{ request()->is('gallery') || request()->is('gallery/*') ? 'show' : ''}}"  data-bs-parent="#accordionExample">
                    <li class="{{ request()->is('gallery') ? 'active' : ''}}">
                        <a href="/gallery">View Information</a>
                    </li>
                                  
                </ul>
            </li>
            @endhasanyrole
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
            @hasrole('User')
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
                   
                    <li class="{{ request()->is('packages') ? 'active' : ''}}">
                        <a href="/packages">Buy Packages </a>
                    </li>
                    
                    
                                  
                </ul>
            </li>
            @endhasrole
            @if(auth()->user()->hasrole('Admin')||auth()->user()->hasDirectPermission('rank_update') )
            <li class="menu {{ request()->is('user-ranks') || request()->is('user-ranks/*') ? 'active' : ''}}">
                <a href="#user-ranks" data-bs-toggle="collapse" aria-expanded="{{ request()->is('user-ranks') || request()->is('user-ranks/*') ? 'true' : 'false'}}" class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns"><path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"></path></svg>
                        <span>User Ranks</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul id="user-ranks" class="collapse submenu list-unstyled {{ request()->is('user-ranks') || request()->is('user-ranks/*') ? 'show' : ''}}"  data-bs-parent="#accordionExample">
                   
                    <li class="{{ request()->is('user-ranks') ? 'active' : ''}}">
                        <a href="/user-ranks">Update Rank </a>
                    </li>
                    
                    
                                  
                </ul>
            </li>
            @endif
           
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
                        
                        <form action="/referral_tree" method="Post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{auth()->user()->id}}" id="">
                       <a href="javascript:{}" onclick="this.closest('form').submit();">Refral Tree</a>
                    </form>
                    </li>
                                  
                </ul>
            </li>
            @endhasrole
            @hasrole('User')
            <li class="menu {{  request()->is('Convert-to-rp') || request()->is('c-wallet-commission') ? 'active' : ''}}">
                <a href="#point_history" data-bs-toggle="collapse" aria-expanded="{{  request()->is('Convert-to-rp') || request()->is('c-wallet-commission') ? 'true' : 'false'}}" class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns"><path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"></path></svg>
                        <span>Point History</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul id="point_history" class="collapse submenu list-unstyled {{  request()->is('Convert-to-rp') || request()->is('c-wallet-commission') ? 'show' : ''}}"  data-bs-parent="#accordionExample">
                    <li class="{{  request()->is('c-wallet-commission') ? 'active' : ''}}">
                        <a href="/c-wallet-commission">C Wallet History</a>
                    </li>
                    <li class="{{  request()->is('future-point-commission') ? 'active' : ''}}">
                        <a href="/future-point-commission">Future Point History</a>
                    </li>
                    <li class="{{  request()->is('Convert-to-rp') ? 'active' : ''}}">
                        <a href="/Convert-to-rp">RP Conversion History</a>
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
                       
                        <form action="/network" method="Post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{auth()->user()->id}}" id="">
                       <a href="javascript:{}" onclick="this.closest('form').submit();">Network Summary</a>
                      </form>
                    </li>
                                  
                </ul>
            </li>
            @endhasrole
            <li class="menu {{ request()->is('deposit_accounts') || request()->is('transactions') || request()->is('deposit_now') || request()->is('deposit_now/*') ? 'active' : ''}}">
                <a href="#dep" data-bs-toggle="collapse" aria-expanded="{{ request()->is('deposit_accounts') || request()->is('transactions') || request()->is('deposit_now') || request()->is('deposit_now/*') ? 'true' : 'false'}}" class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns"><path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"></path></svg>
                        <span>Deposit</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul id="dep" class="collapse submenu list-unstyled {{ request()->is('deposit_accounts') || request()->is('transactions') || request()->is('deposit_now') || request()->is('deposit_now/*') ? 'show' : ''}}"  data-bs-parent="#accordionExample">
                    @hasrole('User')
                    <li class="{{ request()->is('deposit_now') ? 'active' : ''}}">
                        <a href="/deposit_now">Deposit Now </a>
                    </li>
                    <li class="{{ request()->is('deposit_accounts') ? 'active' : ''}}">
                        <a href="/deposit_accounts">Account Details </a>
                    </li>
                    <li class="{{ request()->is('transactions') ? 'active' : ''}}">
                        <a href="/transactions">Deposit History</a>
                    </li>
                    @endhasrole
                    @hasrole('Admin')
                    <li class="{{ request()->is('transactions') ? 'active' : ''}}">
                        <a href="/transactions">Deposit Transactions </a>
                    </li>
                    @endhasrole
                                  
                </ul>
            </li>

    <li class="menu {{ request()->is('withdraw-transactions-h') || request()->is('withdraw-transactions') || request()->is('withdraw') || request()->is('withdraw/*') ? 'active' : ''}}">
        <a href="#with" data-bs-toggle="collapse" aria-expanded="{{ request()->is('withdraw-transactions') || request()->is('withdraw') || request()->is('withdraw/*') ? 'true' : 'false'}}" class="dropdown-toggle">
            <div class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns"><path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"></path></svg>
                <span>Withdraw</span>
            </div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </div>
        </a>
        <ul id="with" class="collapse submenu list-unstyled {{ request()->is('withdraw-transactions') || request()->is('withdraw') || request()->is('withdraw/*') ? 'show' : ''}}"  data-bs-parent="#accordionExample">
            @hasrole('User')
            <li class="{{ request()->is('withdraw') ? 'active' : ''}}">
                <a href="/withdraw">Withdraw Now </a>
            </li>
            <li class="{{ request()->is('withdraw-transactions-h') ? 'active' : ''}}">
                <a href="/withdraw-transactions-h"> My Withdraw History </a>
            </li>
            @endhasrole
            @if(auth()->user()->hasAnyPermission(['withdraw_cancell','withdraw_approve']))
            <li class="{{ request()->is('withdraw-transactions') ? 'active' : ''}}">
                <a href="/withdraw-transactions">All Withdraw Transactions </a>
            </li>
            @endif
        </ul>
    </li>


            <li class="menu {{request()->is('transfer-admin-dp') || request()->is('transfer-admin-store-bv') || request()->is('transfer-b2b_bv_wallet') || request()->is('transfer-b2c_pv_wallet') || request()->is('transfer-admin-store') || request()->is('transfer-admin-future') || request()->is('transfer-admin-earning') || request()->is('transfer-admin-cbv') ||  request()->is('transfer-admin-cpv')  ||  request()->is('transfer-admin-bv') ||  request()->is('transfer-admin-rp') || request()->is('c-wallet') || request()->is('transfer-store-pv-wallet') || request()->is('transfer-c_wallet') || request()->is('balance-recieved') || request()->is('balance-sent') || request()->is('transfer') || request()->is('transfer/*') ? 'active' : ''}}">
                <a href="#bal" data-bs-toggle="collapse" aria-expanded="{{request()->is('transfer-admin-dp') || request()->is('transfer-admin-store-bv')  || request()->is('transfer-admin-store') || request()->is('transfer-admin-future') || request()->is('transfer') || request()->is('transfer/*') ? 'true' : 'false'}}" class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns"><path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"></path></svg>
                        <span>Balance Transfer</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul id="bal" class="collapse submenu list-unstyled {{request()->is('transfer-admin-dp')  || request()->is('transfer-admin-store') || request()->is('transfer-admin-store-bv') || request()->is('transfer-admin-earning') || request()->is('transfer-admin-future') || request()->is('transfer-c_wallet') || request()->is('transfer') || request()->is('transfer/*') ? 'show' : ''}}"  data-bs-parent="#accordionExample">
                   @hasrole('Admin')
                
                    <li class="{{ request()->is('transfer') ? 'active' : ''}}">
                        <a href="/transfer">Transfers </a>
                    </li>
                    <li class="{{ request()->is('transfer-c_wallet') ? 'active' : ''}}">
                        <a href="/transfer-c_wallet">C Wallet </a>
                    </li>
                    <li class="{{ request()->is('transfer-b2b_bv_wallet') ? 'active' : ''}}">
                        <a href="/transfer-b2b_bv_wallet">B2B Pool Points </a>
                    </li>
                    <li class="{{ request()->is('transfer-b2c_pv_wallet') ? 'active' : ''}}">
                        <a href="/transfer-b2c_pv_wallet">B2C Pool Points </a>
                    </li>
                    <li class="{{ request()->is('transfer-admin-rp') ? 'active' : ''}}">
                        <a href="/transfer-admin-rp">Register Points </a>
                    </li>
                    <li class="{{ request()->is('transfer-admin-dp') ? 'active' : ''}}">
                        <a href="/transfer-admin-dp">Direct Points </a>
                    </li>
                    <li class="{{ request()->is('transfer-admin-future') ? 'active' : ''}}">
                        <a href="/transfer-admin-future">Future Points </a>
                    </li>
                    <li class="{{ request()->is('transfer-admin-store') ? 'active' : ''}}">
                        <a href="/transfer-admin-store">Online Store Wallet </a>
                    </li>
                    <li class="{{ request()->is('transfer-admin-store_bv') ? 'active' : ''}}">
                        <a href="/transfer-admin-store-bv">Unilevel Pv</a>
                    </li>  
                    <li class="{{ request()->is('transfer-admin-affiliate-pv') ? 'active' : ''}}">
                        <a href="/transfer-admin-affiliate-pv">Affiliate Pv</a>
                    </li>  
                    <li class="{{ request()->is('transfer-admin-cpv') ? 'active' : ''}}">
                        <a href="/transfer-admin-cpv">Converted Pv</a>
                    </li>  
                    <li class="{{ request()->is('transfer-admin-store') ? 'active' : ''}}">
                        <a href="/transfer-admin-earning">Total Earning </a>
                    </li>
                    <li class="{{ request()->is('transfer-admin-bv') ? 'active' : ''}}">
                        <a href="/transfer-admin-bv">User BV</a>
                    </li>
                    <li class="{{ request()->is('transfer-admin-cbv') ? 'active' : ''}}">
                        <a href="/transfer-admin-cbv">User CBV </a>
                    </li>
                    <li class="{{ request()->is('transfer-store-pv-wallet') ? 'active' : ''}}">
                        <a href="/transfer-store-pv-wallet">Store Pv Wallet </a>
                    </li>
                    @else
                    <li class="{{ request()->is('transfer') ? 'active' : ''}}">
                        <a href="/transfer">RP Transfers </a>
                    </li>
                    <li class="{{ request()->is('balance-sent') ? 'active' : ''}}">
                        <a href="/balance-sent">Balance Sent</a>
                    </li>
                    <li class="{{ request()->is('balance-recieved') ? 'active' : ''}}">
                        <a href="/balance-recieved">Balance Recieved</a>
                    </li>
                @endhasrole
                                  
                </ul>
            </li>

			@hasrole('Admin')
            
            <li class="menu {{ request()->is('pv-store-transfer') || request()->is('transfer-points') || request()->is('cbv_log') || request()->is('bv_log_history') || request()->is('withdraw-history') || request()->is('transactions_history') || request()->is('transactions_history/*') ? 'active' : ''}}">
            <a href="#rep" data-bs-toggle="collapse" aria-expanded="{{  request()->is('transfer-points') || request()->is('cbv_log') || request()->is('bv_log_history') || request()->is('withdraw-history') || request()->is('transactions_history') || request()->is('transactions_history/*') ? 'true' : 'false'}}" class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns"><path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"></path></svg>
                        <span>Reports / History</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul id="rep" class="collapse submenu list-unstyled {{ request()->is('transfer-points') || request()->is('cbv_log') || request()->is('bv_log_history') || request()->is('withdraw-history') || request()->is('transactions_history') || request()->is('transactions_history/*') ? 'show' : ''}}"  data-bs-parent="#accordionExample">
                    <li class="{{ request()->is('transactions_history') ? 'active' : ''}}">
                        <a href="/transactions_history">Deposit History</a>
                    </li>

                <li class="{{ request()->is('withdraw-history') ? 'active' : ''}}">
                        <a href="/withdraw-history">WIthdraw History</a>
                    </li>
                    <li class="{{ request()->is('bv_log_history') ? 'active' : ''}}">
                        <a href="/bv_log_history">Bv Transactions</a>
                    </li>


<!-- 
                    <li class="{{ request()->is('cbv_log') ? 'active' : ''}}">
                        <a href="/cbv_log">CBV </a>
                    </li> -->
                    <li class="{{ request()->is('transfer-points') ? 'active' : ''}}">
                        <a href="/transfer-points">Transfer History</a>
                    </li>
                    <li class="{{ request()->is('pv-store-transfer') ? 'active' : ''}}">
                        <a href="/pv-store-transfer">Pv Store Transfer</a>
                    </li>
<!-- 
                    <li class="{{ request()->is('Buy_History') ? 'active' : ''}}">
                        <a href="/Buy_History">Buy History</a>
                    </li>
                    
                    <li class="{{ request()->is('first_Commission') ? 'active' : ''}}">
                        <a href="/first_Commission">First Commission</a>
                    </li>
                    
                    <li class="{{ request()->is('Bonus2_Commission') ? 'active' : ''}}">
                        <a href="/Bonus2_Commission">Bonus2 Commission</a>
                    </li> -->
                                  
                </ul>
            </li>
            @endhasrole




            @hasrole('User')
            <!-- <li class="menu {{ request()->is('complaint') || request()->is('complaint/*') ? 'active' : ''}}">
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
            </li> -->
            @endhasrole



            @hasrole('User')
            <!-- <li class="menu {{ request()->is('ticket') || request()->is('ticket/*') ? 'active' : ''}}">
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
            </li> -->
            @endhasrole
           
            <li class="menu {{ request()->is('show-kyc') || request()->is('user_kyc') || request()->is('KYC') || request()->is('KYC/*') ? 'active' : ''}}">
                <a href="#kyc" data-bs-toggle="collapse" aria-expanded="{{ request()->is('user_kyc') || request()->is('KYC') || request()->is('KYC/*') ? 'true' : 'false'}}" class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns"><path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"></path></svg>
                        <span>KYC</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul id="kyc" class="collapse submenu list-unstyled {{ request()->is('user_kyc') || request()->is('KYC') || request()->is('KYC/*') ? 'show' : ''}}"  data-bs-parent="#accordionExample">
                   @hasrole('User')
                    <li class="{{ request()->is('KYC') ? 'active' : ''}}">
                        <a href="/KYC">KYC Data</a>
                    </li>
                    @endhasrole
                    
                    @if(auth()->user()->hasAnyPermission(['kyc_data']))
                    <li class="{{ request()->is('KYC') ? 'active' : ''}}">
                        <a href="/user_kyc">All User KYC Data</a>
                    </li>
                    @endif
                   
                                  
                </ul>
            </li>
            

            

            @if(auth()->user()->hasAnyPermission(['user_profile']) || auth()->user()->hasAnyPermission(['unpaid-users']))
            <li class="menu {{request()->is('paid-users') || request()->is('search-all-users') || request()->is('search-unpaid-users') || request()->is('search-paid-users') || request()->is('unpaid-users') || request()->is('manage-permission') || request()->is('search-permission')  || request()->is('user-edit') || request()->is('users-cwallet') || request()->is('users-pv')|| request()->is('users-cpv') || request()->is('users-cbv') || request()->is('users-pv-store') || request()->is('users-uni-q') || request()->is('users-auto-q') || request()->is('users-rp') || request()->is('users-affiliate')  || request()->is('users-dp') || request()->is('users-rank-achievers') || request()->is('all-users-pairs') || request()->is('users-store') || request()->is('user-password') || request()->is('user-show') || request()->is('users') || request()->is('users/*') ? 'active' : ''}}">
                <a href="#users" data-bs-toggle="collapse" aria-expanded="{{ request()->is('paid-users') || request()->is('search-permission')  || request()->is('unpaid-users') || request()->is('manage-permission') || request()->is('users') || request()->is('users-store') || request()->is('users/*') ? 'true' : 'false'}}" class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns"><path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"></path></svg>
                        <span>Users</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul id="users" class="collapse submenu list-unstyled {{request()->is('paid-users') || request()->is('users-store') || request()->is('unpaid-users') || request()->is('manage-permission') || request()->is('users') || request()->is('users-store') || request()->is('users/*') ? 'show' : ''}}"  data-bs-parent="#accordionExample">
                   @if(auth()->user()->hasAnyPermission(['user_profile']) )    
                    <li class="{{ request()->is('users') ? 'active' : ''}}">
                        <a href="/users">All Users</a>
                    </li>
                    <li class="{{ request()->is('paid-users') ? 'active' : ''}}">
                        <a href="/paid-users">Paid Users</a>
                    </li>
                    @endif
                    @if(auth()->user()->hasAnyPermission(['user_profile']) || auth()->user()->hasAnyPermission(['unpaid-users']) )    
                    <li class="{{ request()->is('unpaid-users') ? 'active' : ''}}">
                        <a href="/unpaid-users">Unpaid Users</a>
                    </li>
                    @endif
                    
                 </ul>
            </li>
            @endif
            @hasrole('Admin')
            <li class="menu {{ request()->is('account-details') ? 'active' : ''}}">
            <a href="#account" data-bs-toggle="collapse" aria-expanded="{{ request()->is('account-details') ? 'true' : 'false'}}" class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns"><path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"></path></svg>
                        <span>Account Details</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul id="account" class="collapse submenu list-unstyled {{ request()->is('account-details')  ? 'show' : ''}}"  data-bs-parent="#accordionExample">
                    <li class="{{ request()->is('account-details') ? 'active' : ''}}">
                        <a href="/account-details">Account Details</a>
                    </li>
                 </ul>
            </li>
            @endhasrole
            @hasrole('Admin')
            <li class="menu {{ request()->is('unilevel-settings') ? 'active' : ''}}">
            <a href="#unilevel-settings" data-bs-toggle="collapse" aria-expanded="{{ request()->is('unilevel-settings') ? 'true' : 'false'}}" class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns"><path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"></path></svg>
                        <span>Unilevel</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul id="unilevel-settings" class="collapse submenu list-unstyled {{ request()->is('unilevel-settings')  ? 'show' : ''}}"  data-bs-parent="#accordionExample">
                    <li class="{{ request()->is('unilevel-settings') ? 'active' : ''}}">
                        <a href="/unilevel-settings">Settings</a>
                    </li>
                 </ul>
            </li>
            @endhasrole
            @hasrole('Admin')
            <li class="menu {{ request()->is('affiliate-settings') ? 'active' : ''}}">
            <a href="#affiliate-settings" data-bs-toggle="collapse" aria-expanded="{{ request()->is('affiliate-settings') ? 'true' : 'false'}}" class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns"><path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"></path></svg>
                        <span>Affiliate</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul id="affiliate-settings" class="collapse submenu list-unstyled {{ request()->is('affiliate-settings')  ? 'show' : ''}}"  data-bs-parent="#accordionExample">
                    <li class="{{ request()->is('affiliate-settings') ? 'active' : ''}}">
                        <a href="/affiliate-settings">Settings</a>
                    </li>
                 </ul>
            </li>
            @endhasrole

            
            @hasrole('Admin')
            <li class="menu {{ request()->is('edit-package') || request()->is('all-packages') || request()->is('package-update') || request()->is('users_packages') || request()->is('users_packages/*') ? 'active' : ''}}">
            <a href="#users_packages" data-bs-toggle="collapse" aria-expanded="{{ request()->is('all-packages') || request()->is('users_packages') || request()->is('users_packages/*') ? 'true' : 'false'}}" class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns"><path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"></path></svg>
                        <span>Users packages</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul id="users_packages" class="collapse submenu list-unstyled {{ request()->is('all-packages') || request()->is('users_packages') || request()->is('users_packages/*') ? 'show' : ''}}"  data-bs-parent="#accordionExample">
                    <li class="{{ request()->is('all-packages') ? 'active' : ''}}">
                        <a href="/all-packages">All packages</a>
                    </li>
                    <li class="{{ request()->is('users_packages') ? 'active' : ''}}">
                        <a href="/users_packages">Users packages</a>
                    </li>
                 </ul>
            </li>
            @endhasrole

            
            
            <li class="menu {{ request()->is('my-password') || request()->is('user-profile') || request()->is('user-profile/*') ? 'active' : ''}}">
                <a href="#user-profile" data-bs-toggle="collapse" aria-expanded="{{ request()->is('user-profile') || request()->is('user-profile/*') ? 'true' : 'false'}}" class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns"><path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"></path></svg>
                        <span>Profile</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul id="user-profile" class="collapse submenu list-unstyled {{ request()->is('my-password') || request()->is('user-profile') || request()->is('user-profile/*') ? 'show' : ''}}"  data-bs-parent="#accordionExample">
                    <li class="{{ request()->is('user-profile') ? 'active' : ''}}">
                        <a href="user-profile">Profile </a>
                    </li>
                    <li class="{{ request()->is('my-password') ? 'active' : ''}}">
                        <a href="my-password">Update Password </a>
                    </li>
                                  
                </ul>
            </li>

          
            @if(auth()->user()->hasDirectPermission('products') ||  auth()->user()->hasDirectPermission('courses') || auth()->user()->hasDirectPermission('library'))
            <li class="menu {{ request()->is('sub-categories/*') || request()->is('product-cats') || request()->is('cource-cats') || request()->is('library-cats') || request()->is('library-cats') || request()->is('products/*') || request()->is('digital_library') || request()->is('cource_categories') || request()->is('cource_categories/*') || request()->is('digital_library/*') || request()->is('sub-categories') || request()->is('cource_categories') || request()->is('digital_cources/*') || request()->is('digital_cources') || request()->is('categories') || request()->is('categories/create') || request()->is('login-history/*') ? 'active' : ''}}">
                <a href="#prouct_catagories" data-bs-toggle="collapse" aria-expanded="{{ request()->is('login-history') || request()->is('login-history/*') ? 'true' : 'false'}}" class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns"><path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"></path></svg>
                        <span>Products</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul id="prouct_catagories" class="collapse submenu list-unstyled {{request()->is('sub-categories/*') || auth()->user()->hasDirectPermission('products') || request()->is('cource_categories') || request()->is('categories')  || request()->is('digital_library')|| request()->is('cource_categories') || request()->is('digital_cources') || request()->is('login-history/*') ? 'show' : ''}}"  data-bs-parent="#accordionExample">
                    @if(auth()->user()->hasDirectPermission('products'))
                     @hasrole('Admin')
                     <li class="{{ request()->is('categories') ? 'active' : ''}}">
                        <a href="/categories">Product Catagories</a>
                     </li>
                     @endhasrole
                
                    <li class="{{ request()->is('product-cats') || request()->is('products') ? 'active' : ''}}">
                        <a href="/product-cats">All Products </a>
                    </li>
                    @endif
                    <!-- @if(auth()->user()->hasDirectPermission('courses'))
                    <hr>
                    @hasrole('Admin')
                    <li class="{{ request()->is('cource_categories') ? 'active' : ''}}">
                        <a href="/cource_categories">Course Catagories</a>
                    </li>
                    @endhasrole
                   
                    <li class="{{ request()->is('cource-cats') || request()->is('digital_cources') ? 'active' : ''}}">
                        <a href="/cource-cats">Digital Courses </a>
                    </li>
                    @endif -->
                    <!-- @if(auth()->user()->hasDirectPermission('library'))
                    <hr>
                    @hasrole('Admin')
                    <li class="{{ request()->is('library_categories') ? 'active' : ''}}">
                        <a href="/library_categories">Library Catagories</a>
                    </li>
                    @endhasrole
                
                  
                    <li class="{{ request()->is('library-cats') || request()->is('digital_library') ? 'active' : ''}}">
                        <a href="/library-cats">Digital Library </a>
                    </li>
                    @endif -->
                           
                                  
                </ul>
            </li>
            @endif
            @hasrole('Admin')
            <li class="menu {{ request()->is('posters') || request()->is('posters/*') ? 'active' : ''}}">
                <a href="#posters" data-bs-toggle="collapse" aria-expanded="{{ request()->is('posters') || request()->is('posters/*') ? 'true' : 'false'}}" class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns"><path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"></path></svg>
                        <span>Posters</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul id="posters" class="collapse submenu list-unstyled {{ request()->is('posters') || request()->is('posters/*') ? 'show' : ''}}"  data-bs-parent="#accordionExample">
                    <li class="{{ request()->is('posters') ? 'active' : ''}}">
                        <a href="/posters">Posters</a>
                    </li>
                                  
                </ul>
            </li>
            @endhasrole
            @hasrole('Admin')
            <li class="menu {{ request()->is('login-history') || request()->is('login-history/*') ? 'active' : ''}}">
                <a href="#login-history" data-bs-toggle="collapse" aria-expanded="{{ request()->is('login-history') || request()->is('login-history/*') ? 'true' : 'false'}}" class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns"><path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"></path></svg>
                        <span>Login History</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul id="login-history" class="collapse submenu list-unstyled {{ request()->is('login-history') || request()->is('login-history/*') ? 'show' : ''}}"  data-bs-parent="#accordionExample">
                    <li class="{{ request()->is('login-history') ? 'active' : ''}}">
                        <a href="/login-history">Login history</a>
                    </li>
                                  
                </ul>
            </li>
            @endhasrole
           
            <li class="menu {{ request()->is('cust-orders') || request()->is('orders') || request()->is('orders?st') || request()->is('order-details')  ? 'active' : ''}}">
                <a href="#all_orders" data-bs-toggle="collapse" aria-expanded="{{ request()->is('orders')  ? 'true' : 'false'}}" class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns"><path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"></path></svg>
                        <span>Orders</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul id="all_orders" class="collapse submenu list-unstyled {{request()->is('orders') ? 'show' : ''}}"  data-bs-parent="#accordionExample">
                @if(Auth::user()->hasrole('Admin'))    
                    <li class="{{ request()->is('orders?st=0') ? 'active' : ''}}">
                       
                        <form action="/orders?st=0" method="GET">
                        <input type="hidden" name="st" value="0" id="">
                      
                       <a href="javascript:{}" onclick="this.closest('form').submit();">Pending Orders</a>
                      </form>
                    </li>
                    <li class="{{ request()->is('orders?st=1') ? 'active' : ''}}">
                       
                       <form action="/orders" method="GET">
                       <input type="hidden" name="st" value="1" id="">
                     
                      <a href="javascript:{}" onclick="this.closest('form').submit();">Approved Orders</a>
                     </form>
                   </li>
                @else
                   <li class="{{ request()->is('orders?st=0') ? 'active' : ''}}">
                       
                        <form action="/orders?st=0" method="GET">
                        <input type="hidden" name="st" value="0" id="">
                      
                       <a href="javascript:{}" onclick="this.closest('form').submit();">My Orders</a>
                      </form>
                    </li>

                @endif
                @if(Auth::user()->hasrole('User') && Auth::user()->hasDirectPermission('order_apc'))
                <li class="{{ request()->is('cust-orders?st=0') ? 'active' : ''}}">
                       
                        <form action="/cust-orders?st=0" method="GET">
                        <input type="hidden" name="st" value="0" id="">
                      
                       <a href="javascript:{}" onclick="this.closest('form').submit();">Customer Pending Orders</a>
                      </form>
                    </li>
                    <li class="{{ request()->is('cust-orders?st=1') ? 'active' : ''}}">
                       
                       <form action="/cust-orders" method="GET">
                       <input type="hidden" name="st" value="1" id="">
                     
                      <a href="javascript:{}" onclick="this.closest('form').submit();">Customer Approved Orders</a>
                     </form>
                   </li>
                

                @endif
                

                             
                </ul>
            </li>
           



            <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>Main Menu</span></div>
            </li>
           

            
           
     
           


         
            
        @endhasanyrole
          
            
        </ul>