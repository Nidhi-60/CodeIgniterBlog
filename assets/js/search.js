search_box = document.getElementById('searchbox');
result = document.getElementById('result');

search_box.addEventListener('keyup', search_data);


function search_data() {

    var search_box_value = search_box.value;
    if (search_box.value != "") {
             ul = document.createElement('ul');
        const xhr = new XMLHttpRequest();

        var search_box_value = search_box.value;

        xhr.open('GET', `http://localhost/CodeIgniterBlog/search/${search_box_value}`, true);

        xhr.onload = function () {
            if (this.status === 200) {
                var data = JSON.parse(this.responseText);
                blog_title = data['blog']

                for (var i = 0; i < blog_title.length; i++) {
                    li = document.createElement('li');
                    img = document.createElement('img');
                    a = document.createElement('a');

                    a.href = `http://localhost/CodeIgniterBlog/blog/${blog_title[i].slug}`;
                
                    a.text = blog_title[i].title;

                    img.src = `http://localhost/CodeIgniterBlog/assets/image/posts/${blog_title[i].blogimage}`;
                    img.style.height = '50px';
                    img.style.width = '50px';


                    li.appendChild(a);
                    li.appendChild(img);
  

                    ul.appendChild(li);

                    result.className = 'searchbox';

                    result.appendChild(ul);
                    console.log(li);
                    console.log(a);
                }


            }
        }

        xhr.send();

    }
    else {

         result.style.display = 'none';

    }
}