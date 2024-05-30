
<?php $store_user_id=0;
if(auth()->user()){
    $store_user_id=auth()->user()->id;
}


?>
<input type="hidden"  id="store_user_id" value="{{$store_user_id}}">