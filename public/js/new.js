var release = false;

function addKinou(){
    var kinou = parseInt(document.getElementById('kinou_num').value);
    var str = '<div class="form-group">' + 
        '<h5 class="card-title">Kinou' + ++kinou + '.</h5>' + 
        '<input class="form-control"  name="kinou' + kinou + '" type="text">' + 
        '</div>' + 
        '<div class="form-group">' + 
        '<h5 class="card-title">Syosai' + kinou + '.</h5>' + 
        '<textarea class="form-control" name="syosai' + kinou + '" id="syosai" rows="3"></textarea>' + 
        '</div>';

    document.getElementById('add-kinou').insertAdjacentHTML('beforeend', str);
    document.getElementById('kinou_num').value = kinou;

}

function addTags(){
    var tags = parseInt(document.getElementById('tag_num').value);
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

    var tagshtml = document.getElementsByClassName('tags');
    var str = '<input class="form-control" name="tag' + (tags + 1) + '" type="text"></input>';
    tagshtml[tags++].insertAdjacentHTML('beforeend', str);
    document.getElementById('tag_num').value = tags;

}

function changeBox() {
    release = !release;
    document.getElementById('release').innerText = release ? '　完成' : '下書き';

}
