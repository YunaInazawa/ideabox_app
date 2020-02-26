var kinou = 1;
var tags = 1;
var release = false;

function addKinou(){
    var str = '' + 
        '<div class="form-group">' + 
        '<h5 class="card-title">Kinou' + ++kinou + '.</h5>' + 
        '<input class="form-control"  name="kinou' + kinou + '" type="text">' + 
        '</div>' + 
        '<div class="form-group">' + 
        '<h5 class="card-title">Syosai' + kinou + '.</h5>' + 
        '<textarea class="form-control" name="syosai' + kinou + '" id="syosai" rows="3"></textarea>' + 
        '</div>';

    document.getElementById('add-kinou').innerHTML += str;

}

function addTags(){
    if( tags % 5 == 0 ){
        var str = '<div class="form-row">' + 
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
        document.getElementById('add-tags').innerHTML += str;
    }

    var tagshtml = document.getElementsByClassName('tags');
    tagshtml[tags++].innerHTML += '<input class="form-control" name="tag' + (tags + 1) + '" type="text"></input>';

}

function changeBox() {
    release = !release;
    document.getElementById('release').innerText = release ? '　完成' : '下書き';

}
