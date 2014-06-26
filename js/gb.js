(function(){
    $.get('shop/user.php?act=get_user_name',function(user){
        if(user){
            $('#J_user,#J_login').toggle();
            $('#J_userName').text(user);
        }
    })
})();