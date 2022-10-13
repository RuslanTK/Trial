


//возможно у меня стили в модальном не очень,думал потом подключу бутстрап,так как подключил,так много классов похожих и многие элементы поменяли стиль на не очень,я решил так оставить...потому что уже калабардак в голове начался...((((
window.addEventListener('DOMContentLoaded', () => {
// Получаем JSON и формируем структуру документа
    const wrap = document.getElementById('wrap'),
          requestURL = 'books.json',
          request = new XMLHttpRequest();
    request.open('GET', requestURL);
    request.responseType = 'json';
    request.send();
    request.onload = function() {
    const products = request.response;
    for(let i = 0; i<products.length; i++){
      const product = document.createElement('div');
      product.className = 'text';
      product.innerHTML = `<h4 class="header"><a href="#">${products[i].name}</a></h4>`;

      if(products[i].description.substr(0, 5) === 'АКЦИЯ'){
        product.innerHTML += '<div class="action">Акция!</div>';
    }

      product.innerHTML += `<img src="${products[i].imageUrl}" alt="${products[i].name}" title="${products[i].name}" />
                           <p>${products[i].description} </p>
                           <div class="code"> Код товара: ${products[i].code}</div>
                           <div class="price">Цена: ${products[i].price} грн.</div>
                           <div class="link_more"><a href="http://site.com.ua/?id=${products[i].code}">Подробнее</a></div>`;
     wrap.append(product); 
     
    }
    createModal();
    };

// Создаем модальное окно и привязываем событие для вызова модального окна    
    function createModal(){
        const productWrap = document.querySelectorAll('.text'),
              modal = document.createElement('div');

        modal.className ='modal hide';
        modal.innerHTML = `<div class="modal__dialog"> 
                                <div class="modal__content">
                                    <div class="modal__close"><button>X</button></div>
                                    <div class="modal__header"></div>
                                    <img data-modal-img src="" />
                                </div>
                            </div>`;

        document.body.append(modal);

        productWrap.forEach((item) => {
            console.log(item);
            item.querySelector('img').addEventListener('click', (e) => {
                const target = e.target,
                      src = target.getAttribute('src'),
                      title = target.getAttribute('title');
                openModal(src, title);
            
            });
        });

        function openModal(src, title){
            modal.classList.add('show');
            modal.classList.remove('hide');
            document.body.style.overflow = 'hidden';
            document.querySelector('[data-modal-img]').setAttribute('src', src);
            document.querySelector('.modal__header').innerHTML = `<h4>${title}</h4>`;
        }   

        function closeModal(){
            modal.classList.add('hide');
            modal.classList.remove('show'); 
            document.body.style.overflow = '';
        }

        document.querySelector('.modal__close').addEventListener('click', closeModal);
        }

});

