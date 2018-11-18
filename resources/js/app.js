
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Sortable from 'sortablejs/Sortable.js'
window.Sortable = Sortable;

const addItem = document.getElementById('item-add');
const items = document.getElementById('items');
const itemsCounter = document.getElementById('counter');

let counter = 1;

addItem.addEventListener('click', function (e) {
    e.preventDefault();

    const newCard = document.createElement('div');
    newCard.className = "card";

    const newCardBody = document.createElement('div');
    newCardBody.className = "card-body";

    const inputSettings = [
        {
            type: 'text',
            class: 'form-control-plaintext',
            name: `item-title[${counter}]`,
            placeholder: 'my title'
        },
        {
            type: 'text',
            class: 'form-control-plaintext',
            name: `item-description[${counter}]`,
            placeholder: 'my description'
        },
        {
            type: 'hidden',
            name: `item-order[${counter}]`,
            value: counter
        }
    ];

    inputSettings.forEach(function (input) {
        const newElem = document.createElement('input');
        for (let key in input) {
            newElem.setAttribute(key, input[key]);
        }

        newCardBody.appendChild(newElem);
    });

    newCard.appendChild(newCardBody);
    items.appendChild(newCard);
    counter++;
    itemsCounter.setAttribute('value', counter.toString());
});

const sortable = Sortable.create(items, {
    animation: 300,
    onEnd: function (evt) {
        let min = evt.oldIndex;  // element's old index within old parent
        let max = evt.newIndex;  // element's new index within new parent

        if (max < min) {
            [max, min] = [min, max];
        }

        let list = items.querySelectorAll('input[type="hidden"]');

        list = [...list].filter(function(input) {
            const value = input.getAttribute('value');
            return value >= min && value <= max;
        })

        list.forEach( function(element) {
            element.setAttribute('value', min);
            min++;
        });
    },
});


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
