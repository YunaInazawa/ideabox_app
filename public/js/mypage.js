function del(url, title){
    if( confirm(title + ' を削除しますか？') ){
        location.href=url;
    }

}

function edit(url){
    location.href=url;

}
