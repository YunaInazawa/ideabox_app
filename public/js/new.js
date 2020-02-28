/**
 * 機能＋詳細の入力欄を追加する
 */
function addKinou(){
    // 現在の機能＋詳細の入力欄数を取得
    var kinou = parseInt(document.getElementById('kinou_num').value);

    // 入力欄 HTML を生成
    var str = '<div class="form-group">' + 
        '<h5 class="card-title">Kinou' + ++kinou + '.</h5>' + 
        '<input class="form-control"  name="kinou' + kinou + '" type="text">' + 
        '</div>' + 
        '<div class="form-group">' + 
        '<h5 class="card-title">Syosai' + kinou + '.</h5>' + 
        '<textarea class="form-control" name="syosai' + kinou + '" id="syosai" rows="3"></textarea>' + 
        '</div>';

    // 画面に反映
    document.getElementById('add-kinou').insertAdjacentHTML('beforeend', str);

    // 現在の機能＋詳細の入力欄数を更新
    document.getElementById('kinou_num').value = kinou;

}

/**
 * タグの入力欄を追加する
 */
function addTags(){
    // 現在のタグ入力欄数を取得
    var tags = parseInt(document.getElementById('tag_num').value);

    // 一行埋まっていれば新たに一行追加
    if( tags % 5 == 0 ){
        var temp = '<div class="form-row">' + 
            '<div class="col tags">' + 
            '</div>' + 
            '<div class="col tags">' + 
            '</div>' + 
            '<div class="col tags">' + 
            '</div>' + 
            '<div class="col tags">' + 
            '</div>' + 
            '<div class="col tags">' + 
            '</div>' + 
            '</div>';
        document.getElementById('add-tags').insertAdjacentHTML('beforeend', temp);
    }

    // 追加する div を取得
    var tagshtml = document.getElementsByClassName('tags');
    var str = '<input class="form-control" name="tag' + (tags + 1) + '" type="text"></input>';

    // 画面に反映
    tagshtml[tags++].insertAdjacentHTML('beforeend', str);

    // 現在のタグ入力欄数を更新
    document.getElementById('tag_num').value = tags;

}

/**
 * チェックボックスが変更された時、
 * 表示を変更する
 */
function changeBox() {
    // チェックボックスの状態を取得
    var release = document.getElementById('customSwitch1').checked;

    // ラベルを更新
    document.getElementById('release').innerText = release ? '　完成' : '下書き';

}
