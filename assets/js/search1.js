earch_box = document.getElementById('searchbox');
result = document.getElementById('result');

search_box.addEventListener('keyup', search_data);


function search_data() {


    var search_box_value = search_box.value;

    if (search_box_value != "") {

        var xhr = new XMLHttpRequest();

        xhr.open('GET', `http://localhost/CodeIgniterBlog/search/${search_box_value}`, true);

        xhr.onload = function () {
            if (this.status == 200) {
                console.log(JSON.parse(this.responseText));
            }
        }
      
      xhr.send();

    }
    else {
        result.style.display = 'none';
    }



}