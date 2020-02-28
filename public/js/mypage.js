/**
 * 削除確認＋遷移
 * @param {削除画面URL} url 
 * @param {削除記事タイトル} title 
 */
function del(url, title){
    if( confirm(title + ' を削除しますか？') ){
        location.href=url;
    }

}

/**
 * 編集画面へ遷移
 * @param {編集画面URL} url 
 */
function edit(url){
    location.href=url;

}
